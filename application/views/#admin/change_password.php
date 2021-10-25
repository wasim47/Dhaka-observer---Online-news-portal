<table width="986" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td  bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3"><img src="<?php echo base_url();?>assets/images/main_body_01.jpg" width="986" height="35" /></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url();?>assets/images/main_body_02.jpg" width="24" height="230" /></td>
        <td width="936" height="230" valign="middle" background="<?php echo base_url();?>assets/images/main_body_03.jpg"><?php echo form_open("admin/change_password");?>
         
        <table width="58%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" id="index_bor">
		<tr>
		<td colspan="5" align="center" bgcolor="#dbe8f8">&nbsp;<div id="loginerror" class="loginerror" align="center"></div></td>
		</tr>
		<tr>
		<td width="20%" rowspan="4" align="center" valign="middle" bgcolor="#f0f4fd"><img src="<?php echo base_url();?>assets/images/lock.png" alt="" width="90" height="90" /></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td><td width="24%" bgcolor="#f0f4fd">&nbsp;</td>
		</tr>
		<tr>
		<td width="22%" height="26" align="center" bgcolor="#f0f4fd" class="section_text">Old Password:</td>
		<td width="1%" align="center" bgcolor="#f0f4fd"><strong>:</strong></td>
		<td width="32%" bgcolor="#f0f4fd"><?php echo form_input($old_password);?></td>
		<td width="24%" bgcolor="#f0f4fd" ><div id="errors"><?php echo form_error('old'); ?></div>
      </td>
		</tr>
		<tr>
		<td align="center" bgcolor="#f0f4fd" class="section_text">New Password</td>
		<td align="center" bgcolor="#f0f4fd"><strong>:</strong></td>
		<td bgcolor="#f0f4fd"><?php echo form_input($new_password);?></td><td bgcolor="#f0f4fd"><div id="errors"><?php echo form_error('new'); ?></div>
      </td>
      
		</tr>
        <tr>
		<td align="center" bgcolor="#f0f4fd" class="section_text">Retype Password</td>
		<td align="center" bgcolor="#f0f4fd"><strong>:</strong></td>
		<td bgcolor="#f0f4fd"><?php echo form_input($new_password_confirm);?></td><td bgcolor="#f0f4fd"><div id="errors"><?php echo form_error('new_confirm'); ?></div>
      </td>   
		</tr>
        <tr>
		<td align="center" bgcolor="#f0f4fd">&nbsp;</td>
		<td align="center" bgcolor="#f0f4fd"><?php echo form_input($user_id);?></td>
		<td align="left" valign="middle" bgcolor="#f0f4fd">&nbsp;</td>
        <td colspan="2" bgcolor="#f0f4fd"><?php echo form_submit('submit', 'Change');?></td> 
		</tr>
        
		<tr>
		<td height="29" colspan="5" align="center" bgcolor="#dbe8f8" class="section"><?php echo form_close();?><div id="errors" ><?php  echo $message; ?></div></td>
		</tr>
		</table> 
        </td>
        <td><img src="<?php echo base_url();?>assets/images/main_body_04.jpg" width="26" height="230" /></td>
      </tr>
      <tr>
        <td colspan="3"><img src="<?php echo base_url();?>assets/images/main_body_05.jpg" width="986" height="32" /></td>
      </tr>
    </table>