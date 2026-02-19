<?php

class Galeria_edit extends Controller {

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

	private function gettag($value) {
		$table_name = "gallery_tags";
		$lang_id = 1;
		$query = $this->db->Query("SELECT * FROM $table_name WHERE tag='$value' AND lang_id='$lang_id'");
		if($query->Length() > 0) return $query->id;
		// ha még nem létezik
		$row = new DbRow();
		$row->tag = $value;
		$row->slug = $this->normalize($value);
		$row->lang_id = $lang_id;

		return $this->db->Insert($table_name, $row);
	}

	function main() {
		ModuleHelper::SetBreadcrumb(array(Localization::_("Galéria"), Localization::_("Szerkesztése")));
		Form::OnSubmit("edit", array($this, "Submit"));

		$this->db->id = URI::GetNamedParam("id");
		$this->view->gallery = $this->db->Query(QueryBuilder::QueryBuilder()->Select(array("*"))->From("galleries")->Where("id={id}"));
		$this->view->display("admin/edit");
	}

	function Submit($data) {
		$row = new DbRow();
		$row->title = $data["title"];
        $row->title_de = $data["title_de"];
		$row->title_en = $data["title_en"];
		$row->entry_date = $data["entry_date"];
		$row->short_text = $data["short_text"];
        $row->short_text_de = $data["short_text_de"];
		$row->short_text_en = $data["short_text_en"];
		$row->active = $data["active"];
		$row->featured = $data["featured"];
		$row->permalink = $this->normalize($data["title"] . "-" . date("Y-m-d", strtotime($data["entry_date"])));
        $row->permalink_de = $this->normalize($data["title_de"] . "-" . date("Y-m-d", strtotime($data["entry_date"])));
		$row->permalink_en = $this->normalize($data["title_en"] . "-" . date("Y-m-d", strtotime($data["entry_date"])));

		if(!empty($data["picture_filename"])) {
			$row->pic_path = $data["picture_filename"];
		}
		$row->pic_data = serialize(array($data["crop_x"], $data["crop_y"], $data["crop_w"], $data["crop_h"]));
		$this->db->Update("galleries",URI::GetNamedParam("id"), $row);
	}
}
