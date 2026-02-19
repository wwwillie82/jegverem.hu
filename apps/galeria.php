<?
	class Galeria extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();

			$this->view->albums = $this->db->Query("SELECT * FROM galleries WHERE active='1' ORDER BY id");
			
			$this->view->display("galeria");
		}

        function kepek() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
			$this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();

			$this->db->permalink = URI::GetNamedParam("permalink");
			$album = $this->db->Query("SELECT * FROM galleries WHERE permalink={permalink}");
			$this->view->album = $album->title;
			
			$this->view->images = $this->db->Query("SELECT * FROM pictures WHERE galleries_id='$album->id' AND active='1' ORDER BY sort");
			
			$this->view->display("kepek");
		}
	}
?>