<?php
session_start();
class Accounts extends CI_Controller {
	
	/*
	 * A function responsible for validating fields of a login, if not in databse, returning a message, 
	 * otherwise logging in the user by adding their info to a phpsession, and converting the taskbar 
	 * to suit the user type (normal user of admin).
	 */
	function login() {
		if ($this->session->userdata('logged_in')) {
			redirect('', 'refresh');
		}
		$this->load->helper('checkuser');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		
		//validating fields against database using the callback function
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_check_database');
		if($this->form_validation->run() == FALSE && !$this->session->userdata('logged_in'))
		{
			$data['taskbar'] = 'templates/taskbar_anon.php';
			$data['message'] = validation_errors();
		}
	
		else if ($this->session->userdata('logged_in') && $this->input->post('title') == 'Accounts') {
			redirect('', 'refresh');
		}
		
		else {
			$data = checkUser($this);
		}
	
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$data['contents'] = $this->input->post('contents');
		$data['taskbarLinkId'] = $this->input->post('taskbarLinkId');
		
		//Load the data from database if the user was in catalogue page.
		if($data['contents'] == 'catalogue/list.php'){
			$this->load->model('product_model');
			$products = $this->product_model->getAll();
			$data['contentsdata']=$products;}
		
		$this->load->view('templates/template.php', $data);
	}
	
	/*
	 * This function is essentially used as a callback for user verification. Given a password value
	 * and an username value in post. Look for a matching value in the customer table of the 
	 * database. Return true if such an entry exists, return false otherwise.
	 */
	function check_database($password){
		$username = $this->input->post('username');
		$result = $this->user_model->login($username, $password);
		if ($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
						'id' => $row->id,
						'login' => $row->login,
						'first' => $row->first,
						'last' => $row->last,
						'email' => $row->email
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_database', 'Invalid username or password. Please try again.');
			return false;
		}
	}
	
	/*
	 * Function logs user out of session, and refreshes to index.php
	 */
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('', 'refresh');
	}
	
	/*
	 * Function is used to create a user. This involves validating input fields for a new user and 
	 * returning a message if the creation is successful.
	 */
	function create() {
		if ($this->session->userdata('logged_in')) {
			redirect('', 'refresh');
		}
		$this->load->helper('checkuser');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','First Name','required');
		$this->form_validation->set_rules('lastname','Last Name','required');
		
		//checks if username is unique
		$this->form_validation->set_rules('username','Username','required|is_unique[customers.login]');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		
		//checks if passwords match
		$this->form_validation->set_rules('passconf','Password Confirmation','required|matches[password]');
		
		//checks if email is unique
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[customers.email]');
		
		$data = checkUser($this);
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$data['contents'] = $this->input->post('contents');
		$data['taskbarLinkId'] = $this->input->post('taskbarLinkId');
		
		if($this->form_validation->run() == FALSE){
			$data['contentsMessageDanger'] = validation_errors();
		}
		
		//inserting values into customer database
		else {
			$first = $this->input->post('firstname');
			$last = $this->input->post('lastname');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$result = $this->user_model->insert($first, $last, $username, $password, $email);
			$data['contentsMessageSuccess'] = "You account was created successfully. Login whenever you're ready.";
		}

		$this->load->view('templates/template.php', $data);
	}
}