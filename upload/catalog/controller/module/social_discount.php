<?php  
class ControllerModuleSocialDiscount extends Controller {
	
	public function action() {
		$json = array();
		
		if (isset($this->request->post['product_id']) === false
			|| isset($this->request->post['social']) === false
			|| isset($this->request->post['action']) === false
		) {
			$json['error'] = true;
		}
		
		if (!in_array($this->request->post['social'], array('vk', 'fb', 'gp'))) {
			$json['error'] = true;
		} else {
			$social = $this->request->post['social'];
		}
		
		if (!in_array($this->request->post['action'], array('like', 'unlike', 'share', 'unpublish'))) {
			$json['error'] = true;
		} else {
			$action = $this->request->post['action'];
		}
		
		if (!isset($json['error'])) {
			$this->load->model('catalog/social_discount');
			
			$product_id = (int)$this->request->post['product_id'];
			
			if ($this->model_catalog_social_discount->doAction($social, $product_id, $action)) {
				$json['success'] = true;
				
				// calculate and return new price with discount
				$json['percent'] = $this->model_catalog_social_discount->getDiscountPercentForProduct($product_id);
				$this->load->model('catalog/product');
				$product = $this->model_catalog_product->getProduct($product_id);
				
				$price = $product['price'];
				if ($product['special']) {
					$pr = ($product['price'] - $product['special']) *1.0 / $product['price'];
					$json['percent'] += $pr;
				}
				
				$json['discount_price'] = $this->currency->format($this->tax->calculate($price * (1 - $json['percent']), $product['tax_class_id'], $this->config->get('config_tax')));
				$json['percent'] = sprintf("%.3f", $json['percent'] * 100);
			} else {
				$json['error'] = false;
			}
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	/* todo:
	  1. В корзине специально помечать каждый товар со скидкой (добавлять в конце span)
	  2. Общую скидку отображать отдельной строкой
	*/
	public function like() {
		
		$json = array();
		
		if (isset($this->request->post['product_id']) === false) {
			$json['error'] = true;
		} else {
			$this->load->model('catalog/social_discount');
			
			$product_id = (int)$this->request->post['product_id'];
			
			if ($this->model_catalog_social_discount->addLike($product_id)) {
				$json['success'] = true;
			} else {
				$json['error'] = false;
			}
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function unlike() {
		$this->load->model('catalog/social_discount');
		
		$json = array();
		
		if (isset($this->request->post['product_id']) === false) {
			$json['error'] = true;
		} else {
			$product_id = (int)$this->request->post['product_id'];
		
			if ($this->model_catalog_social_discount->removeLike($product_id)) {
				$json['success'] = true;
			} else {
				$json['error'] = false;
			}
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function isliked() {
		$json = array();
		
		if (isset($this->request->post['product_id']) === false) {
			$json['error'] = true;
		} else {
			$this->load->model('catalog/social_discount');
			
			$product_id = (int)$this->request->post['product_id'];

			$json['result'] = $this->model_catalog_social_discount->isLiked($product_id);
		}
		
		$this->response->setOutput(json_encode($json));
	}
}
?>