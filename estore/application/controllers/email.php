<?php
class Email extends CI_Controller {

	//The main function is working, but a little changes have to be made.
	function sendEmail($id) {
		
		//Initialize the email		
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'georgelfcai@gmail.com', //Change the email account full name
				'smtp_pass' => '',                      //Change to email password
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
		);
		
		$this->email->initialize($config);
		
		//Load the email models
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		
		//Get the email content
		$this->load->model('order_model');
		$orders = $this->order_model->get($id);
		$data['orders']=$orders;
		$data['contents']='email/email.php';
		$data['contentsdata']=$orders;
		$email = $this->load->view('templates/template.php',$data,TRUE);
		
		//Send the emails
		$this->email->from('georgelfcai@gmail.com', 'George');  //Change here
		$this->email->to('georgelfcai@gmail.com');		        //Change here
		$this->email->subject('Order Confirmation');
		$this->email->message($email);
		//$this->email->attach('/path/to/file'); //Attach files
			
		$this->email->send();
		
		//echo $this->email->print_debugger(); //Print out the debug information
		redirect('main/index');
	}
}

?>