<?php
ini_set("display_errors", 0);
class Etlap_index extends Controller {
	function main() {
        $lang_id = $this->GetSession()->lang_id;
		$page = URI::GetNamedParam("page", 1);
		$max_per_page = 50;
		$start_from = ($page * $max_per_page) - $max_per_page;

		$order_as = URI::GetNamedParam("oa", "products.sort");
		$order_by = URI::GetNamedParam("ob", "asc");

        Form::OnSubmit("filter", array($this, "filter"));
		$filter = URI::GetNamedParam("filter");
        $site = URI::GetNamedParam("site");

		ModuleHelper::SetBreadcrumb(array(Localization::_("Ételek, italok"), Localization::_("Listázása")));

		$qb = QueryBuilder::QueryBuilder()->Select("products.*, categories.title cat_title")
										  ->From(TableJoin::TableJoin("products")
                                          ->InnerJoin("categories", "categories.id = products.categories_id"))
                                          ->Where("products.lang_id='$lang_id'")
										  ->OrderBy($order_as, $order_by)
                                          ->Limit($start_from, $max_per_page);

        if($filter)
			$qb->Where("match(products.name) AGAINST('$filter' IN BOOLEAN MODE)");

        $category = URI::GetNamedParam("category");
        if($category) {
            $qb->Where("products.categories_id = '$category'");
            $this->view->selected_category = $category;
        }

        $products = $this->db->Query($qb);
		$this->view->num_pages = ceil($products->FoundRows() / $max_per_page);
		$this->view->products = $products;

        $this->view->categories = $this->db->Query("SELECT * FROM categories WHERE parent_id != '0' ORDER BY title");
		$this->view->display("admin/index");
	}
	
	function filter() {
		URI::Redirect(URI::MakeURL("admin/index", array("filter" => $_POST["search"])));
	}

    function switchproduct() {
        $from_id = URI::GetNamedParam("from_id");
        $to_id = URI::GetNamedParam("to_id");

		// kérdezzük le a sort-okat
		$from_row = $this->db->Query("SELECT sort FROM products WHERE id='$from_id'");
		$to_row = $this->db->Query("SELECT sort FROM products WHERE id='$to_id'");

		// cseréljük meg a kettőt
		$this->db->Update("products", $to_id, new DbRow(array("sort" => $from_row->sort)));
		$this->db->Update("products", $from_id, new DbRow(array("sort" => $to_row->sort)));
		URI::RedirectToReferer();
	}

	function delete() {
		$id = URI::GetNamedParam("id");
        $this->db->Delete("products", $id, $row);
		URI::RedirectToReferer();
	}
}
