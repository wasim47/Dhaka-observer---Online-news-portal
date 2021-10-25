<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coin extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Coin_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="coin";
		$field_name= $this->input->post('field_name');
		$data['coinlist']		= $this->Coin_model->get_coin($field_name);
		$data['main_content']="coin/coin_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Coin_model->get_category_approve($approve_val);   
		redirect('coin/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Coin_model->get_category_deapprove($deapprove_val);   
		redirect('coin/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="coin/create_coin";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['coin_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['coindata']=$this->Coin_model->get_coin_update($id);   
		$data['main_content']="coin/update_coin";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
		/*$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/coin/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="coin/create_coin";
        	$this->load->view('deshboard_templete', $data);
			return;
		}
			$save['image']	= $upload_data['file_name'];*/
			/*$save = array(
			    'coin_name' 			=> $this->input->post('coin'),
				'sell' 				=> $this->input->post('buy'),
				'buy' 			=> $this->input->post('sell'),
				'seo_title'				=> $this->input->post('seo_title'),
				'key_word' 		=> $this->session->userdata('key_word'),
				'seo_details' 		=> $this->session->userdata('seo_details'),			
				'date_time'   	=> date('Y-m-d')
			);*/
			for($i=0; $i<=6; $i++){
				
				$coin[] 		= $this->input->post('coin'.$i);
				$buy[] 		= $this->input->post('buy'.$i);
				$sell[]		= $this->input->post('sell'.$i);
			/*$save['coin_name']	    = $this->input->post('coin$i');
			$save['buy']		= $this->input->post('buy$i');
			$save['sell']		= $this->input->post('sell$i');*/
			}
			/*foreach($coin as $key=>$value):
			echo $coin[$key];
			endforeach;
			foreach($buy as $buyval):
			$buyval;
			endforeach;
			foreach($sell as $sellval):
			$sellval;
			endforeach;*/
			//print_r($coin);
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$save['status']		= $this->input->post('status');
			
			$this->Coin_model->save($coin,$buy,$sell);
			redirect('coin/index', '');
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
			
			$this->Coin_model->update($save);
			redirect('coin/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		//$data['bid']=$id;
		$id=$this->input->get('bid');
		$this->Coin_model->delete_coin($id);
		redirect('coin/index', '');
	}
}
