<?php
class Kategoriak_add extends Controller {
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
        $lang_id = $this->GetSession()->lang_id;
		ModuleHelper::SetBreadcrumb(array(Localization::_("Kategória"), Localization::_("Hozzáadása")));
		Form::OnSubmit("add", array($this, "Submit"));

		$lang_id = $this->GetSession()->lang_id;
		$categories = $this->db->Query("SELECT * FROM categories WHERE title <> '' AND lang_id = '$lang_id' ORDER BY title");
		$buffer = array();
		foreach($categories as $category) {
			$search = array("'", "\"");
			$replacements = array("&#39;", "&#34;");
			$title = str_replace($search, $replacements, $category->title);

			$buffer[] = array("id" => $category->id, "parentid" => $category->parent_id, "value" => $title);
		}

		$this->view->categories = json_encode($buffer);
		$this->view->display("admin/add");
	}

	function Submit($data) {
		$row = new DbRow();
		
        $row->parent_id = $data["category_id"];
        $row->title = addslashes($data["title"]);
		$row->description = $data["description"];
        $row->sort_order = $data["sort_order"];
        $row->lang_id = $this->GetSession()->lang_id;
		
		$row->from_date = $data["from_date"];
		$row->to_date = $data["to_date"];

        $category_id = $this->db->Insert("categories", $row);

        // permalink
        $row = new DbRow();
        $row->permalink = $this->normalize($data["title"]);
        $this->db->Update("categories", $category_id, $row);
	}
}