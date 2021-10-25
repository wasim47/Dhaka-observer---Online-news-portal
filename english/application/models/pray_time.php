<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pray_time extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Prayer_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="coin";
		$field_name= $this->input->post('field_name');
		$data['coinlist']		= $this->Prayer_model->get_coin();
		$data['seodetails']		= $this->Prayer_model->get_coinlist();
		$data['main_content']="pray_time/coin_manage";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Prayer_model->get_category_approve($approve_val);   
		redirect('pray_time/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Prayer_model->get_category_deapprove($deapprove_val);   
		redirect('pray_time/index', '');
	}
	function create()
	{
		$data['page_title']	="Coin";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="pray_time/create_coin";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['coin_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['coindata']=$this->Prayer_model->get_coin_update($id);   
		$data['main_content']="pray_time/update_coin";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
			for($i=1; $i<=8; $i++){
				
				$coin[] 		= $this->input->post('coin'.$i);
				$buy[] 			= $this->input->post('buy'.$i);
				$sell[]		    = $this->input->post('sell'.$i);
				$coinId[]		    = $this->input->post('coinId'.$i);
			}
				$seotitle	    = $this->input->post('seo_title');
				$keyword		= $this->input->post('key_word');
				$details		= $this->input->post('seo_details');
			
			$this->Prayer_model->save($coinId,$coin,$buy,$sell,$seotitle,$keyword,$details);
			redirect('pray_time/index', '');
	}
	
	function link_form()
	{
		//$coinId=$this->input->post('coinId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/coin/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('coin/updateData/'.$coinId, '');
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
			$save['coin_id']=$this->input->post('coinId');
			//$save['image']	= $upload_data['file_name'];
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Prayer_model->update($save);
			redirect('pray_time/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('bid');
		$this->Prayer_model->delete_coin($id);
		redirect('pray_time/index', '');
	}
}
