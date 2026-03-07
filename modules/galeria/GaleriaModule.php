<?php

require_once "sputnik/ModuleHelper.php";
 
class GaleriaModule {

    function init_admin_menu($results, $root_menu) {
        //$admin_menu = ModuleHelper::GetAdminMenu();
		$main_menu = new MenuItem("Galéria", array("galeria", "admin", "index"), (ModuleHelper::GetActiveModule() == "galeria"));
		$main_menu->AddMenu(new MenuItem("Galeriák listázása", array("galeria", "admin", "index"), (ModuleHelper::GetActiveFunction() == "index")));
		$main_menu->AddMenu(new MenuItem("Galériák feltöltése", array("galeria", "admin", "add"), (ModuleHelper::GetActiveFunction() == "add")));
		//$main_menu->AddMenu(new MenuItem("Képek feltöltése", array("galeria", "admin", "upload"), (ModuleHelper::GetActiveFunction() == "upload")));
		$root_menu->AddMenu($main_menu);

        return false;
    }

	function initialize() {
        Hooks::GetInstance()->RegisterFunction("render_admin_menu", array($this, "init_admin_menu"));
		Localization::GetInstance()->BindTextDomain("galeria", dirname(__FILE__));
	}

}
