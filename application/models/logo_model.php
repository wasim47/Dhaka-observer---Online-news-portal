<?php
Class logo_model extends CI_Model
{
	
	function get_logo() 
	{
			  $result	= $this->db->get('logo');
			  $result	= $result->result();
			  return $result;
	}
	
	function get_logo_index() 
	{
			    $query = $this
				->db
				->where('status', '1')
				->get('logo');
				$row = $query->row_array();		
				return $row;

			  /*$result	= $this->db->get('logo');
			  $result	= $result->result();
			  return $result;*/
	}
	
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('logo_id', $approve_val);
		$this->db->update('logo', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('logo_id', $deapprove_val);
		$this->db->update('logo', $setval);
		return false;
	}
	
	
	function get_logo_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('logo');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('logo_id', $id)
				->limit(1)
				->get('logo');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('logo', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('logo_id', $save['logo_id']);
			$this->db->update('logo', $save);
			return false;
	}
	
	function delete_logo($id)
	{
		//delete the page
		$this->db->where('logo_id', $id);
		$this->db->delete('logo');
	
	}
	

}