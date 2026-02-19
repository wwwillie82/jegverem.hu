<?php

class Galeria_pictures extends Controller {

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
		$id = URI::GetNamedParam("id");
		ModuleHelper::SetBreadcrumb(array(Localization::_("Galéria"), Localization::_("Képek szerkesztése")));
		Form::OnSubmit("add", array($this, "Submit"));
		Form::OnSubmit("switch_picture", array($this, "SubmitSwitch"));

		$qb = QueryBuilder::QueryBuilder()->Select(array("*"))->From("pictures")->Where("galleries_id='$id'")->OrderBy("sort");
		$this->view->pictures = $this->db->Query($qb);
		
		$this->view->display("admin/pictures");
	}

	function edit() {
		$id = URI::GetNamedParam("id");
		Form::OnSubmit("edit_image", array($this, "SubmitEdit"));

		$qb = QueryBuilder::QueryBuilder()->Select(array("*"))->From("pictures")->Where("id='$id'")->OrderBy("sort");
		$this->view->picture = $this->db->Query($qb);
		$this->view->display("admin/picture_edit");
	}

	function SubmitSwitch($data) {
		$from_id = $data["sel_1"];
		$to_id = $data["sel_2"];
		
		$qb = QueryBuilder::QueryBuilder()->Select("sort")->From("pictures");
		$from_sort = $this->db->Query($qb->Where("id='$from_id'"))->sort;
		$qb = QueryBuilder::QueryBuilder()->Select("sort")->From("pictures");
		$to_sort = $this->db->Query($qb->Where("id='$to_id'"))->sort;
		
		$this->db->Update("pictures", $from_id, new DbRow(array("sort" => $to_sort)));
		$this->db->Update("pictures", $to_id, new DbRow(array("sort" => $from_sort)));
		URI::RedirectToReferer();
	}

	function SubmitEdit($data) {
		$row = new DbRow();
		$row->title = $data["title"];
		$row->title_de = $data["title_de"];
		$row->title_en = $data["title_en"];
		$row->active = $data["active"];

		if(!empty($data["picture_filename"])) {
			$row->pic_path = $data["picture_filename"];
			$row->pic_data = serialize(array($data["crop_x"], $data["crop_y"], $data["crop_w"], $data["crop_h"]));
		}

		$picture = $this->db->Update("pictures", URI::GetNamedParam("id"), $row);
	}

	function delete() {
		$id = URI::GetNamedParam("id");
		$this->db->Delete("pictures", new DbRow(array("id" => $id)));
		URI::RedirectToReferer();
	}

	function Submit($data) {
		$galleries_id = URI::GetNamedParam("id");
		$row = new DbRow();
		$row->title = $data["title"];
		$row->title_de = $data["title_de"];
		$row->title_en = $data["title_en"];
		$row->active = $data["active"];
		$row->entry_date = date("Y-m-d H:i:s");
		$row->galleries_id = $galleries_id;

		$max_sort = $this->db->Query("SELECT MAX(sort) max_sort FROM pictures WHERE galleries_id='$galleries_id' GROUP BY galleries_id")->max_sort;

		foreach($data["files"] as $file) {
			$max_sort += 1;
			$row->sort = $max_sort;
			if(!empty($file)) {
				$row->pic_path = $file;
				$size = getimagesize($file);
				$row->pic_data = serialize(array(0, 0, $size[0], $size[1]));
			}
			$picture = $this->db->Insert("pictures", $row);
		}
	}
}
