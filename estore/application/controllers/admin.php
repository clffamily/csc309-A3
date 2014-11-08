<?php

class Admin extends CI_Controller{
	
	function __construct() {
		// Call the Controller constructor
		parent::__construct();
	}
	
	function addProduct() {
		$data['taskbarLinkId'] = 'admin';
		$this->load->view('admin/addProduct.php',$data);
	}
	
	function editProduct() {
		$this->load->model('product_model');
		$products = $this->product_model->getAll();
		$data['products']=$products;
		$data['taskbarLinkId'] = 'admin';
		$this->load->view('admin/editProduct.php', $data);
	}
	
	function editSingleProduct($id) {
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['title'] = "Edit Product";
		$data['taskbarLinkId'] = 'admin';
		$this->load->model('product_model');
		$product = $this->product_model->get($id);	
		$data['product']=$product;
		$data['editsingleproduct'] = "True";	
		//$data['contents'] = $this->load->view('product/list.php', $products, true);
		$this->load->view('templates/template.php', $data);
	}
	
	function viewSingleProduct($id){
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['title'] = "View Product";
		$data['taskbarLinkId'] = 'admin';
		$this->load->model('product_model');
		$product = $this->product_model->get($id);
		$data['product']=$product;
		$data['viewsingleproduct'] = "True";
		$this->load->view('templates/template.php', $data);
	}
	
	function deleteProduct($id) {
		$this->load->model('product_model');	
		if (isset($id))
			$this->product_model->delete($id);	
		redirect('admin/editProduct');
	
	}
}

?>