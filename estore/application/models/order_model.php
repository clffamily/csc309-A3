<?php
Class Order_model extends CI_Model {
	
	/*
	 * Returns all values in table orders
	 */
	function getAll(){
		$query = $this->db->get('orders');			
		return $query->result_array();
	}

	/*
	 * Returns all values in order_items with order_is equal to id
	 */	
	function getAllItems($id){
		$query = $this->db->get_where('order_items', array('order_id' => $id));
		return $query->result_array('Order');
	}
	
	/*
	 * Return all orders with id equal to id
	 */
	function get($id)
	{
		$query = $this->db->get_where('orders',array('id' => $id));
		return $query->result_array();
	}
	
	/*
	 * Delete entry in orders with id equal to id
	 */
	function delete($id) {
		return $this->db->delete("orders",array('id' => $id ));
	}
	
	/*
	 * Insert and order into orders, as well as all items related to the order into order_items
	 */
	function insert_order($userId, $creditcardnumber, $creditcardmonth, $creditcardyear, $total, $shoppingcart) {
		$mysqlDate = date('Ymd');
		$mysqlTime = date('H:i:s');
		
		$this->db->insert("orders", array(
				'customer_id' => $userId,
				'order_date' => $mysqlDate,
				'order_time' => $mysqlTime,
				'total' => $total,
				'creditcard_number' => $creditcardnumber,
				'creditcard_month' => $creditcardmonth,
				'creditcard_year' => $creditcardyear)
		);
		
		//querying after insert to get order #id
		$query = $this->db->get_where("orders",array('order_date' => $mysqlDate, 'order_time' => $mysqlTime));
		$order_id = $query->result_array();
		$order_id = $order_id[0]['id'];
		
		//inserts each item in shopping cart connected with order_id into database
		foreach ($shoppingcart as $item) {
			$this->db->insert("order_items", array(
					'order_id' => $order_id,
					'product_id' => $item['id'],
					'quantity' => $item['quantity'])
			);
		}
		return $order_id;
	}
}

?>