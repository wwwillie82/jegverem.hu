<?php
require_once "sputnik/ModuleHelper.php";
 
class KategoriakModule {
    function init_admin_menu($results, $root_menu) {
        $main_menu = new MenuItem("Kategóriák", array("kategoriak", "admin", "index"), (ModuleHelper::GetActiveModule() == "kategoriak"));
        $main_menu->AddMenu(new MenuItem("Kategóriák", array("kategoriak", "admin", "index"), (ModuleHelper::GetActiveFunction() == "index")));
		$main_menu->AddMenu(new MenuItem("Új kategória", array("kategoriak", "admin", "add"), (ModuleHelper::GetActiveFunction() == "add")));
		$root_menu->AddMenu($main_menu);

        return false;
    }

	function initialize() {
        Hooks::GetInstance()->RegisterFunction("render_admin_menu", array($this, "init_admin_menu"));
		Localization::GetInstance()->BindTextDomain("kategoriak", dirname(__FILE__));
	}
}