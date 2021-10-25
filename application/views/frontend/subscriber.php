<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<title>Untitled Document</title>

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

</head>

<body>

<div class="light_box_area">
<div class="cross_btn_area">
<a href="#" title="Click for Close" class="crossIcon">
<!--<img src="<?php echo base_url();?>/assets/images/front/circle_cross.png" width="32" height="32" border="0" />--></a></div>
<div class="alllight_con_area">
<div class="lightb_title"><div class="subscribeLogo"></div><!--<img src="<?php echo base_url();?>/assets/res/logo.png" />--></div>
<div class="lightb_title">24x7 Latest News From Bangladesh</div>
<div class="lightb_tex">Registration is FREE. Register now (10 secs) to read the rest of this article. More than 35,000 reader already registered. <br />
  <br />
Register to save for future visits.</div>
<form method="post" action="<?php echo base_url();?>index/subscriber_insert">
<div class="sub_bg">
<div class="sub_field_area">
    <input type="text" name="name" id="name" placeholder='Enter your Name' onfocus="this.placeholder =''" class="sub_field" onBlur="this.placeholder ='Enter your Name'"  />
</div>
</div>

<div class="sub_bg" style="float:left;">
<div class="sub_field_area" style="float:left">
    <input type="text" name="email" id="email" placeholder='Enter your email' onfocus="this.placeholder =''" class="sub_field" required onBlur="return check_username();" />
    <div id="Info" style="float:left; width:100%;"></div>
    <span id="Loading"><img src="<?php echo base_url();?>/assets/images/front/loader.gif" alt="" width="20" height="20" /></span>
</div>
</div>


<div style=" width:80%; height:auto;float:left; padding:10px 55px; ">
    <input type="image" src="<?php echo base_url();?>/assets/res/subscribe_btn.png"/>
</div>
</form>

</div>
</div>

</body>
</html>
