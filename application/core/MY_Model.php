<?php

require_once 'application/core/MY_Model_Interface.php';

abstract class MY_Model extends  CI_Model implements  MY_Model_interface
{
	private function insert(){

		$this->db->insert($this->get_db_table(), $this);
		$this->{$this->get_db_table_pk()}= $this->db->insert_id();

		return $this->{$this->get_db_table_pk()};
	}

	private function update()
	{
		$this->db->update($this->get_db_table(), $this, array($this->get_db_table_pk() =>  $this->{$this->get_db_table_pk()}));

		return $this->{($this->get_db_table_pk())};
	}

	public function  save()
	{
		$this->load->database();
		if(isset($this->{$this->get_db_table_pk()})){
			$id=$this->update();}
		else{
			$id=$this->insert();
		}
		return $id;

	}

	public function delete()
	{
		$this->db->delete($this->get_db_table(), array( $this->get_db_table_pk()=> $this->{$this->get_db_table_pk()}));
		return $this->{$this->get_db_table_pk()};
		}

		public function get_date()
		{
			return $this->db->select('*')
				->from($this->get_db_table())
				->get()
			    ->result();
		}

}
