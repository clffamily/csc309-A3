<?php
session_start();

class Main extends CI_Controller {
	
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    }
	
    function checkout() {
    	$this->load->helper('checkuser');
    	$data = checkUser($this);
    	$data['title'] = "Checkout";
    	$data['description'] = "";
    	$data['contents'] = '';
    	$data['taskbarLinkId'] = 'checkout';
    	$this->load->view('templates/template.php', $data);    	
    }
    
    function shoppingCart() {
    	$this->load->helper('checkuser');
    	$data = checkUser($this);
    	$data['title'] = "Shopping Cart";
    	$data['description'] = "";
    	$data['contents'] = '';
    	$data['taskbarLinkId'] = 'shoppingcart';
    	$this->load->view('templates/template.php', $data);
    }
    
    function createUser() {
    	$this->load->helper('checkuser');
    	$data = checkUser($this);
    	$data['title'] = "Accounts";
    	$data['description'] = "Fill out the form below to create a new user account";
    	$data['contents'] = 'user/createUserForm.php';
    	$data['taskbarLinkId'] = 'createuser';
    	$this->load->view('templates/template.php', $data);
    }
    
	function index() {
		$this->load->helper('checkuser');
    	$data = checkUser($this);
    	$data['title'] = "Catalogue";
    	$data['description'] = "";
    	$data['contents'] = '';
    	$data['taskbarLinkId'] = 'catalogue';
		$this->load->view('templates/template.php', $data);
	}
	
}