<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>

#search_container{
	width:100%;
	height:auto;
	text-align:left;
}
#search_container .search_con{
	width:98%;
	height:auto;
	padding:5px;
}
#search_container .title{
	width:98%;
	height:auto;
	background:#dfe5e7;
	padding:3px;
}
#search_container .title_search{
	width:98%;
	height:auto;
	padding:3px;
	margin:5px;
}
#search_container .title_search .Searchtitle{
	font-size:18px;
	color:#FF0000;
	width:98%;
}
#search_container .title_search .headline{
	width:98%;
	font-size:20px;
	color:#000099;
	font-weight:bold;
}
#search_container .title_search .date_time{
	width:98%;
	font-size:14px;
	color:#3399d5;
}
#search_container .title_search .short_desc{
	width:98%;
	font-size:17px;
	color:#333;
	line-height:25px;
	text-align:justify;
	margin:10px 0;
}
#search_container .title_search .details_button{
	width:98%;
	color:#333;
	border-bottom:1px solid #333333;
	float:left;
}

#search_container select{
	margin:0 10px; 
	background:#dfe5e7; 
	width:15%;
}
#search_container .page{
	width:98%;
	height:auto;
	padding:3px;
	border:1px solid #666666;
	border-left:none;
	border-right:none;
	float:left;
	margin:10px 0;
}
</style>
</head>
<body>
<?php

	$tbl_name="news_manage";		//your table name
	$adjacents = 3;
	$query = "SELECT COUNT(*) as num FROM $tbl_name where headline LIKE '%$search_data%' OR short_description LIKE '%$search_data%' OR full_description LIKE '%$search_data%'";
	$total_pages1 = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages1['num'];
	$targetpage = base_url()."index/search_data"; 	//your file name  (the name of this file)
	$limit = 9;
	if(isset($_REQUEST['page'])){						//how many items to show per page
	$page = $_REQUEST['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	

	//if no page var is given, set start to 0
//===========================for Filtering date===========================
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1

	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\"> << </a>";
		else
			$pagination.= "<span class=\"disabled\"> << </span>";	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next\">>></a>";

		else

			$pagination.= "<span class=\"disabled\">next >></span>";

		$pagination.= "</div>\n";		

	}
	}
?>
<div class="clearfloat"></div> 
<div class="container">
     	
     	<div class="details_con1">
     		<div class="details_con1_left">
            <div class="gallery">
         	   <div id="search_container">
                <div class="search_con">অনুসন্ধান </div>
                <div class="title"><?php echo $search_data; ?></div>
                    <!--<div class="title_search">
                        ক্যাটাগরি<select style="margin-left:10px; background:#dfe5e7; width:15%"><option>Select One</option></select>
                        তথ্যের ধরন<select style="margin-left:10px; background:#dfe5e7; width:15%"><option>Select One</option></select>
                    
                    </div>-->
                    <div class="page">
                        <span style="float:left"><?php echo $total_pages;?> টি ফলাফল, ১ - ১০ টি </span>
                       <span style="float:right"><?php echo $pagination; ?></span>                    </div>
                    <?php 
$resp2=mysql_query("select * from news_manage where headline LIKE '%$search_data%' OR short_description LIKE '%$search_data%' OR full_description LIKE '%$search_data%' order by n_id desc limit $start, $limit");
                    $count = 0;
                    while($row=mysql_fetch_array($resp2))
                    {
                     $title=$row['headline'];
					 $newsId=$row['n_id'];
					 $date=$row['date'];
					 $time=$row['time'];
					 $auther_name=$row['auther_name'];
					 $short_description_short=$row['short_description'];
				 	 $news_categorytop=$row['category'];
					 
					 
					 ?>
                    <div class="title_search">
                        <!--<div class="Searchtitle"><?php //echo $title; ?></div>-->
                        <div class="headline">
						<a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;" target="_blank"><?php echo $title; ?></a></div>
                        <div class="date_time"><?php echo $auther_name; ?> | আপডেট: <?php echo $date; ?>&nbsp;&nbsp;<?php echo $date; ?></div>
                        <div class="short_desc">
                             <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none; color:#333" target="_blank">
							 <?php 
							$stringbottom1s = strip_tags($short_description_short);
							if (strlen($stringbottom1s) > 600) {
								$stringCuts = substr($stringbottom1s, 0, 600);
								$stringbottom1s = substr($stringCuts, 0, strrpos($stringCuts, ' ')).'.....'; 
							}
							?>
							 <?php echo $stringbottom1s; ?>
                             </a>
                        </div>
                        <div class="details_button">
                       <div style="background:#ccdbfe; padding:5px 10px; float:right; vertical-align:top">
                       <a href="<?php echo base_url();?>index/news_details?id=<?php echo $newsId;?>&&cat_id=<?php echo $news_categorytop; ?>" style="text-decoration:none;" target="_blank">বিস্তারিত</a></div>
                        </div>
                    </div>
                    <?php
                    }
					?>
                    <div class="page">
                        <span style="float:left"><?php echo $total_pages;?> টি ফলাফল, ১ - ১০ টি </span>
                       <span style="float:right"><?php echo $pagination; ?></span>                    </div>
					
            </div>
            </div>
							
                            <div class="clearfloat"></div>	
			
            
            
            
            				
     		
            
            
            
            
            
     		<div class="clearfloat"></div>					
     		</div>
     		<div class="details_con1_right">
								<?php include('most_read_news.php');?>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad5.jpg" width="317" height="140" class="smimg"></div>
								<?php //include('rel_cat_news.php');?>
								<div class="common_adbox_1">
                                <?php include('facebook.php');?>
                                </div>
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad12.jpg" width="317" height="172" class="smimg"></div>
								<div class="fbcon"><img src="<?php echo base_url();?>assets/images/front/fb.jpg" width="312" height="332" class="smimg"></div>
								<div class="common_adbox_2"><img src="<?php echo base_url();?>assets/images/front/ad14.jpg" width="314" height="132" class="smimg"></div>
								<div class="common_adbox_1"><img src="<?php echo base_url();?>assets/images/front/ad18.jpg" width="332" height="159" class="smimg"></div>
							</div>
     		</div>
     	<div class="clearfloat"></div>
     	<div class="clearfloat"></div>
 			<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	<div class="clearfloat"></div>
			     	
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>
											
						<div class="clearfloat"></div>		
</div>	
<div class="clearfloat"></div>
</body></html>