<div class="news_right_subcon">
								<div class="common_header">RELATED NEWS </div>
		
        						<div class="rightbox_bottom">	
        
        <?php
		 foreach($cat_rel_news as $rel_news):
			$headline=$rel_news ->headline;
			$n_id=$rel_news ->n_id;
			$category=$rel_news ->category;
			$image=$rel_news ->image;
			
			$newsId[]=$n_id;
		?>
        <div class="rel_news">
		<div class="lftrel_rr2">
        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;">
        <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image;?>" width="76" height="70" class="smimg">
        </a></div>
		<div class="rightrel_rr2">
     					<p class="news_txt3"><?php 
						$stringbottom1 = strip_tags($headline);
							if (strlen($stringbottom1) > 50) {
								$stringCut = substr($stringbottom1, 0, 50);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
							}
							?>
							<a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php echo $stringbottom1; ?></a></p>
    						<p>&nbsp;</p>
					</div>
		</div>
        <?php
			endforeach;
		?>



		<div class="clearfloat"></div>
		<ul>
        <?php
$newsArray=join(',',$newsId);
		$nId=$_REQUEST['id'];
$queryl1="select * from news_manage where category='$category' and n_id NOT IN ($newsArray,$nId) and status=1 order by n_id desc limit 10";
					 $resultl1=mysql_query($queryl1);
					 while($rowl1=mysql_fetch_array($resultl1)){
					 $titlel1=$rowl1['headline'];
					 $newsIdl1=$rowl1['n_id'];
					 $categoryl1=$rowl1['category'];
					 ?>
	<li><span><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdl1;?>&&cat_id=<?php echo $categoryl1;?>" style="text-decoration:none;">
	<?php 
					$stringbottom1 = strip_tags($titlel1);
							if (strlen($stringbottom1) > 45) {
								$stringCut = substr($stringbottom1, 0, 45);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
							}
							echo $stringbottom1;
					?>
    </a></span> </li>
    <?php
					 }
					 ?>
	</ul></div>
								</div>