<?php

require_once "sputnik/ModuleHelper.php";
class FooterModule {
	function initialize() {
		Localization::GetInstance()->BindTextDomain("footer", dirname(__FILE__));
	}
}
