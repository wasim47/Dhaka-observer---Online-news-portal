<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
</head>
<body>
<div id="nav">
    <div class="nav-header">
      <div class="nav-title">কলামিস্ট লিস্ট</div>
  </div>
    <div class="nav-body">
    	<table role="grid" cellspacing="0" width="100%">
                    <tbody>
                      <?php
							$i=0;
							foreach($categorys as $menu):
							$name=$menu->image_title;
							$cid=$menu->banner_id;
							$i++;
						?>
                      <tr>
                        <td width="10" align="center" style="border-bottom:1px solid #0099CC">&nbsp;</td>
                        <td width="959" role="gridcell" style="border-bottom:1px solid #0099CC; font-size:15px;">
                       <a href="<?php echo base_url();?>index.php/news?cid=<?php echo $cid; ?>" onclick="this.style.color='green; window.reload()==false'">
                        <?php echo $name; ?></a></td>
                      </tr>
                      <?php
						 endforeach;
					  ?>
                    </tbody>
                  </table>
  </div>
</div>
</body>
</html>