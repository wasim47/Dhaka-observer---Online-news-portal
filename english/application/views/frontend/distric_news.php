<div class="right_box1">
     				<div class="common_header">District News </div>
						
     				<div class="rightbox_bottom"><ul>
                    <?php
                                 foreach($district_news as $dis_news):
                                    $headline=$dis_news ->headline;
                                    $news_id=$dis_news ->n_id;
                                    $category=$dis_news ->category;
                                ?>
	<li><span>
    			<?php 
					$stringbottom1 = strip_tags($headline);
							if (strlen($stringbottom1) > 40) {
								$stringCut = substr($stringbottom1, 0, 40);
								$stringbottom1 = substr($stringCut, 0, strrpos($stringCut, ' ')); 
							}
					?>
							<a href="<?php echo base_url();?>index/news_details?id=<?php echo $news_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php echo $stringbottom1; ?></a>
                    
    </span> </li>
	<?php
		endforeach;
	?>
	</ul></div>
     			</div>