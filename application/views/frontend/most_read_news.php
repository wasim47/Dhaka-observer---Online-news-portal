<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
                <div class="news_right_subcon">
								<div class="common_header">সর্বাধিক পঠিত খবর</div>
								<div class="rightbox_bottom"><ul>
                                <?php
                                 foreach($rel_news as $rel_news):
                                    $headline=$rel_news ->headline;
                                    $n_id=$rel_news ->n_id;
                                    $category=$rel_news ->category;
                                ?>
	<li><span>
    <?php 
	$stringbottom1 = strip_tags($headline);
							if (strlen($stringbottom1) > 80) {
								$stringCut = substr($stringbottom1, 0, 80);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
							}
							?>
							<a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php echo $stringbottom1; ?></a>
    </span> </li>
    <?php
                                endforeach;
                                ?>
	
	</ul></div>
								</div>
</body></html>