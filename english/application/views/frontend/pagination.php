<?php
	$tbl_name="news_manage";		//your table name
	$adjacents = 3;
	$query = "SELECT COUNT(*) as num FROM $tbl_name where  category ='$cat_id'";
	$total_pages1 = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages1['num'];
	$targetpage = "news_gallery"; 	//your file name  (the name of this file)
	$limit = 6;
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
			$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$prev\"> << </a>";
		else
			$pagination.= "<span class=\"disabled\"> << </span>";	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lastpage\">$lastpage</a>";		
			}

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$lastpage\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$counter\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?cat_id=$cat_id&&page=$next\">>></a>";

		else

			$pagination.= "<span class=\"disabled\">next >></span>";

		$pagination.= "</div>\n";		

	}
	}
?>