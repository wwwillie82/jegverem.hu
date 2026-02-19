<?php
class Etelmenu_menu extends Controller {
	function main() {
		if(!ACL::GetInstance()->Query("Ételmenük", "Admin")) {
			Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("Nincs megfelelő jogosultsága!"));
			return;
		}

		ModuleHelper::SetBreadcrumb(array(Localization::_("Ételmenük"), Localization::_("Listázása")));
		
		$id = URI::GetNamedParam("id");
		$this->view->menus = $this->db->Query("SELECT * FROM company_menu WHERE companies_id='$id' GROUP BY week");
		$this->view->display("admin/menu");
	}

	function delete() {
		if(!ACL::GetInstance()->Query("Ételmenük", "Szerkeszt")) {
			Sessions::GetInstance()->SetFlashdata("acl_error", Localization::_("Nincs megfelelő jogosultsága!"));
			return;
		}
		$week = URI::GetNamedParam("week");
		$companies_id = URI::GetNamedParam("companies_id");

		$this->db->Delete("company_menu", new DbRow(array("week" => $week, "companies_id" => $companies_id, "subsites_id" => Auth::GI()->GetUserSession()->GetSubsitesId())));
		URI::RedirectToReferer();
	}
}
