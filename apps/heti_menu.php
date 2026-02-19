<?
	class Heti_menu extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();

			$current_week = date("W");
			if($current_week < 10) $current_week = substr($current_week, 1);
			$year = date("Y");
			$this->view->menus = $this->db->Query("SELECT * FROM menu WHERE week='$current_week' AND year='$year' AND offer_text!='' ORDER BY day");
			
			$current_week++;
			$year = date("Y");
			$this->view->next_menus = $this->db->Query("SELECT * FROM menu WHERE week='$current_week' AND year='$year' AND offer_text!='' ORDER BY day");
			
			$this->view->display("heti_menu");
		}
	}
?>