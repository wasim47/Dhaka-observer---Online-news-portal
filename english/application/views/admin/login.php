
<?php /*?><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3"><img src="<?php echo base_url();?>assets/images/main_body_01.jpg" width="986" height="35" /></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url();?>assets/images/main_body_02.jpg" width="24" height="230" /></td>
        <td width="936" height="230" valign="middle" background="<?php echo base_url();?>assets/images/main_body_03.jpg"><?php echo form_open("admin/login");?>
         
        <table width="45%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" id="index_bor">
		<tr>
		<td colspan="4" align="center" bgcolor="#dbe8f8">&nbsp;<div id="loginerror" class="loginerror" align="center"></div></td>
		</tr>
		<tr>
		<td width="28%" rowspan="4" align="center" valign="middle" bgcolor="#f0f4fd"><img src="<?php echo base_url();?>assets/images/lock.png" alt="" width="90" height="90" /></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td>
		<td height="22" align="center" valign="middle" bgcolor="#f0f4fd"></td>
		</tr>
		<tr>
		<td width="14%" height="26" align="center" bgcolor="#f0f4fd" class="section_text">User ID</td>
		<td width="2%" align="center" bgcolor="#f0f4fd"><strong>:</strong></td>
		<td width="56%" bgcolor="#f0f4fd"><input name="email_address" type="text" class="input_box" id="email_address" /></td>
		</tr>
		<tr>
		<td align="center" bgcolor="#f0f4fd" class="section_text">Password</td>
		<td align="center" bgcolor="#f0f4fd"><strong>:</strong></td>
		<td bgcolor="#f0f4fd"><input name="password" type="password" class="input_box" id="password" /></td>
		</tr>
		<tr>
		<td align="center" bgcolor="#f0f4fd">&nbsp;</td>
		<td align="center" bgcolor="#f0f4fd">&nbsp;</td>
		<td align="left" valign="middle" bgcolor="#f0f4fd"><input type="submit" name="submit" value="" class="login"/></td>
		</tr>
		<tr>
		<td height="29" colspan="4" align="center" bgcolor="#dbe8f8" class="section"><div id="errors" ><?php  echo $message; ?></div></td>
		</tr>
		</table> 
         
         
         
         
         
         
         
         
         
         
          
        </form></td>
        <td><img src="<?php echo base_url();?>assets/images/main_body_04.jpg" width="26" height="230" /></td>
      </tr>
      <tr>
        <td colspan="3"><img src="<?php echo base_url();?>assets/images/main_body_05.jpg" width="986" height="32" /></td>
      </tr>
    </table><?php */?>
	
	<section id="main-container">
        <div class="use-sidebar sidebar-at-right" id="main_layout">
        	<div class="login">
				<h4>Please Enter Your Login Details</h4>
				<div class="login-img"><img src="<?php echo base_url();?>assets/images/user/changepassword1.jpg" width="100%" /></div>
				<div class="login-form">
				<?php echo form_open("admin/login");?>
					<div class="login-label">Username :</div>
					<input name="email_address" id="email_address" class="login-field" type="text">
					<span id="username_err"></span>
					<div class="login-label">Password :</div>
					<input name="password" id="password" value="" class="login-field" type="password">        
					<div style="width:30%; float:right; margin:5% 6% 0 0">
					<input name="login" value="LOGIN" class="login-btn" type="submit">
					</div>
					<p><a href="http://demo.phptourscript.com/Password/Backend/send">Forgot Password?</a></p>
				</form>
				</div>              
</div>
		</div>
  	</section>