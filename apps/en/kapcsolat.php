<?
	class Kapcsolat extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			$this->view->display("en/kapcsolat");
		}
	}
?>