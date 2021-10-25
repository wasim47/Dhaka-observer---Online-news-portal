<?php
Class Coin_model extends CI_Model
{
	
	function get_coin($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('coin_name', $field_name)
				->get('coin');
				$row = $query->result();		
				return $row;
	    	}
	    	else{
			  $result	= $this->db->get('coin');
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
		$this->db->where('coin_id', $approve_val);
		$this->db->update('coin', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('coin_id', $deapprove_val);
		$this->db->update('coin', $setval);
		return false;
	}
	
	
	function get_coin_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('coin');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('coin_id', $id)
				->limit(1)
				->get('coin');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($coin,$buy,$sell)
	{
			//$j=count($coinval);
			for($i=0; $i<=6; $i++){
			//$this->db->insert('coin', $save);
$query='INSERT INTO `coin` ( `coin_name`, `sell`, `buy`) VALUES ("'.$coin[$i].'","'.$sell[$i].'","'.$buy[$i].'")';
				mysql_query($query);
			}
			//return $this->db->insert_id();
			/*$j=count($coin);
			for($i=1; $i<=$j; $i++){
			//$this->db->insert('coin', $save);
			$query='INSERT INTO `coin` ( `coin_name`, `sell`, `buy`) VALUES ("'.$coin[$i].'","'.$sell[$i].'","'.$buy[$i].'")';
			}*/

	}
	
	function update($save)
	{
			$this->db->where('coin_id', $save['coin_id']);
			$this->db->update('coin', $save);
			return false;
	}
	
	function delete_coin($id)
	{
		//delete the page
		$this->db->where('coin_id', $id);
		$this->db->delete('coin');
	
	}
	

}