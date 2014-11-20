<?php
Class User_model extends CI_Model {
	
	/*
	 * Return all entries in customers table
	 */
	function getAll(){
		$query = $this->db->get('customers');			
		return $query->result_array();
	}
	
	/*
	 * Perform a login using username and password and if this matches
	 * a user in customers return his/her values in the table. Otherwise,
	 * return false. 
	 */
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
	
	/*
	 * Insert a customer into table customers.
	 */
	function insert($first, $last, $username, $password, $email) {
		return $this->db->insert("customers", array('first' => $first,
													'last' => $last,
													'login' => $username,
													'password' => $password,
													'email' => $email));
	}
	
	/*
	 * Delete a customer from table customers with id equal to variable id.
	 */
	function delete($id) {
		return $this->db->delete("customers",array('id' => $id ));
	}
}