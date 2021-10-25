<link rel="stylesheet" href="<?php echo base_url();?>assets/res/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/res/jquery.colorbox-min.js"></script>
<?php
$showlightbox="0";
if(!isset($_COOKIE['beenhere'])) { 
    setcookie("beenhere", '1');
		$showlightbox="1";
}
?>
<?php	
if($showlightbox){ ?>
<script type="text/javascript">  
$(document).ready(function(){
	setTimeout(function() {
		$.fn.colorbox({href:"<?php echo base_url();?>index/subscriber", open:true});  
	}, 1000);
});  
</script> 
<?php  
} 
?>
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
				
     		<div class="con_row1_right"><marquee scrollamount="2" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()">
			<?php 
			$differencetolocaltime=11;
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
			
            
             
            <?php
			/*$currentDate = date("l d F Y");
			$differencetolocaltime=11;
                $new_U=date("U")+$differencetolocaltime*3600;
                $ptime = date("g:i A", $new_U);;*/
				
             foreach($br_news as $bnews1):
                //$dtime=$bnews1->time;
				//$date=$bnews1->date;
                //if($dtime >= $ptime && $date==$currentDate){
			?>
            <div class="con_row1" id="br_bnews">
     					
     		<div class="con_row1_right" style="height:auto; width:100%; margin:0; padding:0px;">
            <div id="rollBanner1" style="height:auto;">
        	<p>	
				<?php 
                foreach($br_news as $bnews):
				$headline=$bnews->headline;
				$image_br=$bnews->image;
				$short_description=$bnews->short_description;
				$n_id_br=$bnews->n_id;
				$category_br=$bnews->category;
				?>
                
                <div style="width:100%; height:auto; margin:0px 0px; padding:0px; float:left;">
   <a href="<?php echo base_url();?>index/news_details?brid=<?php echo $n_id_br;?>&&cat_id=<?php echo $category_br;?>" style="text-decoration:none; color:#000;">                    
   <div style="width:17%; height:auto; float:left; padding:5px;">
         <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_br; ?>" width="130" height="100" style="float:left; width:130px; height:100px; padding:5px; margin-right:10px; border:1px solid #ccc; ">
  </div>
   <div style="width:75%; height:auto; float:left; padding:5px;margin:0 15px;">
   <div style=" color:#FFFFFF; font-size:23px; font-weight:normal;"><?php echo $headline; ?></div>
   <div style="color:#FFFFFF; font-size:16px; font-weight:normal; "><?php echo $short_description; ?></div>
   </div>                    
</a>
</div>
                        
                        
                        
                <?php
                //}
                endforeach;
                ?>
        	</p>
        	</div> 
     		</div>
     	</div>
        <script type="text/javascript">
        rollBanner("rollBanner1",25);
    </script>
        <?php
		//}
        endforeach;
                ?>
                
                
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
						<div class="bottom pb0"  style="float:right; text-align:right; vertical-align:bottom;margin-top:30px;">
                        
<a class="mr10 social_media_icon_18x18 social_media_fb_18x18 addthis_facebook_share" href="javascript:" 
onmouseover="document.getElementById('fb').style.display='none'; document.getElementById('fb_h').style.display='inline'"
onmouseout="document.getElementById('fb_h').style.display='none'; document.getElementById('fb').style.display='inline'" style="text-decoration:none;">
            <img src="<?php echo base_url();?>assets/images/front/fb.png" width="20" height="20" id="fb" border="0">
            <img src="<?php echo base_url();?>assets/images/front/fb_h.png" width="20" height="20" id="fb_h" style="display:none">
                            </a>
                            
                            
                            
                            
<a class="mr10 social_media_icon_18x18 social_media_twitter_18x18 addthis_twitter_share" title="Share Twitter" href="javascript:"
onmouseover="document.getElementById('tw').style.display='none'; document.getElementById('tw_h').style.display='inline'"
onmouseout="document.getElementById('tw_h').style.display='none'; document.getElementById('tw').style.display='inline'" style="text-decoration:none;">
<img src="<?php echo base_url();?>assets/images/front/tw_h.png" width="20" height="20" border="0" id="tw_h" style="display:none">
    <img src="<?php echo base_url();?>assets/images/front/tw.png" width="20" height="20" border="0" id="tw">
    
</a>

<a class="mr10 social_media_icon_18x18 social_media_google_18x18 addthis_google_share" title="Share Google Plus" href="javascript:"onmouseover="document.getElementById('google').style.display='none'; document.getElementById('google_h').style.display='inline'"
onmouseout="document.getElementById('google_h').style.display='none'; document.getElementById('google').style.display='inline'" style="text-decoration:none;">
        <img src="<?php echo base_url();?>assets/images/front/google.png" width="20" height="20" id="google">
        <img src="<?php echo base_url();?>assets/images/front/google_h.png" width="20" height="20" id="google_h" style="display:none">
		</a>
							
<a href="<?php echo base_url();?>index/print_news?id=<?php echo $n_id;?>&&cat_id=<?php echo $cat_id;?>"  target="_blank"
onmouseover="document.getElementById('prin').style.display='none'; document.getElementById('prin_h').style.display='inline'"
onmouseout="document.getElementById('prin_h').style.display='none'; document.getElementById('prin').style.display='inline'" style="text-decoration:none;">
<img src="<?php echo base_url();?>assets/images/front/prin.png" width="20" height="20" id="prin">
<img src="<?php echo base_url();?>assets/images/front/prin_h.png" width="20" height="20" id="prin_h" style="display:none">
</a>
							
							
<a class="mr10 social_media_icon_18x18 social_media_zoom_out_18x18 jw_content_zoom_out" title="Zoom Out" rel="jw_detail_content_holder" href="javascript:"
onmouseover="document.getElementById('zo').style.display='none'; document.getElementById('zo_h').style.display='inline'"
onmouseout="document.getElementById('zo_h').style.display='none'; document.getElementById('zo').style.display='inline'" style="text-decoration:none;">

<img src="<?php echo base_url();?>assets/images/front/zo.png" width="20" height="20" id="zo">
<img src="<?php echo base_url();?>assets/images/front/zo_h.png" width="20" height="20" id="zo_h" style="display:none">
</a>

							
<a class="social_media_icon_18x18 social_media_zoom_in_18x18 jw_content_zoom_in" title="Zoom In" rel="jw_detail_content_holder" href="javascript:"
onmouseover="document.getElementById('zi').style.display='none'; document.getElementById('zi_h').style.display='inline'"
onmouseout="document.getElementById('zi_h').style.display='none'; document.getElementById('zi').style.display='inline'" style="text-decoration:none;">

<img src="<?php echo base_url();?>assets/images/front/zi.png" width="20" height="20" id="zi">
<img src="<?php echo base_url();?>assets/images/front/zi_h.png" width="20" height="20" id="zi_h" style="display:none">
</a>

</div>
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
							<div class="soc_box2">
                            <img src="<?php echo base_url();?>assets/images/front/ekhanei.jpg" width="656" height="140" class="img_ad1"></div>
							<div class="soc_box3">
                            <?php include('disqus.php');?>
                            </div>
     		</div>
     		<div class="details_con1_right">
								<?php include('related_news.php');?>
								<div class="common_adbox_1">
                                <a href="javascript:void()" target="_blank">
                      <img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg">
                      </a>
                                </div>
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