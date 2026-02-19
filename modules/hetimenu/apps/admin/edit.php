<?php
ini_set("display_errors", 1);
class Hetimenu_edit extends Controller {
	private function normalize($str, $delimiter = "-") {

		$str = strtolower($str);
		$from = array("ö", "ü", "ó", "ő", "ú", "á", "ű", "í", "é");
		$to = array("o", "u", "o", "o", "u", "a", "u", "i", "e");
		$str = str_replace($from, $to, $str);

		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

	function main() {
		ModuleHelper::SetBreadcrumb(array(Localization::_("Menü"), Localization::_("Feltöltése")));
		Form::OnSubmit("edit", array($this, "Submit"));

		$this->view->display("admin/edit");
	}

	function Submit($data) {
		$id = URI::GetNamedParam("id");
		
		$row = new DbRow();
		$row->week = $data["week"];
		$row->year = $data["year"];
		$row->lang_id = $this->GetSession()->lang_id;
		
		foreach($data["days"] as $day=>$offer_text) {
			$row->offer_text = $offer_text;
			$row->day = $day;
			$date = date('Y-m-d', strtotime($data["year"] . "W" . $data["week"] . $day));
			$row->date = $date;
			
			$week = $data["week"];
			$year = $data["year"];
			
			$check = $this->db->Query("SELECT * FROM menu WHERE week = '$week' AND year='$year' AND day='$day'");
			if($check->length() == 0)
				$this->db->Insert("menu", $row);
		}
	}
}
