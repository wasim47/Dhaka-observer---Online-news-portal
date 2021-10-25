<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
	<body>
	<section id="main-container">
        <div class="use-sidebar sidebar-at-right" id="main_layout">
        	<div class="login">
				<h4>&#2437;&#2472;&#2497;&#2455;&#2509;&#2480;&#2489; &#2453;&#2480;&#2503; &#2438;&#2474;&#2472;&#2494;&#2480; &#2439;&#2441;&#2460;&#2494;&#2480; &#2447;&#2476;&#2434; &#2474;&#2494;&#2488;&#2451;&#2527;&#2494;&#2480;&#2509;&#2465; &#2463;&#2494;&#2439;&#2474; &#2453;&#2480;&#2497;&#2472; &#2404;</h4>
				<div class="login-img"><img src="<?php echo base_url();?>assets/images/user/changepassword1.jpg" width="100%" /></div>
				<div class="login-form">
				<?php echo form_open("admin/login");?>
					<div class="login-label">&#2439;&#2441;&#2460;&#2494;&#2480; &#2472;&#2494;&#2478; :</div>
		      <input name="email_address" id="email_address" class="login-field" type="text">
					<span id="username_err"></span>
					<div class="login-label">&#2474;&#2494;&#2488;&#2451;&#2527;&#2494;&#2480;&#2509;&#2465;:</div>
		      <input name="password" id="password" value="" class="login-field" type="password">        
					<div style="width:30%; float:right; margin:5% 6% 0 0">
					<input name="login" value="LOGIN" class="login-btn" type="submit">
					</div>
					<p><a href="#" style="font-size:14px;">আপনি কি পাসওয়ার্ড ভুলেগেছেন ?</a></p>
				    </form>
				</div>              
</div>
		</div>
  	</section>
</body>
</html>
