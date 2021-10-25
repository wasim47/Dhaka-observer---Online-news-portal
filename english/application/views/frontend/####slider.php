<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slider/engine1/style.css" />
<table width="97%" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="31" class="news_title_bx">LATEST PHOTO </td>
  				  </tr>
                  <tr>
                    <td width="100%">
                    <div id="wowslider-container1">
                        <div class="ws_images"><ul>
                    <?php
         foreach($photo_list as $photo):
		 	$ph_name=$photo ->ph_name;
			$ph_ima=$photo ->ph_ima;
			//$ph_id=$menu -> ph_id;
		?>
        <li><img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" title="<?php echo $ph_name; ?>"  width="100%" height="320"/></li>
        <?php
        endforeach;
		?>
                    <!--<li><img src="<?php echo base_url();?>assets/slider/data1/images/hydrangeas.jpg" alt="Hydrangeas" title="Hydrangeas" id="wows1_1"/></li>
                    <li><img src="<?php echo base_url();?>assets/slider/data1/images/desert.jpg" alt="Desert" title="Desert" id="wows1_2"/></li>
                    <li><img src="<?php echo base_url();?>assets/slider/data1/images/tulips.jpg" alt="Tulips" title="Tulips" id="wows1_3"/></li>-->
                    </ul></div>
                        <div class="ws_shadow"></div>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  </table>
	<script type="text/javascript" src="<?php echo base_url();?>assets/slider/engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/slider/engine1/script.js"></script>
