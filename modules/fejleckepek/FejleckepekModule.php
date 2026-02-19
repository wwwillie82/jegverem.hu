<?php
require_once "sputnik/ModuleHelper.php";
 
class FejleckepekModule {
    function init_admin_menu($results, $root_menu) {
        $main_menu = new MenuItem("Fejlécképek", array("fejleckepek", "admin", "index"), (ModuleHelper::GetActiveModule() == "fejleckepek"));
        $main_menu->AddMenu(new MenuItem("Fejlécképek listázása", array("fejleckepek", "admin", "index"), (ModuleHelper::GetActiveFunction() == "index")));
        $main_menu->AddMenu(new MenuItem("Fejléckép feltöltése", array("fejleckepek", "admin", "add"), (ModuleHelper::GetActiveFunction() == "add")));
		$root_menu->AddMenu($main_menu);

        return false;
    }

	function initialize() {
        Hooks::GetInstance()->RegisterFunction("render_admin_menu", array($this, "init_admin_menu"));
		Localization::GetInstance()->BindTextDomain("fejleckepek", dirname(__FILE__));
	}
}