<?php
ini_set("display_errors", 0);
class Etlap_edit extends Controller {
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
		ModuleHelper::SetBreadcrumb(array(Localization::_("Étlap, itallap"), Localization::_("Szerkesztése")));
		Form::OnSubmit("edit", array($this, "Submit"));

        $lang_id = $this->GetSession()->lang_id;
        $this->db->id = URI::GetNamedParam("id");
        $qb = QueryBuilder::QueryBuilder()->Select("products.*")->From("products")->Where("products.id={id}");
        $this->view->product = $this->db->Query($qb);

        $qb = QueryBuilder::QueryBuilder()->Select()->From("categories")
                                                    ->Where("lang_id = '$lang_id'")
                                                    ->Where("title <> ''")
                                                    ->OrderBy("title");
        $categories = $this->db->Query($qb);

		$buffer = array();
		foreach($categories as $category) {
			$search = array("'", "\"");
			$replacements = array("&#39;", "&#34;");
			$title = str_replace($search, $replacements, $category->title);
			$buffer[] = array("id" => $category->id, "parentid" => $category->parent_id, "value" => $title);
		}
		$this->view->categories = json_encode($buffer);
		$this->view->display("admin/edit");
	}

	function Submit($data) {
		$row = new DbRow();

        $row->categories_id = $data["category_id"];
        $row->name = $data["name"];
		$row->price = $data["price"];
		$row->price_small = $data["price_small"];
		$row->attribute = $data["attribute"];
        $row->description = $data["description"];
        $row->lang_id = $this->GetSession()->lang_id;

        if(!empty($data["picture_filename"])) {
			$row->pic_path = $data["picture_filename"];
		}
        $row->pic_data = serialize(array($data["crop_x"], $data["crop_y"], $data["crop_w"], $data["crop_h"]));

        $this->db->Update("products", URI::GetNamedParam("id"), $row);
	}
}
