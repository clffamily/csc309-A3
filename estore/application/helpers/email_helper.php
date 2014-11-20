<?php
/*
 * Takes in a controller object, a user's email and an order id number and sends an
 * email to the user with a breakdown of an order based on values associated with integer order_id
 * found in the orders and order_items tables in the database.
 */
function emailHelper($obj, $user_email, $order_id) {
	$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => '', // Fill in the email account here.
			'smtp_pass' => '', // Fill in the email password here.
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
	);
	
	$obj->email->initialize($config);
	
	//Load the email models
	$obj->load->library('email');
	$obj->email->set_newline("\r\n");
	
	//Get the email content
	$obj->load->model('order_model');
	$obj->load->model('product_model');
	$orders = $obj->order_model->get($order_id);
	$order_items = $obj->order_model->getAllItems($order_id);
	$all_products = [];

	foreach ($order_items as $item) {
			$product = $obj->product_model->get($item['product_id']); 
			$all_products[] = array(
					'name' => $product->name,
					'price' => $product->price,
					'quantity' => $item['quantity']
			);
	}
	$data['orders']=$orders;
	$data['allproducts']=$all_products;
	$email = $obj->load->view('email/email.php',$data,TRUE);
	
	//Send the emails
	$obj->email->from('admin@baseballcards.com', 'Baseball Card Administrator'); 
	$obj->email->to($user_email);
	$obj->email->subject('Order Confirmation');
	$obj->email->message($email);		
	$obj->email->send();
}