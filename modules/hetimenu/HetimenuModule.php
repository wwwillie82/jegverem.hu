<?php
require_once "sputnik/ModuleHelper.php";
class HetimenuModule {
    function init_admin_menu($results, $root_menu) {
        $main_menu = new MenuItem("Heti menü", array("hetimenu", "admin", "index"), (ModuleHelper::GetActiveModule() == "hetimenu"));
        $main_menu->AddMenu(new MenuItem("Menük listázása", array("hetimenu", "admin", "index"), (ModuleHelper::GetActiveFunction() == "index")));
		$main_menu->AddMenu(new MenuItem("Új menü listázása", array("hetimenu", "admin", "edit"), (ModuleHelper::GetActiveFunction() == "edit")));
		$root_menu->AddMenu($main_menu);

        return false;
    }

	function initialize() {
		Hooks::GetInstance()->RegisterFunction("render_admin_menu", array($this, "init_admin_menu"));
		Localization::GetInstance()->BindTextDomain("hetimenu", dirname(__FILE__));
	}
}
