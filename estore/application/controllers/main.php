<?php

class Main extends CI_Controller {
	
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    }
	
	function index() {
		$this->load->view('template.php');
	}
	
	function login() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Passowrd','required');
	}
}