<?php

class Admin extends CI_Controller{
	
	function __construct() {
		// Call the Controller constructor
		parent::__construct();
	}

	
	/*
	 * The following functions are used to add/edit/view products from the back end.
	 * Only administrator has these functionalities.
	 */
	
	//The function enables administrator to add the product.
	function addProduct() {
		$data['taskbarLinkId'] = 'admin';
		$data['addProduct'] = 'True';
		$this->load->view('admin/admin_template.php',$data);
	}
	
	//The function enables administrator to go to the view of product table.
	function editProduct() {
		$this->load->model('product_model');
		$products = $this->product_model->getAll();
		$data['products']=$products;
		$data['taskbarLinkId'] = 'admin';
		$this->load->view('admin/admin_template.php',$data);
	}
	
	//The function enables administrator to modify the information of each product.
	function editSingleProduct($id) {
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['taskbarLinkId'] = 'admin';
		$this->load->model('product_model');
		$product = $this->product_model->get($id);	
		$data['product']=$product;
		$data['editsingleproduct'] = "True";	
		$this->load->view('admin/admin_template.php',$data);
	}
	
	//The function enables administrator to view each product.
	function viewSingleProduct($id){
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['taskbarLinkId'] = 'admin';
		$this->load->model('product_model');
		$product = $this->product_model->get($id);
		$data['product']=$product;
		$data['viewsingleproduct'] = "True";
		$this->load->view('admin/admin_template.php',$data);
	}
	
	//The function enables administrator to delete the product.
	function deleteProduct($id) {
		$this->load->model('product_model');	
		if (isset($id))
			$this->product_model->delete($id);	
		redirect('admin/editProduct');
	
	}
	
	
	
	/*
	 * The following functions are used to show/delete users from the back end.
	 * Only administrator has these functionalities.
	 */
	function getUsers() {
		$this->load->model('user_model');
		$users = $this->user_model->getAll();
		$data['taskbarLinkId'] = 'admin';
		$data['users']=$users;
		$this->load->view('admin/admin_template.php',$data);
	}
	
	function deleteUser($id) {
		$this->load->model('user_model');
		if (isset($id))
			$this->user_model->delete($id);
		redirect('admin/getUsers');
	
	}
	
	
	
	
	/*
	 * The following functions are used to view/delete orders from the back end.
	 * Only administrator has these functionalities.
	 */
	function getOrders() {
		$this->load->model('order_model');
		$orders = $this->order_model->getAll();
		$data['taskbarLinkId'] = 'admin';
		$data['orders']=$orders;
		$this->load->view('admin/admin_template.php',$data);
	}
	
	function deleteOrder($id) {
		$this->load->model('order_model');
		if (isset($id))
			$this->order_model->delete($id);
		redirect('admin/getOrders');
	
	}
	
}

?>