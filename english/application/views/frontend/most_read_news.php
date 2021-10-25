                <div class="news_right_subcon">
								<div class="common_header">Most Read </div>
								<div class="rightbox_bottom"><ul>
                                <?php
                                 foreach($rel_news as $rel_news):
                                    $headline=$rel_news ->headline;
                                    $news_id=$rel_news ->news_id;
                                    $category=$rel_news ->category;
                                ?>
	<li><span>
    <?php 
	$stringbottom1 = strip_tags($headline);
							if (strlen($stringbottom1) > 50) {
								$stringCut = substr($stringbottom1, 0, 50);
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