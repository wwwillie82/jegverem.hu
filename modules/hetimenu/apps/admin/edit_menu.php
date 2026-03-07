<?php

class Hetimenu_edit_menu extends Controller {
	function main() {
		ModuleHelper::SetBreadcrumb(array(Localization::_("Menü"), Localization::_("Szerkesztése")));
		Form::OnSubmit("edit", array($this, "Submit"));

		$this->view->id = URI::GetNamedParam("id");
		
		$week = URI::GetNamedParam("week");
		$year = URI::GetNamedParam("year");
		$companies_id = URI::GetNamedParam("companies_id");
		
		$this->view->menus = $this->db->Query(QueryBuilder::QueryBuilder()->Select()->From("menu")->Where("week = '$week'")->Where("year = '$year'")->OrderBy("day", "asc"));
		
		$this->view->display("admin/edit_menu");
	}

	function Submit($data) {
		$week = URI::GetNamedParam("week");
		
		if(!is_array($data["days"]) || count($data["days"]) == 0) return;

		$this->db->Delete("menu", new DbRow(array("week" => $week)));
		
		$row = new DbRow();
		$row->week = $data["week"];
		$row->year = $data["year"];
		
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
