<div id="showcase" class="showcase">
		
        
         <?php
             foreach($topdesk_news_gallery as $desknews):
                $image_title=$desknews ->image_title;
                $image=$desknews ->image;
                $headline=$desknews ->headline;
                $category=$desknews ->category;
                $n_id=$desknews ->n_id;
                $short_description=$desknews ->short_description;
            ?>
		 <div class="showcase-slide">
			  <div class="lfttxt" >
			  	<div class="innerlf" >
			  		<p class="bold_txt"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#fff"><?php echo $headline; ?></a></p>
                    <?php 
                    $string1 = strip_tags($short_description);
                    if (strlen($string1) > 400) {
                        $stringCut = substr($string1, 0, 400);
                        $string1 = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
                    }
                    ?>
			  		<p><a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none; color:#fff; font-size:15px;"><?php echo $string1; ?></a></p>
			  	</div>
         </div>
         <div class="lftimg" ><a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image; ?>" width="467" height="270" class="img_ad1"></a></div>
		  </div>
          
           <?php
            endforeach;
            ?>
          
          
      <!--  <div class="showcase-slide">
			  <div class="lfttxt" >
			  	<div class="innerlf" >
			  		<p class="bold_txt">Humayun Mela held at Channel i premises</p>
			  		<p>Legendary litterateur-filmmaker Humayun Ahmed’s 65th birth anniversary was celebrated yesterday at Channel i premises.</p>
			  	</div>
         </div>
         <div class="lftimg" ><img src="<?php echo base_url();?>assets/images/front/n2.jpg" width="467" height="277" class="img_ad1">         </div>
		  </div>
        
        <div class="showcase-slide">
			  <div class="lfttxt" >
			  	<div class="innerlf" >
			  		<p class="bold_txt">Literature as a Muse — Tariq Ali</p>
			  		<p>Tariq Ali is a British Pakistani writer, journalist, and filmmaker. Born in 1943, he has authored several books, including “Pakistan: Military Rule or People’s Power” (1970). </p>
			  	</div>
         </div>
         <div class="lftimg" ><img src="<?php echo base_url();?>assets/images/front/n3.jpg" width="467" height="277" class="img_ad1">         </div>
		  </div>

		  <div class="showcase-slide">
			  <div class="lfttxt" >
			  	<div class="innerlf" >
			  		<p class="bold_txt">Soaring towards a dream</p>
			  		<p>Bangladeshi Idol, the first international franchise of musical reality show in the country, has got its top six contestants who are now vying to reach the top position. </p>
			  	</div>
         </div>
         <div class="lftimg" ><img src="<?php echo base_url();?>assets/images/front/n4.jpg" width="467" height="277" class="img_ad1">         </div>
		  </div>-->
      </div>