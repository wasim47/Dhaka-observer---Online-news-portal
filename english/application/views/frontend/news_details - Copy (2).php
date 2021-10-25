<?php
$news_id = $_REQUEST['id'];
$cat_id = $_REQUEST['cat_id'];

$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];


$hit_query=mysql_query("select read_count from news_manage where news_id='$news_id'");
$row=mysql_fetch_array($hit_query);
$hitVal=$row['read_count'];

if($hitVal!=0){
$total_hit=$hitVal+1;
}
else{
$total_hit=1;
}
mysql_query("update news_manage set read_count='$total_hit' where news_id='$news_id'");

?>
<div class="clearfloat"></div>
<div class="container">
<link href="<?php echo base_url();?>assets/css/front/observer.css" rel="stylesheet" type="text/css">

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="68%" height="1413" align="left" valign="top">
                
                
                <table width="96%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" class="title_2"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="8%"><img src="<?php echo base_url();?>assets/images/front/sunny/images/title_logo.png" width="47" height="26" /></td>
                        <td width="83%">HOME  &gt;&gt;  <?php echo $category_name;?></td>
                        <td width="9%">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" class="title_5"><?php echo $news_details['headline'];?></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="52%" align="left" valign="top"><?php echo $news_details['auther_name'];?> : Updated on <?php echo $news_details['date'];?>,  <?php echo $news_details['time'];?></td>
                    <td width="48%" align="right" valign="top"><table width="98%" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="25%" align="center" valign="middle" class="details_main_text">Share on :</td>
                        <td width="10%" align="center" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/facebook.png" width="24" height="24" /></td>
                        <td width="10%" align="center" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/1384018107_twitter.png" width="24" height="24" /></td>
                        <td width="10%" align="center" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/1384018125_pinterest.png" width="24" height="24" /></td>
                        <td width="10%" align="center" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/1384018147_rss.png" width="24" height="24" /></td>
                        <td width="9%" align="right" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/zoom1.jpg" width="24" height="24" /></td>
                        <td width="10%" align="right" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/zoom2.jpg" width="24" height="24" /></td>
                        <td width="6%" align="right" valign="middle">&nbsp;</td>
                        <td width="10%" align="right" valign="middle"><img src="<?php echo base_url();?>assets/images/front/sunny/images/printer.png" width="32" height="32" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10" colspan="2"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><table width="97%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%" align="center" valign="top"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $news_details['image'];?>" width="634" height="306" class="img_frame" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="details_main_text"><?php echo $news_details['full_description'];?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/social_network.jpg" width="665" height="84" /></td>
                      </tr>
                      <tr>
                        <td height="25" align="left" valign="top"></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/img39.jpg" width="644" height="96" class="img_frame2" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="bdr_top2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="50%" class="comment_title">0 comments</td>
                            <td width="50%"><table width="18%" border="0" align="right" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="right" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/Fav2.png" width="20" height="20" /></td>
                                <td align="right" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/comment_count.jpg" width="29" height="23" /></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="10%"><img src="<?php echo base_url();?>assets/images/front/sunny/images/img35.jpg" width="52" height="48" /></td>
                                <td width="90%" align="left" valign="top"><input name="textarea2" type="text" class="leave_field" id="textarea2" value="Leave a message ..." size="45" /></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td><table width="70%" border="0" align="left" cellpadding="0" cellspacing="0" class="com_menu">
                              <tr>
                                <td align="center" valign="top">Oldest</td>
                                <td align="center" valign="top">Community</td>
                              </tr>
                            </table></td>
                            <td><table width="40%" border="0" align="right" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="34%" class="com_menu">Share</td>
                                <td width="32%"><img src="<?php echo base_url();?>assets/images/front/sunny/images/arrow.jpg" width="16" height="15" /></td>
                                <td width="34%"><img src="<?php echo base_url();?>assets/images/front/sunny/images/settings_icon.jpg" width="28" height="16" /></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="10" colspan="2" class="bdr_bottom"></td>
                          </tr>
                          <tr>
                            <td height="160" colspan="2" align="center" valign="middle" class="com_menu">No one has commented yet.</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="bdr_top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><table width="98%" border="0" align="left" cellpadding="0" cellspacing="0" class="com_menu">
                              <tr>
                                <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/msg_icon.jpg" width="21" height="14" /></td>
                                <td>Subscribe</td>
                                <td><img src="<?php echo base_url();?>assets/images/front/sunny/images/d.jpg" width="20" height="17" /></td>
                                <td>Add Disqus to your site</td>
                              </tr>
                            </table></td>
                            <td align="right" valign="top"><img src="<?php echo base_url();?>assets/images/front/sunny/images/disqus.jpg" width="95" height="18" /></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                
                
                </td>
                <td width="32%" align="right" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
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