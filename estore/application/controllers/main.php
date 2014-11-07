<?php
session_start();

class Main extends CI_Controller {
	
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    }
	
    function createUser() {
    	$this->load->helper('checkuser');
    	$data = checkUser($this);
    	print_r($data);
    }
    
	function index() {
		$this->load->helper('checkuser');
    	$data = checkUser($this);
		$this->load->view('templates/template.php', $data);
	}
	
}