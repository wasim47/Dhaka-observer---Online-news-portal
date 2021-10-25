<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<div class="row7_sub_right">
<div class="common_header"><a href="<?php echo base_url(); ?>index/news_gallery?cat_id=27&&page=1">লিড নিউজ</a></div>
<?php
$querynat="select * from news_manage where category='27' and top_news=1 and status=1 order by n_id desc limit 2";
$resultnat=mysql_query($querynat);
while($rownat=mysql_fetch_array($resultnat)){
$titlenat=$rownat['headline'];
$newsIdnat=$rownat['n_id'];
$image_title_shortnat=$rownat['image_title'];
$image_shortnat=$rownat['image'];
$short_description_shortnat=$rownat['short_description'];
$categorynat=$rownat['category'];
?>
<div class="picture_box_1"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>"><img src="<?php echo base_url();?>uploads/images/news/<?php echo $image_shortnat; ?>" width="660" height="438" class="smimg"></a></div>
<div class="news_box_1">
    <h4 class="common_news_title"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>"><?php echo $titlenat; ?></a></h4>
   <?php /*?> <?php 
        $stringbottom1nat = strip_tags($short_description_shortnat);
        if (strlen($stringbottom1nat) > 400) {
            $stringCutnat = substr($stringbottom1nat, 0, 400);
            $stringbottom1nat = substr($stringCutnat, 0, strrpos($stringCutnat, ' ')).'.....'; 
        }
        ?>
    <p class="common_news_content" style="height:67px; overflow:hidden"><a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsIdnat;?>&&cat_id=<?php echo $categorynat;?>"><?php echo $short_description_shortnat; ?></a>
    </p><?php */?>
</div>
<div class="clearfloat"></div>
 <?php
  }
  ?>
</div>

</body>
</html>