
<?php
$cat_id=$_REQUEST['cat_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dhaka Observer</title>
<script type="text/javascript">$(document).ready(function(){$().orion({speed: 500,animation: "zoom"});});</script>
<script>
$(document).ready(function(){
	$("#district_news").hide();
	$("#mostViewd").css("background-color" , "#DFDFDF");
	$("#mostViewd").css("color" , "#000");
	
	$("#mostViewd").click(function(){
		$("#mostViewd").css("background-color" , "#DFDFDF");
		$("#mostViewd").css("color" , "#000");
		$("#districtNews").css("background-color" , "#990100");
		$("#districtNews").css("cursor" , "pointer");
		$("#districtNews").css("color" , "#fff");
		$("#most_viewd").show();
		$("#district_news").hide();
	});
	
	$("#districtNews").click(function(){
	$("#districtNews").css("background-color" , "#DFDFDF");
	$("#districtNews").css("color" , "#000");
	$("#mostViewd").css("background-color" , "#990100");
	$("#mostViewd").css("cursor" , "pointer");
	$("#mostViewd").css("color" , "#fff");
		$("#district_news").show();
		$("#most_viewd").hide();
	});
	
	
});


</script>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/images2/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/images2/jquery_002.js"></script>
-->  <script type="text/javascript" src="<?php echo base_url();?>assets/js/front/jquery-1.7.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade',
                speed:  1500 
	});
});
</script>
<script type="text/javascript">
  $(function() {
   // $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    ////$('img.image1').data('ad-title', 'Title through $.data');
   // $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
   // $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    /*setTimeout(function() {
      galleries[0].addImage("<?php echo base_url();?>assets/images/thumbs/t7.jpg", "<?php echo base_url();?>assets/images/7.jpg");
    }, 1000);
    setTimeout(function() {
      galleries[0].addImage("<?php echo base_url();?>assets/images/thumbs/t8.jpg", "<?php echo base_url();?>assets/images/8.jpg");
    }, 2000);
    setTimeout(function() {
      galleries[0].addImage("<?php echo base_url();?>assets/images/thumbs/t9.jpg", "<?php echo base_url();?>assets/images/9.jpg");
    }, 3000);
    setTimeout(function() {
      galleries[0].removeImage(1);
    }, 4000);*/
    
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  </script>
		<script src="<?php echo base_url();?>assets/js/front/jquery.colorbox.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/front/colorbox.css" />
		<script>
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			});
			/*function ifame_data(){
			alert("IN");
			
			window.location.href='http://www.google.com';
			//$("a[href='" + linkYoutube + "']").addClass("iframe-link");
			
				//alert('dfs');
			}*/
		</script>
        <style type="text/css">
div.iframe-link {
position: relative;
float: left;
width: 150px;
height: 150px;
margin: 0 1em 1em 0;
z-index:99999;
}
a.iframe-link {
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
z-index:99999;

}

</style>
</head>

<body>
<div class="container">
<div class="details_con1">
     		<div class="details_con1_left">
							<div class="common_header">Sports</div>
							
							<div class="sp_box1">
								<div class="sp_box1_left">
                    <?php
                    $resp2=mysql_query("select * from vedio_gallery order by photo_album_id desc limit 4");
                    while($row=mysql_fetch_array($resp2))
                    {
					 $vedio_id=$row['photo_album_id'];
					 $vedio_title=$row['photo_album_name'];
					 $youtube_link=$row['vedio_link'];
					 $image=$row['album_ima'];
					?>
					<div class="sp_box1_left_img">
                    <div>
           <a href='<?php echo $youtube_link;?>' class='iframe' style="font-size:11px; font-weight:normal; text-decoration:none;">
                    <img src="<?php echo base_url();?>uploads/images/vedio/<?php echo $image;?>" width="200" height="150" /></a>
 <!--<iframe width="200" height="150" src="<?php echo $youtube_link;?>"
                    frameborder="0" style="overflow:hidden; z-index:1; position:relative" longdesc="0" hspace="0" marginheight="20"></iframe>-->
                    </div>


 <!--                   <iframe width="200" height="150" src="<?php echo $youtube_link;?>"
frameborder="0" style="overflow:hidden; z-index:-100; position:relative" longdesc="0" hspace="0" marginheight="20"></iframe>

<a href='<?php echo $youtube_link;?>' class='iframe' style="font-size:11px; font-weight:normal; text-decoration:none; position:absolute; z-index:300; margin-top:-55px; float:left; color:#fff; margin-left:157px; background-color:#1B1B1B; opacity:0.6; height:25px; width:40px;">Vedio</a>-->
                    </div>
                    <?php
                    }
					?>
								</div>
								<div class="sp_box1_right">
									<div class="sp_box1_right_sl">
                                   
										<div class="sl_item">
                                        <!--<img src="<?php echo base_url();?>uploads/images/news/<?php echo $imagess; ?>" width="405" height="302" class="smimg">-->
       <div style="position: relative; width: 440px; height: 270px; margin:auto;" class="slideshow">
        <?php
           $queryl1s="select * from news_manage where category='6' and top_news=1 and status=1 order by n_id desc limit 7";
			 $resultl1s=mysql_query($queryl1s);
			 while($rowl1s=mysql_fetch_array($resultl1s)){
			 $titlel1s=$rowl1s['headline'];
			 $imagess=$rowl1s['image'];
			 $newsIdl1s=$rowl1s['n_id'];
			 $categoryl1s=$rowl1s['category'];
			 if($imagess!=''){
			?>
			<img style="position: absolute; top: 0px; left: 0px; display: none; z-index: 6; opacity: 0; width: 440px; height: 270px;" src="<?php echo base_url();?>uploads/images/news/<?php echo $imagess; ?>" width="440" height="270">
			<?php
			}
			}
			?>
		</div>
                                        </div>
									</div>
									<div class="sp_box1_right_sl2">
										<div class="common_header">Top Sports News</div>
										<div  class="rightbox_bottom">
                                        <!--<div class="spbox_bottom">-->
                                        <ul>
										<?php
                 $queryl1="select * from news_manage where category='6' and top_news=1 and status=1  order by n_id desc limit 7";
                                     $resultl1=mysql_query($queryl1);
                                     while($rowl1=mysql_fetch_array($resultl1)){
                                     $titlel1=$rowl1['headline'];
                                     $newsIdl1=$rowl1['n_id'];
                                     $categoryl1=$rowl1['category'];
                                     ?>
	<li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;">
										<?php 
										/*$stringbottom1 = strip_tags($titlel1);
												if (strlen($stringbottom1) > 80) {
													$stringCut = substr($stringbottom1, 0, 80);
													$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
												}
												echo $stringbottom1;*/
												echo $titlel1;
										?>
                                        </a></span> </li>
										<?php
                                         }
                                         ?>
                                        </ul>
                                       <!-- <ul><li>Standard dummy text ever  </li>
                                            <li>Since the 1500s, when an </li>
                                            <li>Standard dummy text ever  </li>
                                            <li>Since the 1500s, when an </li>
                                            <li>Unknown printer took a galley  </li>
                                            <li>Standard dummy text ever  </li>
                                            </ul>-->
										</div>
									</div>
									<div class="sp_box1_right_sl3" style="margin-top:4px;"><img src="<?php echo base_url();?>assets/images/addidas.jpg" width="421" height="109" class="smimg"></div>
								</div>
							</div>
							<div class="clearfloat"></div>
							<div class="con_row6_left"><img src="<?php echo base_url();?>assets/images/front/ad4.jpg" width="656" height="140" class="smimg"></div>
							<div class="con_row8sp">
			     		<div class="con_row8sp_left">
			     			<div class="con_row8sp_sub_left">
			     				<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">Today Cricket Match</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Team</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">VS</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Team</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Place</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Time</th>
												</tr>
													<?php 
                                                    foreach($cricket_val as $cricket):
                                                    $time=$cricket->time;
                                                    $sport_venue=$cricket->sport_venue;
                                                    $team1 =$cricket->team1 ;
                                                    $team2=$cricket->team2;
                                                    ?>
													<tr>
														<td><?php echo $team1;?></td>
														<td>বনাম</td>
														<td><?php echo $team2;?></td>
														<td><?php echo $sport_venue;?></td>
														<td><?php echo $time;?></td>
													</tr>
													 <?php
													endforeach;
													?>
											</table>
			     						
			     					</div>
			     				</div>
			     			</div>
								
			     			<div class="con_row8sp_sub_right"><div class="common_adbox_2"></div>
						
     							<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">Today Football Match</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Team</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">VS</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Team</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Place</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">Time</th>
												</tr>
												<?php 
                                                     foreach($footbal_val as $football):
													$timef=$football->time;
													$sport_venuef=$football->sport_venue;
													$team1f =$football->team1 ;
													$team2f=$football->team2;
                                                    ?>
													<tr>
														<td><?php echo $team1f;?></td>
														<td>বনাম</td>
														<td><?php echo $team2f;?></td>
														<td><?php echo $sport_venuef;?></td>
														<td><?php echo $timef;?></td>
													</tr>
													 <?php
													endforeach;
													?>
											</table>
			     						
			     					</div>
			     				</div>
						</div>
						<div class="clearfloat"></div>
			     		</div>
				
	</div>
							<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $cat_id; ?>&&scat_id=1&&page=1" style="color:#FFFFFF; text-decoration:none">Cricket</a></div>
							<div class="clearfloat"></div>													     	
     		<div class="gallery">
				<?php 
                $resp2=mysql_query("select * from news_manage where category='$cat_id' and sub_category='1' and status=1 order by n_id desc limit 6");
                
                    $count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
                     $title=$row['headline'];
					 $newsId=$row['n_id'];
					 $image_title_short=$row['image_title'];
					 $image_short=$row['image'];
					 $short_description_short=$row['short_description'];
				 	 $news_categorytop=$row['category'];
                    if($count==3) 
                    {
                    print "</span>";
                    
                    $count = 0;
                    }
                    if($count==0)
                    print "<span>";
                    print "<div>";
                    ?>

     			<div class="gallery_item" onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
     				<div class="gallery_item_row_1">
                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;">
                          <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" title="<?php echo $image_title_short; ?>"  width="467" height="270"  class="gallery_img"/></a>
                    </div>
									<div class="gallery_item_row_2"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>">
                                    <?php 
							/*$stringbottom1t = strip_tags($title);
							if (strlen($stringbottom1t) > 120) {
								$stringCutt = substr($stringbottom1t, 0, 120);
								$stringbottom1t = substr($stringCutt, 0, strrpos($stringCutt, ' ')); 
							}*/
							?>
                         <?php echo $title; ?>
                         
                         
                         
                         </a></div>
                                    <?php 
							/*$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 310) {
								$stringCuts = substr($stringbottom1s, 0, 310);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
							}*/
							?>
									<div class="gallery_item_row_3" style="height:65px; overflow:hidden"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333">
                            <?php echo $short_description_short; ?></a></div>
                                        <!--<div class="gallery_item_row_4">
                                            <p class="more"><a href="#">More.... </a></p>
                                        </div>-->
     			</div>
                
                
                <?php
                    $count++;
                    print "</div>";
                    }
                    if($count>0)
                    print "</span>";
                    ?> 
</div>
     		<div class="clearfloat"></div>	
							<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $cat_id; ?>&&scat_id=2&&page=1" style="color:#FFFFFF; text-decoration:none">Football</a></div>
																				
							<div class="clearfloat"></div>													     	
     		<div class="gallery">
				<?php 
                $resp2=mysql_query("select * from news_manage where category='$cat_id'  and sub_category='2' and status=1 order by n_id desc limit 3");
                
                    $count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
                     $title=$row['headline'];
					 $newsId=$row['n_id'];
					 $image_title_short=$row['image_title'];
					 $image_short=$row['image'];
					 $short_description_short=$row['short_description'];
				 	 $news_categorytop=$row['category'];
                    if($count==3) 
                    {
                    print "</span>";
                    
                    $count = 0;
                    }
                    if($count==0)
                    print "<span>";
                    print "<div>";
                    ?>

     			<div class="gallery_item" onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
     				<div class="gallery_item_row_1">
                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;">
                          <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" title="<?php echo $image_title_short; ?>"  width="467" height="270"  class="gallery_img"/></a>
                    </div>
									<div class="gallery_item_row_2"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>">
                                    <?php 
							/*$stringbottom1t = strip_tags($title);
							if (strlen($stringbottom1t) > 120) {
								$stringCutt = substr($stringbottom1t, 0, 120);
								$stringbottom1t = substr($stringCutt, 0, strrpos($stringCutt, ' ')); 
							}*/
							?>
                         <?php echo $title; ?>
                         
                         
                         
                         </a></div>
                                    <?php 
							/*$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 310) {
								$stringCuts = substr($stringbottom1s, 0, 310);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
							}*/
							?>
									<div class="gallery_item_row_3" style="height:65px; overflow:hidden"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333">
                            <?php echo $short_description_short; ?></a></div>
                                        <!--<div class="gallery_item_row_4">
                                            <p class="more"><a href="#">More.... </a></p>
                                        </div>-->
     			</div>
                
                
                <?php
                    $count++;
                    print "</div>";
                    }
                    if($count>0)
                    print "</span>";
                    ?> 
</div>
     		<div class="clearfloat"></div>	
							<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $cat_id; ?>&&page=1" style="color:#FFFFFF; text-decoration:none">Others</a></div>
																				
							<div class="clearfloat"></div>													     	
     		<div class="gallery">
				<?php 
                $resp2=mysql_query("select * from news_manage where category='$cat_id'  and sub_category NOT IN(1,2) and status=1 order by n_id desc limit 3");
                
                    $count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
                     $title=$row['headline'];
					 $newsId=$row['n_id'];
					 $image_title_short=$row['image_title'];
					 $image_short=$row['image'];
					 $short_description_short=$row['short_description'];
				 	 $news_categorytop=$row['category'];
                    if($count==3) 
                    {
                    print "</span>";
                    
                    $count = 0;
                    }
                    if($count==0)
                    print "<span>";
                    print "<div>";
                    ?>

     			<div class="gallery_item" onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
     				<div class="gallery_item_row_1">
                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;">
                          <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" title="<?php echo $image_title_short; ?>"  width="467" height="270"  class="gallery_img"/></a>
                    </div>
									<div class="gallery_item_row_2"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>">
                                    <?php 
							/*$stringbottom1t = strip_tags($title);
							if (strlen($stringbottom1t) > 120) {
								$stringCutt = substr($stringbottom1t, 0, 120);
								$stringbottom1t = substr($stringCutt, 0, strrpos($stringCutt, ' ')); 
							}*/
							?>
                         <?php echo $title; ?>
                         
                         
                         
                         </a></div>
                                    <?php 
							/*$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 310) {
								$stringCuts = substr($stringbottom1s, 0, 310);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
							}*/
							?>
									<div class="gallery_item_row_3" style="height:65px; overflow:hidden"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333">
                            <?php echo $short_description_short; ?></a></div>
                                        <!--<div class="gallery_item_row_4">
                                            <p class="more"><a href="#">More.... </a></p>
                                        </div>-->
     			</div>
                
                
                <?php
                    $count++;
                    print "</div>";
                    }
                    if($count>0)
                    print "</span>";
                    ?> 
</div>
     		<div class="clearfloat"></div>	
							
     		<div class="clearfloat"></div>					
     		</div>
     		<div class="details_con1_right">
							<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/omega.jpg" width="344" height="332" class="smimg"></div>
							<div class="con_row-sp_right">
     						<div class="common_header">Live Cricket Update</div>
     						<div class="common_adbox_1" style="float:left">
                          
                            <?php include('cricinfo.php');?>
                            
                            			
                            </div>
     						<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad13.jpg" width="316" height="71" class="smimg"></div>
   					</div>
								<?php include('most_read_news.php');?>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad1.jpg" width="330" height="110" class="smimg"></div><div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">Upcoming Cricket Match</div>
										
			     					<div class="cf">
			     						<div class="cricket" id="mostViewd">Cricket</div>
			     						<div class="football" id="districtNews">Football</div>
			     					</div>
			     					<div class="common_eventbox_1_body">
			     		
			     						
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3" id="most_viewd">
<tr>
													<td width="5%" align="center" bgcolor="#ccc" class="txt_3" >&nbsp;</td>
													<td width="20%" align="center" bgcolor="#ccc" class="txt_3" ><strong>Time</strong></td>
													<td width="29%" align="center" bgcolor="#ccc" class="txt_3"><strong>Team</strong></td>
													<th width="6%" align="center" bgcolor="#ccc" class="txt_3" widtd="6%">&nbsp;</th>
												  <td width="13%" align="center" bgcolor="#ccc" class="txt_3" ><strong>VS</strong></td>
												  <th width="22%" align="center" bgcolor="#ccc" class="txt_3" widtd="27%">Time</th>
												  <td width="5%" align="center" bgcolor="#ccc" class="txt_3" >&nbsp;</td>
  </tr>
												<?php 
													$querynat="select * from upcoming_cricket order by sport_id desc";
													$resultnat=mysql_query($querynat);
													while($rownat=mysql_fetch_array($resultnat)){
													$time=$rownat['time'];
													$team1=$rownat['team1'];
													$team2=$rownat['team2'];
													$date_time=$rownat['date_time'];
                                                    ?>
													<tr>
														<td align="center">&nbsp;</td>
														<td align="center"><?php echo $time;?></td>
														<td align="center"><?php echo $team1;?></td>
														<td align="center"><img src="<?php echo base_url();?>assets/images/01 (34).png" width="16" height="16" ></td>
													  <td align="center"><span class="txt_3">বনাম</span></td>
													  <td align="center"><?php echo $team2;?></td>
														<td align="center"><img src="<?php echo base_url();?>assets/images/01 (41).png" width="16" height="16" ></td>
  </tr>
													  <?php
                                                      }
                                                      ?>
											</table>
                                            
                                            <table width="100%" border="0" cellspacing="0" cellpadding="3" id="district_news">
<tr>
													<td width="5%" align="center" bgcolor="#ccc" class="txt_3" >&nbsp;</td>
													<td width="20%" align="center" bgcolor="#ccc" class="txt_3" ><strong>Time</strong></td>
													<td width="29%" align="center" bgcolor="#ccc" class="txt_3"><strong>Team</strong></td>
													<th width="6%" align="center" bgcolor="#ccc" class="txt_3" widtd="6%">&nbsp;</th>
												  <td width="13%" align="center" bgcolor="#ccc" class="txt_3" ><strong>VS</strong></td>
												  <th width="22%" align="center" bgcolor="#ccc" class="txt_3" widtd="27%">Time</th>
												  <td width="5%" align="center" bgcolor="#ccc" class="txt_3" >&nbsp;</td>
  </tr>
												<?php 
													$querynat="select * from upcoming_sports order by sport_id desc";
													$resultnat=mysql_query($querynat);
													while($rownat=mysql_fetch_array($resultnat)){
													$timef=$rownat['time'];
													$team1f=$rownat['team1'];
													$team2f=$rownat['team2'];
													$date_timef=$rownat['date_time'];
                                                    ?>
													<tr>
														<td align="center">&nbsp;</td>
														<td align="center"><?php echo $timef;?></td>
														<td align="center"><?php echo $team1f;?></td>
														<td align="center"><img src="<?php echo base_url();?>assets/images/01 (34).png" width="16" height="16" ></td>
													  <td align="center"><span class="txt_3">VS</span></td>
													  <td align="center"><?php echo $team2f;?></td>
														<td align="center"><img src="<?php echo base_url();?>assets/images/01 (41).png" width="16" height="16" ></td>
  </tr>
													 <?php
													}
													?>
											</table>
			     					</div>
			     				</div>
								
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
								<div class="fbcon"><?php include('facebook.php');?></div>
                                <div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/img20.jpg" width="317" height="140" class="smimg"></div>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/ad5.jpg" width="317" height="140" class="smimg"></div>
                                <div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/img30.jpg" width="317" height="140" class="smimg"></div>
                                
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
		 
  
</body>
</html>
