<?php
	class Ettermunk_kinalata extends Controller {
		private function resolveCategoryId($filter, $rootParentId) {
			$defaultCategory = $this->db->Query("SELECT * FROM categories WHERE parent_id='$rootParentId' ORDER BY sort_order LIMIT 0,1");
			if(!$filter) {
				return $defaultCategory ? $defaultCategory->id : 0;
			}

			$currentLangCategory = $this->db->Query("SELECT * FROM categories WHERE parent_id='$rootParentId' AND permalink='$filter' LIMIT 0,1");
			if($currentLangCategory) {
				return $currentLangCategory->id;
			}

			$sourceCategory = $this->db->Query("SELECT * FROM categories
				WHERE categories.permalink='$filter' AND categories.parent_id IN ('61','145','105')
				ORDER BY categories.parent_id, categories.sort_order LIMIT 0,1");
			if($sourceCategory) {
				$mappedCategory = $this->db->Query("SELECT * FROM categories WHERE parent_id='$rootParentId' AND sort_order='$sourceCategory->sort_order' LIMIT 0,1");
				if($mappedCategory) {
					return $mappedCategory->id;
				}
			}

			return $defaultCategory ? $defaultCategory->id : 0;
		}

		function main() {
			$this->view->header = Loader::Factory("header/index")->Execute();
			$this->view->banner = Loader::Factory("banner/index")->Execute();
            $this->view->sidebar = Loader::Factory("sidebar/index")->Execute();
			$this->view->footer = Loader::Factory("footer/index")->Execute();

			$this->view->all_products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products 
									  INNER JOIN categories ON categories.id = products.categories_id
									  WHERE categories.parent_id='61' AND categories.id!='143' ORDER BY categories.sort_order, products.sort");
			$productsByCat = array();
			foreach($this->view->all_products as $p) {
				$productsByCat[$p->categories_id][] = $p;
			}
			$this->view->productsByCat = $productsByCat;
			// aktuális ajánlat 119
			$current_date = date("Y-m-d");
			$this->view->aktualis = $this->db->Query("SELECT * FROM categories WHERE parent_id='119' AND from_date<='$current_date' AND to_date>='$current_date' LIMIT 0,1");
			
			$qb = QueryBuilder::QueryBuilder()->Select()->From("categories")->Where("id!='143'")->Where("parent_id='61'")->OrderBy("sort_order");
			$categories = $this->db->Query($qb);
			$this->view->categories = $categories;
			
			$filter = URI::GetNamedParam("filter");
			$category_id = $this->resolveCategoryId($filter, 61);
			
			$this->view->products = $this->db->Query("SELECT products.*, categories.title cat_title FROM products 
													  INNER JOIN categories ON categories.id = products.categories_id
													  WHERE categories_id='$category_id' ORDER BY sort");
			$this->view->display("ettermunk_kinalata");
		}
	}
?>
