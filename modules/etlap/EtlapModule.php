<?php

require_once "sputnik/ModuleHelper.php";
 
class EtlapModule {
    function init_admin_menu($results, $root_menu) {
        $main_menu = new MenuItem("Étlap, itallap", array("etlap", "admin", "index"), (ModuleHelper::GetActiveModule() == "etlap"));
        $main_menu->AddMenu(new MenuItem("Ételek, italok listázása", array("etlap", "admin", "index"), (ModuleHelper::GetActiveFunction() == "index")));
        $main_menu->AddMenu(new MenuItem("Új étel, ital hozzáadása", array("etlap", "admin", "add"), (ModuleHelper::GetActiveFunction() == "add")));
		$root_menu->AddMenu($main_menu);

        return false;
    }

	function initialize() {
        Hooks::GetInstance()->RegisterFunction("render_admin_menu", array($this, "init_admin_menu"));
		Localization::GetInstance()->BindTextDomain("etlap", dirname(__FILE__));
	}

}
