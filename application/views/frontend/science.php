<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
		 	 $querynat="select * from news_manage where category='8' and top_news=1 and status=1 order by n_id desc limit 1";
				 $resultnat=mysql_query($querynat);
				 $rownat=mysql_fetch_array($resultnat);
				 $titlenat=$rownat['headline'];
				 $newsIdnat=$rownat['n_id'];
				 $image_title_shortnat=$rownat['image_title'];
				 $image_shortnat=$rownat['image'];
				 $short_description_shortnat=$rownat['short_description'];
				 $categorynat=$rownat['category'];
				?>
<div class="row13_sub_left">
			     				<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $categorynat; ?>&&page=1">বিজ্ঞান ও প্রযুক্তি</a></div>
						
     							<div class="picture_box_1"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortnat; ?>" width="659" height="408" class="smimg"></a></div>
     				<div class="news_box_1">
						<h4 style="width:100%; margin-bottom:12px; margin-top:10px;"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>" style="text-decoration:none;"><?php echo $titlenat; ?></a></h4>
						<p class="common_news_content" style="height:80px;">
						<?php 
							$stringbottom1nat = strip_tags($short_description_shortnat);
							if (strlen($stringbottom1nat) > 400) {
								$stringCutnat = substr($stringbottom1nat, 0, 400);
								$stringbottom1nat = substr($stringCutnat, 0, strrpos($stringCutnat, ' ')).'.....'; 
							}
							?>
                            <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>"><?php echo $stringbottom1nat; ?></a>
                            </p>
						<ul>
                        <?php
					 $queryl1="select * from news_manage where category='8' and n_id!='$newsIdnat' 
					 and status=1 order by n_id desc limit 4";
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
     				</div>
									</div></body></html>