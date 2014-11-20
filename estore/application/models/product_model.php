<?php
class Product_model extends CI_Model {

	/*
	 * Return all entries in table products
	 */
	function getAll()
	{  
		$query = $this->db->get('products');
		return $query->result('Product');
	}  
	
	/*
	 * Return all product entries with id equal to id
	 */
	function get($id)
	{
		$query = $this->db->get_where('products',array('id' => $id));
		
		return $query->row(0,'Product');
	}
	
	/*
	 * Remove product entry with id equal to id
	 */
	function delete($id) {
		return $this->db->delete("products",array('id' => $id ));
	}
	
	/*
	 * Insert product into products table
	 */
	function insert($product) {
		return $this->db->insert("products", array('name' => $product->name,
				                                  'description' => $product->description,
											      'price' => $product->price,
												  'photo_url' => $product->photo_url));
	}
	 
	/*
	 * Update entry with product id in in products to value in product variable
	 */
	function update($product) {
		$this->db->where('id', $product->id);
		return $this->db->update("products", array('name' => $product->name,
				                                  'description' => $product->description,
											      'price' => $product->price));
	}
	
	
}
?>
