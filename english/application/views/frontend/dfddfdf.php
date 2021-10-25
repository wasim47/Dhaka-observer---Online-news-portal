<?php
$cat_id=$_REQUEST['cat_id'];

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];
include('pagination.php');
?>
<div class="clearfloat"></div>
<div class="container">
<link href="<?php echo base_url();?>assets/css/front/observer.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/front/pagination.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="68%" height="1413" align="left" valign="top"><table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5" colspan="3"></td>
                        </tr>
                      <tr>
                        <td colspan="3"><div class="con_row3_left">
			<div class="lt_row">TOP NEWS DESK </div>
			<?php include('top_desk_slider.php');?>
			
	   	<div class="clearfloat"></div>
    </div></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        
                     <tr>
                        <td colspan="3">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                    print "</tr>";
                    print "<tr><td>&nbsp;</td></tr>";
                    
                    $count = 0;
                    }
                    if($count==0)
                    print "<tr>";
                    print "<td valign='top'>";
                    ?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td height="247">
                                <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="gallery_box">
                                  <tr>
                                    <td height="235" align="left" valign="top">
                                    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="5">
                                      <tr>
                                        <td align="center" valign="top"><!--<img src="<?php echo base_url();?>assets/images/front/sunny/images/img43.jpg" width="205" height="116" />-->
                                        
                                        <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;">
                          <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_short; ?>" width="205" height="116" title="<?php echo $image_title_short; ?>" /></a>
                                        
                                        </td>
                                        </tr>
                                      <tr>
                                        <td class="title_3"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;" class="news_title_2">
                         <?php echo $title; ?></a></td>
                                        </tr>
                                      <tr>
                                        <td height="2"></td>
                                        </tr>
                                      <tr>
                                        <td class="gallery_tex">
                                        	<?php 
							$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 120) {
								$stringCuts = substr($stringbottom1s, 0, 120);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'.'<div><a href="'.base_url().'index/news_details?id='.$newsId.'&&cat_id='.$news_categorytop.'" style="font-weight:bold; float:right">More...</a></div>'; 
							}
							?>
                           <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333">
                            <?php echo $stringbottom1s; ?></a>
                                        </td>
                                        </tr>
                                      
                                      </table></td>
                                    </tr>
                                  </table></td>
                              </tr>
                        </table>
                    
                    <?php
                    $count++;
                    print "</td>";
                    }
                    if($count>0)
                    print "</tr>";
                    ?>
                            
                            
                        	  <!--<tr>
                                <td height="247">
                                <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="gallery_box">
                                  <tr>
                                    <td height="235" align="left" valign="top">
                                    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="5">
                                      <tr>
                                        <td align="center" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/img43.jpg" width="205" height="116" /></td>
                                        </tr>
                                      <tr>
                                        <td class="title_3">BNP leaders avoiding party office</td>
                                        </tr>
                                      <tr>
                                        <td height="2"></td>
                                        </tr>
                                      <tr>
                                        <td class="gallery_tex">BNP leader Ruhul Kabir Rizvi said his party has called for a separate dawn-to-dusk countrywide strike </td>
                                        </tr>
                                      <tr>
                                        <td align="right" valign="top" class="more"><a href="#">more ...</a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  </table></td>
                              </tr>-->
                              
                              
                              
                        </table>
                        </td>
                      </tr>   
                      
                        
                        
                        
                        
                        
                        
                      </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="5">
                      <tr class="round_btn">
                      
                        <?php
						if(isset($_REQUEST['page'])){
						 echo $pagination;
						 }
						 ?>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="32%" align="right" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0"><tr>
                        <td height="5"></td>
                        </tr>
                  <tr>
                    <td><!--<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" height="208">
                      <tr>
                        <td height="53" align="center" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="title_2">
                          <tr>
                            <td width="19%" align="center"><img src="<?php echo base_url();?>assets/images/front/sunny/images/title_logo.png" width="47" height="26" /></td>
                            <td width="81%"><ul id="menu" style="font-size:12px;">
                              <li><a href="">MOST READ</a></li>
                              <li><a href="">RECENT STORIES</a></li>
                              </ul></td>
                            </tr>
                          </table></td>
                        </tr>
                      <tr>
                        <td align="left" valign="top" class="bdr_all">
                        <table width="92%" border="0" align="center" cellpadding="1" cellspacing="0">
                          <tr>
                            <td height="8" colspan="2"></td>
                            </tr>
                            <?php 
					  foreach($related_news as $news):
					  
					  ?>
                          <tr>
                            <td width="9%"><img src="<?php echo base_url();?>assets/images/front/sunny/images/arrow1.jpg" width="17" height="12" /></td>
                            <td width="91%"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $news->news_id; ?>&&cat_id=<?php echo $news->category;?>" class="details_main_text"><?php echo $news->headline; ?></a></td>
                            </tr>
                          <tr>
                            <td height="8" colspan="2"></td>
                            </tr>
                       <?php 
					  endforeach;
					  ?>
                          </table></td>
                        </tr>
                      </table>-->
                      <?php include('related_news.php');?></td>
                    </tr>
                  <tr>
                    <td height="10"></td>
                    </tr>
                  <tr>
                    <td><?php include('distric_news.php');?></td>
                    </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/img20.jpg" width="315" height="169" /></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/facebook.jpg" width="315" height="328" /></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/img10.jpg" width="315" height="136" /></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/img27.jpg" width="315" height="131" /></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/img28.jpg" width="315" height="118" /></td>
                  </tr>
                  </table></td>
                </tr>
              </table>
</div>
<div class="clearfloat"></div>