<?php

 
class Galeria_index extends Controller {
	function main() {
		Form::OnSubmit("filter", array($this, "filter"));

		$page = URI::GetNamedParam("page", 1);
		$max_per_page = 25;
		$start_from = ($page * $max_per_page) - $max_per_page;

		$order_as = URI::GetNamedParam("oa", "entry_date");
		$order_by = URI::GetNamedParam("ob", "desc");

		$filter = URI::GetNamedParam("filter");

		ModuleHelper::SetBreadcrumb(array(Localization::_("Galériák"), Localization::_("Listázása")));

		$qb = QueryBuilder::QueryBuilder()->Select("id,pic_path,pic_data,entry_date,title,active,featured,permalink")->From("galleries")->OrderBy($order_as, $order_by)->Limit($start_from, $max_per_page);
		if($filter)
			$qb->Where("match(title, short_text) AGAINST('$filter' IN BOOLEAN MODE)");

		$galeriak = $this->db->Query($qb);
		foreach($galeriak as $galeria) {
			$galeria->count = $this->db->Query("SELECT COUNT(id) count FROM pictures WHERE galleries_id='$galeria->id'")->count;
		}

		$this->view->num_pages = ceil($galeriak->FoundRows() / $max_per_page);
		$this->view->galeriak = $galeriak;
		
		$this->view->display("admin/index");
	}

	function filter() {
		URI::Redirect(URI::MakeURL("admin/index", array("filter" => $_POST["search"])));
	}
	
	function change_active() {
		$id = URI::GetNamedParam("id");
		$active = URI::GetNamedParam("active");
		if($active == "")
			$active = 0;
		
		$row = new DbRow();
		$row->active = $active;
		$this->db->Update("galleries", $id, $row);
		
		URI::RedirectToReferer();
	}
	
	function change_featured() {
		$id = URI::GetNamedParam("id");
		$featured = URI::GetNamedParam("featured");
		if($featured == "")
			$featured = 0;
		
		$row = new DbRow();
		$row->featured = $featured;
		$this->db->Update("galleries", $id, $row);
		
		URI::RedirectToReferer();
	}

	function delete() {
		$id = URI::GetNamedParam("id");
		// delete all

		$this->db->Delete("galleries", new DbRow(array("id" => $id)));
		$this->db->Delete("pictures", new DbRow(array("galleries_id" => $id)));
		URI::RedirectToReferer();
	}
}
