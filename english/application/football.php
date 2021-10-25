<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Football extends CI_Controller { 

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Football_model');
		$this->load->model('Category_model');	
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="sport";
		$field_name= $this->input->post('field_name');
		$data['sportlist']		= $this->Football_model->get_sport();
		$data['seodetails']		= $this->Football_model->get_sportlist();
		$data['main_content']="football/sport_manage";
         $this->load->view('deshboard_templete', $data);
	}
	
	
	function form()
	{
			for($i=1; $i<=3; $i++){
				
				$sport_venue[] 		= $this->input->post('sport_venue'.$i);
				$team1[] 			= $this->input->post('team1'.$i);
				$team2[]		    = $this->input->post('team2'.$i);
				$sporttime[]		    = $this->input->post('sporttime'.$i);
				$sportId[]		    = $this->input->post('sportId'.$i);
			}
				$seotitle	    = $this->input->post('seo_title');
				$keyword		= $this->input->post('key_word');
				$details		= $this->input->post('seo_details');
			
			$this->Football_model->save($sportId,$sport_venue,$sporttime,$team1,$team2,$seotitle,$keyword,$details);
			redirect('football/index', '');
	}
	
	
}
