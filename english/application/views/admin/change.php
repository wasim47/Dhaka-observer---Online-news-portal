<script>
function form_submit(){
var backid = document.getElementById("back").value;
var resetid = document.getElementById("reset").value;
var saveid = document.getElementById("save").value;
//alert(saveid);
if(saveid){
alert(saveid);
document.MemberForm.submit();
}
}
</script>
<section id="main-container">
<div id="container">
<div class="title-container">
  <h1>Change Password</h1>
  <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" />
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/>
		</span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
    	<?php include("left_menu.php");?>
</div>
    
    <div id="content-inner">
    	<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>admin/change_password">
        	<div id="actionMessage"></div>
            <fieldset class="fieldset">
                	<legend class="legend">Change Your Password</legend>
                    <div class="form">
                    	                    	<div class="form-row">
                        	<div class="label">
                            	Old Password:<span class="required">*</span>					
                            </div>
                            
                            <div class="field">
								
<!--<input name="old" id="oldpass" size="25" title="Enter Old Password" type="text">-->
<?php echo form_input($old_password);?>
<div class="input-errors" id="oldpass_err"><?php echo form_error('old'); ?></div>
                            </div>
                       	</div>
						                        
                        <div class="form-row">
                        	<div class="label">
								New Password:<span class="required">*</span>	
                            </div>
                            
                            <div class="field">
                            	
<!--<input name="new_password" id="password" value="" size="25" type="password">-->
<?php echo form_input($new_password);?>
<div class="input-errors" id="password_err"><?php echo form_error('new'); ?></div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                        	<div class="label">
								New Password:<span class="required">*</span>                            </div>
                            
                            <div class="field">
                            	
<!--<input name="new_password_confirm" id="confirmPassword" value="" size="25" type="password">	-->
<?php echo form_input($new_password_confirm);?>

<div class="input-errors" id="confirmPassword_err"><?php echo form_error('new_confirm'); ?>
</div>
<?php echo form_input($user_id);?>
                            </div>
                        </div>   
					</div>
         	</fieldset>
		</form>
	</div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" />
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/>
    </div>
    
</div>

</div>
</section>
