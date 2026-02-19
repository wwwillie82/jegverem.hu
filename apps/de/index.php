<? 
	class Index extends Controller {
		function main() {
			$this->view->header = Loader::Factory("header/index_de")->Execute();
			$this->view->footer = Loader::Factory("footer/index_de")->Execute();
			
			// aktuális ajánlat 119
			$current_date = date("Y-m-d");
			$category = $this->db->Query("SELECT * FROM categories WHERE parent_id='119' AND from_date<='$current_date' AND to_date>='$current_date' LIMIT 0,1");
			$this->view->category = $category;
			$this->view->products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products
													  INNER JOIN categories ON categories.id = products.categories_id
													  WHERE categories_id='$category->id' ORDER BY sort_order");
													  
			$current_week = date("W");
			if($current_week < 10) $current_week = substr($current_week, 1);
			$year = date("Y");
			$this->view->menus = $this->db->Query("SELECT * FROM menu WHERE week='$current_week' AND year='$year' AND offer_text!='' ORDER BY day");
			
			$current_week++;
			$year = date("Y");
			$this->view->next_menus = $this->db->Query("SELECT * FROM menu WHERE week='$current_week' AND year='$year' AND offer_text!='' ORDER BY day");
			
			$this->view->covers = $this->db->Query("SELECT * FROM covers WHERE columns_id='1' ORDER BY sort_order");
			
			$this->view->display("de/index");
		}
	}
?>