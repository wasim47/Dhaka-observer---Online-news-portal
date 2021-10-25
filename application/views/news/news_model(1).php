<?php
Class News_model extends CI_Model
{
	
	function get_newsId() 
	{
	  $result	= $this
	  ->db
	  ->order_by('n_id', 'desc')
	   ->limit(1)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	function get_all_news() 
	{
	  $result	= $this
	  ->db
	  ->order_by('n_id', 'desc')
           ->limit(30)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	/*function get_news($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->order_by('n_id', 'desc')
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
	}*/
	function get_news($field_name,$cid) 
	{
				$userId=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('username');
			/*if($user_type=="Super Admin"){			
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				//->group_by('n_id')
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				//->group_by('n_id')
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  //->group_by('n_id')
				  ->order_by('n_id', 'desc')
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
			}
			else{*/
				if($field_name!=""){
			    $query = $this
				->db
				->like('headline', $field_name)
				//->where('user_id', $userId)
				//->group_by('n_id')
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				//->where('user_id', $userId)
				//->group_by('n_id')
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  //->where('user_id', $userId)
				 // ->group_by('n_id')
				  ->order_by('n_id', 'desc')
				  ->limit(30)
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
			//}
	}
	
	
	
	function update_squnce($seqence,$id)
	{
		$query = "select * from news_manage where squence='$seqence'";
			$results = mysql_query($query);
			$row= mysql_fetch_array($results);
			$sequenceVal=$row['squence'];
			$nid=$row['n_id'];
			
			if($seqence!=$sequenceVal){
				$update=mysql_query("update news_manage set squence='$seqence' where n_id='$id'");
			}
			else{
				$query1 = "select * from news_manage where n_id='$id'";
				$results1 = mysql_query($query1);
				$row1= mysql_fetch_array($results1);
				$sequenceVal1=$row1['squence'];
				$nid1=$row1['n_id'];
			
				$update=mysql_query("update news_manage set squence='$sequenceVal1' where n_id='$nid'");
				$update1=mysql_query("update news_manage set squence='$seqence' where n_id='$id'");
			}
	}
	
	function get_allnews($field_name,$cid) 
	{
				$userId=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('username');
				if($field_name!=""){
			    $query = $this
				->db
				->like('headline', $field_name)
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				elseif($cid!=""){
			    $query = $this
				->db
				->where('category', $cid)
				//->where('user_id', $userId)
				//->group_by('n_id')
				->order_by('n_id', 'desc')
				->get('news_manage');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  //->where('user_id', $userId)
				 // ->group_by('n_id')
				  ->order_by('n_id', 'desc')
				  ->get('news_manage');
				  $result	= $result->result();
				  return $result;
				}
			//}
	}
	
	
	
	function breaking_news()
	{
		 $currentDate = date("l d F Y");
		 $differencetolocaltime=11;
		$new_U=date("U")+$differencetolocaltime*3600;
		$ptime = date("g:i A", $new_U);;
		$query = $this
				->db
				->where('status', '1')
				->where('date', $currentDate)
				->group_by('news_id')
				->order_by('n_id', 'desc')
				->limit(1)
				->get('breaking_news');
		return $query->result();
	}
	
	
	
	
	function get_breaking_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('breaking_news', '1')
				->order_by('n_id', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	
	
	function get_related_news()
	{
		//$threecurrentDate = Date('l d F Y', strtotime("-3 days"));
		//$currentDate = date('l d F Y');
		//$NewDate=Date('l d F Y', strtotime("-3 days"));
			
			
//$query=mysql_query("SELECT * FROM news_manage WHERE date BETWEEN '$currentDate' AND '$threecurrentDate' AND read_count !=0 AND status=1 order by read_count desc limit 9");

	$this->db->select('*');
    $this->db->from('news_manage');
    $datetwo=date('Y-m-d', strtotime("-3 days"));
    $dateone=date('Y-m-d');
	$this->db->where('count_date >=', $datetwo);
    $this->db->where('count_date <=', $dateone);
	$this->db->where('read_count !=', '0');
	$this->db->order_by('read_count', 'desc');
	$this->db->limit(9);
    $query = $this->db->get();
    $results = $query->result();
	return $results;

		/*$query = $this
				->db
				->where('status', '1')
				->where('read_count !=', '0')
				->order_by('read_count', 'desc')
				->limit(9)
				->get('news_manage');
		return $query->result();*/
	}
	
	
	function get_most_read_news($cat_id)
	{
		$query = $this
				->db
				->where('status', '1')
				->where('read_count !=', '0')
				->where('category', $cat_id)
				->order_by('read_count', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	
	
	function get_distric_news()
	{
		$query = $this
				->db
				->where('status', '1')
				->where('category', '4')
				->order_by('n_id', 'desc')
				->limit(10)
				->get('news_manage');
		return $query->result();
	}
	function get_cat_rel_news($cat_id)
	{
		$query = $this
				->db
				->where('status', '1')
				->where('category', $cat_id)
				->order_by('n_id', 'desc')
				->limit(3)
				->get('news_manage');
		return $query->result();
	}
	
	function get_desk_news_gallery($cat_id,$scat_id) 
	{
	if($scat_id!=""){
	$query = $this
				->db
				->where('top_news', '1')
				->where('sub_category', $scat_id)
				->order_by('n_id', 'desc')
				->limit(5)
				->get('news_manage');
				$row = $query->result();		
				return $row;
	}
	else{
	$query = $this
				->db
				->where('top_news', '1')
				->where('category', $cat_id)
				->order_by('n_id', 'desc')
				->limit(5)
				->get('news_manage');
				$row = $query->result();		
				return $row;
	}
			    
	}
	
	
	function get_desk_news() 
	{
			    $query = $this
				->db
				->where('top_desk_news', '1')
				->where('squence !=', '0')
				->group_by('news_id')
				->order_by('squence', 'asc')
				->limit(8)
				->get('news_manage');
				$row = $query->result();		
				return $row;
	}
	
	
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('n_id', $approve_val);
		$this->db->update('news_manage', $setval);
		return false;
	}
	
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('n_id', $deapprove_val);
		$this->db->update('news_manage', $setval);
		return false;
	}
	
	
	function get_news_update($id)
	{
		/*$this->db
			 ->where('id', $id);
			  $result	= $this->db->get('news');
			  $result	= $result->result();
			  return $result;*/
		$query = $this
				->db
				->select('*')
				->where('n_id', $id)
				->limit(1)
				->get('news_manage');
		$row = $query->row_array();		
		return $row;
	}
	
	
	/*function save($save)
	{
			$this->db->insert('news_manage', $save);
			return $this->db->insert_id();
	}*/
	
	
	function save($save)
	{
			//$currentDate = date("l d F Y");
			$differencetolocaltime=11;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i A", $new_U);;
			$currentDate = date("l d F Y", $new_U);;
			$count_date = date("Y-m-d");
			
			$cols=$save['category'];
			$array_length=count($cols);
			for($i=0; $i<$array_length; $i++)
			{
				$data = array(
				   'headline' => $save['headline'],
				   //'n_id' => $save['n_id'],
				   'news_id' => $save['news_id'],
				   'user_id' => $save['user_id'],
				   'category' => $cols[$i],
				   'sub_category' => $save['sub_category'],
				   'image' => $save['image'],
				   'image_title' => $save['image_title'],
				   'vedio' => $save['vedio'],
				   'auther_name' => $save['auther_name'],
				   'short_description' => $save['short_description'],
				   'full_description' => $save['full_description'],
				   'seo_title' => $save['seo_title'],
				   'key_word' => $save['key_word'],
				   'seo_details' => $save['seo_details'],
				   'top_news' => $save['top_news'],
				   'top_desk_news' => $save['top_desk_news'],
				   'breaking_news' => $save['breaking_news'],
				   'last_updated'  => $save['last_updated'],
				   'popular_news'		=> $save['popular_news'],
				   'status' => $save['status'],
				   'time' => $ptime,
				   'date' => $currentDate,
				   'count_date' => $count_date
				);
				
			$this->db->insert('news_manage', $data);
				
			  
			 $query = $this
				->db
				->select('*')
				->order_by('n_id','desc')
				->limit(1)
				->get('news_manage');
			  $row = $query->result();
			  	
			  foreach($row as $news){
				  $headline = $news->headline;
				  $image = $news->image;
				  $short_desc=$news->short_description;
				  $n_id = $news->n_id;
				  $category=$news->category;
			  }	
			  
			  
			  $query = $this
				->db
				->select('*')
				->get('subscriber');
			  $row = $query->result();	
			  foreach($row as $val){
				  $name = $val->name;
				  $email = $val->email;
				  $email_array[]=$email;
			  }	
			  
			  
			$array_email =join(',',$email_array);
			$tomail=$array_email;
			$frommail="wasim.winux@gmail.com";
			$subject=$save['headline'];
			$this->email->set_newline('\r\n');
				$email_body ="<table width='100%' height='365' border='0' cellpadding='0' align='center' cellspacing='0' style=' border:2px solid #5CAB56; border-radius:13px; padding-left:20px;'>
		
  <tr style='background-color:#990100'>
			<th width='26%' height='118' align='center'>
	<img src='http://dhakaobserver.com/assets/images/front/logo.png' />    </th>
    <th colspan='2' align='left'>
    <span style='font-size:30px; color:#FFFFFF; vertical-align:top'>Dhaka Observer</span>
    <br><span style='color:#FFFFFF'>24x7 Latest News From Bangladesh</span>    </th>
		</tr>
		
		<tr>
			<th height='47' colspan='3' align='left' 
			style='font-size:28px; color:#990100; text-decoration:none;'>
			$headline</th>
		</tr>
		
		<tr>
		<td height='23' colspan='3' align='right'>&nbsp;</td>
		</tr>
			
		<tr>
			<td height='132' align='center' valign='top'>
            <img src='http://dhakaobserver.com/uploads/images/news/$image' width='200' height='170' />            </td>
			<td width='3%' align='left' valign='top'>
		  <span style='color: #588EB0;font-weight: bold;'>:</span></td>
		  <td width='71%' valign='top'><span style='font-size: 18px; color: #588EB0;'>$short_desc</span></td>
		</tr>
		<tr>
			<td height='23' colspan='3' align='center'>
            <a href='http://dhakaobserver.com/index/news_details?id=$n_id&&cat_id=$category'>For More Details Click Here </a></td>
		  </tr>
		
</table>";
			
			//$this->email->initialize($config);
			$this->email->from($frommail, 'Dhaka Observer');
			$this->email->to($tomail);
			//$this->email->bcc();
			$this->email->subject($subject);
			$this->email->message($email_body);
			$this->email->send();
			
			}
			return $this->db->insert_id();
	}
	
	function update($save)
	{
			$this->db->where('n_id', $save['n_id']);
			$this->db->update('news_manage', $save);
			return false;
	}
	
	function delete_news($id)
	{
		//delete the page
		$this->db->where('n_id', $id);
		$this->db->delete('news_manage');
	
	}
	




/************** BREAKING NEWS ****************************/
function get_brnewsId() 
	{
	  $result	= $this
	  ->db
	  ->order_by('news_id', 'desc')
	   ->limit(1)
	  ->get('breaking_news');
	  $result	= $result->result();
	  return $result;
	}
function get_breaking_news_index($field_name) 
	{
			  if($field_name!=""){
			    $query = $this
				->db
				->where('headline', $field_name)
				->order_by('n_id', 'desc')
				->get('breaking_news');
				$row = $query->result();		
				return $row;
				}
				else{
				  $result	= $this
				  ->db
				  ->order_by('n_id', 'desc')
				  ->get('breaking_news');
				  $result	= $result->result();
				  return $result;
				}
	}
	
	
	function get_breaking_news_approve($approve_val)
	{
	   $setval = array(
		   'status' => 1,
		);
		//$array_val[]=$approve_val;
		//$array=join($array_val,'');
		//$this->db->where_in('cid', $array);
		$this->db->where('n_id', $approve_val);
		$this->db->update('breaking_news', $setval);
		return false;
	}
	
	function get_breaking_news_deapprove($deapprove_val)
	{
		$setval = array(
               'status' => 0,
         );
		$this->db->where('n_id', $deapprove_val);
		$this->db->update('breaking_news', $setval);
		return false;
	}
function get_breaking_news_update($id)
	{
		$query = $this
				->db
				->select('*')
				->where('n_id', $id)
				->limit(1)
				->get('breaking_news');
		$row = $query->row_array();		
		return $row;
	}
	
	
	function breaking_news_save($save)
	{
			$this->db->insert('breaking_news', $save);
			return $this->db->insert_id();
	}
	
	function breaking_news_update($save)
	{
			$this->db->where('n_id', $save['n_id']);
			$this->db->update('breaking_news', $save);
			return false;
	}
	
	function delete_breaking_news($id)
	{
		//delete the page
		//$arr[]=$id;
		$array=join(',',$id);
		$this->db->where('n_id IN ('.$array.')',NULL, FALSE);
		//$this->db->where('n_id IN ("$array")');
		//$this->db->where('n_id', $id);
		$this->db->delete('breaking_news');
	
	}

}