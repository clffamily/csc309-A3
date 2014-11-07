<?php
Class User extends CI_Model {
	function login($username, $password)
	{
		$this->db->select('id, first, last, login, password, email');
		$this->db->from('customers');
		$this->db->where('login', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		
		$query = $this->db->get();
		if($query -> num_rows() == 1) {
			return $query->result();
		}
		else {
			return false;
		}
	}
}