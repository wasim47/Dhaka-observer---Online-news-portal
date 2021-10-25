<?php defined('BASEPATH') OR exit('No direct script access allowed');

class theatre extends CI_Controller { 

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('theatre_model');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="cultural";
		$field_name= $this->input->post('field_name');
		$data['culturallist']		= $this->theatre_model->get_cultural();
		$data['seodetails']		= $this->theatre_model->get_culturallist();
		$data['main_content']="theatre/cultural_manage";
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
			
			$this->theatre_model->save($culturalId,$cultural_date,$culturaltime,$programmer_name,$programmer_type,$seotitle,$keyword,$details);
			redirect('theatre/index', '');
	}
	
}
