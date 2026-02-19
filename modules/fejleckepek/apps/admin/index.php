<?php
class Fejleckepek_index extends Controller {
	function main() {
		Form::OnSubmit("filter", array($this, "filter"));
		
		$page = URI::GetNamedParam("page", 1);
		$max_per_page = 25;
		$start_from = ($page * $max_per_page) - $max_per_page;

		ModuleHelper::SetBreadcrumb(array(Localization::_("Fejlécképek"), Localization::_("Listázása")));

		$lang_id = $this->GetSession()->lang_id;
		$qb = QueryBuilder::QueryBuilder()->Select("covers.*, cover_columns.name")
										  ->From(TableJoin::TableJoin("covers")
										  ->InnerJoin("cover_columns", "cover_columns.id = covers.columns_id"))
										  ->OrderBy("cover_columns.name")->Limit($start_from, $max_per_page);
		
		$covers = $this->db->Query($qb);

		$this->view->num_pages = ceil($covers->FoundRows() / $max_per_page);
		$this->view->covers = $covers;
		$this->view->display("admin/index");
	}

	function filter() {
		URI::Redirect(URI::MakeURL("admin/index", array("filter" => $_POST["search"])));
	}

	function delete() {
		$id = URI::GetNamedParam("id");
		$this->db->Delete("covers", new DbRow(array("id" => $id)));
		URI::RedirectToReferer();
	}
}
