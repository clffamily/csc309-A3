<?php
session_start();

class Orders extends CI_Controller {
	
	function checkout() {
		if (!$this->session->userdata('logged_in')) {
			redirect('', 'refresh');
		}
		$this->load->helper('checkuser');
		$this->load->model('order_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('creditnumber','Credit Card Number','required');
		$this->form_validation->set_rules('creditexpiry','Expiry Date','required|callback_check_expiry');
		if($this->form_validation->run() == FALSE)
		{
			echo 'invalid exp';
		}
		else {
			//formatted inputs from html converted to appropriate types to match database
			$creditcardnumber_withdashes = $this->input->post('creditnumber');
			$creditcardexpiry = $this->input->post('creditexpiry');
			$total_withdollarsign = $this->input->post('formtotal');
			$shoppingcart_json = $this->input->post('formshoppingcart');
			
			$shoppingcart = json_decode($shoppingcart_json, true);
			print_r($shoppingcart);
			$total = str_replace("$", "", $total_withdollarsign);
			$creditcardnumber = str_replace("-", "", $creditcardnumber_withdashes);
			$expirySplit = explode('/', $creditcardexpiry);
			$creditcardmonth = $expirySplit[0];
			$creditcardyear = $expirySplit[1];
			
			//get customer id
			$sessionData = $this->session->userdata('logged_in');
			$userId = $sessionData['id'];
			
			$this->order_model->insert_order($userId, $creditcardnumber, $creditcardmonth, 
											$creditcardyear, $total, $shoppingcart);
		}
	}

	function check_expiry($creditexpiry) {
		$currentYear = date("y");
		$currentMonth = date("m");
		$expirySplit = explode('/', $creditexpiry); 
		if ($expirySplit[1] < $currentYear) {
			return False;
		}
		else if ($expirySplit[1] == $currentYear && $expirySplit[0] < $currentMonth) {
			return False;
		}
		else {
			return True;
		}
	}
}