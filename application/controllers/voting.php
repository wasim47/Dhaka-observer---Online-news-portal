<?php defined('BASEPATH') OR exit('No direct script access allowed');

class voting extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('voting_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="voting";
		$field_name= $this->input->post('field_name');
		$data['votinglist']		= $this->voting_model->get_voting($field_name);
		$data['main_content']="voting/voting_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->voting_model->get_category_approve($approve_val);   
		redirect('voting/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->voting_model->get_category_deapprove($deapprove_val);   
		redirect('voting/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="voting/create_voting";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['voting_id']=$id; 
		$data['votingdata']=$this->voting_model->get_voting_update($id);   
		$data['main_content']="voting/update_voting";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
	
			$differencetolocaltime=6;
			$new_U=date("U")-$differencetolocaltime*3600;
			$ptime = date("H:i:s A", $new_U);
			
			$save['title']	    = $this->input->post('title');
			$save['voting_sub']	    = $this->input->post('headline');
			$save['start_date']	    = $this->input->post('start_date'); 
			$save['end_date']	    = $this->input->post('end_date');
			$save['voting_time']	= $ptime;
			$save['status']	    = $this->input->post('status');
			
			$this->voting_model->save($save);
			redirect('voting/index', '');
	}
	
	function link_form()
	{
		
		$differencetolocaltime=6;
		$new_U=date("U")-$differencetolocaltime*3600;
		$ptime = date("H:i:s A", $new_U);
		
		$save['title']	    = $this->input->post('title');
		$save['voting_id']      =$this->input->post('votingId');
		$save['voting_sub']	    = $this->input->post('headline');
		$save['start_date']	    = $this->input->post('start_date'); 
		$save['end_date']	    = $this->input->post('end_date');
		$save['voting_time']	= $ptime;
		$save['status']	    = $this->input->post('status');
		
		$this->voting_model->update($save);
		redirect('voting/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		$id=$this->input->get('nid');
		$this->voting_model->delete_voting($id);
		redirect('voting/index', '');
	}
}
