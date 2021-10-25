<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
.fb{
	widows:30px;
	height:30px;
	float:left;
	background: url(<?php echo base_url();?>assets/images/front/fb.png) no-repeat;
	padding:5px 3px;

}
.tw{
	widows:30px;
	height:30px;
	background: url(<?php echo base_url();?>assets/images/front/tw.png) no-repeat;
	float:left;
	padding:5px 3px;
}
.google{
	widows:30px;
	height:30px;
	background: url(<?php echo base_url();?>assets/images/front/google.png) no-repeat;
	float:left;
	padding:5px 3px;
}
.prin{
	widows:30px;
	height:30px;
	background: url(<?php echo base_url();?>assets/images/front/prin.png) no-repeat;
	float:left;
	padding:5px 3px;
}
.zoom_o{
	widows:30px;
	height:30px;
	background: url(<?php echo base_url();?>assets/images/front/zo.png) no-repeat;
	float:left;
	padding:5px 3px;
}
.zoom_in{
	widows:30px;
	height:30px;
	background: url(<?php echo base_url();?>assets/images/front/zi.png) no-repeat;
	float:left;
	padding:5px 3px;
}
</style>
</head>
<body>
<?php

$cat_id = $_REQUEST['cat_id'];

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];

if(isset($_REQUEST['id'])){
	$n_id = $_REQUEST['id'];
	$hit_query=mysql_query("select read_count from news_manage where n_id='$n_id'");
	$row=mysql_fetch_array($hit_query);
	$hitVal=$row['read_count'];
	
	if($hitVal!=0){
	$total_hit=$hitVal+1;
	}
	else{
	$total_hit=1;
	}
	mysql_query("update news_manage set read_count='$total_hit' where n_id='$n_id'");
}
?>
	<div class="clearfloat"></div> 
<div class="container">
     	<div class="con_row1">
     		<div class="con_row1_left">শিরোনাম</div>
				
     		<div class="con_row1_right">
            <marquee scrollamount="2" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
			<?php 
			/*$differencetolocaltime=11;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("H:i", $new_U);;
			
			 $page = $_SERVER['PHP_SELF'];
			 $sec = "900";
			 header("Refresh: $sec; url=$page");*/
			 
            foreach($breaking_news as $bnews):
			$dtime=$bnews->time;
			/*if($dtime <= $ptime){
            echo "";
			}
			else{*/
			echo $bnews->headline.'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;';
			//}
            endforeach;
            ?>
            </marquee> 
     		</div>
     	</div>
			
     	<div class="details_con1">
     		<div class="details_con1_left">
							<div class="common_header"><a href="<?php echo base_url();?>">প্রচ্ছদ </a> &gt;&gt;  <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $cat_id; ?>&&page=1"><?php echo $category_name;?></a></div>							
							<div class="news_con">
								<div class="news_con_row_1">
									<h4><?php echo $news_details['headline'];?></h4>
								</div>
							
     		<div class="news_con_row_2">
     			<div class="ncr_left" style="font-size:16px; padding:0 0 10px 10px;">
				 <?php
				 $pdate=$news_details['date'];
				 $ptime=$news_details['time'];
                include('bangladate.php'); 
				$convertedDATE = str_replace($engDATE, $bangDATE, $pdate);
				$convertedtime= str_replace($engDATE, $bangDATE, $ptime);

				//echo $convertedDATE;
				//echo $convertedtime; 
				?>
                
				<?php echo $news_details['auther_name'];?>  <br /> হালনাগাদ :<?php echo $convertedDATE.',';?>
				<?php echo $convertedtime;?></div>
								
     			<div class="ncr_right"  style="float:right; text-align:right; ">
     				<div class="iconbox">
             <div class="additional_info_container mb10 oh">
				<div class="oh pb1 top_comment_count_and_social">
					<div class="fr">
						<div class="bottom pb0"  style="float:right;  text-align:right">
							<a class="mr10 social_media_icon_18x18 social_media_fb_18x18 addthis_facebook_share" title="Share Facebook" href="javascript:"><div class="fb">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
						<a class="mr10 social_media_icon_18x18 social_media_twitter_18x18 addthis_twitter_share" title="Share Twitter" href="javascript:"><div class="tw">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
							<a class="mr10 social_media_icon_18x18 social_media_google_18x18 addthis_google_share" title="Share Google Plus" href="javascript:"><div class="google">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
							<a href="<?php echo base_url();?>index/print_news?id=<?php echo $n_id;?>&&cat_id=<?php echo $cat_id;?>"  target="_blank"><div class="prin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
							
							
							<a class="mr10 social_media_icon_18x18 social_media_zoom_out_18x18 jw_content_zoom_out" title="Zoom Out" rel="jw_detail_content_holder" href="javascript:"><div class="zoom_o">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>
							<a class="social_media_icon_18x18 social_media_zoom_in_18x18 jw_content_zoom_in" title="Zoom In" rel="jw_detail_content_holder" href="javascript:"><div class="zoom_in">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a>						</div>
					</div>
				</div>
			</div>	

         </div>
         </div>
     		</div>
							
     		<div class="news_con_row_3">
            <div class="picture_details">
            <img src="<?php echo base_url();?>uploads/images/news/<?php echo $news_details['image'];?>" width="660" height="400" class="smimg" />
            </div>
     		<div style="color:#000; font-size:15px; font-style:italic;"><?php echo $news_details['image_title'];?></div></div>
                
					
                    
              <?php 
			if($news_details['vedio_top']==1){
			?>  
            <div class="news_con_row_3">
            <div class="vedio_details">
            <iframe width="650" height="400" src="<?php echo $news_details['vedio'];?>" frameborder="0" longdesc="0" hspace="0" marginheight="20" ></iframe>
            </div>
     		</div>
            <?php
            }
			?>
                   		
     		<div id="news_con_row_4" class="jw_detail_content_holder content pb10 oh">
     			<p class="news_txt2" style="font-size:24px;"><?php echo $news_details['full_description'];?></p>
     		</div>
            
            
            <?php 
			if($news_details['vedio_bottom']==1){
			?>  
            <div class="news_con_row_3">
            <div class="vedio_details">
            <iframe width="650" height="400" src="<?php echo $news_details['vedio'];?>" frameborder="0" longdesc="0" hspace="0" marginheight="20" ></iframe>
            </div>
     		</div>
            <?php
            }
			?>
			</div>
							
							
     	
     		<div class="clearfloat"></div>
     		<div class="soc_box1" style="margin-top:20px;">
            <span class='st_sharethis_large' displayText='ShareThis'></span>
            <span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_twitter_large' displayText='Tweet'></span>
            <span class='st_linkedin_large' displayText='LinkedIn'></span>
            <span class='st_pinterest_large' displayText='Pinterest'></span>
            <span class='st_email_large' displayText='Email'></span>
            
            </div>
							
							<div class="soc_box3">
                            <?php include('disqus.php');?>
                            </div>
     		</div>
     		<div class="details_con1_right">
								<?php include('related_news.php');?>
								
								<?php //include('rel_cat_news.php');?>
								<div class="common_adbox_1">
                                	<?php include('facebook.php');?>
                                </div>
								
							</div>
     		</div>
     	<div class="clearfloat"></div>
     	<div class="clearfloat"></div>
 			<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>		
</div>	
<div class="clearfloat"></div>
</body></html>