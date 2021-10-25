<?php
if(isset($_REQUEST['cat_id'])){
$news_id = $_REQUEST['id'];
$cat_id=$_REQUEST['cat_id'];
$querycat="select * from category where cid='$cat_id'";
$resultcat=mysql_query($querycat);
$rowcat=mysql_fetch_array($resultcat);
$category_name=$rowcat['cat_name'];

$queryNew="select * from news_manage where n_id='$news_id' and category='$cat_id'";
$resultNew=mysql_query($queryNew);
$rowNew=mysql_fetch_array($resultNew);
$headline=$rowNew['headline'];
$desc=$rowNew['full_description'];
$image=$rowNew['image'];
$auther_name=$rowNew['auther_name'];
$ptime=$rowNew['time'];
$pdate=$rowNew['date'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta property="og:title" content="<?php echo $headline; ?>" />
<meta property="og:image" content="<?php echo base_url();?>uploads/images/news/<?php echo $image;?>" />
<!--<meta property="og:description" content="<?php echo $desc; ?>" />
--><style>
*{
	font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;
	font-size:17px;
	
}
.news_title{
	font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;
	font-size:17px;
	color:#730404;
	font-weight:normal;
	
	}
.cat_name{
	font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;
	font-size:20px;
	color:#fff;
	font-weight:normal;
	padding:15px;
	width:100px;
	height:40px;
}
	.box {
    width:100%;
    padding:3px;
    background:#fff;
    margin:auto;
    border-radius:2px;
}

.css3-shadow{
    position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3);
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3);
}
.css3-shadow:after{
    content:"";
    position:absolute;
    z-index:-1;
    top:100%;
    bottom:0;
    width:100%;
    height:30px;
    left:-10%;
    right:-10%;
    background:-webkit-radial-gradient(40% -3%, ellipse cover, rgba(00, 00, 00, 0.5), rgba(97, 97, 97, 0.0) 30%);
    background:radial-gradient(ellipse at 35% -3%, rgba(00, 00, 00, 0.3), rgba(97, 97, 97, 0.0) 30%);
}
.logo{
	widows:148px;
	height:84px;
	background: url(<?php echo base_url();?>assets/images/front/logo.png) no-repeat;
}
</style>
</head>
<body onload="window.print();">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #000000; padding:5px; margin:auto">
                  <tr style="background:url(<?php echo base_url();?>assets/images/front/header_bg.png) repeat-x;">
                    <td width="185" class="cat_name">
                    <a href="<?php echo base_url();?>"><div class="logo"></div></a>					</td>
                    <td width="451" class="cat_name"><?php echo $category_name;?></td>
                    <td width="320" class="cat_name">&nbsp;</td>
	  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="news_title"><?php echo $headline;?></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="bdr_top details_date_text" style="font-size:25px; color:#999">
					
					<?php
						
					
					include('bangladate.php');
						$busdate = str_replace($engDATE, $bangDATE, $pdate);
						$bustime = str_replace($engtime, $bangtime, $ptime);
					 echo $auther_name;?>					 : &#2438;&#2474;&#2465;&#2503;&#2463; &#2437;&#2472;&#2435; <?php echo $bustime;?>,  <?php echo $busdate;?></td>
                    <td class="bdr_top details_date_text" style="font-size:14px; color:#999">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td height="10" colspan="3" class="bdr_top2"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="32%" align="left" valign="top">
                        <img src="<?php echo base_url();?>uploads/images/news/<?php echo $image;?>" width="712" height="350" style="float:left; padding:10px;" />
                        <span>
						<?php echo $desc;?>                        </span>                        </td>
                      </tr>
                      
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                  	<td colspan="4">
                    	<div class="box css3-shadow">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:url(<?php echo base_url();?>assets/images/front/header_bg.png) repeat-x;">
    <td width="23%" style="padding:12px;" valign="middle"><span class="cat_name">
    <a href="<?php echo base_url();?>">
    <div class="logo"></div></a>
    </span></td><td width="23%" height="30">
    	<div style="border-right:1px solid #fff; padding-right:30px; height:auto; text-align:center; color:#FFFFFF;font-size:17px;font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;">
        © সর্বস্বত্ব স্বত্বাধিকার সংরক্ষিত
         ঢাকা অবসারভার&nbsp;&nbsp;২০১৪      </div></td>
    <td width="54%">
    <div style="height:auto; text-align:center;  font-size:17px; padding-left:20px;color:#FFFFFF; font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;">
       সম্পাদক ও প্রকাশক : আব্দুল আউয়াল<br />
হেড অফ নিউজ : জোবাইদুর রহমান<br />
হাগ মাঞ্জিল বাড়ি : ১০ , রোড : এপার্টমেন্ট - C3, 
ব্লক -A ,সেকশন - ১১ , মিরপুর ঢাকা-১২১৬ , বাংলাদেশ ।<br />
ফোন : +৮৮০১৮৩৩৩৫৬৫৮৮, ই-মেইলঃ info@dhakaobserver.com         </div></td>
  </tr>
  <tr height="15" style="box-shadow:0px 0px 3px 3px #fff; background:url(<?php echo base_url();?>assets/images/front/footer_bg.png) repeat-x;">
    <td colspan="3">
    <div style="height:auto; text-align:center; padding:3px; color:#FFFFFF; font-size:17px;font-family: BNG,SutonnyBanglaOMJ,SolaimanLipi;">
    এই ওয়েবসাইটের  কোনো লেখা বা ছবি অনুমতি ছাড়া নকল করা বা অন্য কোথাও প্রকাশ করা সম্পূর্ণ বেআইনি</div></td>
    </tr>
</table>
</div>                    </td>
                  </tr>
                </table>
</body>
</html>
