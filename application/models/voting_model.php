<?php
Class Voting_model extends CI_Model
{
	function get_voting($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('voting_sub', $field_name)
				->get('voting');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this->db->get('voting');
				  $result	= $result->result();
				  return $result;
				}
	}
	
	
	function get_desk_voting() 
	{
			    $query = $this
				->db
				->where('top_desk_voting', '1')
				->order_by('voting_id', 'desc')
				->limit(8)
				->get('voting');
				$row = $query->result();		
				return $row;
	}
	
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('voting_id', $approve_val);
		$this->db->update('voting', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('voting_id', $deapprove_val);
		$this->db->update('voting', $setval);
		return false;
	}
	
	
	function get_voting_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('voting_id', $id)
				->limit(1)
				->get('voting');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('voting', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('voting_id', $save['voting_id']);
			$this->db->update('voting', $save);
			return false;
	}
	
	function delete_voting($id)
	{
		//delete the page
		$this->db->where('voting_id', $id);
		$this->db->delete('voting');
	
	}
	

}