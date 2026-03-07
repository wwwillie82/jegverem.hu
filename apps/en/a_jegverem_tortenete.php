<?
	class A_jegverem_tortenete extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			$this->view->covers = $this->db->Query("SELECT * FROM covers WHERE columns_id='2' ORDER BY sort_order");
			
			$this->view->display("en/a_jegverem_tortenete");
		}
	}
?>