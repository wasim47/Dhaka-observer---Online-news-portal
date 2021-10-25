<?php
Class Columist_article_model extends CI_Model
{
	
	
	function get_newsId() 
	{
	  $result	= $this
	  ->db
	  ->order_by('n_id', 'desc')
	   ->limit(1)
	  ->get('columist_article');
	  $result	= $result->result();
	  return $result;
	}
	
	function get_all_news() 
	{
	  $result	= $this
	  ->db
	  ->order_by('n_id', 'desc')
	  ->group_by('news_id')
	  ->get('columist_article');
	  $result	= $result->result();
	  return $result;
	}
	
	function get_news($field_name,$cid) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->get('columist_article');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->get('columist_article');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->group_by('news_id')
				  ->order_by('n_id', 'desc')
				  ->get('columist_article');
				  $result	= $result->result();
				  return $result;
				}
	}
	
	
	
	function get_breaking_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->limit(7)
				->get('breaking_news');
		return $query->result();
	}
	
	function get_latest_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('breaking_news', '1')
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->limit(7)
				->get('columist_article');
		return $query->result();
	}
	
	
	function get_related_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->limit(12)
				->get('columist_article');
		return $query->result();
	}
	function get_mostviews_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('read_count !=', '0')
				->group_by('news_id')
				->order_by('read_count', 'desc')
				->limit(14)
				->get('columist_article');
		return $query->result();
	}
	
	function get_desk_news() 
	{
			    $query = $this
				->db
				->where('top_desk_news', '1')
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->limit(5)
				->get('columist_article');
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
		$this->db->where('n_id', $approve_val);
		$this->db->update('columist_article', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('n_id', $deapprove_val);
		$this->db->update('columist_article', $setval);
		return false;
	}
	
	
	function get_news_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('n_id', $id)
				->limit(1)
				->get('columist_article');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$currentDate = date("l d F Y");
			$differencetolocaltime=6;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i A", $new_U);;
			
			$cols=$save['category'];
			$array_length=count($cols);
			for($i=0; $i<$array_length; $i++)
			{
				$data = array(
				   'headline' => $save['headline'],
				   'news_id' => $save['news_id'],
				   'category' => $cols[$i],
				   'sub_category' => $save['sub_category'],
				   'image' => $save['image'],
				   'image_title' => $save['image_title'],
				   'short_description' => $save['short_description'],
				   'full_description' => $save['full_description'],
				   'seo_title' => $save['seo_title'],
				   'key_word' => $save['key_word'],
				   'seo_details' => $save['seo_details'],
				   'top_news' => $save['top_news'],
				   'top_desk_news' => $save['top_desk_news'],
				   'breaking_news' => $save['breaking_news'],
				   'status' => $save['status'],
				   'time' => $ptime,
				   'date' => $currentDate
				);
				
				$this->db->insert('columist_article', $data);
			}
			return $this->db->insert_id();
	}
	
	function update($save)
	{
			$this->db->where('n_id', $save['n_id']);
			$this->db->update('columist_article', $save);
			return false;
	}
	
	function delete_news($id)
	{
		//delete the page
		//$this->db->where('n_id', $id);
		$array=join(',',$id);
		$this->db->where('n_id IN ('.$array.')',NULL, FALSE);
		$this->db->delete('columist_article');
	
	}
	
	
	
/************** BREAKING NEWS ****************************/
function get_breaking_news_index($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->order_by('n_id', 'desc')
				->get('breaking_news');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->order_by('n_id', 'desc')
				  ->get('breaking_news');
				  $result	= $result->result();
				  return $result;
				}
	}
	
	
	function get_breaking_news_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('n_id', $approve_val);
		$this->db->update('breaking_news', $setval);
		return false;
	}
	
	function get_breaking_news_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('n_id', $deapprove_val);
		$this->db->update('breaking_news', $setval);
		return false;
	}
function get_breaking_news_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('n_id', $id)
				->limit(1)
				->get('breaking_news');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function breaking_news_save($save)
	{
			$this->db->insert('breaking_news', $save);
			return $this->db->insert_id();
	}
	
	function breaking_news_update($save)
	{
			$this->db->where('n_id', $save['n_id']);
			$this->db->update('breaking_news', $save);
			return false;
	}
	
	function delete_breaking_news($id)
	{
		//delete the page
		//$arr[]=$id;
		$array=join(',',$id);
		$this->db->where('n_id IN ('.$array.')',NULL, FALSE);
		//$this->db->where('n_id IN ("$array")');
		//$this->db->where('n_id', $id);
		$this->db->delete('breaking_news');
	
	}
}