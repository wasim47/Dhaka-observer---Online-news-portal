<script src="<?php echo base_url();?>assets/js/front/jquery.colorbox.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/front/colorbox.css" />
		<script type="text/javascript">
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			});
		</script>
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
<html>
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

function form_submit(){
var no_comments = document.getElementById("no_comments");
var no = document.getElementById("no");
var yes = document.getElementById("yes");

//alert(saveid);
if((yes.checked) || (no.checked) || (no_comments.checked)){
document.votingForm.submit();
}
/*else if(!(no.checked)){
alert("Please Check Your Vot Option");
}
else if(!(no_comments.checked)){
alert("Please Check Your Vot Option");
}*/
else{
alert("Please Check Your Vote Option");
}
}
</script>
</head>
<body>
<div class="clearfloat"></div> 
<div class="container">
     	<div class="con_row1">
     		<div class="con_row1_left">Latest News </div>
				
     		<div class="con_row1_right"><marquee scrollamount="2" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()">
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
            echo "No Breaking News";
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
     		<div class="con_row2_col_1"><img src="<?php echo base_url();?>assets/images/front/img1.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_2"><img src="<?php echo base_url();?>assets/images/front/img2.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_3"><img src="<?php echo base_url();?>assets/images/front/img3.jpg" width="314" height="110" class="img_ad1"></div>
     	</div>
			
     	<div class="con_row3">
			
    <div class="con_row3_left">
			<div class="lt_row_topDesk">TOP NEWS DESK </div>
			<?php include('top_desk_slider.php');?>
			
	   	<div class="clearfloat"></div>
    </div>
				
     		<?php /*?><div class="con_row3_right">
     			<div class="rtr_1">RECENT NEWS </div>
                <div class="rtr_2_con">
				<?php
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
							$stringbottomtitle = strip_tags($title);
							if (strlen($stringbottomtitle) > 30) {
								$stringCuttitle = substr($stringbottomtitle, 0, 30);
								$stringbottomtitle = substr($stringCuttitle, 0, strrpos($stringCuttitle, ' ')); 
							}
							?>
     					<p><strong> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#333"><?php echo $stringbottomtitle; ?></a></strong></p>
                        <?php 
							$stringbottom1 = strip_tags($short_description_short);
							if (strlen($stringbottom1) > 93) {
								$stringCut = substr($stringbottom1, 0, 93);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
							}
							?>
     					<p> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#333"><?php echo $stringbottom1; ?></a></p>
     				</div>
     			</div>
                <?php 
				   }
				  ?>
                  
                  
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
							$stringbottomtitle = strip_tags($title);
							if (strlen($stringbottomtitle) > 30) {
								$stringCuttitle = substr($stringbottomtitle, 0, 30);
								$stringbottomtitle = substr($stringCuttitle, 0, strrpos($stringCuttitle, ' ')); 
							}
							?>
     					<p><strong> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#333"><?php echo $stringbottomtitle; ?></a></strong></p>
                        <?php 
							$stringbottom1 = strip_tags($short_description_short);
							if (strlen($stringbottom1) > 93) {
								$stringCut = substr($stringbottom1, 0, 93);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
							}
							?>
     					<p> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#333"><?php echo $stringbottom1; ?></a></p>
     				</div>
     			</div>
                <?php 
				   }
				  ?>
			</div>		
     		</div><?php */?>
            <div class="con_row3_right">
     			<div class="common_header">Latest News</div>
                <div class="rightbox_bottom_onnorokom" style="width:100%; float:left; max-height:270px;overflow:scroll; overflow-x:hidden; " id="ex3">
					<?php
                        $query="select * from news_manage where status= '1' and last_updated = '1' order by n_id desc limit 20";
                         $result=mysql_query($query);
                         while($row=mysql_fetch_array($result)){
                         $title=$row['headline'];
                         $newsId=$row['n_id'];
                         $image_title_short=$row['image_title'];
                         $image_short=$row['image'];
                         $short_description_short=$row['short_description'];
                         $category=$row['category'];
                        ?>
                        <div style="width:93%; height:auto; margin:0px 0px; padding:0px;" onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#000; font-size:12px;"><div style="width:100%; height:auto; float:left; padding:5px;  border-bottom:1px solid #CCCCCC">
                    
         <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" width="100" height="69" style="float:left; width:100px; height:69px; padding:5px; margin-right:10px; border:1px solid #ccc; "><?php echo $title; ?>
                           
                            </div></a>
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
					
     			<?php include('polities.php');?>
					
     			<div class="clearfloat"></div>
     		</div>
				
     		<div class="con_row4_right">
     				<?php //include('related_news.php');?>
				    <?php //include('distric_news.php');?>
                
                <?php include('international.php');?>
<div class="clearfloat"></div>
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
     					<div class="rightbox_bottom2">
     					<?php include('related_news.php');?>
     				    </div>
     					</div>
     					<div class="con_row7_right">
                        <div class="common_header">Coin Market</div>
     					<div class="rightbox_bottom2">
     					<table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr>
									<th width="6%" align="left" bgcolor="#800000" class="txt_1" scope="col">&nbsp;</th>
									<th width="37%" height="25" align="left" bgcolor="#800000" class="txt_1" scope="col">Coin Name </th>
									<th width="32%" align="left" bgcolor="#800000" class="txt_1" scope="col">Sell</th>
									<th width="25%" align="left" bgcolor="#800000" class="txt_1" scope="col">Buy</th>
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
     					<!--<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad6.jpg" width="314" height="54" class="smimg"></div>-->
     					</div>
			     	</div>
     				<div class="clearfloat"></div>
			     	<div class="con_row8">
			     		<div class="con_row8_left">
			     			<div class="row8_sub_left">
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=6&&page=1">Sports</a></div>
                                <?php
				$querynewssports="select * from news_manage where category = 6 and sub_category = 1  and top_news=1 and status=1 
								order by n_id desc limit 1";
								$resultesp=mysql_query($querynewssports);
								$rowesp=mysql_fetch_array($resultesp);
								$titleesp=$rowesp['headline'];
								$newsIdesp=$rowesp['n_id'];
								$image_title_shortesp=$rowesp['headline'];
								$image_shortesp=$rowesp['image'];
								$short_description_shortesp=$rowesp['short_description'];
								$category_sport=$rowesp['category'];
								//$category_sport=$rowesp['category'];
								?>
									<div class="picture_box_1">
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortesp; ?>" width="660" height="439" class="smimg"></a></div>
                                    <div class="news_box_1">
						<h4 class="common_news_title" style="width:100%; height:40px; margin-bottom:8px;">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>"><?php 
							$stringbottom1s = strip_tags($titleesp);
							if (strlen($stringbottom1s) > 80) {
								$stringCuts = substr($stringbottom1s, 0, 80);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')); 
							}
							echo $stringbottom1s;
							//echo $titleesp;
							?></a>
						</h4>
						<p class="common_news_content" style="height:67px; overflow:hidden">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>"><?php echo $short_description_shortesp; ?></a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryl1="select * from news_manage where category='6' and sub_category = 1 and n_id!='$newsIdesp' 
							and status=1 order by n_id desc limit 4";
                             $resultl1=mysql_query($queryl1);
                             while($rowl1=mysql_fetch_array($resultl1)){
                             $titlel1=$rowl1['headline'];
                             $newsIdl1=$rowl1['n_id'];
							 $categoryl1=$rowl1['category'];
							 $subcategoryl1=$rowl1['sub_category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;">
							<?php 
							$stringbottom1s1 = strip_tags($titlel1);
							if (strlen($stringbottom1s1) > 40) {
								$stringCuts1 = substr($stringbottom1s1, 0, 40);
								$stringbottom1s1 = substr($stringCuts1, 0, strrpos($stringCuts1, ' ')); 
							}
							echo $stringbottom1s1;
							//echo $titlel1; ?></a></span> </li>
                            <?php
                             }
                             ?>
					</ul>
     				</div>
			     			</div>
								
			     			<div class="row8_sub_right"><div class="common_adbox_sports"><img src="<?php echo base_url();?>assets/images/front/ad7.jpg" width="352" height="48" class="smimg" style="padding:0px; margin:0px;"></div>
						
                        		<?php
				$querynewsFootbal="select * from news_manage where category = 6 and sub_category !=1 and top_news=1 and status=1 
								order by n_id desc limit 1";
								$resulteFt=mysql_query($querynewsFootbal);
								$roweFt=mysql_fetch_array($resulteFt);
								$titleeFt=$roweFt['headline'];
								$newsIdeFt=$roweFt['n_id'];
								$image_title_shorteFt=$roweFt['headline'];
								$image_shorteFt=$roweFt['image'];
								$short_description_shorteFt=$roweFt['short_description'];
								$category_Ft=$roweFt['category'];
								?>
                                <div class="picture_box_1">
<a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeFt;?>&&cat_id=<?php echo $category_Ft;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shorteFt; ?>" width="660" height="439" class="smimg"></a></div>
     							<div class="news_box_1">
                                    <h4 class="common_news_title" style="width:100%; height:40px; margin-bottom:8px;">
                                                                <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeFt;?>&&cat_id=<?php echo $category_Ft;?>"><?php echo $titleeFt; ?></a>
                                                            </h4>
                                    <p class="common_news_content" style="height:67px; overflow:hidden">
                                    
                                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeFt;?>&&cat_id=<?php echo $category_Ft;?>"><?php echo $short_description_shorteFt; ?></a>
                                        </p>
                                    <ul style="margin-bottom:5px;">
                                    <?php
                                        $queryFt="select * from news_manage where category='6' and sub_category !=1 and n_id!='$newsIdeFt' 
                                        and status=1 order by n_id desc limit 4";
                                         $resultFt=mysql_query($queryFt);
                                         while($rowFt=mysql_fetch_array($resultFt)){
                                         $titleFt=$rowFt['headline'];
                                         $newsIdFt=$rowFt['n_id'];
                                         $categoryFt=$rowFt['category'];
                                         ?>
                                        <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdFt;?>&&cat_id=<?php echo $categoryFt;?>" style="text-decoration:none;">
										<?php 
										$stringbottom1s11 = strip_tags($titleFt);
							if (strlen($stringbottom1s11) > 50) {
								$stringCuts11 = substr($stringbottom1s11, 0, 50);
								$stringbottom1s11 = substr($stringCuts1, 0, strrpos($stringCuts11, ' ')); 
							}
							echo $stringbottom1s11;
										//echo $titleFt; ?></a></span> </li>
                                        <?php
                                         }
                                         ?>
                                </ul>
                                </div>
						<div class="common_eventbox_1">
			     					
			     				</div>
						</div>
			     		</div>
				
     					<div class="con_row8_right">
     						<div class="common_header">Live Cricket Update </div>
     						<div class="common_adbox_1" style="float:left">
                          
                            <?php include('cricinfo.php');?>
                            
                            			
                            </div>
     						<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/gp-ad_obs.png" width="315" height="109" class="smimg"></div>
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
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=7&&page=1">Entertainment</a></div>
                                <?php
								 $querynews1="select * from news_manage where category = 7  and sub_category = 7 and top_news=1 and status=1 order by n_id desc limit 1";
								 $resulte1=mysql_query($querynews1);
								 $rowe1=mysql_fetch_array($resulte1);
								 $titlee1=$rowe1['headline'];
								 $newsIde1=$rowe1['n_id'];
								 $image_title_shorte1=$rowe1['headline'];
								 $image_shorte1=$rowe1['image'];
								 $short_description_shorte1=$rowe1['short_description'];
								 $categoryl2e=$rowe1['category'];
							  ?>
									<div class="picture_box_1">
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shorte1; ?>" width="660" height="439" class="smimg"></a></div>
                                    <div class="news_box_1">
						<h4 class="common_news_title" style="width:100%; height:40px; overflow:hidden">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>"><?php echo $titlee1; ?></a>
						</h4>
						<p class="common_news_content" style="height:67px; overflow:hidden">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>"><?php echo $short_description_shorte1; ?></a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryl1="select * from news_manage where category='7'  and sub_category = 7 and n_id!='$newsIde1' 
							and status=1 order by n_id desc limit 4";
                             $resultl1=mysql_query($queryl1);
                             while($rowl1=mysql_fetch_array($resultl1)){
                             $titlel1=$rowl1['headline'];
                             $newsIdl1=$rowl1['n_id'];
							 $categoryl1=$rowl1['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;">
							<?php 
							$stringbottom1e = strip_tags($titlel1);
							if (strlen($stringbottom1e) > 50) {
								$stringCute = substr($stringbottom1e, 0, 50);
								$stringbottom1e = substr($stringCute, 0, strrpos($stringCute, ' ')); 
							}
							echo $stringbottom1e;
							//echo $titlel1; ?></a></span> </li>
                            <?php
                             }
                             ?>
					</ul>
     				</div>
			     				<div class="common_eventbox_1">
			     					
			     				</div></div>
								
			     			<div class="row10_sub_right">
                            <div class="common_adbox_sports"><img src="<?php echo base_url();?>assets/images/front/ad11.jpg" width="352" height="46" class="smimg"></div>
                            <?php
				$querynewsBollywood="select * from news_manage where category = 7 and sub_category != 7  and n_id!='$newsIdl1' and top_news=1 and status=1 
								order by n_id desc limit 1";
								$resulteBL1=mysql_query($querynewsBollywood);
								$roweBL1=mysql_fetch_array($resulteBL1);
								$titleeBL1=$roweBL1['headline'];
								$newsIdeBL1=$roweBL1['n_id'];
								$image_title_shorteBL1=$roweBL1['headline'];
								$image_shorteBL1=$roweBL1['image'];
								$short_description_shorteBL1=$roweBL1['short_description'];
								$category_BL1=$roweBL1['category'];
								?>
                                <div class="picture_box_entertainment">
<a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeBL1;?>&&cat_id=<?php echo $category_BL1;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shorteBL1; ?>" width="600" height="400" class="smimg"></a></div>
								<div class="news_box_1">
						<h4 class="common_news_title" style="width:100%; height:40px; overflow:hidden">
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeBL1;?>&&cat_id=<?php echo $category_BL1;?>"><?php echo $titleeBL1; ?></a>
						</h4>
						<p class="common_news_content" style="height:67px; overflow:hidden">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeBL1;?>&&cat_id=<?php echo $category_BL1;?>"><?php echo $short_description_shorteBL1; ?></a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryBL="select * from news_manage where category='7' and sub_category != 7 and n_id!='$newsIdeBL1' 
							and status=1 order by n_id desc limit 4";
                             $resultBL=mysql_query($queryBL);
                             while($rowBL=mysql_fetch_array($resultBL)){
                             $titleBL=$rowBL['headline'];
                             $newsIdBL=$rowBL['n_id'];
							 $categoryBL=$rowBL['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdBL;?>&&cat_id=<?php echo $categoryBL;?>" style="text-decoration:none;">
							
							<?php 
							$stringbottom1e1 = strip_tags($titleBL);
							if (strlen($stringbottom1e1) > 50) {
								$stringCute1 = substr($stringbottom1e1, 0, 50);
								$stringbottom1e1 = substr($stringCute1, 0, strrpos($stringCute1, ' ')); 
							}
							echo $stringbottom1e1;
							//echo $titleBL; ?></a></span> </li>
                            <?php
                             }
                             ?>
					</ul>
     				</div>
						<div class="common_eventbox_1">
			     					
			     				</div>
								</div>
								
			     		</div>
				
     					<div class="con_row10_right">
     						<div class="common_header">Rumour</div>
								
     						<?php include('gujob.php'); ?>
     					</div>
			     	</div>
						<div class="clearfloat"></div>
						<div class="con_row11">
			     		<div class="con_row11_left">
			     			<?php include('education.php'); ?>
			     			<?php include('health.php'); ?>
			     		</div>
				
     					<div class="con_row11_right">	
                        <div class="common_header">Poll</div>
						
     						<div class="rightbox_bottom" id="votingPanel">	
                            <form method="post" action="<?php echo base_url();?>index/voting" name="votingForm">					
                            <div class="poll_box">
						<h4><?php echo $voting_value['title'];?></h4>
						<p><?php echo $voting_value['voting_sub'];?></p>
                        
											<div class="pollrow_1">Do you agree ?&nbsp;&nbsp;&nbsp;&nbsp;
												<input name="voting_val" type="radio" value="yes" id="yes">
												Yes
												<input name="voting_val" type="radio" value="no" id="no">
												No<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="voting_val" type="radio" value="no_comments" id="no_comments">
												No Comments
                                                </div>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit" type="button" class="button_vote" value="Vote Now" onClick="form_submit();" />
								  </div>
												
									<div class="pollrow_rght">
                                    <input name="result" type="button" class="button_vote" value="View Result" id="vot_result" />
                                    </div>
							  </div>
                                           
     						</div>
                            </form>
     						</div>
                            <?php //include('distric_news.php'); ?>
                            <div class="rightbox_bottom" id="voting_result">	
                            				
                            <div class="poll_box">
                            <h4><?php echo $voting_value['title'];?></h4>
							<p><?php echo $voting_value['voting_sub'];?></p>
                            <?php 
							if($yes>0){
							?>
                            <h4 style="padding:0px; margin:0px; font-size:14px">Yes &nbsp; - &nbsp;<?php echo $total_parcent_yes;?>%</h4>
                            <div id="vote-grph-yes"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php
                            }
							if($no>0){
							?>
                            
                            <h4 style="padding:0px; margin:0px; font-size:14px">No &nbsp; - &nbsp;<?php echo number_format($total_parcent_no,'0');?>%</h4>
                            <div id="vote-grph-no"  style="border:1px solid #ccc; width:200px; height:13px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							if($no_comments>0){
							?>
                            <h4 style="padding:0px; margin:0px; font-size:14px">No Comments&nbsp; - &nbsp;<?php echo number_format($total_parcent_nocomments,'0');?>%</h4>
                            <div id="vote-grph-nocoments"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							?>
                            <h5 style="padding:0px; margin:0px; padding-top:10px; font-size:14px">Total Voting &nbsp; - &nbsp;
							<?php 
							if($yes>0 || $no>0 ||$no_comments>0){
								echo $totalResults;
							}
							?></h5>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit3" type="button" class="button_vote" value="Voting Board" id="voting" />
								  </div>
												
							  </div>
                                           
     						</div>
     						</div>
                            <div class="con_row3_right">
                <div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="315" height="109" class="smimg"></div>
                <div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/gp-ad_obs.png" width="315" height="109" class="smimg"></div>
                	
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
     				<div class="common_header">Prayer Time Schedele  </div>
						
     				<div class="rightbox_bottom">
     					<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<th width="65%"  scope="col"><table width="97%" height="39" border="0" cellpadding="0" cellspacing="0">
                                                 <?php 
												foreach($prayer_time as $coin):
												$name=$coin->coin_name;
												$time=$coin->buy;
												?>
<tr>
														<th width="26%" height="39" scope="col"><img src="<?php echo base_url();?>assets/images/front/mosk.png" width="33" height="23"></th>
				    <td width="9%" align="left" scope="col"><?php echo $name;?></td>
				    <td width="23%" align="center" scope="col">--</td>
				    <td width="42%" align="left" scope="col"><?php echo $time;?></td>
</tr>
												<?php
                                                endforeach;
												?>	
													
													
													
											  </table></th>
										  <th width="35%"  scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <?php 
									$query=mysql_query("select * from pray_time where coin_id=6 order by coin_id asc");
									$row=mysql_fetch_array($query);
									$sine_time=$row['coin_name'];
									$sine_name=$row['buy'];
									
									
									$querys=mysql_query("select * from pray_time where coin_id=7 order by coin_id asc");
									$rows=mysql_fetch_array($querys);
									$sine_times=$rows['coin_name'];
									$sine_names=$rows['buy'];
										  ?>
													<tr>
														<th align="center" scope="col"><img src="<?php echo base_url();?>assets/images/front/sunshine.png" width="49" height="36"><br>
															<?php echo $sine_name;?> <?php echo $sine_time;?> </th>
													</tr>
                                                    <tr><td>&nbsp;</td></tr>
													<tr>
														<td align="center"><img src="<?php echo base_url();?>assets/images/front/sunset.png" width="49" height="36"><br>
															<?php echo $sine_names;?> <?php echo $sine_times;?>  </td>
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
				
  					<div class="con_row14_right">		<div class="common_header">Weather Update </div>
						
     				<div class="rightbox_bottom">
                    <!--<img src="<?php echo base_url();?>assets/images/front/weather.jpg" width="600" height="530" class="smimg">-->
                    <a href="http://www.accuweather.com/en/bd/dhaka/28143/weather-forecast/28143" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1393869540235" class="aw-widget-current"  data-locationkey="28143" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1393869540235"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>



</div>
     				<div class="common_adbox_1"><a href="http://www.evangelarchitect.com/" target="_blank"><img src="<?php echo base_url();?>assets/images/front/evangel_ad1.png" width="314" height="132" class="smimg"></a></div>
									
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
     				<div class="common_header">Job Career</div>
						
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
     						<div class="common_header"><strong>Bbc - Bangla </strong></div>
											<div class="rightbox_bottom">
												<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
													<tr>
														<th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="41%" scope="col">WORLD NEWS</th>
														<th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="26%" scope="col">PROVATI</th>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th>PROTTUSHA</th>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th>PORIKROMA</th>
													</tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th>PROBAH </th>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th>SANGLAP</th>
													</tr>
												</table>
											</div>
     					</div>
			     	</div>
						<div class="clearfloat"></div>
											
						<div class="con_row17">
     		<div class="con_row17_left">
	<div class="lt_row">Photo gallery</div>
    <div class="vedio_row">Vedio Gallery</div>
    
		<?php /*?><ul id="myGallery">
		 <?php
         foreach($photo_list as $photo):
		 	$ph_name=$photo ->ph_name;
			$ph_ima=$photo ->ph_ima;
			//$ph_id=$menu -> ph_id;
		?>
            <li>
              <a href="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>">
                <img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" class="image0">
              </a>
            </li>
           <?php
        endforeach;
		?>
       </ul><?php */?>		
       <?php /*?><div class="slide_show">
    <div id="gallery" class="ad-gallery">
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
    </div>
    </div><?php */?>
	
		<link rel="stylesheet" href="<?php echo base_url();?>assets/nslider/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nslider/nivo-slider.css" type="text/css" media="screen" />

<div id="wrapper" style="margin-top:10px;">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php
                        foreach($photo_list as $photo):
                        $ph_name=$photo ->ph_name;
                        $ph_ima=$photo ->ph_ima;
                    ?>
            <img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" title="<?php echo $ph_name;?>" width="500" height="300" style="width:500px; height:300px;"/>
            <?php
        endforeach;
		?> 
            </div>
        </div>
    </div>
    <div style="float:left; width:100px; margin-left:10px;">
    	<?php
                  
				  $resp21=mysql_query("select * from vedio_gallery order by photo_album_id desc limit 1");
                    while($row1=mysql_fetch_array($resp21))
                    {
					 $vedio_id1=$row1['photo_album_id'];
					 $vedio_title1=$row1['photo_album_name'];
					 $album_ima1 =$row1['album_ima'];
					 $youtube_link1=$row1['vedio_link'];
					?>
					<div class="sp_box1_left_img" style="margin-bottom:10px;">
                    <div>
 <!--<iframe width="100" height="80" src="<?php echo $youtube_link;?>"
                    frameborder="0" style="overflow:hidden; z-index:1; position:relative" longdesc="0" hspace="0" marginheight="20"></iframe>--><a href='<?php echo $youtube_link1;?>' class="iframe">
                    <img src="<?php echo base_url();?>uploads/images/vedio/<?php echo $album_ima1;?>" title="<?php echo $image_title;?>"  width="150" height="90" />
                    <div class="vedio_icon"></div>
                    </a>
                    </div>
                    <div style="background:#eaeaea; width:144px; padding:3px;"><?php echo $vedio_title1;?></div>
                    </div>
                    <?php
                    }
					?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" bgcolor="#FFFFFF">
                    <?php
				    $resp2=mysql_query("select * from vedio_gallery where photo_album_id!='$vedio_id1' order by photo_album_id desc limit 4");
					$count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
					 $vedio_id=$row['photo_album_id'];
					 $vedio_title=$row['photo_album_name'];
					 $album_ima =$row['album_ima'];
					 $youtube_link=$row['vedio_link'];
					if($count==2) 
					{
					print "</tr>";
					$count = 0;
					}
					if($count==0)
					print "<tr>";
					print "<td width='5%'>&nbsp;</td>";
					print "<td>";
					?>
					<div class="sp_box1_left_img">
                    <div>
 <!--<iframe width="100" height="80" src="<?php echo $youtube_link;?>"
                    frameborder="0" style="overflow:hidden; z-index:1; position:relative" longdesc="0" hspace="0" marginheight="20"></iframe>--><a href='<?php echo $youtube_link;?>' class="iframe">
                    <img src="<?php echo base_url();?>uploads/images/vedio/<?php echo $album_ima ;?>" title="<?php echo $image_title;?>"  width="70" height="50" style="z-index:100" />
                    <div class="vedio_icon1">&nbsp;</div>
                    </a>
                    </div>
                    <div style="background:#eaeaea; width:66px; height:auto; padding:3px; margin-bottom:3px;"><?php echo $vedio_title;?></div>
                    </div>
                    <?php
					$count++;
					print "</td>";
					$i++;
					}
					if($count>0)
					print "</tr>";
					?>
                    </table>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>assets/nslider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>	     
    <div class="popular_news">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left">
                            <!--<tr><td colspan="10"><div class="common_header">আলোচিত সংবাদ</div></td></tr>-->
                            <tr><td colspan="4" height="5"></td></tr>
                            <tr>
                            <?php
                        $queryPop="select * from photo_album order by photo_album_id asc limit 4";
                         $resultPop=mysql_query($queryPop);
                         while($rowPop=mysql_fetch_array($resultPop)){
                         //$photo_album_id=$rowPop['photo_album_id'];
                         $category=$rowPop['category'];
                         //$image_shortPop=$rowPop['album_ima'];
                         //$photo_album_name=$rowPop['photo_album_name'];
                        ?>
                            	<td valign="top" align="center">
                                	<table width="100%" cellpadding="0" align="center" cellspacing="0" border="0" style="border:0px;width:auto">
                                    <tr><td colspan="3"><div class="common_header" style="font-size:12px;"><?php echo $category;?></div></td> 
                                    <td>&nbsp;</td>
</tr>
                                        <tr>
                                         <?php
                          $queryPop1="select * from photo_album where category='$category' order by photo_album_id desc limit 2";
									 $resultPop1=mysql_query($queryPop1);
									 while($rowPop1=mysql_fetch_array($resultPop1)){
									 $photo_album_id=$rowPop1['photo_album_id'];
									 //$category=$rowPop['category'];
									 $image_shortPop=$rowPop1['album_ima'];
									 $photo_album_name=$rowPop1['photo_album_name'];
												?>
                                                
                                            <td valign="top" width="25%">
                                                <table width="100%" border="0">
                                               
                                                  <tr>
                                                    <td><a href="<?php echo base_url();?>index/gallery_slider?album_id=<?php echo $photo_album_id;?>" style="text-decoration:none; color:#333; border:none" class='iframe'>
                                                <img src="<?php echo base_url();?>uploads/images/album/<?php echo $image_shortPop; ?>" width="148" height="130" style="float:left; width:60px; height:80px; padding:5px; border:1px solid #ccc; ">                                                </a></td>
                                                    
                                                  </tr>
                                                 
                                                  <tr>
                                                    <td><a href="<?php echo base_url();?>index/gallery_slider?album_id=<?php echo $photo_album_id;?>" style="text-decoration:none;  border:none" class='iframe'>
                                                    <div style="background:#eaeaea; color:#333; padding:3px;"><?php echo $photo_album_name;?></div>
                                                </a>
                                                
                                                </td>
                                                 </tr> 
												  
                                                </table>

                                                
                                                </td>
                                                <td>&nbsp;</td>
                                                <?php
                                                  }
												  ?>
                                            
                                        </tr>
                                    </table>
                              </td>
                                
						<?php 
                        }
                        ?>
                            </tr>
                            
                        </table>
                        
			     		</div>
                        
    		</div>
    		
				
     					<div class="con_row17_right">
     						<!--<div class="common_adbox_3"><img src="<?php echo base_url();?>assets/images/front/ad19.jpg" width="316" height="193" class="smimg"></div>-->
										<div class="common_header">Travel & Landscape</div>	
     						<div class="common_adbox_2"><!--<img src="<?php echo base_url();?>assets/images/front/ad22.jpg" width="318" height="330" class="smimg">-->
                            <?php include('hawa_bodol.php');?>
                            </div>
     					</div>
                        
			     	</div>
				<div class="clearfloat"></div>		
</div>	
<div class="clearfloat"></div>
</body>
</html>