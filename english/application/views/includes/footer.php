<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

 

<footer>
<div style=" width:1000px; text-align:center; margin:auto; padding:20px 0px 10px 0px;">
<hr style="border-top:1px solid #eaeaea;margin:auto; border-collapse:collapse" />
					<div style="width:100%; text-align:center; margin:auto; font-size:12px;">
                    
					<?php
                     foreach($menulist as $menu):
                    $menu_name=$menu -> cat_name;
                    $menu_id=$menu -> cid;
                    ?>
                     <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>&&page=1" class="f_menu_1" style="text-transform:uppercase; color:#000000; font-size:12px; text-transform:capitalize"><?php echo $menu_name; ?></a>|
                    <?php 
                    endforeach;
                    ?>
                    </div>
</div>
<div  class="footer_con">
<table width="100%" border="0" cellspacing="5" cellpadding="3" style="font-size:12px;">
  <tr>
    <td width="4%" height="74">&nbsp;</td>
    <td width="13%"><img src="<?php echo base_url();?>assets/images/front/logo.png"></td>
    <td width="11%" valign="top">&nbsp;</td>
    <td width="30%" valign="middle">
        <div> <span style="color:#FFFFFF; font-size:12px; font-weight:bold;">Editor in chief</span>: <span style="color:#FFFFFF; font-size:12px;">Abdul Awal </span></div>
               <div> <span style="color:#FFFFFF; font-size:12px; font-weight:bold;">Head of News</span>: <span style="color:#FFFFFF; font-size:12px;">Jobaidur Shahin</span></div>
    </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="36%" style="color:#FFFFFF; font-size:12px;" valign="bottom">
        Hag Manjil, House - 10,Road - 5, Apartment - C3<br />
        Block - A, Section - 11 Mirpur , Dhaka - 1216, Bangladesh Phone: 01833356588, 04475045990
      <br>
      E-mail : info@dhakaoserver.com	</td>
    <td width="5%">&nbsp;</td>
  </tr>
  
</table>
</div>
</footer>
  
</body>
</html>
