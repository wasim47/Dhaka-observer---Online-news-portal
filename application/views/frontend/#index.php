<?php
	$resd=mysql_query("select * from voting");
	while($rowd=mysql_fetch_array($resd)){
	$yes=$rowd['yes'];
	$no=$rowd['no'];
	$no_comments=$rowd['no_comments'];
			if($yes>0){
			$yes_r[]=$yes;
			}
			if($no>0){
			$no_r[]=$no;
			}
			if($no_comments>0){
			$no_comments_r[]=$no_comments;
			}
	}
		if($yes>0){
		$total_yes=array_sum($yes_r);
		}
		if($no>0){
		$total_no=array_sum($no_r);
		}
		if($no_comments>0){
		$total_no_comments=array_sum($no_comments_r);
		}
	if($yes>0 || $no>0 ||$no_comments>0){
		$totalResults=$total_yes+$total_no+$total_no_comments;
		
		$parcent_yes=$total_yes/$totalResults;
		$total_parcent_yes=$parcent_yes*100;
		
		$parcent_no=$total_no/$totalResults;
		$total_parcent_no=$parcent_no*100;
		
		$parcent_nocomments=$total_no_comments/$totalResults;
		$total_parcent_nocomments=$parcent_nocomments*100;
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>

#ex3::-webkit-scrollbar{
width:5px;
background-color:#cccccc;
} 
#ex3::-webkit-scrollbar-thumb{
background-color:#333;
border-radius:15px;
}
#ex3::-webkit-scrollbar-thumb:hover{
background-color:#999;
border:1px solid #333333;
}
#ex3::-webkit-scrollbar-thumb:active{
background-color:#333;
border:1px solid #333333;
} 
#ex3::-webkit-scrollbar-track{
border:1px gray solid;
border-radius:10px;
-webkit-box-shadow:0 0 6px gray inset;
} 


#vote-grph-yes span img{
    /*background: url(../images/specs-sprite.gif) no-repeat -3px -67px;*/
	background-color:#000066;
	width:<?php echo $total_parcent_yes; ?>%;
	padding:0px; 
	margin:0px;
}
#vote-grph-no span img{
    /*background: url(../images/specs-sprite.gif) no-repeat -3px -67px;*/
	background-color:#000066;
	width:<?php echo $total_parcent_no; ?>%;
	padding:0px; 
	margin:0px;
}

#vote-grph-nocoments span img{
    /*background: url(../images/specs-sprite.gif) no-repeat -3px -67px;*/
	background-color:#000066;
	width:<?php echo $total_parcent_nocomments; ?>%;
	padding:0px; 
	margin:0px;
}
</style>
<script>
$(document).ready(function(){
	$("#voting_result").hide();
	$("#voting").click(function(){
		$("#voting_result").hide();
		$("#votingPanel").show();
	});
	$("#vot_result").click(function(){
		$("#votingPanel").hide();
		$("#voting_result").show();
	});
});
</script>
</head>
<body>
<div class="clearfloat"></div> 
<div class="container">
     	<div class="con_row1">
     		<div class="con_row1_left">?????????????????????</div>
				
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
			if($dtime <= $ptime){
            echo "";
			}
			else{
			echo $bnews->headline.'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;';
			}
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
			
     	<div class="con_row3">
			
    <div class="con_row3_left">
			<div class="common_header">?????? ???????????? ???????????????</div>
			<?php include('top_desk_slider.php');?>
			
	   	<div class="clearfloat"></div>
    </div>
				
     		<div class="con_row3_right">
     			<div class="common_header">?????????????????????????????? ?????????</div>
                <div class="rtr_2_con" id="ex3">
                <?php
		 		 $query="select * from news_manage where status=1  and category=3 order by news_id desc limit 5";
				 $result=mysql_query($query);
				 while($row=mysql_fetch_array($result)){
				 $title=$row['headline'];
				 $newsId=$row['news_id'];
				 $image_title_short=$row['image_title'];
				 $image_short=$row['image'];
				 $short_description_short=$row['short_description'];
				 $category=$row['category'];
				?>
     			<div class="rtr_2"  onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
     				<div class="lft_rr2">
           <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>"width="60" height="200" class="smimg"></a>
                    </div>
						
     				<div class="right_rr2" style="text-align:left">
                    <?php 
							/*$stringbottomtitle = strip_tags($title);
							if (strlen($stringbottomtitle) > 30) {
								$stringCuttitle = substr($stringbottomtitle, 0, 30);
								$stringbottomtitle = substr($stringCuttitle, 0, strrpos($stringCuttitle, ' ')); 
							}*/
							?>
     					<p><strong> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#333;font-size:13px; width:50%; overflow:hidden"><?php echo $title; ?></a></strong></p>
                        <?php 
							$stringbottom1 = strip_tags($short_description_short);
							if (strlen($stringbottom1) > 200) {
								$stringCut = substr($stringbottom1, 0, 200);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
							}
							?>
     					<p> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#000; font-size:14px; text-align:left;"><?php echo $stringbottom1; ?></a></p>
     				</div>
     			</div>
                <?php 
				   }
				
				
		 		 $query="select * from news_manage where status=1 and category=1 order by news_id desc limit 5";
				 $result=mysql_query($query);
				 while($row=mysql_fetch_array($result)){
				 $title=$row['headline'];
				 $newsId=$row['news_id'];
				 $image_title_short=$row['image_title'];
				 $image_short=$row['image'];
				 $short_description_short=$row['short_description'];
				 $category=$row['category'];
				?>
     			<div class="rtr_2"  onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
     				<div class="lft_rr2">
           <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>"width="60" height="200" class="smimg"></a>
                    </div>
						
     				<div class="right_rr2" style="text-align:left">
                    <?php 
							/*$stringbottomtitle = strip_tags($title);
							if (strlen($stringbottomtitle) > 80) {
								$stringCuttitle = substr($stringbottomtitle, 0, 80);
								$stringbottomtitle = substr($stringCuttitle, 0, strrpos($stringCuttitle, ' ')); 
							}*/
							?>
     					<p><strong> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#000; font-size:13px; width:50%; overflow:hidden"><?php echo $title; ?></a></strong></p>
                        <?php 
							$stringbottom1 = strip_tags($short_description_short);
							if (strlen($stringbottom1) > 200) {
								$stringCut = substr($stringbottom1, 0, 200);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
							}
							?>
     					<p> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#000; font-size:14px; text-align:left;"><?php echo $stringbottom1; ?></a></p>
     				</div>
     			</div>
                <?php 
				   }
				  ?>
                  
			</div>		
     		</div>
     	</div>
			
			
     	<div class="clearfloat"></div>
     	<div class="con_row4">
     		<div class="con_row4_left">
     			<?php include('national.php');?>
					
     			<?php include('international.php');?>
					
     			<div class="clearfloat"></div>
     		</div>
				
     		<div class="con_row4_right">
     			<?php include('related_news.php');?>
				<?php include('distric_news.php');?>

     		</div>
     	</div>
     	<div class="clearfloat"></div>
 			<div class="clearfloat"></div>
			     	<div class="con_row6">
			     		<div class="con_row6_left"><img src="<?php echo base_url();?>assets/images/front/ad4.jpg" width="656" height="140" class="smimg"></div>
				
     					<div class="con_row6_right"><img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg"></div>
			     	</div>
     				<div class="clearfloat"></div>
			     	<div class="con_row7">
			     		<div class="con_row7_left">
			     			<?php include('businees.php');?>
								
			     			<?php include('shar_market.php');?>
			     		</div>
				
     					<div class="con_row7_right">
                        <div class="common_header">?????????????????? ???????????????</div>
						
     				<div class="rightbox_bottom2">
     					<table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr>
									<th width="6%" align="left" bgcolor="#800000" class="txt_1" scope="col">&nbsp;</th>
									<th width="37%" height="25" align="left" bgcolor="#800000" class="txt_1" scope="col">????????????????????? ????????? </th>
									<th width="32%" align="left" bgcolor="#800000" class="txt_1" scope="col">?????????????????????</th>
									<th width="25%" align="left" bgcolor="#800000" class="txt_1" scope="col">???????????????</th>
								</tr>
                                <?php 
							   $i=0;
								foreach($coin_market as $coin):
								$coin_name=$coin->coin_name;
								$buy=$coin->buy;
								$sell =$coin->sell ;
								if($i%2){
									$c="#dfdfdf";
								}
								else{
									$c="#f8f8f8";
								}
								$i++;
								?>
								<tr bgcolor="<?php echo $c;?>">
									<td align="left">&nbsp;</td>
									<td align="left"><?php echo $coin_name; ?></td>
									<td align="left"><?php echo $sell; ?></td>
									<td align="left"><?php echo $buy; ?></td>
								</tr>
                                <?php
								endforeach;
								?>
							</table>
     				</div>
						
     					<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad6.jpg" width="314" height="54" class="smimg"></div>
     					</div>
			     	</div>
     				<div class="clearfloat"></div>
			     	<div class="con_row8">
			     		<div class="con_row8_left">
			     			<div class="row8_sub_left">
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=6">???????????????????????? </a></div>
                                <?php
								$querynewssports="select * from news_manage where category = 6 and top_news=1 and status=1 
								order by news_id desc limit 1";
								$resultesp=mysql_query($querynewssports);
								$rowesp=mysql_fetch_array($resultesp);
								$titleesp=$rowesp['headline'];
								$newsIdesp=$rowesp['news_id'];
								$image_title_shortesp=$rowesp['headline'];
								$image_shortesp=$rowesp['image'];
								$short_description_shortesp=$rowesp['short_description'];
								$category_sport=$rowesp['category'];
								?>
									<div class="picture_box_1">
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortesp; ?>" width="660" height="439" class="smimg"></a></div>
			     				<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">??????????????? ????????????????????? ???????????????</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">??????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">??????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">???????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
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
														<td>Vs</td>
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
								
			     			<div class="row8_sub_right"><div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad7.jpg" width="352" height="48" class="smimg"></div>
						
     							<div class="news_box_1">
						<h4 class="common_news_title">
						<?php 
						/*$stringentspetitles = strip_tags($titleesp);
									if (strlen($stringentspetitles) > 30) {
										$stringCutentspetitles = substr($stringentspetitles, 0, 40);
										$stringentspetitles = substr($stringCutentspetitles, 0, strrpos($stringCutentspetitles, ' ')); 
									}*/
						?>
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>"><?php echo $titleesp; ?></a>
						</h4>
						<p class="common_news_content">
						<?php 
							$stringentsp = strip_tags($short_description_shortesp);
							if (strlen($stringentsp) > 400) {
								$stringCutentsp = substr($stringentsp, 0, 400);
								$stringentsp = substr($stringCutentsp, 0, strrpos($stringCutentsp, ' ')).'.....'; 
							}
							?>
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>"><?php echo $stringentsp; ?></a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryl1="select * from news_manage where category='6' and news_id!='$newsIdesp' 
							and status=1 order by news_id desc limit 5";
                             $resultl1=mysql_query($queryl1);
                             while($rowl1=mysql_fetch_array($resultl1)){
                             $titlel1=$rowl1['headline'];
                             $newsIdl1=$rowl1['news_id'];
							 $categoryl1=$rowl1['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;"><?php echo $titlel1; ?></a></span> </li>
                            <?php
                             }
                             ?>
					</ul>
     				</div>
						<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">??????????????? ??????????????? ???????????????</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">??????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">??????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">???????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
												</tr>
												<?php 
                                                     foreach($footbal_val as $football):
													$timef=$football->time;
													$sport_venuef=$football->sport_venue;
													$team1f =$football->team1 ;
													$team2f=$football->team2;
                                                    ?>
													<tr>
														<td><?php echo $team1;?></td>
														<td>Vs</td>
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
			     		</div>
				
     					<div class="con_row8_right">
     						<div class="common_header">???????????? ????????????????????? ???????????????</div>
     						<div class="common_adbox_1" style="float:left">
                          
                            <?php include('cricinfo.php');?>
                            
                            			
                            </div>
     						<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad8.jpg" width="315" height="109" class="smimg"></div>
     					</div>
			     	</div>
     				<div class="clearfloat"></div>
			     	<div class="con_row9">
			     		<div class="con_row9_left"><img src="<?php echo base_url();?>assets/images/front/ad10.jpg" width="673" height="181" class="smimg"></div>
				
     					<div class="con_row9_right"><img src="<?php echo base_url();?>assets/images/front/ad9.jpg" width="315" height="180" class="smimg"></div>
			     	</div>
     				<div class="clearfloat"></div>
			     	<div class="con_row10">
			     		<div class="con_row10_left">
			     			<div class="row10_sub_left">
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=7">??????????????????</a></div>
                                <?php
								 $querynews1="select * from news_manage where category = 7 and top_news=1 and status=1 
								 order by news_id desc limit 1";
								 $resulte1=mysql_query($querynews1);
								 $rowe1=mysql_fetch_array($resulte1);
								 $titlee1=$rowe1['headline'];
								 $newsIde1=$rowe1['news_id'];
								 $image_title_shorte1=$rowe1['headline'];
								 $image_shorte1=$rowe1['image'];
								 $short_description_shorte1=$rowe1['short_description'];
								 $categoryl2e=$rowe1['category'];
							  ?>
									<div class="picture_box_1">
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shorte1; ?>" width="660" height="439" class="smimg"></a></div>
			     				<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">???????????????????????? ?????????????????????</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">???????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
												</tr>
												 <?php 
												foreach($theatre_program as $program):
												$programmer_name=$program->programmer_name;
												$programmer_type=$program->programmer_type;
												$culturaltime =$program->culturaltime;
												$cultural_date=$program->cultural_date;
												?>
											   
													
													<tr style="font-size:11px">
													  <td><?php echo $programmer_name;?></td>
													  <td><?php echo $programmer_type;?></td>
													  <td><?php echo $cultural_date;?></td>
													  <td><?php echo $culturaltime;?></td>
													</tr>
												<?php
												endforeach;
												?>
											</table>
			     						
			     					</div>
			     				</div></div>
								
			     			<div class="row10_sub_right">
                            <div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad11.jpg" width="352" height="46" class="smimg"></div>
								<div class="news_box_1">
						<h4 class="common_news_title"><?php 
						/*$stringentspetitle = strip_tags($titlee1);
									if (strlen($stringentspetitle) > 30) {
										$stringCutentspetitle = substr($stringentspetitle, 0, 40);
										$stringentspetitle = substr($stringCutentspetitle, 0, strrpos($stringCutentspetitle, ' ')); 
									}*/
						?>
                          <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>"><?php echo $titlee1; ?></a></h4>
						<p class="common_news_content"> 
                        		<?php 
									$stringentspe = strip_tags($short_description_shorte1);
									if (strlen($stringentspe) > 400) {
										$stringCutentspe = substr($stringentspe, 0, 400);
										$stringentspe = substr($stringCutentspe, 0, strrpos($stringCutentspe, ' ')).'.....'; 
									}
									?>
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>"><?php echo $stringentspe; ?></a>
                            </p>
                            <ul style="margin-bottom:5px;">
                            <?php
   							 $queryl1e="select * from news_manage where category='7' and news_id!='$newsIde1' 
							 and status=1 order by news_id desc limit 5";
                             $resultl1e=mysql_query($queryl1e);
                             while($rowl1e=mysql_fetch_array($resultl1e)){
                             $titlel1e=$rowl1e['headline'];
                             $newsIdl1e=$rowl1e['news_id'];
							 $categoryl1e=$rowl1e['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1e;?>&&cat_id=<?php echo $categoryl1e;?>" style="text-decoration:none;"><?php echo $titlel1e; ?></a></span> </li>
                            <?php
							 }
							 ?>
                            </ul>
     				<div class="clearfloat"></div>
								</div>
						<div class="common_eventbox_1">
			     					<div class="common_eventbox_1_header">???????????????????????? ?????????????????????</div>
										
			     					<div class="common_eventbox_1_body">
			     		
			     						<table width="100%" border="0" cellspacing="0" cellpadding="3">
												<tr>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">???????????????</th>
													<th bgcolor="#e71b1c" class="txt_2" scope="col">????????????</th>
												</tr>
												 <?php 
												foreach($theatre_program as $program):
												$programmer_name=$program->programmer_name;
												$programmer_type=$program->programmer_type;
												$culturaltime =$program->culturaltime;
												$cultural_date=$program->cultural_date;
												?>
											   
													
													<tr style="font-size:11px">
													  <td><?php echo $programmer_name;?></td>
													  <td><?php echo $programmer_type;?></td>
													  <td><?php echo $cultural_date;?></td>
													  <td><?php echo $culturaltime;?></td>
													</tr>
												<?php
												endforeach;
												?>
											</table>
			     						
			     					</div>
			     				</div>
								</div>
								
			     		</div>
				
     					<div class="con_row10_right">
     						<div class="common_header">???????????? ?????????????????????</div>
								
     						<div class="cine_box">
     							<div class="cine_box_left"><div class="picture_box_2"><img src="<?php echo base_url();?>assets/images/front/timthumb.jpg" width="140" height="150" class="smimg"></div>
     							</div>
									
     							<div class="cine_box_right">
     								<table width="96%" border="0" align="right" cellpadding="2" cellspacing="0" style="font-size:12px;">
											<tr>
												<th align="left" bgcolor="#dfdfdf" scope="col">STAR Cineples </th>
											</tr>
											<tr>
												<td align="left" bgcolor="#f9f9f9">Man of steel on 3D </td>
											</tr>
											<tr>
												<td align="left" bgcolor="#DFDFDF">11.00am | 3.00pm | 8.00pm </td>
											</tr>
											<tr>
												<td bgcolor="#F9F9F9">&nbsp;</td>
											</tr>
											<tr>
												<td bgcolor="#DFDFDF">Jamuns future park </td>
											</tr>
											<tr>
												<td bgcolor="#F9F9F9">Man of steel on 3D </td>
											</tr>
											<tr>
												<td bgcolor="#DFDFDF">11.00am | 3.00pm | 8.00pm </td>
											</tr>
										</table>
     							</div>
     						</div>
								
     						<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
     					</div>
			     	</div>
						<div class="clearfloat"></div>
						<div class="con_row11">
			     		<div class="con_row11_left">
			     			<?php include('education.php'); ?>
			     			<?php include('health.php'); ?>
			     		</div>
				
     					<div class="con_row11_right">	
                        <div class="common_header">?????????????????? ????????????</div>
						
     						<div class="rightbox_bottom" id="votingPanel">	
                            <form method="post" action="<?php echo base_url();?>index/voting">					
                            <div class="poll_box">
						<h4><?php echo $voting_value['title'];?></h4>
						<p><?php echo $voting_value['voting_sub'];?></p>
                        
											<div class="pollrow_1">???????????? ?????? ?????????????&nbsp;&nbsp;&nbsp;&nbsp;
												<input name="voting_val" type="radio" value="yes">
												???????????????
												<input name="voting_val" type="radio" value="no">
												??????<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="voting_val" type="radio" value="no_comments">
												????????????????????? ?????????
                                                </div>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit" type="submit" class="button_vote" value="????????? ?????????" />
								  </div>
												
									<div class="pollrow_rght">
                                    <input name="result" type="button" class="button_vote" value="??????????????? ???????????????" id="vot_result" />
                                    <!--<a href="#" class="poll_txt">??????????????? ???????????????</a>--></div>
							  </div>
                                           
     						</div>
                            </form>
     						</div>
                            
                            <div class="rightbox_bottom" id="voting_result">	
                            				
                            <div class="poll_box">
                            <h4><?php echo $voting_value['title'];?></h4>
							<p><?php echo $voting_value['voting_sub'];?></p>
                            <?php 
							if($yes>0){
							?>
                            <h4 style="padding:0px; margin:0px; font-size:14px">??????????????? &nbsp; - &nbsp;<?php echo $total_parcent_yes;?>%</h4>
                            <div id="vote-grph-yes"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php
                            }
							if($no>0){
							?>
                            
                            <h4 style="padding:0px; margin:0px; font-size:14px">?????? &nbsp; - &nbsp;<?php echo number_format($total_parcent_no,'0');?>%</h4>
                            <div id="vote-grph-no"  style="border:1px solid #ccc; width:200px; height:13px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							if($no_comments>0){
							?>
                            <h4 style="padding:0px; margin:0px; font-size:14px">????????????????????? ????????? &nbsp; - &nbsp;<?php echo number_format($total_parcent_nocomments,'0');?>%</h4>
                            <div id="vote-grph-nocoments"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							?>
                            <h5 style="padding:0px; margin:0px; padding-top:10px; font-size:14px">????????? ????????? ?????????????????? &nbsp; - &nbsp;<?php echo $totalResults;?></h5>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit3" type="button" class="button_vote" value="????????? ???????????????" id="voting" />
								  </div>
												
							  </div>
                                           
     						</div>
     						</div>
     					</div>
			     	</div>
												<div class="clearfloat"></div>
						<div class="con_row12">
			     		<div class="con_row12_left"><img src="<?php echo base_url();?>assets/images/front/ad20.jpg" width="666" height="72" class="smimg"></div>
				
     					<div class="con_row12_right"><img src="<?php echo base_url();?>assets/images/front/ad21.jpg" width="317" height="71" class="smimg"></div>
	</div>
												<div class="clearfloat"></div>
	<div class="con_row13">
			     		<div class="con_row13_left">
			     			<?php include('science.php');?>
								
			     			<?php include('life_style.php');?>
			     		</div>
				
  					<div class="con_row13_right">
     						<div class="right_box1">
     				<div class="common_header">????????????????????? ????????????????????????  </div>
						
     				<div class="rightbox_bottom">
     					<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<th width="58%"  scope="col"><table width="97%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<th width="29%" height="25" scope="col"><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></th>
														<th width="71%" align="left" scope="col">Fazar -- 4.37 am </th>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></td>
														<td align="left">Fazar -- 4.37 am </td>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></td>
														<td align="left">Fazar -- 4.37 am </td>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></td>
														<td align="left">Fazar -- 4.37 am </td>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></td>
														<td align="left">Fazar -- 4.37 am </td>
													</tr>
												</table></th>
												<th width="42%"  scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<th align="center" scope="col"><img src="<?php echo base_url();?>assets/images/front/sunshine.png" width="49" height="36"><br>
															Sunshine 5.00am </th>
													</tr>
													<tr>
														<td align="center"><img src="<?php echo base_url();?>assets/images/front/sunset.png" width="49" height="36"><br>
															Sunset 5.00am </td>
													</tr>
												</table></th>
											</tr>
										</table>
     				</div>
     						</div>
								<div class="right_box1" style="margin-top:15px;">
                                    <!--<div class="common_header">Horoscope</div>
                                    <div class="horoscope"><img src="<?php echo base_url();?>assets/images/front/indian-horoscope.jpg" width="310" height="328" class="smimg"></div>-->
                                    <?php include('facebook.php');?>
								</div>
						
 						</div>
						</div>
     				<div class="clearfloat"></div>
											
						<div class="con_row14">
			     		<div class="con_row14_left">
			     			<?php include('feature.php'); ?>
								
			     			<?php include('environment.php'); ?>
			     		</div>
				
  					<div class="con_row14_right">		<div class="common_header">???????????????????????? ??????????????????</div>
						
     				<div class="rightbox_bottom"><img src="<?php echo base_url();?>assets/images/front/weather.jpg" width="600" height="530" class="smimg"></div>
     				<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad14.jpg" width="314" height="132" class="smimg"></div>
									
							</div>
						</div>
						<div class="clearfloat"></div>
											
						<div class="con_row15">
			     		<div class="con_row15_left">
			     			<div class="row15_sub_left"><img src="<?php echo base_url();?>assets/images/front/ad18.jpg" width="332" height="159" class="smimg"></div>
											
			     			<div class="row15_sub_right"><img src="<?php echo base_url();?>assets/images/front/ad17.jpg" width="338" height="159" class="smimg"></div>
			     		</div>
				
     					<div class="con_row15_right"><img src="<?php echo base_url();?>assets/images/front/ad16.jpg" width="314" height="159" class="smimg"></div>
	</div>
						<div class="clearfloat"></div>
											
						<div class="con_row16">
			     		<div class="con_row16_left">
			     			<?php include('city_life.php');?>
								
			     			<?php include('culture.php');?>
			     		</div>
				
  					<div class="con_row16_right"><div class="right_box1">
     				<div class="common_header">?????? ??????????????????</div>
						
     				<div class="rightbox_bottom">
     					<p><strong>Save the Children</strong><br>

											Advisor - Service Delivery and Human Resources<br>

											Advisor - Local Government<br>


											Team Leader - Statutory Compliance<br>

										Executive - Capability Development</p>
     					<p><strong>Bangladesh Infrastructure Finance Fund  (BIFFL)</strong><br>
     						General Manager (Investment)<br>
     						Manager (Credit)<br>
     						Senior Officer (Credit-Technical)<br>
     						Senior Officer (Legal &amp; Compliance)<br>
     						Senior Officer (Administration)<br>
    						Officer (Accounts &amp; Finance)</p>
     					<p><strong>International Beverages Private Limited</strong><br>
     						Team Leader - Statutory Compliance<br>
     						Executive - Capability Development <br>
    						Executive - Taxation</p>
     					<p><strong>Great Wall Ceramic Industries Ltd.</strong><br>
     						Manager (Admin)<br>
     						Sr. Manager (Internal Audit) <br>
     						Sr. Executive (Internal Audit) <br>
    						Legal/ Estate Officer</p>
    				</div>
  					</div>
								</div>
     					<div class="con_row16_right">
     						<div class="common_header">?????????????????? - ???????????????</div>
											<div class="rightbox_bottom">
												<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
													<tr>
														<th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="41%" scope="col"><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_bul?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">??????????????? ???????????????</a></th>
													  <th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="26%" scope="col"><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_provati?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">?????????????????????</a></th>
												  </tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_provati2?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">???????????????????????????</a></th>
													  <td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_probaho?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">????????????????????????</a></th>
												  </tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_parikrama?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">?????????????????? </a></th>
													  <td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_shanglap?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">???????????????</a></th>
												  </tr>
												</table>
											</div>
     					</div>
			     	</div>
						<div class="clearfloat"></div>
											
						<div class="con_row17">
     		<div class="con_row17_left">
	<div class="lt_row">????????? ????????????????????????</div>
										
	<div class="slide_show"><div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <!--<div class="ad-controls">
      </div>-->
      <div class="ad-nav">
        <div class="ad-thumbs">
		
		
          <ul class="ad-thumb-list">
		  <?php
         foreach($photo_list as $photo):
		 	$ph_name=$photo ->ph_name;
			$ph_ima=$photo ->ph_ima;
			//$ph_id=$menu -> ph_id;
		?>
            <li>
              <a href="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>">
                <img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" width="120" height="100" class="image0">
              </a>
            </li>
           <?php
        endforeach;
		?>
          </ul>
		  
		  
		  
		  
        </div>
      </div>
    </div></div>
			     		</div>
				
     					<div class="con_row17_right">
     						<div class="common_adbox_3"><img src="<?php echo base_url();?>assets/images/front/ad19.jpg" width="316" height="193" class="smimg"></div>
											
     						<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad22.jpg" width="318" height="330" class="smimg"></div>
     					</div>
			     	</div>
				<div class="clearfloat"></div>		
</div>	
<div class="clearfloat"></div>
</body></html>