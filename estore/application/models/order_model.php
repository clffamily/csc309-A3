<?php
Class Order_model extends CI_Model {

	function getAll(){
		$query = $this->db->get('orders');			
		return $query->result_array();
	}

	function delete($id) {
		return $this->db->delete("orders",array('id' => $id ));
	}
}

?>