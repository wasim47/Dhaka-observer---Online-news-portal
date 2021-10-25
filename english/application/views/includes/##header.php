<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dhaka Observer</title>
<!-- css3-mediaqueries.js for IE8 or older -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link href="<?php echo base_url();?>assets/css/front/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/front/styles_responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/front/account_menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/maps.js"></script>
<script type="text/javascript">$(document).ready(function(){$().orion({speed: 500,animation: "zoom"});});</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/jquery.aw-showcase.js"></script>


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "4eaabf12-4c2a-4ca5-a896-ce2bca7efeea", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<script type="text/javascript">
 
$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			"100%",
		content_height:			"100%",
		fit_to_parent:			false,
		auto:					true,
		interval:				10000,
		continuous:				true,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					false,
		buttons:				false,
		btn_numbers:			false,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				'hslide', /* hslide/vslide/fade */
		transition_delay:		0,
		transition_speed:		3000,
		show_caption:			'onload', /* onload/onhover/show */
		thumbnails:				false,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'vertical', /* vertical/horizontal */
		thumbnails_slidex:		1, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of <?php echo base_url();?>assets/images/front in the source. Usually works to only set the dimension of the first slide in the showcase. */
		speed_change:			true, /* Set to true to prevent users from swithing more then one slide at once. */
		viewline:				false, /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of <?php echo base_url();?>assets/images/front in the source. */
		custom_function:		null /* Define a custom function that runs on content change */
	});
});

</script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/jquery.ad-gallery.css">
<!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.ad-gallery.js"></script>
  <script type="text/javascript">
  $(function() {
   // $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    ////$('img.image1').data('ad-title', 'Title through $.data');
   // $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
   // $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    /*setTimeout(function() {
      galleries[0].addImage("images/thumbs/t7.jpg", "images/7.jpg");
    }, 1000);
    setTimeout(function() {
      galleries[0].addImage("images/thumbs/t8.jpg", "images/8.jpg");
    }, 2000);
    setTimeout(function() {
      galleries[0].addImage("images/thumbs/t9.jpg", "images/9.jpg");
    }, 3000);
    setTimeout(function() {
      galleries[0].removeImage(1);
    }, 4000);*/
    
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  </script>
</head>

<body>
     <header class="header_con">
     	<div class="hc_top">
     		<div class="hc_top_left">
     			<div class="lft_txt">Follow us :</div>
					
     			<div class="lft_icon"><ul class="rr social">
                    <li><a href="#" class="ir s1"></a></li>
										 <li><a href="#" class="ir s2"></a></li>
                    <li><a href="#" class="ir s3"></a></li>
										<li><a href="#" class="ir s4"></a></li>
                   
          </ul></div>
     		</div>
				
     		<div class="hc_top_right">
     			<div class="left_button">
     				<input name="Submit" type="submit" class="button_1" value="BANGLA VERSION" onClick="window.location.href='../'">
     			</div>
					
     			<div class="rightt_sbox">
     				<div class="t_field">
     					<input name="textfield" type="text" class="text_field_1">
     				</div>
						
     				<div class="t_button">
     					<input name="Submit2" type="submit" class="button_2" value="SEARCH">
     				</div>
     			</div>
     		</div>
     	</div>			
    <div class="hc_logo">
     		<div class="col_1"><img src="<?php echo base_url();?>assets/images/front/logo.png" width="148" height="84"></div>
				
     		<div class="col_2" >
				<?php
               $queryh="select * from news_manage order by news_id desc";
               $resulth=mysql_query($queryh);
               $rowh=mysql_fetch_array($resulth);
               $time=$rowh['time'];
              ?>
                Dhaka <?php echo date('l d F Y'); ?><br>
                Last updated at <?php echo $time; ?> GMT<br>
                Last updated at <?php echo $time; ?> GMT<br>
            </div>
				
     		<div class="col_3"><img src="<?php echo base_url();?>assets/images/front/cloud.png" width="16" height="16"> Cloudy <br>
     		HI 70 | Lo 54 
           <!-- <script type="text/javascript">
			c_id = "3426";
			num = "1";
			font = "10";
			font_header = "10";
			forecast_colour = "fff";
			forecast_link_colour = "fff";
			pref = "c";
			</script>
			<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/test.js"></script>
			<script type="text/javascript" src="http://bangladeshweather.net/p.x/ct/15/headlines.js"></script>-->
            </div>
     	</div>
			
    <div class="hc_menu">
    
    <ul class="orion-menu green">
    <li class="active"><a href="<?php echo base_url(); ?>" style="text-transform:uppercase">Home</a></li>
    <?php
	         foreach($menulist as $menu):
		 	$menu_name=$menu -> cat_name;
			$menu_id=$menu -> cid;
			?>
             <li><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>" style="text-transform:uppercase"><?php echo $menu_name; ?></a></li>
            <?php 
			endforeach;
			?>
      </ul>
			<!--<ul class="orion-menu green">
                <li class="active"><a href="JavaScript:void(0);">Home</a></li>
                <li><a href="JavaScript:void(0);">National</a></li>
                <li><a href="JavaScript:void(0);">International</a></li>
                <li><a href="JavaScript:void(0);">Politics</a></li>
                <li><a href="JavaScript:void(0);">Business</a></li>
                <li><a href="JavaScript:void(0);">Sports</a></li>
			          <li><a href="JavaScript:void(0);">Entertainment</a></li>
			          <li><a href="JavaScript:void(0);">Science &amp; Tech</a></li>
			          <li><a href="JavaScript:void(0);">Education</a></li>
			          <li><a href="JavaScript:void(0);">Health</a></li>
			          <li><a href="JavaScript:void(0);">Lifestyle</a></li>
			          <li class="last"><a href="#">Feature</a></li>
			          <li class="last"><a href="#">Environment</a></li>
			          <li class="last"><a href="#">Citylife</a></li>
								<li class="last"><a href="#">Literature and Culture</a></li>
								<li class="last"><a href="#">Career</a></li>
								<li class="last"><a href="#">Blog</a></li>
								<li class="last"><a href="#">Jobs Corner</a></li>
								<li class="last"><a href="#">Opinion</a></li>
								<li class="last"><a href="#">Inspiration</a></li>
      </ul>-->
			</div>
			
   	   <div class="clearfloat"></div>
     </header>
     