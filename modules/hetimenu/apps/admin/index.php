<?php
class Hetimenu_index extends Controller {
	function main() {
		ModuleHelper::SetBreadcrumb(array(Localization::_("Menük"), Localization::_("Listázása")));
		
		$id = URI::GetNamedParam("id");
		$this->view->menus = $this->db->Query("SELECT * FROM menu GROUP BY year, week ORDER BY year DESC, week DESC");
		$this->view->display("admin/index");
	}

	function delete() {
		$week = URI::GetNamedParam("week");
		$this->db->Delete("menu", new DbRow(array("week" => $week)));
		URI::RedirectToReferer();
	}
}
?>