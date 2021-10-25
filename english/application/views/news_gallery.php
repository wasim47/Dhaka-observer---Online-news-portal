<?php
$cat_id=$_REQUEST['cat_id'];
if($cat_id==19){
//header("Location: http://www.mysite.com target:", "_blank")
	?>
    <script>
	window.open("http://dhakaobserver.com/englishblog/", "_blank");
    window.history.back();
    </script>
    <?php
}

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];
include('pagination.php');
?>

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
     		<div class="con_row2_col_1"><img src="<?php echo base_url();?>assets/images/front/ad1.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_2"><img src="<?php echo base_url();?>assets/images/front/ad2.jpg" width="330" height="110" class="img_ad1"></div>
				
     		<div class="con_row2_col_3"><img src="<?php echo base_url();?>assets/images/front/ad3.jpg" width="314" height="110" class="img_ad1"></div>
     	</div>
			
     	<div class="details_con1">
     		<div class="details_con1_left">
							<div class="lt_row">HOME  &gt;&gt;  <?php echo $category_name;?></div>
							<?php include('top_desk_slider_gallery.php');?>														
							<div class="clearfloat"></div>													     	
     		
            <div class="gallery">

<?php 
                   // $resp2=mysql_query("select * from product_gallery order by product_id desc limit 12");
				   if(isset($_REQUEST['page'])){
$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by news_id desc limit $start, $limit");
}
else{
$resp2=mysql_query("select * from news_manage where category='$cat_id' and status=1 order by news_id desc");

}


                    $count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
                     $title=$row['headline'];
					 $newsId=$row['news_id'];
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
									<div class="gallery_item_row_2"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;" class="news_title_2">
                                    <?php 
							/*$stringbottom1t = strip_tags($title);
							if (strlen($stringbottom1t) > 25) {
								$stringCutt = substr($stringbottom1t, 0, 25);
								$stringbottom1t = substr($stringCutt, 0, strrpos($stringCutt, ' ')); 
							}*/
							?>
                         <?php echo $title; ?>
                         
                         
                         
                         </a></div>
                                    <?php 
							$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 160) {
								$stringCuts = substr($stringbottom1s, 0, 160);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'.'<div><a href="'.base_url().'index/news_details?id='.$newsId.'&&cat_id='.$news_categorytop.'" style="font-weight:bold; float:right">More...</a></div>'; 
							}
							?>
									<div class="gallery_item_row_3"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333">
                            <?php echo $stringbottom1s; ?></a></div>
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
						if(isset($_REQUEST['page'])){
						 echo $pagination;
						 }
						 ?>
            </div>
            
            
            
            
            
     		<div class="clearfloat"></div>					
     		</div>
     		<div class="details_con1_right">
								<?php include('most_read_news.php');?>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg"></div>
								<?php include('rel_cat_news.php');?>
								<div class="common_adbox_1">
                                <?php include('facebook.php');?>
                                </div>
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
								<div class="fbcon"><img src="<?php echo base_url();?>assets/images/front/fb.jpg" width="312" height="332" class="smimg"></div>
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