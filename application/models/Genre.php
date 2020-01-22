<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Genre extends CI_Model
{

	function __construct()
	{
		$this->bdTable = 'bd';
		$this->grsTable = 'genre';
		//$this->ordTable = 'orders';
		//$this->ordItemsTable = 'order_items';
	}

	/*
	 * Fetch products data from the database
	 * @param id returns a single record if specified, otherwise all records
	 */
	public function getRows($id = '')
	{
		$this->db->select('bd.id,bd.ref,bd.prix_public,bd.titre,bd.resume');      //  ('* from bd as b  join genre as g  on b.genre_id=g.id where g.id=b.genre_id');
		$this->db->from('bd');
		$this->db->join('genre', ' genre.id = bd.genre_id' );
		$this->db->where('genre.id', $id);

		$query = $this->db->get();
		$result = $query->result_array();
		// Return fetched data

		return !empty($result) ? $result : false;

		//dump($query->result());

//		foreach ($query->result() as $row)
//		{
//			$data['ref']= $row->ref;
//			$data['prix_public']=$row->prix_public;
//			echo $row->ref;
//			echo $row->prix_public;
//			echo $row->titre;
//			echo $row->resume;
//		}



//		$this->db->where('status', '1');
//		if ($id) {
//			$this->db->where('genre_id', $id);
//			$query = $this->db->get();
//			$result = $query->row_array();
//		} else {
//			$this->db->order_by('titre', 'asc');
//			$query = $this->db->get();
//			$result = $query->result_array();
//		}

		// Return fetched data
//		return !empty($data) ? $data : false;
	}

	/*
	 * Fetch order data from the database
	 * @param id returns a single record of the specified ID
	 */
	public function getOrder($id)
	{
		$this->db->select('o.*, c.name, c.email, c.phone, c.address');
		$this->db->from($this->ordTable . ' as o');
		$this->db->join($this->custTable . ' as c', 'c.id = o.customer_id', 'left');
		$this->db->where('o.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		// Get order items
		$this->db->select('i.*, b.image, b.titre, b.prix_public');
		$this->db->from($this->ordItemsTable . ' as i');
		$this->db->join($this->bdTable . ' as b', 'b.id = i.bd_id', 'left');
		$this->db->where('i.order_id', $id);
		$query2 = $this->db->get();
		$result['items'] = ($query2->num_rows() > 0) ? $query2->result_array() : array();

		// Return fetched data
		return !empty($result) ? $result : false;
	}

	/*
	 * Insert customer data in the database
	 * @param data array
	 */
	public function insertCustomer($data)
	{
		// Add created and modified date if not included
		if (!array_key_exists("created", $data)) {
			$data['created'] = date("Y-m-d H:i:s");
		}
		if (!array_key_exists("modified", $data)) {
			$data['modified'] = date("Y-m-d H:i:s");
		}

		// Insert customer data
		$insert = $this->db->insert($this->custTable, $data);

		// Return the status
		return $insert ? $this->db->insert_id() : false;
	}

	/*
	 * Insert order data in the database
	 * @param data array
	 */
	public function insertOrder($data)
	{
		// Add created and modified date if not included
		if (!array_key_exists("created", $data)) {
			$data['created'] = date("Y-m-d H:i:s");
		}
		if (!array_key_exists("modified", $data)) {
			$data['modified'] = date("Y-m-d H:i:s");
		}

		// Insert order data
		$insert = $this->db->insert($this->ordTable, $data);

		// Return the status
		return $insert ? $this->db->insert_id() : false;
	}

	/*
	 * Insert order items data in the database
	 * @param data array
	 */
	public function insertOrderItems($data = array())
	{

		// Insert order items
		$insert = $this->db->insert_batch($this->ordItemsTable, $data);

		// Return the status
		return $insert ? true : false;
	}

}

