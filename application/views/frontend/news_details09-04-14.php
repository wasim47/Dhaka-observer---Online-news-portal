<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
				
     		<div class="con_row1_right"><marquee scrollamount="2" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
			<?php 
			$differencetolocaltime=6;
			$new_U=date("U")+$differencetolocaltime*3600;
			$ptime = date("h:i A", $new_U);;
			
			 $page = $_SERVER['PHP_SELF'];
			 $sec = "900";
			 header("Refresh: $sec; url=$page");
			 
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
			
     	<div class="con_row2">
     		<div class="con_row2_col_1"><img src="<?php echo base_url();?>assets/images/front/ad1.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_2"><img src="<?php echo base_url();?>assets/images/front/ad2.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_3"><img src="<?php echo base_url();?>assets/images/front/ad3.jpg" width="314" height="110" class="img_ad1"></div>
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
								
     			<div class="ncr_right"  style="float:right; text-align:right">
     				<div class="iconbox">
             <div class="additional_info_container mb10 oh">
				<div class="oh pb1 top_comment_count_and_social">
					<div class="fr">
						<div class="bottom pb0"  style="float:right; text-align:right">
							<a class="mr10 social_media_icon_18x18 social_media_fb_18x18 addthis_facebook_share" title="Share Facebook" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/fb.png" width="30" height="30"></a>
							<a class="mr10 social_media_icon_18x18 social_media_twitter_18x18 addthis_twitter_share" title="Share Twitter" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/tw.png" width="30" height="30"></a>
							<a class="mr10 social_media_icon_18x18 social_media_google_18x18 addthis_google_share" title="Share Google Plus" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/google.png" width="30" height="30"></a>
							<a class="mr10 social_media_icon_18x18 social_media_print_18x18 addthis_print" title="Print" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/prin.png" width="30" height="30"></a>
							<!--<a class="mr10 social_media_icon_18x18 social_media_share_18x18 addthis_share" title="More Share Options" href="javascript:">&nbsp;</a> -->
							
							<a class="mr10 social_media_icon_18x18 social_media_zoom_out_18x18 jw_content_zoom_out" title="Zoom Out" rel="jw_detail_content_holder" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/zo.png" width="30" height="30"></a>
							<a class="social_media_icon_18x18 social_media_zoom_in_18x18 jw_content_zoom_in" title="Zoom In" rel="jw_detail_content_holder" href="javascript:"><img src="<?php echo base_url();?>assets/images/front/zi.png" width="30" height="30"></a>						</div>
					</div>
				</div>
			</div>	

         </div>
         </div>
     		</div>
			<?php 
			if(isset($news_details['image'])){
			?>				
     		<div class="news_con_row_3">
            <div class="picture_details">
            <img src="<?php echo base_url();?>uploads/images/news/<?php echo $news_details['image'];?>" width="660" height="400" class="smimg" />
            </div>
     		<div style="color:#000; font-size:15px; font-style:italic;"><?php echo $news_details['image_title'];?></div></div>
                <?php
                }
				?>
					
                    
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
							<div class="soc_box2"><img src="<?php echo base_url();?>assets/images/front/ad4.jpg" width="656" height="140" class="img_ad1"></div>
							<div class="soc_box3">
                            <?php include('disqus.php');?>
                            </div>
     		</div>
     		<div class="details_con1_right">
								<?php include('related_news.php');?>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg"></div>
								<?php include('rel_cat_news.php');?>
								<div class="common_adbox_1">
                                	<?php include('facebook.php');?>
                                </div>
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
								<!--<div class="fbcon"><img src="<?php echo base_url();?>assets/images/front/fb.jpg" width="312" height="332" class="smimg"></div>-->
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad14.jpg" width="314" height="132" class="smimg"></div>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad18.jpg" width="332" height="159" class="smimg"></div>
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