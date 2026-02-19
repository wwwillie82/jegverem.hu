<?php

class Kepeslapok_add extends Controller {
	private function normalize($str, $delimiter = "-") {

		$str = strtolower($str);
		$from = array("ö", "ü", "ó", "ő", "ú", "á", "ű", "í", "é");
		$to = array("o", "u", "o", "o", "u", "a", "u", "i", "e");
		$str = str_replace($from, $to, $str);

		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

	function main() {
		if(!ACL::GetInstance()->Query("Képeslapok", "Admin")) {
			Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("Nincs megfelelő jogosultsága!"));
			return;
		}
		ModuleHelper::SetBreadcrumb(array(Localization::_("Képeslap"), Localization::_("Feltöltése")));
		Form::OnSubmit("add", array($this, "Submit"));

		$this->view->columns = $this->db->Query("SELECT * FROM postcard_columns ORDER BY name");
		$this->view->display("admin/add");
	}

	function Submit($data) {
		if(!ACL::GetInstance()->Query("Képeslapok", "Szerkeszt")) {
			Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("Nincs megfelelő jogosultsága!"));
			return;
		}

		$row = new DbRow();
		$row->title = $data["title"];
		$row->columns_id = $data["columns_id"];
		$row->permalink = $this->normalize($data["title"] . "-" . date("Y-m-d-His"));
		$row->subsites_id = Auth::GI()->GetUserSession()->GetSubsitesId();
		$row->uploaded_users_id = Auth::GI()->GetUserSession()->GetUserId();

		if(!empty($data["picture_filename"])) {
			$row->pic_path = $data["picture_filename"];
			$row->pic_data = serialize(array($data["crop_x"], $data["crop_y"], $data["crop_w"], $data["crop_h"]));
		}

		$this->db->Insert("postcards", $row);
	}
}
