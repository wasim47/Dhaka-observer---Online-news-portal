<?php defined('BASEPATH') OR exit('No direct script access allowed');

class cultural extends CI_Controller { 

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('cultural_model');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="cultural";
		$field_name= $this->input->post('field_name');
		$data['culturallist']		= $this->cultural_model->get_cultural();
		$data['seodetails']		= $this->cultural_model->get_culturallist();
		$data['main_content']="cultural/cultural_manage";
         $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
			for($i=1; $i<=4; $i++){
				
				$cultural_date[] 		= $this->input->post('cultural_date'.$i);
				$programmer_name[] 			= $this->input->post('programmer_name'.$i);
				$programmer_type[]		    = $this->input->post('programmer_type'.$i);
				$culturaltime[]		    = $this->input->post('culturaltime'.$i);
				$culturalId[]		    = $this->input->post('culturalId'.$i);
			}
				$seotitle	    = $this->input->post('seo_title');
				$keyword		= $this->input->post('key_word');
				$details		= $this->input->post('seo_details');
			
			$this->cultural_model->save($culturalId,$cultural_date,$culturaltime,$programmer_name,$programmer_type,$seotitle,$keyword,$details);
			redirect('cultural/index', '');
	}
	
}
