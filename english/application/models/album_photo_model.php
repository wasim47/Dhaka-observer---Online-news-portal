<?php
Class Album_photo_model extends CI_Model
{
	
	function get_album_photo_list()
	{
			  $result	= $this->db->get('photo_ablum_gall');
			  $result	= $result->result();
			  return $result;
	}
	
	function get_album_photo($field_name)
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('photo_album_name', $field_name)
				->get('album_photo');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('photo_ablum_gall');
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
		$this->db->where('ph_id', $approve_val);
		$this->db->update('photo_ablum_gall', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('ph_id', $deapprove_val);
		$this->db->update('photo_ablum_gall', $setval);
		return false;
	}
	
	
	function get_album_photo_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('album_photo');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('ph_id', $id)
				->limit(1)
				->get('photo_ablum_gall');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('photo_ablum_gall', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('ph_id', $save['ph_id']);
			$this->db->update('photo_ablum_gall', $save);
			return false;
	}
	
	function delete_album_photo($id)
	{
		//delete the page
		$this->db->where('ph_id', $id);
		$this->db->delete('photo_ablum_gall');
	
	}
	

}