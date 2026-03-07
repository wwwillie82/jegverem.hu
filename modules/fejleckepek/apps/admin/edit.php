<?php
class Fejleckepek_edit extends Controller {
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
		ModuleHelper::SetBreadcrumb(array(Localization::_("Fejléckép"), Localization::_("Szerkesztése")));
		Form::OnSubmit("edit", array($this, "Submit"));

		$this->db->id = URI::GetNamedParam("id");
		$qb = QueryBuilder::QueryBuilder()->Select()->From("covers")->Where("id={id}");
		$this->view->cover = $this->db->Query($qb);

		$this->view->columns = $this->db->Query("SELECT * FROM cover_columns ORDER BY name");
		$this->view->display("admin/edit");
	}

	function Submit($data) {
		$row = new DbRow();
		
		$row->columns_id = $data["columns_id"];
		$row->sort_order = $data["sort_order"];
		$row->description = $data["description"];

		if(!empty($data["picture_filename"])) {
			$row->pic_path = $data["picture_filename"];
		}
		$row->pic_data = serialize(array($data["crop_x"], $data["crop_y"], $data["crop_w"], $data["crop_h"]));
		
		$this->db->Update("covers",URI::GetNamedParam("id"), $row);
	}
}
