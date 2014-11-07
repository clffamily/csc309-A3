<?php
session_start();
class Main extends CI_Controller {
	
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    }
	
	function index() {
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			
			if ($id == 1) {
				$data['taskbar'] = 'taskbar_admin.php';
			}
			else{
				$data['taskbar'] = 'taskbar_user.php';
			}
		}
		
		else {
		$data['taskbar'] = 'taskbar_anon.php';
		}
		$data['message'] = '';
		$this->load->view('template.php', $data);
	}
	
	function login() {
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_check_database');
 		if($this->form_validation->run() == FALSE)
 		{
 			$data['taskbar'] = 'taskbar_anon.php';
 			$data['message'] = validation_errors();
		}

		else {
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			
			if ($id == 1) {
				$data['taskbar'] = 'taskbar_admin.php';
			}
			else{
				$data['taskbar'] = 'taskbar_user.php';
			}
			$data['message'] = '';
		}
		
		$this->load->view('template.php', $data);
	}
	
	function check_database($password){
		$username = $this->input->post('username');
		$result = $this->user->login($username, $password);
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
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('/', 'refresh');
	}
}