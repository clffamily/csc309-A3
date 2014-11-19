<?php
session_start();

class Main extends CI_Controller {
	
	/*
	 * Constructor function
	 */
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    }
	
    /*
     * Function to display the shopping cart
     */
    function shoppingCart() {
    	$this->load->helper('checkuser');
    	$this->load->helper('shoppingcartcount');
    	$data = checkUser($this);
    	$data['title'] = "Shopping Cart";
    	$data['description'] = "";
    	$data['contents'] = 'shoppingcart/shoppingcart.php';
    	$data['taskbarLinkId'] = 'shoppingcart';
    	$this->load->view('templates/template.php', $data);
    }
    
    /*
     * Function to display elements for creating a new user
     */
    function createUser() {
    	$this->load->helper('checkuser');
    	$this->load->helper('shoppingcartcount');
    	$data = checkUser($this);
    	$data['title'] = "Accounts";
    	$data['description'] = "Fill out the form below to create a new user account";
    	$data['contents'] = 'user/createUserForm.php';
    	$data['taskbarLinkId'] = 'createuser';
    	$data['cartcount'] = shoppingCartCount($this->session->userdata('shoppingCart'));
    	$this->load->view('templates/template.php', $data);
    }
    
    /*
     * A function for displaying the initial page, which is essentially the catalogue of 
     * cards.
     */
	function index() {
		$this->load->helper('checkuser');
		$this->load->helper('shoppingcartcount');
    	$data = checkUser($this);
    	$data['title'] = "Catalogue";
    	$data['description'] = "";
    	$data['taskbarLinkId'] = 'catalogue';
    	$data['contents'] = 'catalogue/list.php';
    	$data['cartcount'] = shoppingCartCount($this->session->userdata('shoppingCart'));
    	
    	$this->load->model('product_model');
    	$products = $this->product_model->getAll();
    	$data['contentsdata']=$products;
    	
    	if ($this->session->userdata('shoppingCart')) {
    		$shoppingCart = $this->session->userdata('shoppingCart');
    	}
    	else {
    		$shoppingCart = array();
    	}
    	
    	$data['cartcontents'] = $shoppingCart; 
    	
		$this->load->view('templates/template.php', $data);
		
	}
	
}