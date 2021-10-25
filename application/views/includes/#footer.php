 <footer class="footer_con" >
		 	<div class="f_in">
		 		<div class="footer_con_left">
		 			<div class="fc_top"><img src="<?php echo base_url();?>assets/images/front/footer_logo.png"></div>
					
		 		<div class="fc_bottom">&#2447;&#2465;&#2495;&#2463;&#2480;&#2438;&#2476;&#2509;&#2470;&#2497;&#2482; &#2438;&#2441;&#2451;&#2494;&#2482; (  &#2488;&#2507;&#2489;&#2494;&#2455; )<br>
                &#2489;&#2494;&#2460;&#2509;&#2460; &#2478;&#2462;&#2509;&#2460;&#2495;&#2482;, &#2489;&#2494;&#2441;&#2488;-&#2535;&#2534;<br />
                &#2480;&#2507;&#2465; - &#2539;, &#2447;&#2474;&#2494;&#2480;&#2509;&#2463;&#2478;&#2503;&#2472;&#2509;&#2463; - &#2488;&#2495; &#2537;<br />
                &#2476;&#2509;&#2482;&#2453; - &#2447;, &#2488;&#2503;&#2453;&#2486;&#2472;-&#2535;&#2535;,<br />
                &#2478;&#2495;&#2480;&#2474;&#2497;&#2480;, &#2466;&#2494;&#2453;&#2494;-&#2535;&#2536;&#2535;&#2540;, &#2476;&#2494;&#2434;&#2482;&#2494;&#2470;&#2503;&#2486;.<br>
&#2475;&#2507;&#2472; : &#2534;&#2535;&#2542;&#2537;&#2537;&#2537;&#2539;&#2540;&#2539;&#2542;&#2542; ,&#2534;&#2538;&#2538;&#2541;&#2539;&#2534;&#2538;&#2539;&#2543;&#2543;&#2534;<br>
&#2439;-&#2478;&#2503;&#2439;&#2482; : info@dhakaoserver.com	</div>
	 		  </div>
		 		<div class="footer_con_right">
		 			<div class="rc_top">
                    <!--<a href="#" class="f_menu_1">NATIONAL</a> | <a href="#" class="f_menu_1">POLITICS</a> | <a href="#" class="f_menu_1">CAPITAL</a> | <a href="#" class="f_menu_1">ENTIRE COUNTRY</a> | <a href="#" class="f_menu_1">BUSINESS</a> | <a href="#" class="f_menu_1">SPORTS</a> | <a href="#" class="f_menu_1">SCIENCE & TECH</a> | <a href="#" class="f_menu_1">ENTERTAINMENT</a> | <a href="#" class="f_menu_1">HEALTH</a> | <a href="#" class="f_menu_1">EDUCATION</a> | <a href="#" class="f_menu_1">NOBLE</a>-->
                    
                    
                    
					<?php
                     foreach($menulist as $menu):
                    $menu_name=$menu -> cat_name;
                    $menu_id=$menu -> cid;
                    ?>
                     <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>"><?php echo $menu_name; ?></a>|
                    <?php 
                    endforeach;
                    ?>
                    
                    </div>

					
		 			<div class="rc_mid">&copy;2013 Dhaka OBSERVER All Rights Reserved.</div>
		 			<div class="rc_bottom">
                    <!--<a href="#" class="f_menu_1">ADVERTISEMENT</a> | <a href="#" class="f_menu_1">CLASSIFIED ADVERTISEMENT</a> | <a href="#" class="f_menu_1">CONTACT</a>-->
                    
                    <?php
                     foreach($inactive__menulist as $in_menu):
                    $menu_namein=$in_menu -> cat_name;
                    $menu_idin=$in_menu -> cid;
                    ?>
                     <a href="<?php echo base_url(); ?>index/news_gallery?cat_id=<?php echo $menu_id; ?>" style="text-transform:uppercase"><?php echo $menu_namein; ?></a>|
                    <?php 
                    endforeach;
                    ?>
                    </div>
		 		</div>
		 		<div class="clearfloat"></div>
	 		</div>
	 	   <div class="clearfloat"></div>
</footer>
  
</body>
</html>
