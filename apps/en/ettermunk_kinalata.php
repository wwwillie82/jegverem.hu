<?
	class Ettermunk_kinalata extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_en")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index_en")->Execute();
			$this->view->footer = Loader::Factory("footer/index_en")->Execute();

			// aktuális ajánlat 119
			$current_date = date("Y-m-d");
			$this->view->aktualis = $this->db->Query("SELECT * FROM categories WHERE parent_id='119' AND from_date<='$current_date' AND to_date>='$current_date' LIMIT 0,1");
			
			$qb = QueryBuilder::QueryBuilder()->Select()->From("categories")->Where("id!='143'")->Where("parent_id='145'")->OrderBy("sort_order");
			$this->view->categories = $this->db->Query($qb);
			
			$filter = URI::GetNamedParam("filter");
			if($filter) {
				$category_id = $this->db->Query("SELECT * FROM categories WHERE permalink='$filter'")->id;
			} else {
				$category_id = $this->db->Query("SELECT * FROM categories WHERE parent_id='145' ORDER BY sort_order LIMIT 0,1")->id;
			}
			
			$this->view->products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products 
													  INNER JOIN categories ON categories.id = products.categories_id
													  WHERE categories_id='$category_id' ORDER BY sort");
			$this->view->display("en/ettermunk_kinalata");
		}
	}
?>