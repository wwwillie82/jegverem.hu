<?php

require_once "sputnik/ModuleHelper.php";
class HeaderModule {
	function initialize() {
		Localization::GetInstance()->BindTextDomain("header", dirname(__FILE__));
	}
}
