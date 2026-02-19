<?
	class Allasajanlat extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();
			
			$this->view->display("allasajanlat");
		}
	}
?>