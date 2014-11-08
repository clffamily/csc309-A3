<?php

class Admin extends CI_Controller{
	
	function __construct() {
		// Call the Controller constructor
		parent::__construct();
	}

	
	function addProduct() {
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['title'] = "Add Product";
		$data['contents'] = 'product/newForm.php';
		$this->load->view('templates/template.php', $data);
	}
	
	function editProduct() {
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['title'] = "Edit Product";
		
		$this->load->model('product_model');
		$products = $this->product_model->getAll();
		$data['products']=$products;
		//$data['contents'] = $this->load->view('product/list.php', $products, true);
		$this->load->view('templates/template.php', $data);
	}
}

?>