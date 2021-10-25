<?php
Class Index_model extends CI_Model
{
	
	
	
	function save_subscriber($save)
	{
			$this->db->insert('subscriber', $save);
			return $this->db->insert_id();
	}
	
	function check_ajax($email)
	{
			$query = "select * from subscriber where email = '$email'";
			$results = mysql_query($query);
			$row= mysql_fetch_array($results);
			$row['email'];
			$row['id'];
			if($row['email']) // not available
			{
				echo '<div id="Error"  style="color:#ff0000; font-weight:bold;">Already Taken as Email</div>';
				echo '<script>document.getElementById("email").value=" ";</script>';
			}
			else
			{
				echo '<div id="Success"  style="color:#006600; font-weight:bold;">Available email</div>';
			}
	}
	
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
	
	function get_prayer() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			->order_by('coin_id', 'asc')
			->limit(5)
		    ->get('pray_time');
		    return $result->result();
	}
	function get_votvalue() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			->order_by('voting_id', 'desc')
		    ->get('voting');
		    return $result->result();
	}
	
	
	function get_voting_index() 
	{
		/*$pdate=date('j M Y');
		$query = $this
		->db
		->where('end_date <=', $pdate)
		->where('status ', '1')
		->order_by('voting_id', 'desc')
		->limit(1)
		->get('voting');
		$row = $query->row_array();	
		return $row;*/
		
		$query = $this
		->db
		->where('status ', '1')
		->order_by('voting_id', 'desc')
		->limit(1)
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
	
	function get_vot_insert($vot_arry,$votingId)
	{
			$pdate=date('j M Y');
			$this->db->where('voting_id', $votingId);
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
				->where('n_id', $id)
				->get('news_manage');
			$row = $query->row_array();		
			return $row;
	}
	
	
	
	function get_news_details_br($brid)
	{
		$query = $this
				->db
				->where('n_id', $brid)
				->get('breaking_news');
			$row = $query->row_array();		
			return $row;
	}
	
	
	function get_related_news($id,$cat_id)
	{
		$result = $this
				->db
				->where('n_id NOT IN ("$id")',NULL, FALSE)
				->where('category',$cat_id)
				->order_by('n_id', 'desc')
				->get('news_manage');
		return $result->result();
	}
	
	function get_news_gallery($cat_id)
	{
		$query = $this
				->db
				->where('category', $cat_id)
				->order_by('n_id', 'desc')
				->limit(10)
				->get('news_manage');
			$row = $query->result();		
			return $row;
	}
}