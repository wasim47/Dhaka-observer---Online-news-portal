<?php
Class Category_model extends CI_Model
{

////////////////////////// Group Menu////////////////////////////
	 
	 function get_user_list() 
	{
	  $query = $this
				->db
				->select('*')
				->group_by('user_id')
				->get('users');
		$row = $query->result();		
		return $row;
	}
	
	 function all_catgory()
		{
				  $result	= $this->db->get('category');
				  $result	= $result->result();
				  return $result;
		}
	
	function get_category($field_name)
	{
		//$this->db
			 //->where('id', $id);
			 if($field_name!=""){
			    $query = $this
				->db
				->where('cat_name', $field_name)
				->get('category');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('category');
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
		$this->db->where('cid', $approve_val);
		$this->db->update('category', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('cid', $deapprove_val);
		$this->db->update('category', $setval);
		return false;
	}
	
	
	function get_category_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('cid', $id)
				->limit(1)
				->get('category');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('category', $save);
			return $this->db->insert_id();
	}
	
	function update($save)
	{
			$this->db->where('cid', $save['cid']);
			$this->db->update('category', $save);
			return false;
	}
	
	function delete_category($cid)
	{
		//delete the page
		$this->db->where('cid', $cid);
		$this->db->delete('category');
	
	}
	
////////////////////////// Menu////////////////////////////
	
	
	
	function all_subcatgory()
		{
				  $result	= $this->db->get('sub_category');
				  $result	= $result->result();
				  return $result;
		}
	
	function get_subcategory($field_name)
	{
		//$this->db
			 //->where('id', $id);
			 if($field_name!=""){
			    $query = $this
				->db
				->where('sub_cat_name', $field_name)
				->get('sub_category');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('sub_category');
			  $result	= $result->result();
			  return $result;
			}
	}
	
	
	
	/*function get_subcategory($field_name)
	{
		//$this->db
			 //->where('id', $id);
			  $result	= $this->db->get('sub_category');
			  $result	= $result->result();
			  return $result;
	}*/
	
	function get_subcategory_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('scid', $id)
				->limit(1)
				->get('sub_category');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function get_subcategory_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('scid', $approve_val);
		$this->db->update('sub_category', $setval);
		return false;
	}
	
	function get_subcategory_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('scid', $deapprove_val);
		$this->db->update('sub_category', $setval);
		return false;
	}
	
	function save_subcategory($save)
	{
			$this->db->insert('sub_category', $save);
			return $this->db->insert_id();
	}
	
	function update_subcategory($save)
	{
			$this->db->where('scid', $save['scid']);
			$this->db->update('sub_category', $save);
			return false;
	}
	
	function delete_subcategory($id)
	{
		//delete the page
		$this->db->where('scid', $id);
		$this->db->delete('sub_category');
	
	}
	
}