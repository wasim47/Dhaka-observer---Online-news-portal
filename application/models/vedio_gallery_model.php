<?php
Class Vedio_gallery_model extends CI_Model
{
	
	function get_gallery($field_name)
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('photo_album_name', $field_name)
				->get('vedio_gallery');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('vedio_gallery');
			  $result	= $result->result();
			  return $result;
			}
	}
	
	
	function get_allgallery()
	{
			  $result	= $this->db->get('vedio_gallery');
			  $result	= $result->result();
			  return $result;
	}
	
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('photo_album_id', $approve_val);
		$this->db->update('vedio_gallery', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('photo_album_id', $deapprove_val);
		$this->db->update('vedio_gallery', $setval);
		return false;
	}
	
	
	function get_gallery_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('vedio_gallery');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('photo_album_id', $id)
				->limit(1)
				->get('vedio_gallery');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('vedio_gallery', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('photo_album_id', $save['photo_album_id']);
			$this->db->update('vedio_gallery', $save);
			return false;
	}
	
	function delete_gallery($id)
	{
		//delete the page
		$this->db->where('photo_album_id', $id);
		$this->db->delete('vedio_gallery');
	
	}
	

}