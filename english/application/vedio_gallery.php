<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vedio_gallery extends CI_Controller { 

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Vedio_gallery_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="album";
		$field_name= $this->input->post('field_name');
		$data['gallerylist']		= $this->Vedio_gallery_model->get_gallery($field_name);
		$data['main_content']="vedio/album_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Vedio_gallery_model->get_category_approve($approve_val);   
		redirect('vedio_gallery/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Vedio_gallery_model->get_category_deapprove($deapprove_val);   
		redirect('vedio_gallery/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="vedio/create_album";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['photo_album_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['gallerydata']= $this->Vedio_gallery_model->get_gallery_update($id);   
		$data['main_content']="vedio/update_album";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/vedio/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		/*$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="vedio/create_album";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['album_ima']	= $upload_data['file_name'];*/
			$this->load->library('upload', $config);
				if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['album_ima']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= '';
				$save['album_ima']	= $upload_data;	
			}
			
			//$save['album_ima']	= $this->input->post('youtube_link');
			$save['vedio_link']	= $this->input->post('youtube_link');
			$save['photo_album_name']	    = $this->input->post('vedio_title');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Vedio_gallery_model->save($save);
			redirect('vedio_gallery/index', '');
	}
	
	function link_form()
	{
		//$galleryId=$this->input->post('galleryId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/vedio/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		/*$this->load->library('upload', $config);
		
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('gallery/updateData/'.$galleryId, '');
			return;
		}
			
			if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['album_ima']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= $this->input->post('still_images');
				$save['album_ima']	= $upload_data;	
			}*/
			$this->load->library('upload', $config);
				if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['album_ima']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= $this->input->post('still_images');
				$save['album_ima']	= $upload_data;	
			}
			
			$save['photo_album_id']=$this->input->post('photo_album_id');
			$save['vedio_link']	= $this->input->post('youtube_link');
			$save['photo_album_name']	    = $this->input->post('vedio_title');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Vedio_gallery_model->update($save);
			redirect('vedio_gallery/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('bid');
		$this->Vedio_gallery_model->delete_gallery($id);
		redirect('vedio_gallery/index', '');
	}
}
