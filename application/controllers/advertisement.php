<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('advertisement_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="advertisement";
		$field_name= $this->input->post('field_name');
		$data['advertisementlist']		= $this->advertisement_model->get_advertisement($field_name);
		$data['main_content']="advertisement/advertisement_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->advertisement_model->get_category_approve($approve_val);   
		redirect('advertisement/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->advertisement_model->get_category_deapprove($deapprove_val);   
		redirect('advertisement/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="advertisement/create_advertisement";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['advertisement_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['advertisementdata']=$this->advertisement_model->get_advertisement_update($id);   
		$data['main_content']="advertisement/update_advertisement";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/advertisement/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="advertisement/create_advertisement";
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
			
			$this->advertisement_model->save($save);
			redirect('advertisement/index', '');
	}
	
	function link_form()
	{
		//$advertisementId=$this->input->post('advertisementId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/advertisement/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('advertisement/updateData/'.$advertisementId, '');
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
			$save['advertisement_id']=$this->input->post('advertisementId');
			//$save['image']	= $upload_data['file_name'];
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->advertisement_model->update($save);
			redirect('advertisement/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('bid');
		$this->advertisement_model->delete_advertisement($id);
		redirect('advertisement/index', '');
	}
}
