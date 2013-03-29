<?php  
class ControllerModuleSocialDiscount extends Controller {
	
	
	protected function index() {
		
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