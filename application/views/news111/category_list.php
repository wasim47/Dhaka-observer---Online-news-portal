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
      <div class="nav-title">Category List</div>
  </div>
    <div class="nav-body">
    	<table role="grid" cellspacing="3" cellpadding="5" width="100%">
                    <tbody>
                      <?php
							$i=0;
							foreach($categorys as $menu):
							$name=$menu->cat_name;
							$cid=$menu->cid;
							$i++;
						?>
                      <tr >
                        <td align="center" style="border-bottom:1px solid #0099CC">&nbsp;</td>
                        <td role="gridcell" style="border-bottom:1px solid #0099CC">
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