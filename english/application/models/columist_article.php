<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Columist_article extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Columist_article_model');
		$this->load->model('Columist_model');	
		$this->load->helper('file');
		$this->load->helper('form');	
		$this->load->library('xml_writer');
		//$this->load->helper(array('xml'));
		$this->load->helper('xml');
	}


	function srss()
    {
		$sector_heading ='xpress_dhaka';
		
       $this->data['feed_name'] = base_url();
       //$this->data['encoding'] = 'iso-8859-1';
	   $this->data['encoding'] = 'utf-8';
       $this->data['feed_url'] = base_url();
       $this->data['page_language'] = 'en';
       $this->data['page_description'] = 'Xpress Dhaka';
       $query = $this->Columist_article_model->get_all_news();
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
					$sbid = $row->news_id;
					$category_id = $row->category;
					$sbuzz_name = $row->headline;
					$sbuzz_description = $row->short_description;

					 $str .='<item>';
					   $str .='<title>'.xml_convert(stripslashes($sbuzz_name)).'</title>';  
					  //$str .='<link>'.base_url().'index.php/'.$sbid.'</link>'; 
					   $str .='<link>'.base_url().'index/news_details?id='.$sbid.'&amp;&amp;cat_id='.$category_id.'</link>';   
$str .='<description>'.'<![CDATA['.stripslashes($sbuzz_description).']]'.'></description>'; 	
			

			  $str .='<guid isPermaLink="false">'.$sbid.'</guid>';
					  $str .='<media:thumbnail width="92" height="52" url="'.base_url().'uploads/images/columist_article/'.$sbuzz_image.'"/>'; 
					$str .='</item>';   
					
				}
		
		
			 $str .='</channel>';
			$str .='</rss>';
				if(!write_file('./application/views/frontend/feeds/'.$sector_heading.'.xml', $str))
				{
				}
				else
				{
				redirect('columist_article/index');
				}  
				
    }
	//redirect if needed, otherwise display the user list
	function index()
	{
		$data['page_title']	="News";
		$field_name= $this->input->post('field_name');
		$cid= $this->input->get('cid');
		$data['categorys']		= $this->Columist_model->all_columist();
		$data['newslist']		= $this->Columist_article_model->get_news($field_name,$cid);
		$data['main_content']="columist_article/news_list";
        $this->load->view('deshboard_templete', $data);
		
	}
	
	function ajax_category_view()
	{
		$category_id=$this->input->get('category_id');
		//$data['category']=$this->Columist_article_model->get_category_approve($category_id);   
		$this->load->view('columist_article/resultProject', $category_id);
	}
	
	function approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Columist_article_model->get_category_approve($approve_val);   
		redirect('columist_article/index', '');
	}
	
	
	
	
	function deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Columist_article_model->get_category_deapprove($deapprove_val);   
		redirect('columist_article/index', '');
	}
	function create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Columist_model->all_columist();
		$data['main_content']="columist_article/create_news";
         $this->load->view('deshboard_templete', $data);
	}
	function updateData($id)
	{
		$data['n_id']=$id; 
		$data['categorys']		= $this->Columist_model->all_columist();
		$data['newsdata']=$this->Columist_article_model->get_news_update($id);   
		$data['main_content']="columist_article/update_news";
        $this->load->view('deshboard_templete', $data);
	}
	
	function form()
	{
	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/columist_article/';//$this->config->item('digital_products_path');
		//$config['upload_path'] = 'http://xpressdhaka.com/uploads/images/columist_article/';
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
			
			
			
			$auther_name=$this->input->post('auther_name');
			$autherName=$this->input->post('authername');
			
			if($auther_name=='others'){
				$save['auther_name']	= $autherName;
			}
			else{
				$save['auther_name']	= $auther_name;
			}
			
			
			$value12= $this->Columist_article_model->get_newsId();
		
			foreach($value12 as $val):
			$news_id = $val->news_id;
			endforeach;
			if($news_id!='' || $news_id!=0){
				$finalnewsId=$news_id+1;
			}
			else{
				$finalnewsId=1;
			}
			$save['news_id']		= $finalnewsId;
			$save['headline']		= $this->input->post('headline');
			$save['category']	= $this->input->post('category'); 
			$save['sub_category']	= $this->input->post('sub_category');
			$save['image_title']	    = $this->input->post('image_title');
			$save['short_description']		= $this->input->post('short_description');
			$save['full_description']		= $this->input->post('full_description');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['key_word']	    = $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			
			$currentDate = date("l d F Y");
			$differencetolocaltime=6;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i A", $new_U);;
			
			$save['date']	    = $currentDate;
			$save['time']		= $ptime;
			
			$save['top_news']		= $this->input->post('top_news');
			$save['top_desk_news']		= $this->input->post('top_desk_news');
			$save['breaking_news']		= $this->input->post('breaking_news');
			$save['status']		= $this->input->post('status');
			
			$this->Columist_article_model->save($save);
			$this->srss();
			redirect('columist_article/index', '');
	}
	
	function link_form()
	{
		//$newsId=$this->input->post('newsId');	
		$config['allowed_types'] = '*';
		$config['upload_path'] = 'uploads/images/columist_article/';//$this->config->item('digital_products_path');
		$config['remove_spaces'] = true;
		$this->load->library('upload', $config);
		
		/*if($this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
		} else {
			$data['error']	= $this->upload->display_errors();
			redirect('columist_article/updateData/'.$newsId, '');
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
			$value12= $this->Columist_article_model->get_newsId();
		
			foreach($value12 as $val):
			$news_id = $val->news_id;
			endforeach;
			if($news_id!='' || $news_id!=0){
				$finalnewsId=$news_id+1;
			}
			else{
				$finalnewsId=1;
			}
			$finalnewsId=$news_id+1;
			$save['n_id']=$this->input->post('newsId');
			$save['news_id']		= $finalnewsId;
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
			$save['seo_details']		= $this->input->post('seo_details');

			$currentDate = date("l d F Y");
			$differencetolocaltime=6;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i A", $new_U);;


			$save['date']	    = $currentDate;
			$save['time']		= $ptime;
						
			$save['top_news']		= $this->input->post('top_news');
			$save['top_desk_news']		= $this->input->post('top_desk_news');
			$save['breaking_news']		= $this->input->post('breaking_news');
			$save['status']		= $this->input->post('status');
			
			$this->Columist_article_model->update($save);
			$this->srss();
			redirect('columist_article/index', '');
	}
	function delete()
	{
		$id[]=$this->input->get('cid');
		$catId=$this->input->get('catId');
		$this->Columist_article_model->delete_news($id);
		if($catId!=""){
			//$data['main_content']="columist_article/news_list?cid=".$catId;
			//$this->load->view('deshboard_templete', $data);
			redirect('columist_article/index?cid='.$catId, '');
		}
		else{
			redirect('columist_article/index', '');
		}
	}
/********************************************************************
delete page
********************************************************************/


function breaking_news_index()
	{
		$field_name = $this->input->post('field_name');
		$data['page_title']	="News";
		$data['brnewslist']		= $this->Columist_article_model->get_breaking_news_index($field_name);
		$data['main_content']="columist_article/breaking_news_list";
        $this->load->view('deshboard_templete', $data);
		
	}
	function breaking_news_approved()
	{
		$approve_val=$this->input->get('approve_val');
		$data['category']=$this->Columist_article_model->get_breaking_news_approve($approve_val);   
		redirect('columist_article/breaking_news_index', '');
	}
	
	
	function breaking_news_deapproved()
	{
		$deapprove_val=$this->input->get('deapprove_val');
		$data['category']=$this->Columist_article_model->get_breaking_news_deapprove($deapprove_val);   
		redirect('columist_article/breaking_news_index', '');
	}
	function breaking_news_create()
	{
		$data['page_title']	="Article";
		$data['categorys']		= $this->Columist_model->all_columist();
		$data['main_content']="columist_article/create_breaking_news";
         $this->load->view('deshboard_templete', $data);
	}
	function breaking_news_updateData($id)
	{
		$data['n_id']=$id; 
		$data['categorys']		= $this->Columist_model->all_columist();
		$data['newsdata']=$this->Columist_article_model->get_breaking_news_update($id);   
		$data['main_content']="columist_article/update_breaking_news";
        $this->load->view('deshboard_templete', $data);
	}
	
	function breaking_news_form()
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
		
		$this->Columist_article_model->breaking_news_save($save);
		redirect('columist_article/breaking_news_index', '');
	}
	
	function breaking_news_link_form()
	{
		$differencetolocaltime=6;
		$new_U=date("U")-$differencetolocaltime*3600;
		$ptime = date("H:i:s A", $new_U);;
		
		$save['n_id']=$this->input->post('newsId');
		$save['category']	= $this->input->post('category'); 
		$save['headline']		= $this->input->post('headline');
		$save['seo_title']		= $this->input->post('seo_title');
		$save['key_word']	    = $this->input->post('key_word');
		$save['seo_details']		= $this->input->post('seo_details');
		$save['time']		= $this->input->post('time_line');
		$currentDate = date("l d F Y");
		$save['date']	    = $currentDate;
			
		$save['status']		= $this->input->post('status');
		
		$this->Columist_article_model->breaking_news_update($save);
		redirect('columist_article/breaking_news_index', '');
	}
	
	function breaking_news_delete()
	{
		$id[]=$this->input->get('nid');
		$this->Columist_article_model->delete_breaking_news($id);
		redirect('columist_article/breaking_news_index', '');
	}
}
?>
