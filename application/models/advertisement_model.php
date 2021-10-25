<?php
Class advertisement_model extends CI_Model
{
	
	function get_advertisement($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('image_title', $field_name)
				->get('advertisement');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('advertisement');
			  $result	= $result->result();
			  return $result;
			}
	}
	
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('advertisement_id', $approve_val);
		$this->db->update('advertisement', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('advertisement_id', $deapprove_val);
		$this->db->update('advertisement', $setval);
		return false;
	}
	
	
	function get_advertisement_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('advertisement');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('advertisement_id', $id)
				->limit(1)
				->get('advertisement');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('advertisement', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('advertisement_id', $save['advertisement_id']);
			$this->db->update('advertisement', $save);
			return false;
	}
	
	function delete_advertisement($id)
	{
		//delete the page
		$this->db->where('advertisement_id', $id);
		$this->db->delete('advertisement');
	
	}
	

}