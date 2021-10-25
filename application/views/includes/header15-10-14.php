<?php 
//session_start();
//$id=$_SESSION['id']=$onload;
?>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "900";
header("Refresh: $sec; url=$page");

$showlightbox="0";
if(!isset($_COOKIE['beenhere'])) { 
    setcookie("beenhere", '1');
		$showlightbox="1";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>24/7 Latest News from Bangladesh | current news of Dhaka</title>
<meta name="keywords" content="24/7 world news, Dhaka, Bangladesh, 24/7 bangla news, 24/7 Bangladesh news, 24/7 dhaka news, 24/7 news, Bangladesh Newspaper,  24/7 news updates, breaking news, bangladesh breaking news, bangladesh latest news, dhaka breaking news, right now dhaka, current bangladesh news, Bangladesh latest news,  bangla news, bangladesh newspaper, daily newspapers of Bangladesh, Current News, current news,  BD live news, 24/7 updated online newspaper , 24/7 world news, Dhaka  top news, BD beaking news, BD live news, Bangladesh top news, dhaka bangladesh, bangladesh live news, Dhaka blog, Bangladesh blog, 24/7 bangla news, bangla blog, bangladeshi blog, bangladeshi popular blog, bangla blog, bangladeshi blog, bangladeshi popular blog, somewhereinelse, mukto blog, 24/7 open blog, 24/7 bangladesh news,24/7 dhaka news, 24/7 news, dhakaobserver.com, dhaka observer, dhakaobserver, Bangladesh Observer, Daily observer, 24/7 most updated online newspaper,24/7 news updates, breaking news, bangladesh breaking news, bangladesh latest news, dhaka 24/7 breaking news, news updates, right now, right now dhaka, right now bangladesh, current dhaka news, current bangladesh news, Bangla News, Bengali news, Hot News, hot bangla news, Latest News, Dhaka Latest news, Bangladesh latest news, International News, Indian News, Economy, Entertainment News, Sheikh Hasina, Khaleda Zia, War News, Crime news, War, War Criminals, Human Rights, Business Study, Movies, Cinema, Technology, Technology News, Obama, syria news, BBC, BBC Bangla, android, security news, android news, newspaper, bangla news, bd newspaper, bangla newspaper, bangladesh newspaper, news paper, bengali newspaper, bangla news paper,bangladeshi newspaper,news paper bangladesh,daily news paper in bangladesh,daily newspapers of bangladesh,daily newspaper,Daily newspaper,Current News,current news,bengali daily newspaper,daily News,The Daily Prothom Alo, Prothom Alo, Prothom Alo, prothom-alo.net, Portal, portal, Bangla, bangla, News, news, Bangladesh, bangladesh, Bangladeshi, bangladeshi, Bengali, Culture, Portal Site, Dhaka, textile, garments, micro credit, Bangladesh News, phone cards, business news, Free Advertisement, free Ad, free Ad on the net, buy-sell, buy & sell, buy and sell, Advertisement on the Net, Horoscope, horoscope, IT, ICT, Business, Health, health, Media, TV, Radio, Dhaka News, World News, National News, Bangladesh Media, Betar, Current News, Weather, weather, foreign exchange rate, Foreign Exchange Rate, Education, Foreign Education,Higher Education, Family, Relationship, Sports, sports, Bangladesh Sports, Bangladesh, Bangladesh Politics, Bangladesh Businessbangladesh news, bangla newspaper, bangladesh news paper, bengali newspaper, potrika, bangla khobor, nokia, grameen phone, dailystar.net, prothomalo.com, amar desh, somewhere in blog, kalerkantho, jugantor, make money, taka, stock market, bangladesh business news, bangladesh law, legal, bangladesh tourism, porjoton, sheikh, hasina, khaleda, zia, tarek, doridro, music, .com.bd, khulna, barisal, sylhet, london, jobs, chakri, cinema, bangla song;" />

<meta name="description" content="24/7 updated online newspaper, Be the first to know what is happening right now from Bangladesh.  ✓Bangladesh news ✓Dhaka news ✓24/7 update news ✓ BD live news" />

<link href="<?php echo base_url();?>assets/css/front/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/front/styles_responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/front/account_menu.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/front/pagination.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/jquery-1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/custom.js"></script>		

<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/maps.js"></script>
<script type="text/javascript">$(document).ready(function(){$().orion({speed: 500,animation: "zoom"});});</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/jquery.aw-showcase.js"></script>


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "4eaabf12-4c2a-4ca5-a896-ce2bca7efeea", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<!--<script src="<?php echo base_url();?>assets/js/front/avro-v1.1.3.min.js" type="text/javascript" charset="utf-8"></script>
--><script  language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/front/unijoy.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/front/phoneticunicode.js"></script>

<script src="<?php echo base_url();?>assets/js/front/jquery.zweatherfeed.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>assets/css/front/whether.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function () {
	$('#whether').weatherfeed(['2344791'],{
		woeid: true
	});
});
</script>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#phonetic').click(function() {
		   if($("#phonetic").attr('checked', true)){
				$(function(){
					$('#search_bangla').avro({'bangla':true});
				});
			}
			else{
				$(function(){
					$('#search_bangla').avro({'bangla':false});
				});
			}
	  });
	  
  });


function selectedmenu(id)
{
	//alert(id);
	document.getElementById(id).style.backgroundColor = '#FFFFFF';
	document.getElementById(id).style.color = "#000000"
}
</script>
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
		arrows:					true,
		buttons:				true,
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


<style>
#lightbox {
  width:100%;
  display:none;
  background:#333;
  opacity:0.5;
  filter:alpha(opacity=90);
  position:absolute;
  top:0;
  left:0;
  min-width:100%;
  min-height:100%;
  z-index:1000;
}
#lightbox-panel {
  display:none;
  position:fixed;
  top:15%;
  left:20%;
  margin:0;
  padding:0;
  width:65%;
  z-index:1001;
}
</style>
<script type="text/javascript">
function getLightBox()
{
  $("#lightbox, #lightbox-panel").fadeIn(300);
		$.ajax({
		 type: "GET",
		 url: '<?php echo base_url()?>index/bookmarks',
		 data: "bid=" + 1,
		 success: function(data) {
			  $('#lightbox-panel').html(data);
		 }
   });
}
function getLightBoxOut()
{
    $("#lightbox, #lightbox-panel").fadeOut(300);
}

</script>
<!-- -----  Right Click Desable ---------------- -->
<!--<script language=JavaScript>
//Disable right mouse click Script
var message="Function Disabled!";
///////////////////////////////////

function clickIE4(){
if (event.button==2){
//alert(message);
return false;
}

}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
//alert(message);
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("return false")

function disableCtrlKeyCombination(e)
{
        //list all CTRL + key combinations you want to disable
        var forbiddenKeys = new Array('a', 'c', 'x', 'v');
        var key;
        var isCtrl;
        if(window.event)
        {
                key = window.event.keyCode;     //IE
                if(window.event.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        else
        {
                key = e.which;     //firefox
                if(e.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        //if ctrl is pressed check if other key is in forbidenKeys array
        if(isCtrl)
        {
                for(i=0; i<forbiddenKeys.length; i++)
                {
                        //case-insensitive comparation
                        if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
                        {
                               // alert('Key combination CTRL + ' +String.fromCharCode(key)+' has been disabled.');
                                return false;
                        }
                }
        }
        return true;
}




</script>
<script language=JavaScript>
function ieClicked() {
    if (document.all) {
        return false;
    }
}
function firefoxClicked(e) {
    if(document.layers||(document.getElementById&&!document.all)) {
        if (e.which==2||e.which==3) {
            return false;
        }
    }
}
if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=firefoxClicked;
}else{
    document.onmouseup=firefoxClicked;
    document.oncontextmenu=ieClicked;
}
document.oncontextmenu=new Function("return false")
function disableselect(e) {
    return false;
}

function reEnable() {
    return true;
}

document.onselectstart = new Function("return false");

if (window.sidebar) {
    document.onmousedown = disableselect;
    document.onclick = reEnable;
}
</script>-->
<!-- -----  Right Click Desable  end ---------------- -->



<script>
jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 500) {
            $('#backToTop').fadeIn('slow');
        } else {
            $('#backToTop').fadeOut('slow');
        }
    });
    $('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        //$("html, body").scrollTop(0); //For without animation
        return false;
    });
});
</script>





<script type="text/javascript">
$(document).ready(function() {
	$('#Loading').hide();    
});
function check_username(){
//alert('dfd');
	var email = $("#email").val();
	
	if(email){
		$('#Loading').show();
		$.post("<?php echo base_url();?>index/check_ajax", {
			email: $('#email').val(),
		}, function(response){
			$('#Info').fadeOut();
			 $('#Loading').hide();
			setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
		});
		return false;
	}
}

function finishAjax(id, response){
 
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 

</script>
<style type="text/css">

.light_box_area{
	width:80%;
	min-height:430px;
	height:auto;
	max-width:445px;
	background-color:#E7DED5;
	border:1px #999 solid;
	border-radius:10px;
	-webkit-box-shadow: 0 0 50px 5px #000000;
	box-shadow: 0 0 50px 5px #000000;
	margin:20% auto;
}

.cross_btn_area{
	width:100%;
	text-align:right;
}

	
.alllight_con_area{
	width:80%;
	margin:auto;
	margin-top:0px;
	margin-bottom:58px;
	}
	
.lightb_title{
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#000;
	margin-bottom:20px;
}
	
	
.lightb_tex{
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#000;
}


.sub_bg{
	width:100%;
	height:25px;
	border-radius:5px;
	background:#fff;
	border:1px #e8ebec solid;
	margin-top:7px;
	padding-top:2%;
	}
	
.sub_field_area{
	width:100%;
	height:16px;
	float:left;
	}
	
.sub_field{
	width:100%;
	height:16px;
	background:none;
	border:none;
	padding-left:2%;
	color:#666;
	}
	
.sub_btn_area{
	width:25%;
	height:16px;
	float:right;
	}
	
.sub_btn{
	width:100%;
	max-width:49px;
	float:left;
	}
	
@media screen and (max-width: 480px) {
	.light_box_area{
	width:70%;
	min-height:510px;
	height:auto;
}

	.sub_bg{
	width:100%;
	height:25px;
	border-radius:5px;
	background:#e8ebec;
	border:1px #e8ebec solid;
	margin-top:20px;
	padding-top:2%;
	}
	
	}
	
	
@media screen and (max-width: 320px) {
	
.light_box_area{
	width:auto;
	min-height:510px;
	height:auto;
}

.sub_bg{
	width:95%;
	height:25px;
	border-radius:5px;
	background:#e8ebec;
	border:1px #e8ebec solid;
	margin-top:20px;
	padding-top:2%;
	}
	
	}


</style>
<style type="text/css">
#overlay {
    display: none; 
    position: absolute; 
	left: 25%;
    top: 10%; 
  /*  padding: 25px; 
   border: 2px solid black;
    background-color: #ffffff;
*/ width: 50%;
    height: 50%;
    z-index: 10000; 
	margin:0 auto;
}
#fade {
    display: none;  
    position: absolute; 
    left: 0%; 
    top: 0%; 
    background-color: black;
    -moz-opacity: 0.7; 
    opacity: .70;
    filter: alpha(opacity=70);
    width: 100%;
    height: 100%;
    z-index: 10000; 
}
.images_res{
	width:100%; 
	height:auto;
	float:left; 
	margin:0 20%;
	padding:10px 0;
}	
.images_res .image{
	width:auto;
	height:auto;
	float:left;
}
@media screen and (max-width: 768px) {
	#overlay {
    display: none; 
    position: absolute; 
	left: 15%;
    top: 0%; 
    width: auto;
    height: auto;
    z-index: 10000; 
	margin:0 auto;
}
.images_res{
	width:100%; 
	height:auto;
	float:left; 
	margin:0 10%;
	padding:7px 0;
}	
.images_res .image{
	width:auto;
	height:auto;
}
}
	
	
@media screen and (max-width: 480px) {
	
	#overlay {
    display: none; 
    position: absolute; 
		 left: 0%;
    top: 0%; 
  /*  padding: 25px; 
   border: 2px solid black;
    background-color: #ffffff;
*/ width: 100%;
    height: auto;
    z-index: 10000; 
	margin:0 auto;
}
	.images_res{
	width:100%; 
	height:auto;
	float:left; 
	margin:0 auto;
}	
.images_res .image{
	width:auto;
	height:auto;
}
	}
	
	
@media screen and (max-width: 320px) {
	
#overlay {
	left: 0%;
    top: 0%; 
    width: 80%;
    height:auto;
	margin:auto;
}
.images_res{
	width:100%; 
	height:auto;
	float:left; 
	margin:0 auto;
}	
.images_res .image{
	width:90%;
	height:auto;
}	
	}
	
</style>
</head>

<body onLoad="document.getElementById('overlay').style.display='block';
document.getElementById('fade').style.display='block';">
<?php	
if($showlightbox){ 
?>	
<div id="fade"></div>
<div id="overlay">
<div class="light_box_area">
<div class="cross_btn_area">
<a onClick="document.getElementById('overlay').style.display='none';
document.getElementById('fade').style.display='none';" style="cursor:pointer">
<img src="<?php echo base_url();?>/assets/images/front/circle_cross.png" width="32" height="32" border="0" /></a>
</div>
<div class="alllight_con_area">
<div class="lightb_title"><img src="<?php echo base_url();?>/assets/res/logo.png" /></div>
<div class="lightb_title">24x7 Latest News From Bangladesh</div>
<div class="lightb_tex">Registration is FREE. Register now (10 secs) to read the rest of this article. More than 35,000 reader already registered. <br />
  <br />
Register to save for future visits.</div>
<form method="post" action="<?php echo base_url();?>index/subscriber_insert">
<div class="sub_bg">
<div class="sub_field_area">
    <input type="text" name="name" id="name" placeholder='Enter your Name' onFocus="this.placeholder =''" class="sub_field" onBlur="this.placeholder ='Enter your Name'"  />
</div>
</div>

<div class="sub_bg" style="float:left;">
<div class="sub_field_area" style="float:left">
    <input type="email" name="email" id="email" placeholder='Enter your email' onFocus="this.placeholder =''" class="sub_field" required onBlur="return check_username();" />
    <div id="Info" style="float:left; width:100%;"></div>
    <span id="Loading"><img src="<?php echo base_url();?>/assets/images/front/loader.gif" alt="" width="20" height="20" /></span>
</div>
</div>
<div class="images_res">
    <input type="image" src="<?php echo base_url();?>/assets/res/subscribe_btn.png" class="image"/>
</div>
</form>

</div>
</div>
</div>
<?php
}
?>
<!-- -----  Right Click Desable ---------------- -->

<!--<body onLoad="selectedmenu('<?php echo $onload; ?>') " onkeypress="return disableCtrlKeyCombination(event);" onkeydown = "return disableCtrlKeyCombination(event);">-->
<!-- -----  Right Click Desable  end ---------------- -->


<!--<body onLoad="selectedmenu('<?php echo $onload; ?>')">-->









<div ID="backToTop" style="width:100%; height:auto; z-index:100; position:fixed; bottom:0; padding:10px; ">
<a href="#" style="color:#000;text-align:right; float:right; "><img src="<?php echo base_url();?>assets/images/front/navigation-up-frame_red.png"></a>
</div>


<script src="http://wac.edgecastcdn.net/800952/3df81c57-9602-442c-88b4-4bcd5d521050-api/gsrs?g=cc768c04-f8b7-4208-b9c2-4c5cf1ed46be&is=fmxqtbd"></script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
--><script type="text/javascript">
	if (typeof jQuery == 'undefined')
	{
	  document.write(unescape("%3Cscript src='<?php echo base_url();?>assets/js/fbtwit_like/jquery-1.8.2.min.js' type='text/javascript'%3E%3C/script%3E"));
	}
</script>
<script src="<?php echo base_url();?>assets/js/fbtwit_like/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fbtwit_like/jquery.mousewheel.min.js"></script>

<script type="text/javascript">	var curWinWidth = '';		/*function menuItemJobs(){		if(curWinWidth<=480){			$('div.main_menu_collapse').hide();			$('#btn-navbar').click(function(){				var dataTarget = $('#btn-navbar a').attr('data-target');				$(dataTarget).slideToggle();			});						$('div.main_menu_collapse ul li i').click(function(){				var dataTarget = $(this).attr('data-target');				$(this).toggleClass('icon-minus');				$(dataTarget).slideToggle();			});		}else{			$('div.main_menu_collapse').show();			$('div.main_menu_collapse ul li').hover(function(){				var curSubList = $(this).index();				$('div.main_menu_collapse ul li:nth-child('+(curSubList+1)+') ul.sub_menu').css('display','block');			},function(){				$('div.main_menu_collapse ul li ul.sub_menu').css('display','none');				});		}	}*/		$(function(){		curWinWidth = parseInt($(window).innerWidth());						$('#btn-navbar').click(function(){			var dataTarget = $('#btn-navbar a').attr('data-target');			$(dataTarget).slideToggle();		});				$('div.main_menu_collapse ul li i').click(function(){			var dataTarget = $(this).attr('data-target');			$(this).toggleClass('icon-minus');			$(dataTarget).slideToggle();		});				/*menuItemJobs();				$(window).resize(function(){			curWinWidth = parseInt($(this).innerWidth());			menuItemJobs();		});*/				$(".divScroll").mCustomScrollbar({			autoHideScrollbar:true		});	});		//For Back to Top Scroll js Start		$("#back-top").hide();		// fade in #back-top		$(function () {			$(window).scroll(function () {			if ($(this).scrollTop() > 100) {				$('#back-top').fadeIn();			} else {				$('#back-top').fadeOut();			}		});		$('#back-top a').bind("mouseover", function(){			var color = $('#back-top').css("background-color");			$('#back-top').css("background", "#999");			$(this).bind("mouseout", function(){				$('#back-top').css("background", color);			})		})		// scroll body to 0px on click		$('#back-top a').click(function () {			$('body,html').animate({			scrollTop: 0			}, 800);			return false;			});		});		//For Back to Top Scroll js End</script> 
<style type="text/css">	
	div#fbLikeBox_block,div#ttLikeBox_block{
		position:fixed;
		width:309px;
		right:-309px; top:26%;
		z-index:9999
	}
	div#ttLikeBox_block{
		left:-309px
	}
	div#fbLikeBox_block div.fbButton,div#fbLikeBox_block div.fbLikeButton,
	div#ttLikeBox_block div.ttButton,div#ttLikeBox_block div.ttLikeButton{
		float:left;
		margin-top:110px;
		margin-left: -45px;
		padding:5px;
		background:#4A6EA9 url(<?php echo base_url();?>assets/images/facebook-icon_25x25.png) no-repeat 10px 10px;
		display:inline-block;
		width:35px; height:35px;
		cursor:pointer
	}
	div#ttLikeBox_block div.ttButton,div#ttLikeBox_block div.ttLikeButton{
		float:right;
		margin-right:-45px;
		background:#1AB2E8 url(<?php echo base_url();?>assets/images/twitter-icon_25x25.png) no-repeat 10px 10px;
	}
	div#fbLikeBox_block div.fbLikeButton{
		background:#4A6EA9 url(<?php echo base_url();?>assets/images/facebook-like-icon_25x25.png) no-repeat 10px 10px;		
	}
	div#ttLikeBox_block div.ttLikeButton{
		background:#1AB2E8 url(<?php echo base_url();?>assets/images/twitter-like-icon_white_25x25.png) no-repeat 10px 10px;		
	}
	div#fbLikeBox_block div.fbContent,
	div#ttLikeBox_block div.ttContent{
		float:left;
		background:#fff;
		width:287px;
		height:240px;
		background:#fff;
		border:10px solid #4A6EA9;
		overflow:hidden
	}
	div#ttLikeBox_block div.ttContent{
		float:right;
		border-color:#1AB2E8;
	}
</style>
<div id="fbLikeBox_block" class="for_web">
	<div class="fb_btn fbButton tl_round bl_round"></div>
    <div class="fbContent tl_round bl_round">
        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="https://www.facebook.com/Dhakaobserver" style="background#fff" width="309" show_faces="true" stream="false" header="false"></fb:like-box>
    </div>
</div>

<script type="text/javascript">
	$(function(){		
		$('.fb_btn').hover(function(){			
			$(this).removeClass('fbButton');
			$(this).addClass('fbLikeButton');
			$('div#fbLikeBox_block').animate({
				right: '-'+2
			},1000);
				
		});
		
		$('div#fbLikeBox_block').hover(function(){
		},function(){
			$('.fb_btn').addClass('fbButton');
			$('.fb_btn').removeClass('fbLikeButton');
			$('div#fbLikeBox_block').animate({
				right: '-'+309
			},1000);
				
		});
		
		$('.tt_btn').hover(function(){			
			$(this).removeClass('ttButton');
			$(this).addClass('ttLikeButton');
			$('div#ttLikeBox_block').animate({
				left: '-'+2
			},1000);
				
		});
		
		$('div#ttLikeBox_block').hover(function(){
		},function(){
			$('.tt_btn').addClass('ttButton');
			$('.tt_btn').removeClass('ttLikeButton');
			$('div#ttLikeBox_block').animate({
				left: '-'+309
			},1000);
				
		});	
	});
</script>

<style>
#fanback {
display:none;
background:rgba(0,0,0,0.8);
width:100%;
height:100%;
position:fixed;
top:0;
left:0;
z-index:99999;
}
#fan-exit {
width:100%;
height:100%;
}
#fanbox {
background:white;
width:420px;
height:270px;
position:absolute;
top:58%;
left:63%;
margin:-220px 0 0 -375px;
-webkit-box-shadow: inset 0 0 50px 0 #939393;
-moz-box-shadow: inset 0 0 50px 0 #939393;
box-shadow: inset 0 0 50px 0 #939393;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
margin: -220px 0 0 -375px;
}
#fanclose {
float:right;
cursor:pointer;
background:url(http://3.bp.blogspot.com/-NRmqfyLwBHY/T4nwHOrPSzI/AAAAAAAAAdQ/8b9O7O1q3c8/s1600/fanclose.png) repeat;
height:15px;
padding:20px;
position:relative;
padding-right:40px;
margin-top:-20px;
margin-right:-22px;
}
.remove-borda {
height:1px;
width:366px;
margin:0 auto;
background:#F3F3F3;
margin-top:16px;
position:relative;
margin-left:20px;
}
#linkit,#linkit a.visited,#linkit a,#linkit a:hover {
color:#80808B;
font-size:10px;
margin: 0 auto 5px auto;
float:center;
}
</style>


<script type='text/javascript'>
//<![CDATA[
jQuery.cookie = function (key, value, options) {

// key and at least value given, set cookie...
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);

if (value === null || value === undefined) {
options.expires = -1;
}

if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}

value = String(value);

return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}

// key and possibly options given, get cookie...
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
//]]>
</script>
<script type='text/javascript'>
jQuery(document).ready(function($){
if($.cookie('popup_user_login') != 'yes'){
$('#fanback').delay(2000).fadeIn('medium');
$('#fanclose, #fan-exit').click(function(){
$('#fanback').stop().fadeOut('medium');
});
}
$.cookie('popup_user_login', 'yes', { path: '/', expires: 7 });
});


</script>
 
<!--<div id='fanback'>
<div id='fan-exit'>
</div>
<div id='fanbox'>
<div id='fanclose'>
</div>
<div class='remove-borda'>
</div>
<iframe allowtransparency='true' frameborder='0' scrolling='no' src='//www.facebook.com/plugins/likebox.php?

href=http://www.facebook.com/Dhakaobserver&width=402&height=255&colorscheme=light&show_faces=true&show_border=false&stream=false&header=false'

style='border: none; overflow: hidden; margin-top: -19px; width: 402px; height: 230px;'></iframe><center>
<span id="linkit"><a href="http://www.theblogwidgets.com/2013/08/facebook-popup-widget-with-lightbox.html">Facebook Like Box</a> <a href="http://www.theblogwidgets.com">Widget</a></span></center>
</div>
</div>-->




     <header class="header_con">
     	<div class="hc_top">
     		<div class="hc_top_left">
     			<div class="lft_txt">Follow us :</div>
					
     			<div class="lft_icon">
                <ul class="rr social">
										 <li><a href="https://www.facebook.com/dhakaobserver" class="ir s2"></a></li>
                    <li><a href="#" class="ir s3"></a></li>
										<li><a href="#" class="ir s4"></a></li>
                                        <li><a href="#" class="ir s1"></a></li>
                   
          </ul>
          <!-- AddThis Follow BEGIN -->
                <!--<div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE"></a>
                <a class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a>
                <a class="addthis_button_youtube_follow" addthis:userid="YOUR-USERNAME"></a>
                <a class="addthis_button_pinterest_follow" addthis:userid="YOUR-USERNAME"></a>
                </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52a5e9743da7e808"></script>-->
                <!-- AddThis Follow END -->

          </div>
     		</div>
				<div class="hc_top_left" style="width:250px; padding-left:0px;" id="bookmarks">
		<a  id="show-panel" onClick="getLightBox();" href="javascript:void(0)" style="color:#FFFFFF;text-decoration:none; font-family:Tahoma; padding:10px; font-size:11px; font-weight:bold">Make Dhaka Observer Your Homepage</a> 
            </div>
     		<div class="hc_top_right">
     			<div class="left_button">
     				<input name="Submit" type="button" class="button_1" value="ENGLISH VERSION" onClick="window.open('<?php echo base_url();?>english' , '_blank')" style="font-weight:bold;">
                    
     			</div>
					
     			<!--<div class="rightt_sbox">
     				<div class="phonetic_class">
     					ফনেটিক : <input type="radio" id="phonetic" name="phonetic" />
     				</div>
						<div class="t_field">
						  <input name="textfield" type="text" class="text_field_1" id="search_bangla">
						</div>
			  <div class="t_button">
     					<input name="Submit2" type="submit" class="button_2" value="SEARCH">
     				</div>

     			</div>-->
                <form method="post" action="<?php echo base_url();?>index/search_data?page=1">
                	<div class="rightt_sbox">
     				<div class="phonetic_class">
<input type="radio" name="ponetic" onClick="makePhoneticEditor('q');switched=false;" value="bvkphonetic">&nbsp;ফনেটিক       
<input type="radio" name="ponetic" onClick="makeUnijoyEditor('q');" value="bvkunijoy" >&nbsp;ইউনিজয়
     				</div>
						<div class="t_field">
						  <input type="text" id="q" name="search_data" class="search-query btn-small bn_font" placeholder="অনুসন্ধান করুন...">
						</div>
			  <div class="t_button">
     					<input name="Submit2" type="submit" class="button_2" value="SEARCH">
     				</div>

     			</div>
                </form>
     		</div>
     	</div>			
    <div class="hc_logo">
     		<div class="col_1"><img src="<?php echo base_url();?>assets/images/front/logo.png" width="148" height="84"></div>
				
     		<div class="col_2" >
				<?php
               $queryh="select * from news_manage order by n_id desc";
               $resulth=mysql_query($queryh);
               $rowh=mysql_fetch_array($resulth);
               $time=$rowh['time'];
              ?>
                <?php
                include('bangladate.php'); 
				echo $convertedDATE;
				?><br>
                সর্বশেষ আপডেট <?php echo $convertedtime; ?><br>
            </div>
            
            <div class="col_2"><div id="whether"></div></div>
     		            
     	</div>
			
    <div class="hc_menu">
    
    <ul class="orion-menu green">
	<?php /*?><?php 
	if($id!='index'){
	?>
    <li><a href="<?php echo base_url(); ?>" style="text-transform:uppercase" id="index">প্রচ্ছদ</a></li>
	<?php }if($id=='index'){?><?php */?>
	<li class="active"><a href="<?php echo base_url(); ?>" style="text-transform:uppercase" id="index">প্রচ্ছদ</a></li>
	<?php //}?>
		<?php
		foreach($menulist as $menu):
		$menu_name=$menu -> cat_name;
		$menu_id=$menu -> cid;
		?>
		<li><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>&&page=1" style="text-transform:uppercase" id="<?php echo $menu_id; ?>"><?php echo $menu_name; ?></a></li>
		<?php 
		endforeach;
		?>
      </ul>
			
			</div>
			
   	   <div class="clearfloat"></div>
     </header>
<div id="lightbox-panel"></div>
<div id="lightbox"></div>