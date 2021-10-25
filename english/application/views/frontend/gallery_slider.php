<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url();?>assets/5/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/5/js-image-slider.js" type="text/javascript"></script>
    <link href="<?php echo base_url();?>assets/5/generic.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="sliderFrame">
        <div id="ribbon"></div>
        <!--<div id="slider">
            <a href="http://www.menucool.com/">
                <img src="<?php echo base_url();?>assets/5/images/image-slider-1.jpg" alt="Welcome to Menucool.com" />
            </a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-2.jpg" title="Customizable Transition Effects">Customizable Transition Effects</a>
            <a href="http://www.menucool.com/javascript-image-slider">
                <b data-src="<?php echo base_url();?>assets/5/images/image-slider-3.jpg" data-alt="#htmlcaption3">Image Slider</b>
            </a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-4.jpg" title="Pure Javascript. No jQuery. No flash.">Plain Javascript Slider</a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-5.jpg" title="#htmlcaption5">Lazy Loading Image</a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-1.jpg" title="Light weight Image Slider">Light weight Image Slider</a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-2.jpg" title="Fine tuned. Sleek & Smooth">Fine tuned. Sleek & Smooth</a>
            <a class="lazyImage" href="<?php echo base_url();?>assets/5/images/image-slider-3.jpg" title="Easy-to-Use Slider">Easy-to-Use Slider</a>
        </div>-->
        <div id="slider">
			<?php
            $album_id=$_REQUEST['album_id'];
              $queryPop11="select * from photo_ablum_gall where photo_album_id='$album_id' order by ph_id desc";
             $resultPop11=mysql_query($queryPop11);
             while($rowPop11=mysql_fetch_array($resultPop11)){
             $photo_album_id1=$rowPop11['photo_album_id'];
             //$category=$rowPop['category'];
             $ph_ima1=$rowPop11['ph_ima'];
             $ph_name1=$rowPop11['ph_name'];
            ?>
            <a  class="lazyImage" href="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima1; ?>"  title="<?php echo $ph_name1;?>"><?php echo $ph_name1;?>
             <!--<img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima1; ?>" alt="<?php echo $ph_name1;?>" />-->
            </a>
            <?php
		  }
		  ?>
        </div>
        <!--<div id="thumbs">
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb1.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb2.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb3.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb4.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb5.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb1.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb2.jpg" /></div>
            <div class="thumb"><img src="<?php echo base_url();?>assets/5/images/thumb3.jpg" /></div>
        </div>-->
                
        <div id="thumbs">
        <?php
		$album_id=$_REQUEST['album_id'];
		  $queryPop1="select * from photo_ablum_gall where photo_album_id='$album_id' order by ph_id desc";
		 $resultPop1=mysql_query($queryPop1);
		 while($rowPop1=mysql_fetch_array($resultPop1)){
		 $photo_album_id=$rowPop1['photo_album_id'];
		 //$category=$rowPop['category'];
		 $ph_ima=$rowPop1['ph_ima'];
		 $ph_name=$rowPop1['ph_name'];
		?>
            <div class="thumb"> <img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" title="<?php echo $ph_name;?>"/></div>
         <?php
		  }
		  ?>
        </div>
    </div>

    </body>
</html>
