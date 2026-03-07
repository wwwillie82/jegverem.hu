<?php
	class Privat_rendezvenyek extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			$this->view->display("en/privat_rendezvenyek");
		}
	}
?>
