<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script>
$(document).ready(function(){
	$("#district_news").hide();
	$("#mostViewd").css("background-color" , "#DFDFDF");
	$("#mostViewd").css("color" , "#000");
	
	$("#mostViewd").click(function(){
		$("#mostViewd").css("background-color" , "#DFDFDF");
		$("#mostViewd").css("color" , "#000");
		$("#districtNews").css("background-color" , "#990100");
		$("#districtNews").css("color" , "#fff");
		$("#most_viewd").show();
		$("#district_news").hide();
	});
	
	$("#districtNews").click(function(){
	$("#districtNews").css("background-color" , "#DFDFDF");
	$("#districtNews").css("color" , "#000");
	$("#mostViewd").css("background-color" , "#990100");
	$("#mostViewd").css("color" , "#fff");
		$("#district_news").show();
		$("#most_viewd").hide();
	});
	
	
});
</script>
</head>
<body>
<div class="right_box1">
     		<div class="most_read_news_area">
                <div class="most_read_news_img">
                <img src="<?php echo base_url();?>assets/images/front/logo_small.png" /></div>
                  <div class="most_read_news" id="mostViewd">সর্বাধিক পঠিত</div>
                  <div class="district_news" id="districtNews">জেলা সংবাদ</div>
  			</div>
						
            <div class="rightbox_bottom" id="most_viewd">
            <ul>
            <?php
                         foreach($rel_news as $rel_news):
                            $headline=$rel_news ->headline;
                            $n_id=$rel_news ->n_id;
							$read_count=$rel_news ->read_count;
                            $category=$rel_news ->category;
                        ?>
                <li><span>
                    <a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php echo $headline;?></a>
                
                </span> </li>
                        <?php
                        endforeach;
                        ?>
                </ul></div>
                
                
                
            <div class="rightbox_bottom" id="district_news">
            <ul>
				<?php
                foreach($district_news as $dis_news):
                $headline=$dis_news ->headline;
                $n_id=$dis_news ->n_id;
				
                $category=$dis_news ->category;
                ?>
                <li><span>
                <a href="<?php echo base_url();?>index/news_details?id=<?php echo $n_id;?>&&cat_id=<?php echo $category;?>" style="text-decoration:none;"><?php echo $headline; ?></a>
                
                </span> </li>
                <?php
                endforeach;
                ?>
            </ul>
            </div>
    </div>
</body>
</html>