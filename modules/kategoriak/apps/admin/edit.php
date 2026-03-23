<?php

ini_set("display_errors", 0);
class Kategoriak_edit extends Controller {
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

	private function RejectInvalidParent() {
		Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("Érvénytelen szülő kategória lett kiválasztva."));

		if (!empty($_SERVER["HTTP_REFERER"])) {
			URI::RedirectToReferer();
		} else {
			URI::Redirect(ModuleHelper::GetFunctionLink("admin/edit", array("id" => URI::GetNamedParam("id"))));
		}

		exit;
	}

	private function GetCategoryById($id) {
		$id = (int) $id;
		if ($id <= 0) return false;
		return $this->db->Query("SELECT id, parent_id FROM categories WHERE id='$id' LIMIT 0,1");
	}

	private function IsValidParentSelection($current_id, $parent_id) {
		$current_id = (int) $current_id;
		$parent_id = (int) $parent_id;

		if ($parent_id === 0) return true;
		if ($parent_id === $current_id) return false;

		$parent = $this->GetCategoryById($parent_id);
		if (!$parent) return false;

		$visited = array();
		while ($parent) {
			$walk_id = (int) $parent->id;
			if (isset($visited[$walk_id])) return false;
			$visited[$walk_id] = true;

			if ($walk_id === $current_id) return false;

			$next_parent_id = (int) $parent->parent_id;
			if ($next_parent_id === 0) break;

			$parent = $this->GetCategoryById($next_parent_id);
			if (!$parent) return false;
		}

		return true;
	}

    function main() {
        $lang_id = $this->GetSession()->lang_id;
		ModuleHelper::SetBreadcrumb(array(Localization::_("Kategória"), Localization::_("szerkesztése")));
		Form::OnSubmit("edit", array($this, "Submit"));

		$categories = $this->db->Query("SELECT * FROM categories WHERE title <> '' AND lang_id='$lang_id' ORDER BY title");
		$buffer = array();
		foreach($categories as $category) {
			$search = array("'", "\"");
			$replacements = array("&#39;", "&#34;");
			$title = str_replace($search, $replacements, $category->title);

			$buffer[] = array("id" => $category->id, "parentid" => $category->parent_id, "value" => $title);
		}
		$this->view->categories = json_encode($buffer);

		$this->db->id = URI::GetNamedParam("id");
		$this->view->item = $this->db->Query("SELECT * FROM categories WHERE id={id}");

		$this->view->display("admin/edit");
	}

	function Submit($data) {
        $id = URI::GetNamedParam("id");
		$parent_id = (isset($data["category_id"]) && $data["category_id"] !== "") ? (int) $data["category_id"] : 0;

		if (!$this->IsValidParentSelection($id, $parent_id)) {
			$this->RejectInvalidParent();
		}

		$row = new DbRow();
		
		$row->parent_id = $parent_id;
        $row->title = addslashes($data["title"]);
		$row->description = $data["description"];
        $row->sort_order = $data["sort_order"];
        $row->lang_id = $this->GetSession()->lang_id;
		
		$row->from_date = $data["from_date"];
		$row->to_date = $data["to_date"];

		$this->db->Update("categories", new DbRow(array("id" => URI::GetNamedParam("id"))), $row);
	}
}
