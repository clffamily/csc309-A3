<?php
session_start();
class UserValidation extends CI_Controller {
	
	function login() {
		$this->load->helper('checkuser');
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_check_database');
		if($this->form_validation->run() == FALSE && !$this->session->userdata('logged_in'))
		{
			$data['taskbar'] = 'templates/taskbar_anon.php';
			$data['message'] = validation_errors();
		}
	
		else {
			$data = checkUser($this);
		}
	
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$data['contents'] = $this->input->post('contents');
		$data['taskbarLinkId'] = $this->input->post('taskbarLinkId');
		
		$this->load->view('templates/template.php', $data);
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
		//session_destroy();
		redirect('', 'refresh');
	}
}