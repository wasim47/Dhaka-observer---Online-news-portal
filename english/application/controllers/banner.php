<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Banner_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="banner";
		$field_name= $this->input->post('field_name');
		$data['bannerlist']		= $this->Banner_model->get_banner($field_name);
		$data['main_content']="banner/banner_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Banner_model->get_category_approve($approve_val);   
		redirect('banner/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Banner_model->get_category_deapprove($deapprove_val);   
		redirect('banner/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="banner/create_banner";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['banner_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['bannerdata']=$this->Banner_model->get_banner_update($id);   
		$data['main_content']="banner/update_banner";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/banner/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="banner/create_banner";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Banner_model->save($save);
			redirect('banner/index', '');
	}
	
	function link_form()
	{
		//$bannerId=$this->input->post('bannerId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/banner/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('banner/updateData/'.$bannerId, '');
			return;
		}*/
			
			if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['image']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= $this->input->post('still_images');
				$save['image']	= $upload_data;	
			}
			$save['banner_id']=$this->input->post('bannerId');
			//$save['image']	= $upload_data['file_name'];
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Banner_model->update($save);
			redirect('banner/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('bid');
		$this->Banner_model->delete_banner($id);
		redirect('banner/index', '');
	}
}
