<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Page_model');
		$this->load->model('Menu_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="Article";
		$data['pages']		= $this->Page_model->get_page();
		$data['main_content']="pages/artcle_list";
         $this->load->view('deshboard_templete', $data);
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['menus']		= $this->Menu_model->get_page();
		$data['main_content']="pages/create_article";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['id']=$id; 
		$data['articles']=$this->Page_model->get_pages_update($id);   
		$data['main_content']="pages/update_article";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
			$save = array();
			//$save['id']			= $id;
			//$save['parent_id']	= $this->input->post('parent_id');
			$save['title']		= $this->input->post('title');
			$save['menu_title']	= $this->input->post('menu_title'); 
			//$save['sequence']	= $this->input->post('sequence');
			$save['content']	= $this->input->post('content');
			$save['seo_title']	= $this->input->post('seo_title');
			$save['url']	    = $this->input->post('keywords');
			$save['meta']		= $this->input->post('meta_description');
			
			//$save['slug']		= $slug;
			$this->Page_model->save($save);
			redirect('pages/index', '');
	}
	
	function link_form()
	{
			
		$save = array();
			//$save['id']			= $id;
			$save['id']=$this->input->post('aid');
			//$save['parent_id']	= $this->input->post('parent_id');
			$save['title']		= $this->input->post('title');
			$save['menu_title']	= $this->input->post('menu_title'); 
			//$save['sequence']	= $this->input->post('sequence');
			$save['content']	= $this->input->post('content');
			$save['seo_title']	= $this->input->post('seo_title');
			$save['url']	    = $this->input->post('keywords');
			$save['meta']		= $this->input->post('meta_description');
			$this->Page_model->update($save);
			redirect('pages/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete($id)
	{
		$data['id']=$id;
		$this->Page_model->delete_page($id);
		redirect('pages/index', '');
	}
}
