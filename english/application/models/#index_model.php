<?php
Class Index_model extends CI_Model
{
	
	function get_menu() 
	{
	  $result=$this->db
	  		->where('status', 1)
			->order_by('cid', 'asc')
		    ->get('category');
		    return $result->result();
	}
	
	function get_inactive_menu() 
	{
	  $result=$this->db
	  		->where('status', 0)
			->order_by('cid', 'asc')
		    ->get('category');
		    return $result->result();
	}
	
	function get_cricket() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('sports');
		    return $result->result();
	}
	function get_football() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('football');
		    return $result->result();
	}
	
	
	function get_theatre() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('theatre');
		    return $result->result();
	}
	function get_cultrual() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('culturals');
		    return $result->result();
	}
	
	function get_coin() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('coin');
		    return $result->result();
	}
	
	
	function get_votvalue() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('voting');
		    return $result->result();
	}
	
	
	function get_voting_index() 
	{
		$pdate=date('j M Y');
		$query = $this
		->db
		->where('status ', '1')
		->where('end_date ', $pdate)
		->get('voting');
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
	
	function get_vot_insert($vot_arry)
	{
			$pdate=date('j M Y');
			$this->db->where('end_date', $pdate);
			$this->db->update('voting', $vot_arry);
			return false;
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

//////////////////  News  //////////////////.
	
	function get_news_details($id)
	{
		$query = $this
				->db
				->where('news_id', $id)
				->get('news_manage');
			$row = $query->row_array();		
			return $row;
	}
	function get_related_news($id,$cat_id)
	{
		$result = $this
				->db
				->where('news_id NOT IN ("$id")',NULL, FALSE)
				->where('category',$cat_id)
				->order_by('news_id', 'desc')
				->get('news_manage');
		return $result->result();
	}
	
	function get_news_gallery($cat_id)
	{
		$query = $this
				->db
				->where('category', $cat_id)
				->order_by('news_id', 'desc')
				->limit(10)
				->get('news_manage');
			$row = $query->result();		
			return $row;
	}
}