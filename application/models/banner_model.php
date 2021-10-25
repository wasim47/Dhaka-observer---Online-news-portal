<?php
Class Banner_model extends CI_Model
{
	
	function get_banner($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('image_title', $field_name)
				->get('banner');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('banner');
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
		$this->db->where('banner_id', $approve_val);
		$this->db->update('banner', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('banner_id', $deapprove_val);
		$this->db->update('banner', $setval);
		return false;
	}
	
	
	function get_banner_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('banner');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('banner_id', $id)
				->limit(1)
				->get('banner');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('banner', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('banner_id', $save['banner_id']);
			$this->db->update('banner', $save);
			return false;
	}
	
	function delete_banner($id)
	{
		//delete the page
		$this->db->where('banner_id', $id);
		$this->db->delete('banner');
	
	}
	

}