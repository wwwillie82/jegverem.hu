<?php
require_once dirname(__DIR__) . "/LanguageSwitcher.php";

class Header_index_de extends Controller {
	function main() {
		$switcher = HeaderLanguageSwitcher::build($this->db);
		foreach($switcher as $key => $value) {
			$this->view->$key = $value;
		}
		$this->view->display("index_de");
	}
}
