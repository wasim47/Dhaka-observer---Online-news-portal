<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: Welcome to Dhaka Observer ::..</title>
<link href="<?php echo base_url();?>assets/css/observer.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #FFFFFF; font-weight: bold; }
.style6 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="top_bg">
      <tr>
        <td width="50%"><table width="38%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td class="social_text">Follow Us :</td>
            <td><img src="<?php echo base_url();?>assets/images/youtube.png" width="20" height="20" /></td>
            <td><img src="<?php echo base_url();?>assets/images/facebook_square_black.png" width="20" height="20" /></td>
            <td><img src="<?php echo base_url();?>assets/images/twitter.png" width="20" height="20" /></td>
            <td><img src="<?php echo base_url();?>assets/images/pinterest.png" width="20" height="20" /></td>
          </tr>
        </table></td>
        <td width="50%"><table width="90%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="27%" align="right" valign="top"><img src="<?php echo base_url();?>assets/images/xpress_dhaka.jpg" width="130" height="24" /></td>
            <td width="67%"><table width="92%" border="0" align="right" cellpadding="0" cellspacing="0" class="bdr_all">
              <tr>
                <td width="83%" align="right" valign="top"><input name="textarea" type="text" class="search_field" id="textarea" value="" size="45" /></td>
                <td width="17%" align="right" valign="top"><img src="<?php echo base_url();?>assets/images/search_btn.jpg" width="54" height="21" /></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="banner"><table width="60%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27%" align="center" valign="top"><img src="<?php echo base_url();?>assets/images/logo.png" width="150" height="89" /></td>
        <td width="73%" align="right" valign="top"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="67%">&nbsp;</td>
            <td width="33%">&nbsp;</td>
          </tr>
          <tr>
          <?php
           $queryh="select * from news_manage order by news_id desc";
		   $resulth=mysql_query($queryh);
		   $rowh=mysql_fetch_array($resulth);
		   $time=$rowh['time'];
		  ?>
            <td align="right" class="white_title">Dhaka OBSERVER, Last Updated on <?php echo $time; ?><br />
              <br />
              
              <?php echo date('l d F Y'); ?><br />
              22, Kartik 1420, Mohorrom 1435</td>
            <td align="center" valign="middle"><img src="<?php echo base_url();?>assets/images/weather.png" width="92" height="49" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" align="left" cellpadding="5" cellspacing="1">
      <!--<tr class="top_nav">-->
      <?php
	  	    $count = 0;
         foreach($menulist as $menu):
		 	$menu_name=$menu -> cat_name;
			$menu_id=$menu -> cid;
		 if($count==8) 
		{
		print "</tr>";
		$count = 0;
		}
		if($count==0)
		print "<tr class='top_nav'>";
		print "<td width='8%' align='center'>";
		
		?>
        <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>" style="text-transform:uppercase"><?php echo $menu_name; ?></a>
        <?php
		$count++;
		print "</td>";
		 endforeach;
		 print "</td>";
		 if($count>0)
		  
   		 print "</tr>";
		?>
    </table></td>
  </tr>
  <!--<tr>
    <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="1">
      <tr class="top_nav">
        <td width="13%" align="center"><a href="#">EDUCATION</a></td>
        <td width="9%" align="center"><a href="#">HEALTH</a></td>
        <td width="12%" align="center"><a href="#">LIFESTYLE</a></td>
        <td width="11%" align="center"><a href="#">FEATURE</a></td>
        <td width="13%" align="center"><a href="#">ENVIRONMENT</a></td>
        <td width="9%" align="center"><a href="#">CITY LIFE</a></td>
        <td width="19%" align="center"><a href="#">LITERATURE &amp; CULTURE</a></td>
        <td width="14%" align="center"><a href="#">KICHIR-MICHIR</a></td>
      </tr>
    </table></td>
  </tr>-->
</table>
</td></tr>