<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('index_model');
		$this->load->model('Logo_model');
		$this->load->model('News_model');
		$this->load->model('Album_photo_model');
	}
	function index()
	{
		$data['page_title']	="Home Page";
		$data['main_content']="frontend/index";
		$data['menulist']		= $this->index_model->get_menu();
		$data['inactive__menulist']		= $this->index_model->get_inactive_menu();
		$data['logo_image']		= $this->Logo_model->get_logo_index();
		$data['photo_list']		= $this->Album_photo_model->get_album_photo_list();
		$data['topdesk_news']	= $this->News_model->get_desk_news();
		$data['rel_news']		= $this->News_model->get_related_news();
		//$data['most_views_news']		= $this->News_model->get_mostviews_news();
		$data['breaking_news']		= $this->News_model->get_breaking_news();
		$data['voting_value']		= $this->index_model->get_voting_index();
		$data['district_news']		= $this->News_model->get_distric_news();
		$data['cricket_val']	= $this->index_model->get_cricket();
		$data['footbal_val']	= $this->index_model->get_football();
		$data['theatre_program']	= $this->index_model->get_theatre();
		$data['cultural_program']	= $this->index_model->get_cultrual();
		$data['prayer_time']	= $this->index_model->get_prayer();
		$data['coin_market']	= $this->index_model->get_coin();
		$data['vot_value']		= $this->index_model->get_votvalue();
		

		$data['wrong_ip']	= "Sorry! You are already completed your vote. <br> You can not repeat submit more vote.<br> So Pleas Don't try again.";
        $this->load->view('template', $data);
		//echo $vot_value['0']->voting_id;
	}
	
	function voting()
	{
		$data['page_title']	="Voting";
		$data['vot_value']		= $this->index_model->get_votvalue();
		$value12= $this->index_model->get_votvalue();
		
		foreach($value12 as $val):
		$yes = $val->yes;
		$no = $val->no;
		$no_comments = $val->no_comments;
		$ip_address = $val->total_vote;
		endforeach;
		$ip=$_SERVER['REMOTE_ADDR'];
		if($ip_address!=$ip){
		
			$votval = $this->input->post('voting_val');
			$votingId = $this->input->post('votingId');
			if($votval=='yes'){
				$vot_arry= array(
								'yes' => ($yes+1),
								'total_vote' => $ip
					);
			}
			elseif($votval=='no'){
				$vot_arry= array(
								'no' => ($no+1),
								'total_vote' => $ip
					);
			}
			elseif($votval=='no_comments'){
				$vot_arry= array(
								'no_comments' => ($no_comments+1),
								'total_vote' => $ip
					);
			}
			$this->index_model->get_vot_insert($vot_arry,$votingId);
       		redirect('', 'index');
		}
		else{
		
        	redirect('', 'index');
		}
	}
	
	
	
	function news_details()
	{
		$data['page_title']	="Home Page";
		$id=$this->input->get('id');
		$cat_id=$this->input->get('cat_id');
		
		$data['menulist']		= $this->index_model->get_menu();
		$data['inactive__menulist']		= $this->index_model->get_inactive_menu();
		$data['logo_image']		= $this->Logo_model->get_logo_index();
		$data['photo_list']		= $this->Album_photo_model->get_album_photo_list();
		$data['topdesk_news']	= $this->News_model->get_desk_news();
		$data['rel_news']		= $this->News_model->get_related_news();
		$data['cat_rel_news']		= $this->News_model->get_cat_rel_news($cat_id);
		$data['breaking_news']		= $this->News_model->get_breaking_news();
		//$data['voting_value']		= $this->index_model->get_voting_index();
		//$data['district_news']		= $this->News_model->get_distric_news();
		//$data['topdesk_news_gallery']	= $this->News_model->get_desk_news_gallery($cat_id);
		$data['coin_market']	= $this->index_model->get_coin();
		$data['news_details']	= $this->index_model->get_news_details($id);
		$data['most_read']	= $this->News_model->get_most_read_news($cat_id);
		
		
		
		$data['main_content']="frontend/news_details";
        $this->load->view('template', $data);
		//echo $vot_value['0']->voting_id;
	}
	
	
	
	function news_gallery()
	{
		$data['page_title']	="Home Page";
		$cat_id=$this->input->get('cat_id');
		$id=$this->input->get('id');
		
		//$this->load->library('pagination');
		//$config['base_url'] = base_url().'index/news_gallery?cat_id='.$cat_id.'&&page';
		//$config['total_rows'] = 2;
		//$config['per_page'] = 1;
		//$this->pagination->initialize($config);
		//$data['pagination'] = $this->pagination->create_links();

		$data['menulist']		= $this->index_model->get_menu();
		//$data['logo_image']		= $this->Logo_model->get_logo_index();
		//$data['photo_list']		= $this->Album_photo_model->get_album_photo_list();
		$data['menulist']		= $this->index_model->get_menu();
		$data['inactive__menulist']		= $this->index_model->get_inactive_menu();
		$data['logo_image']		= $this->Logo_model->get_logo_index();
		$data['photo_list']		= $this->Album_photo_model->get_album_photo_list();
		$data['topdesk_news_gallery']	= $this->News_model->get_desk_news_gallery($cat_id);
		$data['rel_news']		= $this->News_model->get_related_news();
		//$data['most_views_news']		= $this->News_model->get_mostviews_news();
		$data['breaking_news']		= $this->News_model->get_breaking_news();
		$data['voting_value']		= $this->index_model->get_voting_index();
		$data['district_news']		= $this->News_model->get_distric_news();
		$data['coin_market']	= $this->index_model->get_coin();
		$data['most_read']	= $this->News_model->get_most_read_news($cat_id);
		$data['cat_rel_news']		= $this->News_model->get_cat_rel_news($cat_id);
		
		$data['news_gallery']	= $this->index_model->get_news_gallery($cat_id);
		
		
		$data['main_content']="frontend/news_gallery";
        $this->load->view('template', $data);
		//echo $vot_value['0']->voting_id;
	}
	
}
