<?
	class A_panziorol extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();

			$this->view->covers = $this->db->Query("SELECT * FROM covers WHERE columns_id='3' ORDER BY sort_order");
			
			$this->view->display("a_panziorol");
		}
	}
?>