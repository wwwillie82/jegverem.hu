<?
	class Aktualis_ajanlat extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_de")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_de")->Execute();
			$this->view->footer = Loader::Factory("footer/index_de")->Execute();

			$qb = QueryBuilder::QueryBuilder()->Select()->From("categories")->Where("parent_id='71'")->OrderBy("sort_order");
			$this->view->categories = $this->db->Query($qb);

			// aktuális ajánlat 119
			$current_date = date("Y-m-d");
			$category_id = $this->db->Query("SELECT * FROM categories WHERE parent_id='176' AND from_date<='$current_date' AND to_date>='$current_date' LIMIT 0,1")->id;
			
			$this->view->products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products
													  INNER JOIN categories ON categories.id = products.categories_id
													  WHERE categories_id='$category_id' ORDER BY products.sort");
													  
			//$this->db->DumpLastQuery();
			$this->view->display("de/aktualis_ajanlat");
		}
	}
?>