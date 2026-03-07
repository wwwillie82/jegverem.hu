<?
	class A_jegverem_tortenete extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_de")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_de")->Execute();
			$this->view->footer = Loader::Factory("footer/index_de")->Execute();

			$this->view->covers = $this->db->Query("SELECT * FROM covers WHERE columns_id='2' ORDER BY sort_order");
			
			$this->view->display("de/a_jegverem_tortenete");
		}
	}
?>