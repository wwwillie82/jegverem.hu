<?php
ini_set("display_errors", 0);
class Index extends Controller {
	private function ListLanguages() {
		if (!is_numeric($this->GetSession()->lang_id)) {
			$default_lang = $this->db->Query("SELECT * FROM languages WHERE `default`='1'");
			$this->GetSession()->lang_id = $default_lang->id;
			
		}
		$cur_lang = $this->GetSession()->lang_id;
		$lang_select = $this->db->Query("SELECT * FROM languages ORDER BY name");
		foreach($lang_select as $lang) {
			if ($lang->id == $cur_lang) $lang->selected = true;
			else $lang->selected = false;
		}
		$this->view->lang_select = $lang_select;
	}
	
	function _authenticate() {
		if(Auth::GI()->IsGuest()) {
			// no guest is allowed past this point
			$this->view->display("admin/login");
			return false;
		}
		return true;
	}
	
	public function _autorun() {
		$this->ListLanguages();
	}

	function main() {
		$load_time = microtime(true);
        $root_menu = new MenuItem("_root", "_root");
        $this->view->root_menu = $root_menu;
        Hooks::GetInstance()->CallHookAtPoint("render_admin_menu", array($root_menu));
		$load = Loader::Factory()->LoadFromURI($_POST)->Execute();
		$this->view->load = $load;
		$this->view->load_time = $load_time;
		$this->view->display("admin/admin_main");
	}
}
