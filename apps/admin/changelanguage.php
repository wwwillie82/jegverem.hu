<?php
	class Changelanguage extends Controller {
		public function main($new_lang) {
			$referer = $_SERVER["HTTP_REFERER"];
			$this->GetSession()->lang_id = $new_lang;
			header("Location: " . $referer);
			//URI::Redirect("/admin/index");
		}
	}
?>