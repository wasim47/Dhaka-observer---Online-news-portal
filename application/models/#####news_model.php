<?php
Class News_model extends CI_Model
{
	
	function get_all_news() 
	{
	  $result	= $this
	  ->db
	  ->order_by('news_id', 'desc')
	   ->limit(20)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	/*function get_news($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->order_by('news_id', 'desc')
				->limit(20)
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->order_by('news_id', 'desc')
				  ->limit(20)
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
	}*/
	function get_news($field_name,$cid) 
	{
				$userId=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('username');
			if($user_type=="Super Admin"){			
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->order_by('news_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				->order_by('news_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->order_by('news_id', 'desc')
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
			}
			else{
				if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->where('user_id', $userId)
				->order_by('news_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				->where('user_id', $userId)
				->order_by('news_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->where('user_id', $userId)
				  ->order_by('news_id', 'desc')
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
			}
	}
	
	function get_breaking_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('breaking_news', '1')
				->order_by('news_id', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	
	
	function get_related_news()
	{
		$currentDate = Date('l d F Y', strtotime("-3 days"));
		//$NewDate=Date('l d F Y', strtotime("-3 days"));
			
		$query = $this
				->db
				->where('status', '1')
				->where('read_count !=', '0')
				->where('date', $currentDate)
				->order_by('read_count', 'desc')
				->limit(9)
				->get('news_manage');
		return $query->result();
	}
	
	
	function get_most_read_news($cat_id)
	{
		$query = $this
				->db
				->where('status', '1')
				->where('read_count !=', '0')
				->where('category', $cat_id)
				->order_by('read_count', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	
	
	function get_distric_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('category', '4')
				->order_by('news_id', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	function get_cat_rel_news($cat_id)
	{
		$query = $this
				->db
				->where('status', '1')
				->where('category', $cat_id)
				->order_by('news_id', 'desc')
				->limit(3)
				->get('news_manage');
		return $query->result();
	}
	
	function get_desk_news_gallery($cat_id) 
	{
			    $query = $this
				->db
				->where('top_desk_news', '1')
				->where('category', $cat_id)
				->order_by('news_id', 'desc')
				->limit(5)
				->get('news_manage');
				$row = $query->result();		
				return $row;
	}
	
	function get_desk_news() 
	{
			    $query = $this
				->db
				->where('top_desk_news', '1')
				->order_by('news_id', 'desc')
				->limit(8)
				->get('news_manage');
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
		$this->db->where('news_id', $approve_val);
		$this->db->update('news_manage', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('news_id', $deapprove_val);
		$this->db->update('news_manage', $setval);
		return false;
	}
	
	
	function get_news_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('news');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('news_id', $id)
				->limit(1)
				->get('news_manage');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('news_manage', $save);
			return $this->db->insert_id();
			

	}
	
	function update($save)
	{
			$this->db->where('news_id', $save['news_id']);
			$this->db->update('news_manage', $save);
			return false;
	}
	
	function delete_news($id)
	{
		//delete the page
		$this->db->where('news_id', $id);
		$this->db->delete('news_manage');
	
	}
	

}