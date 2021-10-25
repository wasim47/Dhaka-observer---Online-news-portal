<?php
Class Prayer_model extends CI_Model
{
	
	function get_coin() 
	{
			  $result	= $this->db->get('pray_time');
			  $result	= $result->result();
			  return $result;
	}
	function get_coinlist()
	{
		$query = $this
				->db
				->select('*')
				->get('pray_time');
		$row = $query->row_array();		
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
		$this->db->where('coin_id', $approve_val);
		$this->db->update('pray_time', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('coin_id', $deapprove_val);
		$this->db->update('pray_time', $setval);
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
				->get('pray_time');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($coinId,$coin,$buy,$sell,$seotitle,$keyword,$details)
	{
			$j=count($coinId);
			//echo $seotitle;
			$date= date('y-m-d');
			for($i=1; $i<=7; $i++){
			//$this->db->insert('coin', $save);
//$query='INSERT INTO `coin` ( `coin_name`, `sell`, `buy`) VALUES ("'.$coin[$i].'","'.$sell[$i].'","'.$buy[$i].'")';
		$query='update pray_time set coin_name="'.$coin[$i].'", sell="'.$sell[$i].'", buy="'.$buy[$i].'", seo_title="'.$seotitle.'",  key_word ="'.$keyword.'", seo_details="'.$details.'", date_time="'.$date.'" where coin_id="'.$i.'"';
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
			$this->db->update('pray_time', $save);
			return false;
	}
	
	function delete_coin($id)
	{
		//delete the page
		$this->db->where('coin_id', $id);
		$this->db->delete('pray_time');
	
	}
	

}