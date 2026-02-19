<?php
class Kategoriak_index extends Controller {
	function main() {
		Form::OnSubmit("filter", array($this, "filter"));
		
		ModuleHelper::SetBreadcrumb(array(Localization::_("Kategóriák"), Localization::_("Listázása")));
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
		
		$this->view->display("admin/index");
	}

	function delete() {
		$id = URI::GetNamedParam("id");
		
		$parent_id = $this->db->Query("SELECT * FROM categories WHERE id='$id'")->parent_id;
		
		if($parent_id != 0)
			$this->db->Delete("categories", new DbRow(array("id" => $id)));
		URI::RedirectToReferer();
	}
}
