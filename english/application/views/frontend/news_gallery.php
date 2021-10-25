<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
if(isset($_REQUEST['scat_id'])){
$cat_id=$_REQUEST['cat_id'];

$subcat_id=$_REQUEST['scat_id'];
$querycat="select * from sub_category where scid='$subcat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['sub_cat_name'];
}
else{
	//if(isset($_REQUEST['cat_id'])){
$cat_id=$_REQUEST['cat_id'];
if($cat_id==19){
//header("Location: http://www.mysite.com target:", "_blank")
	?>
    <script>
	window.open("http://blog.dhakaobserver.com/", "_blank");
    window.history.back();
    </script>
    <?php
}

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];

//}

}
?>

<?php /*?><?php
$cat_id=$_REQUEST['cat_id'];
if($cat_id==19){
//header("Location: http://www.mysite.com target:", "_blank")
	?>
    <script>
	window.open("http://blog.dhakaobserver.com/", "_blank");
    window.history.back();
    </script>
    <?php
}

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];
//include('pagination.php');
?><?php */?>
<?php
include('pagination.php');
	$tbl_name="news_manage";		//your table name
	$adjacents = 3;
	$query = "SELECT COUNT(*) as num FROM $tbl_name where category ='$cat_id'";
	$total_pages1 = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages1['num'];
	$targetpage = base_url()."index/news_gallery"; 	//your file name  (the name of this file)
	$limit = 15;
	//if(isset($_REQUEST['page'])){						//how many items to show per page
	$page = $_REQUEST['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	

	//if no page var is given, set start to 0
//===========================for Filtering date===========================
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1

	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$prev\"> << </a>";
		else
			$pagination.= "<span class=\"disabled\"> << </span>";	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lastpage\">$lastpage</a>";		
			}

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lastpage\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$next\">>></a>";

		else

			$pagination.= "<span class=\"disabled\">next >></span>";

		$pagination.= "</div>\n";		

	}
	//}
?>
	<div class="clearfloat"></div> 
<div class="container">
     	<div class="con_row1">
     		<div class="con_row1_left">Headlines</div>
				
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
							<div class="common_header"><a href="<?php echo base_url();?>">Home </a>&gt;&gt; <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $cat_id; ?>"><?php echo $category_name;?></a></div>
							<?php include('top_desk_slider_gallery.php');?>													
							<div class="clearfloat"></div>													     	
     		
            <div class="gallery">

<?php 
                   // $resp2=mysql_query("select * from product_gallery order by product_id desc limit 12");
/*				   if(isset($_REQUEST['page'])){
$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by n_id desc limit $start, $limit");
}
else{
$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by n_id desc");

}*/
if(isset($_REQUEST['scat_id'])){
$resp2=mysql_query("select * from news_manage where category='$cat_id' and sub_category='$subcat_id' and status=1 order by n_id desc limit $start, $limit");

					}
					else{
$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by n_id desc limit $start, $limit");

					}

$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by n_id desc limit $start, $limit");

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
			
            
            
            
            				
     		<div class="pagination">
            <!--<img src="<?php echo base_url();?>assets/images/front/page.jpg" width="578" height="37"  class="smimg">-->
             <?php
						//if(isset($_REQUEST['page'])){
						 echo $pagination;
						// }
						 ?>
            </div>
            
            
            
            
            
     		<div class="clearfloat"></div>					
     		</div>
     		<div class="details_con1_right">
								<?php include('most_read_news.php');?>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg"></div>
								<?php //include('rel_cat_news.php');?>
								<div class="common_adbox_1">
                                <?php include('facebook.php');?>
                                </div>
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
								
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