<?php
Class Page_model extends CI_Model
{

	/********************************************************************
	Page functions
	********************************************************************/
	/*function get_pages($parent = 0)
	{
		$this->db->order_by('sequence', 'ASC');
		$this->db->where('parent_id', $parent);
		$result = $this->db->get('pages')->result();
		
		$return	= array();
		foreach($result as $page)
		{
			$return[$page->id]				= $page;
			$return[$page->id]->children	= $this->get_pages($page->id);
		}
		
		return $return;
	}*/
	
	function get_page()
	{
		//$this->db
			 //->where('id', $id);
			  $result	= $this->db->get('pages');
			  $result	= $result->result();
			  return $result;
	}
	
	function get_pages_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('pages');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('id', $id)
				->limit(1)
				->get('pages');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function save($save)
	{
			$this->db->insert('pages', $save);
			return $this->db->insert_id();
	}
	
	function update($save)
	{
			$this->db->where('id', $save['id']);
			$this->db->update('pages', $save);
			return false;
	}
	
	function delete_page($id)
	{
		//delete the page
		$this->db->where('id', $id);
		$this->db->delete('pages');
	
	}
	
	/*function get_slug($id)
	{
		$page = $this->get_page($id);
		if($page) 
		{
			return $page->slug;
		}
	}
	
	function save($data)
	{
		if($data['id'])
		{
			$this->db->where('id', $data['id']);
			$this->db->update('pages', $data);
			return $data['id'];
		}
		else
		{
			$this->db->insert('pages', $data);
			return $this->db->insert_id();
		}
	}
	
	function delete_page($id)
	{
		//delete the page
		$this->db->where('id', $id);
		$this->db->delete('pages');
	
	}
	
	function get_page_by_slug($slug)
	{
		$this->db->where('slug', $slug);
		$result = $this->db->get('pages')->row();
		
		return $result;
	}*/
}