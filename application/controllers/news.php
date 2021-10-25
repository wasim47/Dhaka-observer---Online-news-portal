<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('News_model');
		$this->load->model('Category_model');	
		$this->load->helper('file');
		$this->load->helper('form');	
		$this->load->library('xml_writer');
		//$this->load->helper(array('xml'));
		$this->load->helper('xml');
	}
	
	
	function srss()
    {
		$sector_heading ='dhaka_observer';
		
       $this->data['feed_name'] = base_url();
       //$this->data['encoding'] = 'iso-8859-1';
	   $this->data['encoding'] = 'utf-8';
       $this->data['feed_url'] = base_url();
       $this->data['page_language'] = 'en';
       $this->data['page_description'] = 'Dhaka Observer';
       $query = $this->News_model->get_all_news();
        $xml = new Xml_writer;
		
		$str ='<?xml version="1.0" encoding="utf-8" ?>';		
		$str .='<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">';
		  $str .='<channel>';
		   	$str .='<title>'.$this->data['feed_name'].'</title>';
		   	$str .='<link>'.$this->data['feed_url'].'</link>' ;
		   	$str .='<description>'.$this->data['page_description'].'</description>';
			$str .='<language>'.$this->data['page_language'].'</language>';		
			$str .='<atom:link href="'.base_url().'application/views/frontend/feeds/'.$sector_heading.'.xml" rel="self" type="application/rss+xml"/>';
				foreach ($query as $row) {
					$sbuzz_image = $row->image;
					$sbid = $row->n_id;
					$category_id = $row->category;
					$sbuzz_name = $row->headline;
					$sbuzz_description = $row->short_description;

					 $str .='<item>';
					   $str .='<title>'.xml_convert(stripslashes($sbuzz_name)).'</title>';  
					  //$str .='<link>'.base_url().'index.php/'.$sbid.'</link>'; 
					   /*$str .='<link>'.base_url().'index/news_details_facebook?id='.$sbid.'</link>';   
						$str .='<description>'.'<![CDATA['.stripslashes($sbuzz_description).']]'.'></description>';*/ 

				$str .='<link>'.base_url().'index/news_details_facebook?id='.$sbid.'&amp;&amp;cat_id='.$category_id.'</link>';   
				$str .='<description>'.'<![CDATA['.stripslashes($sbuzz_description).']]'.'></description>'; 	
			

			  $str .='<guid isPermaLink="false">'.$sbid.'</guid>';
					  $str .='<media:thumbnail width="92" height="52" url="'.base_url().'uploads/images/news/'.$sbuzz_image.'"/>'; 
					$str .='</item>';   
					
				}
		
		
			 $str .='</channel>';
			$str .='</rss>';
				if(!write_file('./application/views/frontend/feeds/'.$sector_heading.'.xml', $str))
				{
				}
				else
				{
				redirect('news/index');
				}  
				
    }

	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="News";
		$field_name= $this->input->post('field_name');
		$cid= $this->input->get('cid');
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['newslist']		= $this->News_model->get_news($field_name,$cid);
		$data['allnewslist']		= $this->News_model->get_news($field_name,$cid);
		$data['main_content']="news/news_list";
         $this->load->view('deshboard_templete', $data);
	}
	
	function all_news()
	{
		$data['page_title']	="News";
		$field_name= $this->input->post('field_name');
		$cid= $this->input->get('cid');
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['newslist']		= $this->News_model->get_news($field_name,$cid);
		$data['allnewslist']		= $this->News_model->get_allnews($field_name,$cid);
		$data['main_content']="news/allnews_list";
         $this->load->view('deshboard_templete', $data);
	}
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->News_model->get_category_approve($approve_val);   
		redirect('news/index', '');
	}
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->News_model->get_category_deapprove($deapprove_val);   
		redirect('news/index', '');
	}
	
	function top_desk_list()
	{
		$data['main_content']="news/top_desk_list";
        $this->load->view('deshboard_templete', $data);
	}
	
	/*function latest_news()
	{
		$data['main_content']="news/latest_news";
        $this->load->view('deshboard_templete', $data);
	}
	
	function update_sequence_brnews()
	{
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		$this->News_model->update_squnce($seqence,$id);   
		redirect('news/latest_news', '');
	}*/
	
	function update_sequence()
	{
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		$this->News_model->update_squnce($seqence,$id);   
		redirect('news/top_desk_list', '');
	}
	
	
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['main_content']="news/create_news";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['news_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['subcategorys']		= $this->Category_model->all_subcatgory();
		$data['newsdata']=$this->News_model->get_news_update($id);   
		$data['main_content']="news/update_news";
        $this->load->view('deshboard_templete', $data);
	}
	
		
	function form()
	{
	
		$config['allowed_types'] = '*';
		//$config['max_width'] = '650';
        //$config['max_height'] = '300';
		$config['upload_path'] = 'uploads/images/news/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		/*$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			$data['main_content']="news/create_news";
        	$this->load->view('deshboard_templete', $data);
			return;
		}*/
		
		$this->load->library('upload', $config);
				if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['image']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= '';
				$save['image']	= $upload_data;	
			}
			
			$value12= $this->News_model->get_newsId();
			foreach($value12 as $val):
			$news_id = $val->news_id;
			endforeach;
			if($news_id!=0 || $news_id!=""){
				$finalnewsId=$news_id+1;
			}
			else{
				$finalnewsId=1;
			}
			$save['news_id']		= $finalnewsId;
			$save['user_id']		= $this->session->userdata('user_id');
			//$save['image']	= $upload_data['file_name'];
			$save['headline']		= $this->input->post('headline');
			$save['category']	= $this->input->post('category'); 
			$save['sub_category']	= $this->input->post('sub_category');
			$save['auther_name']	= $this->input->post('auther_name');
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['vedio']	    = $this->input->post('vedio');
			$save['vedio_top']	    = $this->input->post('vedio_top');
			$save['vedio_bottom']	    = $this->input->post('vedio_bottom');
			$save['seo_details']		= $this->input->post('seo_details');
			
			$currentDate = date("l d F Y");
			$differencetolocaltime=11;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i", $new_U);;
			$count_date = date("Y-m-d");
			
			
			$save['date']	    = $currentDate;
			$save['count_date']	    = $count_date;
			$save['time']		= $ptime;
			
			$save['top_news']		= $this->input->post('top_news');
			$save['top_desk_news']		= $this->input->post('top_desk_news');
			$save['last_updated']		= $this->input->post('last_updated');
			$save['popular_news']		= $this->input->post('popular_news');
			$save['breaking_news']		= $this->input->post('breaking_news');
			$save['status']		= $this->input->post('status');
			
			$this->News_model->save($save);
			$this->srss();
		
			redirect('news/index', '');
	}
	
	function link_form()
	{
		//$newsId=$this->input->post('newsId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/news/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('news/updateData/'.$newsId, '');
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
			$save['n_id']=$this->input->post('newsId');
			$save['news_id']=$this->input->post('news_id');
			//$save['image']	= $upload_data['file_name'];
			$save['headline']		= $this->input->post('headline');
			$save['category']	= $this->input->post('category'); 
			$save['sub_category']	= $this->input->post('sub_category');
			$save['auther_name']	= $this->input->post('auther_name');
			$save['image_title']	    = $this->input->post('image_title');
			$save['vedio']	          = $this->input->post('vedio');
			$save['vedio_top']	    = $this->input->post('vedio_top');
			$save['vedio_bottom']	    = $this->input->post('vedio_bottom');
			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			
			$currentDate = date("l d F Y");
			$differencetolocaltime=11;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i", $new_U);;
			$count_date = date("Y-m-d");
			
			$save['count_date']	    = $count_date;
			$save['date']	    = $currentDate;
			$save['time']		= $ptime;
			
			$save['top_news']		= $this->input->post('top_news');
			$save['top_desk_news']		= $this->input->post('top_desk_news');
			$save['last_updated']		= $this->input->post('last_updated');
			$save['popular_news']		= $this->input->post('popular_news');
			$save['breaking_news']		= $this->input->post('breaking_news');
			$save['status']		= $this->input->post('status');
			
			$this->News_model->update($save);
			$this->srss();
			redirect('news/index', '');
	}
	
	/********************************************************************
	delete page
	********************************************************************/
	function delete()
	{
		$id=$this->input->get('nid');
		$this->News_model->delete_news($id);
		redirect('news/index', '');
	}





/********************************************************************
	Breaking News
********************************************************************/



function breaking_news_index()

	{

		$field_name = $this->input->post('field_name');

		$data['page_title']	="News";

		$data['brnewslist']		= $this->News_model->get_breaking_news_index($field_name);

		$data['main_content']="news/breaking_news_list";

        $this->load->view('deshboard_templete', $data);

		

	}

	function breaking_news_approved()

	{

		$approve_val=$this->input->get('approve_val');

		$data['category']=$this->News_model->get_breaking_news_approve($approve_val);   

		redirect('news/breaking_news_index', '');

	}

	

	

	function breaking_news_deapproved()

	{

		$deapprove_val=$this->input->get('deapprove_val');

		$data['category']=$this->News_model->get_breaking_news_deapprove($deapprove_val);   

		redirect('news/breaking_news_index', '');

	}

	function breaking_news_create()

	{

		$data['page_title']	="Article";

		$data['categorys']		= $this->Category_model->all_catgory();

		$data['main_content']="news/create_breaking_news";

         $this->load->view('deshboard_templete', $data);

	}

	function breaking_news_updateData($id)
	{
		$data['n_id']=$id; 
		$data['categorys']		= $this->Category_model->all_catgory();
		$data['newsdata']=$this->News_model->get_breaking_news_update($id);   
		$data['main_content']="news/update_breaking_news";
        $this->load->view('deshboard_templete', $data);
	}
	
	function breaking_news_form()
	{
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/news/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		
		$this->load->library('upload', $config);
				if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['image']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= '';
				$save['image']	= $upload_data;	
			}
			
			//$save['image']	= $upload_data['file_name'];
			$save['headline']		= $this->input->post('headline');
			$save['category']	= $this->input->post('category'); 
			$save['sub_category']	= $this->input->post('sub_category');
			$save['auther_name']	= $this->input->post('auther_name');
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['vedio']	    = $this->input->post('vedio');
			$save['vedio_top']	    = $this->input->post('vedio_top');
			$save['vedio_bottom']	    = $this->input->post('vedio_bottom');
			$save['seo_details']		= $this->input->post('seo_details');
			
			$save['time']	= $this->input->post('time_line');
			$currentDate    = date("l d F Y");
			$save['date']	= $currentDate;
			$save['status']	= $this->input->post('status');
			
			$this->News_model->breaking_news_save($save);
			redirect('news/breaking_news_index', '');
	}

	/*function breaking_news_form()

	{

		$save['category']	= $this->input->post('category'); 

		$save['headline']		= $this->input->post('headline');

		$save['seo_title']		= $this->input->post('seo_title');

		$save['key_word']	    = $this->input->post('key_word');

		$save['seo_details']		= $this->input->post('seo_details');

		$save['time']		= $this->input->post('time_line');

		$currentDate = date("l d F Y");

		$save['date']	    = $currentDate;

		$save['status']		= $this->input->post('status');

		

		$this->News_model->breaking_news_save($save);

		redirect('news/breaking_news_index', '');

	}*/

	

	function breaking_news_link_form()

	{
		//$newsId=$this->input->post('newsId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/news/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
			if($this->upload->do_upload()){
				$upload_data	= $this->upload->data();
				$save['image']	= $upload_data['file_name'];
			}
			else{
				$upload_data	= $this->input->post('still_images');
				$save['image']	= $upload_data;	
			}
			$save['n_id']=$this->input->post('newsId');
			$save['news_id']=$this->input->post('news_id');
			//$save['image']	= $upload_data['file_name'];
			$save['headline']		= $this->input->post('headline');
			$save['category']	= $this->input->post('category'); 
			$save['sub_category']	= $this->input->post('sub_category');
			$save['auther_name']	= $this->input->post('auther_name');
			$save['image_title']	    = $this->input->post('image_title');
			$save['vedio']	          = $this->input->post('vedio');
			$save['vedio_top']	    = $this->input->post('vedio_top');
			$save['vedio_bottom']	    = $this->input->post('vedio_bottom');
			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			
			$save['time']		= $this->input->post('time_line');
			$currentDate = date("l d F Y");
			$save['date']	    = $currentDate;
			$save['status']		= $this->input->post('status');

		   $this->News_model->breaking_news_update($save);
		    redirect('news/breaking_news_index', '');
	}

	

	function breaking_news_delete()

	{

		$id[]=$this->input->get('nid');

		$this->News_model->delete_breaking_news($id);

		redirect('news/breaking_news_index', '');

	}

}