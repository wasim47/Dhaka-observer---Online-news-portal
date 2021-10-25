 <div class="fotter_area">
<div class="footer_section" style="margin:0px;">
<div class="footer_section_title" style="margin:0px;">An Interactive Newspaper</div>
<img src="<?php echo base_url();?>assets/images/front/logo.png" width="148" height="84" class="fotter_logo" /></div>
<div class="footer_section">
<div class="footer_section_title">Services/Legal</div>
<div class="footer_menu">
<ul>
<?php
foreach($inactive__menulist as $in_menu):
$menu_namein=$in_menu -> cat_name;
$menu_idin=$in_menu -> cid;
?>
<li><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_idin; ?>"><?php echo $menu_namein; ?></a>|</li>
<?php 
endforeach;
?>
</ul>
</div>
</div>
<div class="footer_section">
<div class="footer_section_title">Editors Panel</div>
<div class="mid_tex_area">
<span>Editor In Chief</span>
<span class="font_weight">Abdul Awal</span><br />
<span>Head of News</span>
<span class="font_weight">Jobaidur Shahin</span>
</div></div>
<div class="footer_section" style="border:none;">
<div class="footer_section_title">Contact us </div>
<div class="address">Hag Manjil, House - 10,Road - 5, Apartment - C3
Block - A, Section - 11 Mirpur , Dhaka - 1216, Bangladesh Phone: 01833356588
  <br />
  E-mail : info@dhakaoserver.com </div></div>

</div>
  
</body>
</html>
