<?php

require_once "sputnik/ModuleHelper.php";
class BannerModule {
	function initialize() {
		Localization::GetInstance()->BindTextDomain("banner", dirname(__FILE__));
	}
}
