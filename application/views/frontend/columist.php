<div style="width:96%; float:left; min-height:660px; overflow:scroll; overflow-x:hidden; border:1px solid #CCCCCC; padding:3px;">
								<?php
								 	foreach($columist_news as $kichir):
									$kichir_headline=$kichir ->headline;
									$kichir_news_id=$kichir ->n_id;
									$kichir_category=$kichir ->category;
									$kichir_image=$kichir ->image;
									$kichir_short_description=$kichir ->short_description;
									$kichir_image_title=$kichir ->image_title;
									
									 $queryColumist="select * from columist where banner_id='$kichir_category'";
									 $resultColumist=mysql_query($queryColumist);
									 $rowColumist=mysql_fetch_array($resultColumist);
									 $titleColumist=$rowColumist['image_title'];
									 $titleColumistimage=$rowColumist['image'];
								?>
                             <div style="width:200px; min-height:220px; height:auto; float:left;"> 
                             <div style="width:100%; background:#ECE9DD; height:30px; float:left; font-size:15px; margin-bottom:5px;border-top:4px solid #B80002; padding:0 5px;">
        						<img src="<?php echo base_url();?>uploads/images/columist/<?php echo $titleColumistimage; ?>" title="<?php echo $titleColumist; ?>" width="20" height="20" style="padding:3px; vertical-align:bottom" />&nbsp;
                                 <?php echo $titleColumist; ?>
                            </div>
                                   <div style="width:90%; height:auto; float:left; padding:5px; font-weight:bold; font-size:15px; margin-bottom:5px;border-top:1px solid #CCCCCC">
        						 <a href="<?php echo base_url();?>index/columist_details?id=<?php echo $kichir_news_id;?>&&cat_id=<?php echo $kichir_category;?>" style="text-decoration:none; color:#000000;"><?php echo $kichir_headline; ?></a>
                            </div>
                                    <li style="display:block; margin:0px; padding:0px;margin-top:5px;font-size:15px;">
                                    <a href="<?php echo base_url();?>index/columist_details?id=<?php echo $kichir_news_id;?>&&cat_id=<?php echo $kichir_category;?>" style="text-decoration:none; color:#000000; background:none; height:69px; float:left">
                                    <img src="<?php echo base_url();?>uploads/images/columist_article/<?php echo $kichir_image; ?>" width="80" height="69" style="float:left; width:80px; height:69px; padding:5px; margin-right:10px; border:1px solid #ccc; font-size:15px;">
									<?php 
									$stringbottom1k = strip_tags($kichir_short_description);
									if (strlen($stringbottom1k) > 220) {
										$stringCutk = substr($stringbottom1k, 0, 220);
										$stringbottom1k = substr($stringCutk, 0, strrpos($stringCutk, ' ')).'.....'; 
									}
									echo $stringbottom1k; 
									
									
									?></a><br />
                                       </li>
                                      
                                       </div>
                                  <?php
									endforeach;
								  ?>
                                </div>