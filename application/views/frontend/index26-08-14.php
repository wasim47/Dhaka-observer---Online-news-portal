<link rel="stylesheet" href="<?php echo base_url();?>assets/res/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/res/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url();?>assets/js/front/jquery.colorbox.js"></script>
        <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/css/front/colorbox.css" />-->
		<script>
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
<style type="text/css">
#rollBanner1 {
	width:100%;
    height:auto;
    border:0px;
	position:relative;
	padding-top:0px;
	float:left;
}
#rollBanner1 p    {
    position:absolute;
    margin:0;
}
#rollBanner1 p a   {
    margin:0;
	text-decoration:none;
	color:#fff;
}
.special_news{
  text-decoration: none;
  color: #ffffff;
  border-bottom: 1px solid #600;
  padding: 0px 8px 0px 8px;
  background: #b80002;
  margin-left: 1px;
  cursor:pointer;
  font-size:17px;
}
/*.hover_img a:hover img{
		width:300px;
		height:300px;
		border:1px solid #CCCCCC;
		padding:5px;
}*/


td.enlarge{
list-style-type:none; 
margin-left:0;
}
td.enlarge li{
display:inline-block; 
position: relative;
z-index: 3; 
font-size:17px;
}
td.enlarge img{
background-color:#eae9d4;
padding: 6px;
-webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
-moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
box-shadow: 0 0 6px rgba(132, 132, 132, .75);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
td.enlarge span{
position:absolute;
left: -9999px;
background-color:#eae9d4;
padding: 5px;
font-family: 'Droid Sans', sans-serif;
font-size:.9em;
text-align: center;
color: #495a62;
-webkit-box-shadow: 0 0 20px rgba(0,0,0, .75));
-moz-box-shadow: 0 0 20px rgba(0,0,0, .75);
box-shadow: 0 0 20px rgba(0,0,0, .75);
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius:8px;
z-index: 3;
display:none;
}
td.enlarge li:hover{
z-index: 3;
cursor:pointer;
display:none;
}
td.enlarge span img{
padding:2px;
background:#ccc;
width:350px;
height:300px;
z-index: 3;
display:none;

}
td.enlarge li:hover span{
left: 100px;
z-index: 3;
display:none;
}
</style>

<script type="text/javascript">
function    rollBanner(divId,intervalTime)  {
    var divId = document.getElementById(divId); 
    var pTag =  divId.getElementsByTagName("p")[0];
    var imgTag =  divId.getElementsByTagName("img"); 
    var textTag = divId.getElementsByTagName("a"); 
    var pWidth = pTag.offsetWidth; 
    var speed = 1; 
    pTag.style.left = 0 + "px";
    var bannerArray = new Array(); 
    bannerArray[0] = pTag.innerHTML; 
 
    if (textTag.length != 0) 
    {
        if (pWidth > divId.offsetWidth) 
        {
            pTag.style.left = pTag.offsetLeft; 
            pTag.innerHTML=pTag.innerHTML+bannerArray[0]; 
 
            var rollInterval = setInterval(
            function()
            {
                pTag.onmouseover = function() {
                    speed=0;
                };
                pTag.onmouseout = function() {
                    speed=1;
                };
 
                pTag.style.left =  parseInt(pTag.style.left)-speed + "px";
                if (parseInt(pTag.style.left) % pWidth==0)
                {
                    pTag.innerHTML=pTag.innerHTML+bannerArray[0]; 
                }
            }
            ,intervalTime);
 
        }
    }
 
}
 
</script>
</head>

<body>
<?php	
//if($showlightbox){ 
//include("subscriber.php");
//} 
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
			$news_id=$bnews->news_id;
			$category=$bnews->category;
			/*if($dtime <= $ptime){
            echo "";
			}
			else{*/
			?>
			<a href="<?php echo base_url();?>index/news_details?id=<?php echo $news_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#fff">
			<?php echo $bnews->headline.'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;'; ?></a>
            <?php
			//}
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
        
        
     	<div class="con_row3">
			
    <div class="con_row3_left">
			<div class="common_header">টপ নিউজ ডেস্ক</div>
			<?php include('top_desk_slider.php');?>
			
	   	<div class="clearfloat"></div>
    </div>
				
     		<div class="con_row3_right">
     			<div class="common_header">সর্বশেষ সংবাদ</div>
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
                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; "><div style="width:100%; height:auto; float:left; padding:5px;font-size:17px;  border-bottom:1px solid #CCCCCC">
                    
         <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" width="100" height="69" style="float:left; width:100px; height:69px; padding:5px;  margin-right:10px; border:1px solid #ccc; ">
		 <?php echo $title; ?>
                           
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
				
     					<div class="con_row6_right"><img src="<?php echo base_url();?>assets/images/front/do_ad_ogl.png" width="317" height="140" class="smimg"></div>
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
                        <div class="common_header">মুদ্রা বাজার</div>
     					<div class="rightbox_bottom2">
     					<table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr>
									<th width="6%" align="left" bgcolor="#800000" class="txt_1" scope="col">&nbsp;</th>
									<th width="37%" height="25" align="left" bgcolor="#800000" class="txt_1" scope="col">মুদ্রার নাম </th>
									<th width="32%" align="left" bgcolor="#800000" class="txt_1" scope="col">বিক্রয়</th>
									<th width="25%" align="left" bgcolor="#800000" class="txt_1" scope="col">ক্রয়</th>
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
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=6&&page=1">খেলাধুলা </a></div>
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
									<div class="picture_box_sports">
                                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortesp; ?>" width="660" height="439" class="smimg"></a></div>
                                    <div class="news_box_1">
						<h4 class="common_news_title" style="width:100%; margin-bottom:8px; margin-top:12px">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>"><?php echo $titleesp; ?></a>
						</h4>
						<p class="common_news_content" style="height:80px;">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdesp;?>&&cat_id=<?php echo $category_sport;?>">
							<?php 
							$stringbottom1nats = strip_tags($short_description_shortesp);
							if (strlen($stringbottom1nats) > 400) {
								$stringCutnats = substr($stringbottom1nats, 0, 400);
								$stringbottom1nats = substr($stringCutnats, 0, strrpos($stringCutnats, ' ')).'.....'; 
							}
							?>
							<?php echo $stringbottom1nats; ?></a>
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
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;"><?php echo $titlel1; ?></a></span> </li>
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
                                    <h4 class="common_news_title" style="width:100%; margin-bottom:8px; margin-top:12px">
                                                                <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeFt;?>&&cat_id=<?php echo $category_Ft;?>"><?php echo $titleeFt; ?></a>
                                                            </h4>
                                    <p class="common_news_content" style="height:80px;">
                                    
                                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeFt;?>&&cat_id=<?php echo $category_Ft;?>">
									<?php 
                                    $stringbottom1nats1 = strip_tags($short_description_shorteFt);
                                    if (strlen($stringbottom1nats1) > 400) {
                                        $stringCutnats1 = substr($stringbottom1nats1, 0, 400);
                                        $stringbottom1nats1 = substr($stringCutnats1, 0, strrpos($stringCutnats1, ' ')).'.....'; 
                                    }
                                    ?>
                                    <?php echo $stringbottom1nats1; ?>
                                        </a>
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
                                        <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdFt;?>&&cat_id=<?php echo $categoryFt;?>" style="text-decoration:none;"><?php echo $titleFt; ?></a></span> </li>
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
     						<div class="common_header">লাইভ ক্রিকেট আপডেট</div>
     						<div class="common_adbox_1" style="float:left">
                          
                            <?php include('cricinfo.php');?>
                            
                            			
                            </div>
     						<div class="common_adbox_2" style="margin-top:25px">
                            <img src="<?php echo base_url();?>assets/images/front/mridha_ad.png" width="315" height="109" class="smimg"></div>
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
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=7&&page=1">বিনোদন</a></div>
                                <?php
								 $querynews1="select * from news_manage where category = 7  and sub_category = 5 and top_news=1 and status=1 order by n_id desc limit 1";
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
						<h4 class="common_news_title" style="width:100%; margin-bottom:8px; margin-top:12px">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>"><?php echo $titlee1; ?></a>
						</h4>
						<p class="common_news_content" style="height:80px; overflow:hidden">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIde1;?>&&cat_id=<?php echo $categoryl2e;?>">
							<?php 
                                    $stringbottom1nate1 = strip_tags($short_description_shorte1);
                                    if (strlen($stringbottom1nate1) > 400) {
                                        $stringCutnate1 = substr($stringbottom1nate1, 0, 400);
                                        $stringbottom1nate1 = substr($stringCutnate1, 0, strrpos($stringCutnate1, ' ')).'.....'; 
                                    }
                                    ?>
                                    <?php echo $stringbottom1nate1; ?>
						</a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryl1="select * from news_manage where category='7'  and sub_category = 5 and n_id!='$newsIde1' 
							and status=1 order by n_id desc limit 4";
                             $resultl1=mysql_query($queryl1);
                             while($rowl1=mysql_fetch_array($resultl1)){
                             $titlel1=$rowl1['headline'];
                             $newsIdl1=$rowl1['n_id'];
							 $categoryl1=$rowl1['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;"><?php echo $titlel1; ?></a></span> </li>
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
				$querynewsBollywood="select * from news_manage where category = 7 and sub_category != 5  and n_id!='$newsIdl1' and top_news=1 and status=1 
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
						<h4 class="common_news_title" style="width:100%; margin-bottom:8px; margin-top:12px">
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeBL1;?>&&cat_id=<?php echo $category_BL1;?>"><?php echo $titleeBL1; ?></a>
						</h4>
						<p class="common_news_content" style="height:80px;">
						
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdeBL1;?>&&cat_id=<?php echo $category_BL1;?>">
							<?php 
                                    $stringbottom1nate = strip_tags($short_description_shorteBL1);
                                    if (strlen($stringbottom1nate) > 400) {
                                        $stringCutnate = substr($stringbottom1nate, 0, 400);
                                        $stringbottom1nate = substr($stringCutnate, 0, strrpos($stringCutnate, ' ')).'.....'; 
                                    }
                                    ?>
                                    <?php echo $stringbottom1nate; ?>
								</a>
                            </p>
						<ul style="margin-bottom:5px;">
                        <?php
    						$queryBL="select * from news_manage where category='7' and sub_category != 5 and n_id!='$newsIdeBL1' 
							and status=1 order by n_id desc limit 4";
                             $resultBL=mysql_query($queryBL);
                             while($rowBL=mysql_fetch_array($resultBL)){
                             $titleBL=$rowBL['headline'];
                             $newsIdBL=$rowBL['n_id'];
							 $categoryBL=$rowBL['category'];
                             ?>
                            <li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdBL;?>&&cat_id=<?php echo $categoryBL;?>" style="text-decoration:none;"><?php echo $titleBL; ?></a></span> </li>
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
     							<?php include('gujob.php');?>
								
     						
     					</div>
			     	</div>
						<div class="clearfloat"></div>
						<div class="con_row11">
			     		<div class="con_row11_left">
			     			<?php include('education.php'); ?>
			     			<?php include('carrier.php');?>
			     		</div>
				
     					<div class="con_row11_right">	
                        <div class="common_header">অনলাইন জরিপ</div>
						
     						<div class="rightbox_bottom" id="votingPanel">	
                            <form method="post" action="<?php echo base_url();?>index/voting" name="votingForm">					
                            <div class="poll_box">
						<h4><?php echo $voting_value['title'];?></h4>
						<p><?php echo $voting_value['voting_sub'];?></p>
                        
											<div class="pollrow_1">আপনি কি একমত?&nbsp;&nbsp;&nbsp;&nbsp;
												<input name="voting_val" type="radio" value="yes" id="yes">
												হ্যাঁ
												<input name="voting_val" type="radio" value="no" id="no">
												না<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="voting_val" type="radio" value="no_comments" id="no_comments">
												মন্তব্য নেই
                                                </div>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit" type="button" class="button_vote" value="ভোট দিন" onClick="form_submit();" />
								  </div>
												
									<div class="pollrow_rght">
                                    <input name="result" type="button" class="button_vote" value="ফলাফল দেখুন" id="vot_result" />
                                    <!--<a href="#" class="poll_txt">ফলাফল দেখুন</a>--></div>
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
                            <h4 style="padding:0px; margin:0px; font-size:14px">হ্যাঁ &nbsp; - &nbsp;<?php echo $total_parcent_yes;?>%</h4>
                            <div id="vote-grph-yes"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php
                            }
							if($no>0){
							?>
                            
                            <h4 style="padding:0px; margin:0px; font-size:14px">না &nbsp; - &nbsp;<?php echo number_format($total_parcent_no,'0');?>%</h4>
                            <div id="vote-grph-no"  style="border:1px solid #ccc; width:200px; height:13px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							if($no_comments>0){
							?>
                            <h4 style="padding:0px; margin:0px; font-size:14px">মন্তব্য নেই &nbsp; - &nbsp;<?php echo number_format($total_parcent_nocomments,'0');?>%</h4>
                            <div id="vote-grph-nocoments"  style="border:1px solid #ccc; width:200px; height:14px;padding:0px; 
	margin:0px;">
                            <span><img src="<?php echo base_url();?>assets/images/front/spacer.gif" width="200" height="15" /></span></div>
                            <?php 
							}
							?>
                            <h5 style="padding:0px; margin:0px; padding-top:10px; font-size:14px">মোট ভোট সংখ্যা &nbsp; - &nbsp;
							<?php 
							if($yes>0 || $no>0 ||$no_comments>0){
								echo $totalResults;
							}
							?></h5>
							  <div class="pollrow_1">
								  <div class="pollrow_lft">
								    <input name="Submit3" type="button" class="button_vote" value="ভোট বোর্ড" id="voting" />
								  </div>
												
							  </div>
                                           
     						</div>
     						</div>
                            <div class="con_row3_right">
     			<div class="common_header">কলামিস্ট</div>
                <div class="rightbox_bottom_onnorokom" style="width:100%; float:left; max-height:265px;" id="ex3">
					<?php
                        $query="select * from columist_article where status= '1' order by n_id desc limit 2";
                         $result=mysql_query($query);
                         while($row=mysql_fetch_array($result)){
                         $title=$row['headline'];
                         $newsId=$row['n_id'];
                         $image_title_short=$row['image_title'];
                         $image_short=$row['image'];
                         $short_description_short=$row['short_description'];
                         $category=$row['category'];
						 
						 $queryColumist="select * from columist where banner_id='$category'";
						 $resultColumist=mysql_query($queryColumist);
						 $rowColumist=mysql_fetch_array($resultColumist);
						 $titleColumist=$rowColumist['image_title'];
						 $titleColumistimage=$rowColumist['image'];
                        ?>
                        <div style="width:93%; height:auto; margin:0px 0px; padding:0px;" onMouseOver="this.style.opacity='0.6'" onMouseOut="this.style.opacity='1'">
                        <div style="width:100%; background:#ECE9DD; height:30px; float:left; font-size:15px; margin-bottom:5px;border-top:4px solid #B80002; padding:0 5px;">
        						<img src="<?php echo base_url();?>uploads/images/columist/<?php echo $titleColumistimage; ?>" title="<?php echo $titleColumist; ?>" width="20" height="20" style="padding:3px; vertical-align:bottom" />&nbsp;
                                 <?php echo $titleColumist; ?>
                            </div>
                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; font-size:17px;"><div style="width:100%; height:auto; float:left; padding:5px;  border-bottom:1px solid #CCCCCC">
                    
         <img src="<?php echo base_url();?>uploads/images/columist_article/<?php echo $image_short; ?>" width="100" height="69" style="float:left; width:100px; height:69px; padding:5px; margin-right:10px; border:1px solid #ccc; "><?php echo $title; ?>
                           
                            </div></a>
                        </div>
                        <?php 
                           }
                        ?>
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
                            <div class="popular_news">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left" style="border:0px; width:auto">
                            <tr><td colspan="10"><div class="common_header">আলোচিত সংবাদ</div></td></tr>
                            <tr><td colspan="4" height="5"></td></tr>
                            <tr>
                            <?php
                        $queryPop="select * from news_manage where status= '1' and popular_news = '1' order by n_id desc limit 4";
                         $resultPop=mysql_query($queryPop);
                         while($rowPop=mysql_fetch_array($resultPop)){
                         $titlePop=$rowPop['headline'];
                         $newsIdPop=$rowPop['n_id'];
                         $image_title_shortPop=$rowPop['image_title'];
                         $image_shortPop=$rowPop['image'];
                         $short_description_shortPop=$rowPop['short_description'];
                         $categoryPop=$rowPop['category'];
                        ?>
                            	<td valign="top" align="center">
                                	<table width="100%" cellpadding="0" align="center" cellspacing="0" border="0" style="border:0px;width:auto">
                                        <tr>
                                            <td valign="top" width="33%">
                                            	<a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdPop;?>&&cat_id=<?php echo $categoryPop;?>" style="text-decoration:none; color:#333; border:none">
                                                <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortPop; ?>" width="148" height="130" style="float:left; width:148px; height:130px; padding:5px; border:1px solid #ccc; ">
                                                </a>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="33%" valign="top"> <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdPop;?>&&cat_id=<?php echo $categoryPop;?>" style="text-decoration:none; color:#000; border:none;float:left; width:148px; height:45px; font-size:14px">
											<?php 
											$stringent1 = strip_tags($titlePop);
											if (strlen($stringent1) > 95) {
												$stringCutent1 = substr($stringent1, 0, 95);
												$stringent1 = substr($stringCutent1, 0, strrpos($stringCutent1, ' ')).'.....'; 
											}
											echo $stringent1; ?>
                                            </a></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                                
						<?php 
                        }
                        ?>
                            </tr>
                            <tr><td colspan="4"><img src="<?php echo base_url();?>assets/images/front/ad02.png"></td></tr>
                        </table>
			     		</div>	
                        
			     		</div>
				
  					<div class="con_row13_right">
     						<div class="right_box1">
     				<div class="common_header">নামাজের সময়সূচী  </div>
						
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
                                    <?php //include('facebook.php');?>
                                    <?php include('special_news.php');?>
								</div>
						
 						</div>
						</div>
     				<div class="clearfloat"></div>
											
						<div class="con_row14">
			     		<div class="con_row14_left">
			     			<?php include('feature.php'); ?>
								
			     			<?php include('environment.php'); ?>
			     		</div>
				
  					<div class="con_row14_right">		<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=29&&page=1">অন্য রকম</a></div>
						
     				<div class="con_row16_right"><div class="right_box1">
     				  <div class="rightbox_bottom_onnorokom">
					<?php
                        $query="select * from news_manage where status= '1' and category = '29' order by n_id desc limit 3";
                         $result=mysql_query($query);
                         while($row=mysql_fetch_array($result)){
                         $title=$row['headline'];
                         $newsId=$row['n_id'];
                         $image_title_short=$row['image_title'];
                         $image_short=$row['image'];
                         $short_description_short=$row['short_description'];
                         $category=$row['category'];
                        ?>
                        <div style="width:93%; height:auto; margin:0px 0px; padding:0px;">
                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;  font-size:14px;"><div style="width:100%; font-size:17px;height:auto; float:left; padding:5px;  border-bottom:1px solid #CCCCCC">
                    
         <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" width="100" height="69" style="float:left; width:100px; height:69px; padding:5px; margin-right:10px; border:1px solid #ccc; "><?php echo $title; ?>
                           
                            </div></a>
                        </div>
                        <?php 
                           }
                        ?>
                    </div>
  					</div>
								</div>
     				<!--<div class="common_adbox_1">
                   <a href="#" target="_blank"><img src="<?php echo base_url();?>assets/images/front/ad_dhaka_observer.png" class="smimg"></a>
                   </div>-->
									
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
							<div class="con_row4">
     		<div class="con_row4_left">
     			<?php include('islam.php');?>
					
     			
                <?php include('recipy.php');?>
					
     			<div class="clearfloat"></div>
     		</div>
				
     		<div class="con_row4_right">
                
                <?php include('health.php'); ?>
<div class="clearfloat"></div>
     		</div>
     	</div>				
						<div class="con_row16">
			     		<div class="con_row16_left">
			     			<?php include('city_life.php');?>
								
			     			<?php include('culture.php');?>
			     		</div>
				
  					<div class="con_row16_right"><div class="right_box1">
     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=21&&page=1">মতামত</a></div>
						
     				<div class="rightbox_bottom_onnorokom">
					<?php
                        $query="select * from news_manage where status= '1' and category = '21' order by n_id desc limit 3";
                         $result=mysql_query($query);
                         while($row=mysql_fetch_array($result)){
                         $title=$row['headline'];
                         $newsId=$row['n_id'];
                         $image_title_short=$row['image_title'];
                         $image_short=$row['image'];
                         $short_description_short=$row['short_description'];
                         $category=$row['category'];
                        ?>
                        <div style="width:93%; height:auto; margin:0px 0px; padding:0px;">
                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; font-size:17px;"><div style="width:100%; height:auto; float:left; padding:5px;  border-bottom:1px solid #CCCCCC">
                    
         <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" width="100" height="69" style="float:left; width:100px; height:69px; padding:5px; margin-right:10px; border:1px solid #ccc; "><?php echo $title; ?>
                           
                            </div></a>
                        </div>
                        <?php 
                           }
                        ?>
                    </div>
  					</div>
								</div>
     					<div class="con_row16_right" style="margin-top:8px;">
     						<div class="common_header">বিবিসি - বাংলা</div>
											<div class="rightbox_bottom">
												<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
													<tr>
														<th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="41%" scope="col"><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_bul?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">বিশ্ব সংবাদ</a></th>
													  <th width="8%" scope="col"><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></th>
														<th width="26%" scope="col"><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_provati?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">প্রভাতী</a></th>
												  </tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_provati2?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">প্রত্যুষা</a></th>
													  <td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_probaho?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">পরিক্রমা</a></th>
												  </tr>
													<tr>
														<td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_parikrama?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">প্রবাহ </a></th>
													  <td><img src="<?php echo base_url();?>assets/images/front/01 (20).png" width="16" height="16"></td>
														<th><a href="http://www.bbc.co.uk/mediaselector/check/bengali/meta/tx/beng_shanglap?size=au&amp;bgc=003399&amp;lang=bn&amp;nbram=1&amp;nbwm=1">সংলাপ</a></th>
												  </tr>
												</table>
											</div>
     					</div>
			     	</div>
						<div class="clearfloat"></div>
											
						<div class="con_row17">
     		<div class="con_row17_left">
	<div class="lt_row">ফটো গ্যালারি</div>
    <div class="vedio_row">ভিডিও</div>
    
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
	
<!--		<link rel="stylesheet" href="<?php echo base_url();?>assets/nslider/default/default.css" type="text/css" media="screen" />
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
    </div>-->
    
    
<?php include("slider.php");?>
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
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left" style="border:0px; width:auto">
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
                                    <tr><td colspan="3"><div class="common_header"><?php echo $category;?></div></td></tr>
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
                                                    <td><a href="<?php echo base_url();?>index/gallery_slider?album_id=<?php echo $photo_album_id;?>" style="text-decoration:none; color:#333; border:none" class='iframe'>
                                                <?php echo $photo_album_name;?> </a></td>
                                                 </tr> 
												  
                                                </table>

                                                
                                                </td><td>&nbsp;</td>
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
     						
										<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=30&&page=1">হাওয়া বদল</a></div>	
     						<div class="common_adbox_2">
                            <?php include('hawa_bodol.php');?>
                            </div>
     					</div>
                        
			     	</div>
                    
				<div class="clearfloat"></div>		
</div>	
<div class="clearfloat"></div>
</body></html>