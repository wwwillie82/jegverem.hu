<?	
	class Itallap extends Controller {		
		function main() {			
			$this->view->header = Loader::Factory("header/index")->Execute();
$this->view->banner = Loader::Factory("banner/index")->Execute();			
			$this->view->sidebar = Loader::Factory("sidebar/index")->Execute();			
			$this->view->footer = Loader::Factory("footer/index")->Execute();			
			

			$this->view->all_products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products 
				INNER JOIN categories ON categories.id = products.categories_id
				WHERE categories.parent_id='71' ORDER BY categories.sort_order, products.sort");
			$productsByCat = array();
			foreach($this->view->all_products as $p) {
				$productsByCat[$p->categories_id][] = $p;
			}
			$this->view->productsByCat = $productsByCat;
			// aktuális ajánlat 119			
			$current_date = date("Y-m-d");			
			$this->view->aktualis = $this->db->Query("SELECT * FROM categories WHERE parent_id='119' AND from_date<='$current_date' AND to_date>='$current_date' LIMIT 0,1");						
			$qb = QueryBuilder::QueryBuilder()->Select()->From("categories")->Where("parent_id='71'")->OrderBy("sort_order");			
			$this->view->categories = $this->db->Query($qb);						
			
			$filter = URI::GetNamedParam("filter");			
			if($filter) {				
			$category_id = $this->db->Query("SELECT * FROM categories WHERE permalink='$filter'")->id;			
			} else {				
			$category_id = $this->db->Query("SELECT * FROM categories WHERE parent_id='71' ORDER BY sort_order LIMIT 0,1")->id;			
			}						
			
			$this->view->products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products 
				INNER JOIN categories ON categories.id = products.categories_id
				WHERE categories_id='$category_id'");			
				
			$this->view->display("itallap");		
			
		}	
	}
?>