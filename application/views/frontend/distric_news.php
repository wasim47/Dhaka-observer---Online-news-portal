<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div class="right_box1">
     				<div class="common_header">জেলা সংবাদ</div>
						
     				<div class="rightbox_bottom"><ul>
                    <?php
                                 foreach($district_news as $dis_news):
                                    $headline=$dis_news ->headline;
                                    $n_id=$dis_news ->n_id;
                                    $category=$dis_news ->category;
                                ?>
	<li><span>
    			<?php 
					/*$stringbottom1 = strip_tags($headline);
							if (strlen($stringbottom1) > 80) {
								$stringCut = substr($stringbottom1, 0, 80);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
							}*/
					?>
							<a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php //echo $stringbottom1;
							echo $headline; ?></a>
                    
    </span> </li>
	<?php
		endforeach;
	?>
	</ul></div>
     			</div>
                </body></html>