<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Category_model');	
	}

/////////////////Group category////////////////////////////////////
	function index()
	{
		$data['page_title']	="Category";
		$field_name= $this->input->post('field_name');
		$data['categorys']		= $this->Category_model->get_category($field_name);
		$data['main_content']="category/category_group_list.php";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Category_model->get_category_approve($approve_val);   
		redirect('category/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Category_model->get_category_deapprove($deapprove_val);   
		redirect('category/index', '');
	}
	
	
	function create()
	{
		$data['page_title']	="Category";
		//$data['pages']		= $this->Category_model->get_pages();
		$data['categorys']		= $this->Category_model->all_catgory();
		 $data['main_content']="category/create_category_group";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['cid']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['category']=$this->Category_model->get_category_update($id);   
		$data['main_content']="category/update_category_group";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		/*$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/groupcategory/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="category/create_category_group";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];*/
		
			
			$save['cat_name']		= $this->input->post('category_name');
			$save['caegory_title']	= $this->input->post('category_title'); 
			$save['status']	= $this->input->post('status');
			$save['target']	= $this->input->post('target');
			$save['create_date']		= date('Y-m-d');
			$this->Category_model->save($save);
			redirect('category/index', '');
	}
	
	function link_form()
	{
			
		/*$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/groupcategory/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="category/update_category_group";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];*/
			//$save['id']			= $id;
			$save['cid']=$this->input->post('cid');
			$save['cat_name']		= $this->input->post('category_name');
			$save['caegory_title']	= $this->input->post('category_title'); 
			$save['status']	= $this->input->post('status');
			$save['target']	= $this->input->post('target');
			$save['create_date']		= date('Y-m-d');
			$this->Category_model->update($save);
			redirect('category/index', '');
	}
	
	function delete()
	{
		$cid=$this->input->post('cid');
		$this->Category_model->delete_category($cid);
		redirect('category/index', '');
	}
////////////////////////// category////////////////////////////
function category_list()
	{
		$data['page_title']	="Sub Category";
		$field_name= $this->input->post('field_name');
		$data['categorys']		= $this->Category_model->get_subcategory($field_name);
		$data['main_content']="category/category_list";
         $this->load->view('deshboard_templete', $data);
	}
	
	function subapproved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Category_model->get_subcategory_approve($approve_val);   
		redirect('category/category_list', '');
	}
	
	
	function subdeapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Category_model->get_subcategory_deapprove($deapprove_val);   
		redirect('category/category_list', '');
	}
	
	function category_create()
	{
		$data['page_title']	="Sub Category";
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['main_content']="category/create_category";
        $this->load->view('deshboard_templete', $data);
	}
	function subcategory_updateData($id)
	{
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['scid']=$id; 
		$data['category']=$this->Category_model->get_subcategory_update($id);  
		$data['categorys']= $this->Category_model->all_catgory();
		$data['main_content']="category/update_category";
        $this->load->view('deshboard_templete', $data);
	}
	
	function subcategory_form()
	{
		/*$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/category/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="category/create_category";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];*/
		
			$save['cat_id']=$this->input->post('groupcategory');
			$save['sub_cat_name']		= $this->input->post('sub_category_name');
			$save['sub_cat_title']	= $this->input->post('sub_category_title'); 
			$save['status']	= $this->input->post('status');
			$save['target']	= $this->input->post('target');
			$save['create_date']		= date('Y-m-d');
			$this->Category_model->save_subcategory($save);
			redirect('category/category_list', '');
	}
	
	function subcategory_link_form()
	{
			
		/*$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/category/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="category/create_category";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];*/
			
			//$save['id']			= $id;
			$save['scid']=$this->input->post('scid');
			$save['cat_id']=$this->input->post('groupcategory');
			$save['sub_cat_name']		= $this->input->post('sub_category_name');
			$save['sub_cat_title']	= $this->input->post('sub_category_title'); 
			$save['status']	= $this->input->post('status');
			$save['target']	= $this->input->post('target');
			$save['create_date']		= date('Y-m-d');
			$this->Category_model->update_subcategory($save);
			redirect('category/category_list', '');
	}
	
	function subcategory_delete($id)
	{
		$id=$this->input->post('scid');
		$this->Category_model->delete_subcategory($id);
		redirect('category/category_list', '');
	}
}
