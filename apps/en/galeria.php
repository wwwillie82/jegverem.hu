<?
	class Galeria extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			$this->view->albums = $this->db->Query("SELECT * FROM galleries WHERE active='1' ORDER BY id");
			
			$this->view->display("en/galeria");
		}

        function kepek() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
			$this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			$this->db->permalink = URI::GetNamedParam("permalink");
			$album = $this->db->Query("SELECT * FROM galleries WHERE permalink={permalink}");
			$this->view->album = $album->title_en;
			
			$this->view->images = $this->db->Query("SELECT * FROM pictures WHERE galleries_id='$album->id' AND active='1' ORDER BY sort");
			
			$this->view->display("en/kepek");
		}
	}
?>