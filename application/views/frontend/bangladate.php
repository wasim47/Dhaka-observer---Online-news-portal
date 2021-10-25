<?php
//$currentDate = date("l d F Y");
$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','am', 'pm');
$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
বুধবার','বৃহস্পতিবার','শুক্রবার','এম', 'পিএম');

$topdeskdate = str_replace($engDATE, $bangDATE, $pdate);


?>

<?php
/*$differencetolocaltime=6;
$new_U=date("U")+$differencetolocaltime*3600;
$ptime = date("H:i A", $new_U);;
*/			
$engtime = array(1,2,3,4,5,6,7,8,9,0,'AM', 'PM');
$bangtime = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','সকাল', 'দুপুর');

$topdesktime = str_replace($engtime, $bangtime, $ptime);

?>
