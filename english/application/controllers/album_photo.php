<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Album_photo extends CI_Controller { 

	function __construct()  
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('album_photo_model');
		$this->load->model('gallery_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="Album Photo";
		$field_name= $this->input->post('field_name');
		$data['album_photolist']		= $this->album_photo_model->get_album_photo($field_name);
		$data['main_content']="album_photo/album_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->album_photo_model->get_category_approve($approve_val);   
		redirect('album_photo/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->album_photo_model->get_category_deapprove($deapprove_val);   
		redirect('album_photo/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['album_photolist']		= $this->gallery_model->get_allgallery();
		$data['main_content']="album_photo/create_album";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['ph_id']=$id; 
		$data['album_photolist']		= $this->gallery_model->get_allgallery();
		$data['album_photodata']=$this->album_photo_model->get_album_photo_update($id);   
		$data['main_content']="album_photo/update_album";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/album_photo/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="album_photo/create_album";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['ph_ima']	= $upload_data['file_name'];
			$save['photo_album_id']	    = $this->input->post('photo_album_id');
			$save['ph_name']	    = $this->input->post('ph_name');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->album_photo_model->save($save);
			redirect('album_photo/index', '');
	}
	
	function link_form()
	{
		//$album_photoId=$this->input->post('album_photoId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/album_photo/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('album_photo/updateData/'.$album_photoId, '');
			return;
		}*/
			
			if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['ph_ima']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= $this->input->post('still_images');
				$save['ph_ima']	= $upload_data;	
			}
			$save['ph_id']=$this->input->post('ph_id');
			//$save['image']	= $upload_data['file_name'];
			$save['photo_album_id']	    = $this->input->post('photo_album_id');
			$save['ph_name']	    = $this->input->post('ph_name');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->album_photo_model->update($save);
			redirect('album_photo/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('pid');
		$this->album_photo_model->delete_album_photo($id);
		redirect('album_photo/index', '');
	}
}
