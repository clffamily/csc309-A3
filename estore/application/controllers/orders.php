<?php
session_start();

class Orders extends CI_Controller {
	
	/*
	 * This function deals with the processing of a checkout. This means that it 
	 * deals with validations of input field for a checkout, adding the order to
	 * the database, and finally, returning a success message if all has gone well.
	 */
	function checkout() {
		if (!$this->session->userdata('logged_in')) {
			redirect('', 'refresh');
		}
		$this->load->helper('checkuser');
		$data = checkUser($this);
		$data['title'] = "Shopping Cart";
		$data['description'] = "";
		$data['contents'] = 'shoppingcart/shoppingcart.php';
		$data['taskbarLinkId'] = 'shoppingcart';
		
		$this->load->helper('email');
		$this->load->model('order_model');
		$this->load->library('form_validation');
		$this->form_validation->set_message('check_expiry', 'Your credit card has expired, or the entry was invalid. Please try again.');
		$this->form_validation->set_rules('creditnumber','Credit Card Number','required');
		$this->form_validation->set_rules('creditexpiry','Expiry Date','required|callback_check_expiry');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['checkouterror'] = validation_errors();
			$this->load->view('templates/template.php', $data);
		}
		
		else {
			//formatted inputs from html converted to appropriate types to match database
			$creditcardnumber_withdashes = $this->input->post('creditnumber');
			$creditcardexpiry = $this->input->post('creditexpiry');
			$total_withdollarsign = $this->input->post('formtotal');
			$shoppingcart_json = $this->input->post('formshoppingcart');
			
			$shoppingcart = json_decode($shoppingcart_json, true);
			$total = str_replace("$", "", $total_withdollarsign);
			$creditcardnumber = str_replace("-", "", $creditcardnumber_withdashes);
			$expirySplit = explode('/', $creditcardexpiry);
			$creditcardmonth = $expirySplit[0];
			$creditcardyear = $expirySplit[1];
			
			//get customer id
			$sessionData = $this->session->userdata('logged_in');
			$userId = $sessionData['id'];
			$userEmail = $sessionData['email'];
			
			$orderId = $this->order_model->insert_order($userId, $creditcardnumber, $creditcardmonth, 
											$creditcardyear, $total, $shoppingcart);
			emailHelper($this, $userEmail, $orderId);
			$data['successmsg'] = "Great, your order has been accepted and is being processed! Check your 
									email to find your confirmation and order summary.";
			$this->load->view('templates/template.php', $data);
		}
	}

	/*
	 * Function used in validation of the credit card expiration date
	 */
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
		else if ($expirySplit[0] < 1 || $expirySplit[0] > 12) {
			return False;
		} 
		else {
			return True;
		}
	}
}