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
	<div class="add-user"><h1>Add User</h1></div>
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
    	<!--<form name="MemberForm" id="MemberForm">-->
				<?php
		$options = array(
						  '0'  => 'No',
						  '1'    => 'Yes'
						);
						
 		//	echo form_open("admin/create_user");
?>                
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>admin/update_user">
                <fieldset class="fieldset">
                	<legend class="legend">Member Information</legend>                    
						<div class="form">
									
						<div class="form-row">
						<div class="label label_class" style="">
						Enter First Name:<span class="required star_class" style="">*</span>											</div>
						
						<div class="field">
						
						<input name="first_name" id="firstName" value="<?php echo $editUser['first_name'];?>" size="40" title="Type Your First Name" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="text">											
							
						<div class="input-errors" id="firstName_err"></div>
						</div>
						</div>
						
														
						<div class="form-row">
						<div class="label label_class" style="">
						Enter Last Name:<span class="required star_class" style="">*</span>											</div>
						
						<div class="field">
						
						<input name="last_name" id="lastName"  value="<?php echo $editUser['last_name'];?>" size="40" title="Enter Your Last Name" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="text">											
							
						<div class="input-errors" id="lastName_err"></div>
						</div>
						</div>
						
														
						<div class="form-row">
						<div class="label label_class" style="">
						Company Name:											</div>
						
						<div class="field">
						
						<input name="companyName" id="companyName"  value="<?php echo $editUser['company'];?>" size="40" title="Type your Company Name" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="text">											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
									</div>
                </fieldset>
                <fieldset class="fieldset">
                	<legend class="legend">Login Information</legend>                    
                    <div class="form">
															
										<div class="form-row">
											<div class="label label_class" style="">
												Email Address (As Username):<span class="required star_class" style="">*</span>											</div>
								
											<div class="field">
												
<input name="email" id="username" size="40"  value="<?php echo $editUser['email'];?>" title="Type your Email Address correct. This will consider as your login ID" info="Type your Email Address correct. This will consider as your login ID" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="text">											
												<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default" title="Type your Email Address correct. This will consider as your login ID"><p><span class="ui-icon ui-icon-info"></span></p></div></div>	
												<div class="input-errors" id="username_err"></div>
											</div>
										</div>
										
										<div class="form-row">
											<div class="label label_class" style="">
												Select User Category:<span class="required star_class">*</span>											</div>
								
											<div class="field">
                                            <?php
												$role=$editUser['role'];
                                            	$cat_query=mysql_query("select * from category where cid='$role'");
												$row=mysql_fetch_array($cat_query);
												$cat_name=$row['cat_name'];
												$cid=$row['cid'];
											?>
                                  <select name="role_id" id="role_id" class="ui-widget-content ui-corner-all" style="width:150px;">
                                  <option value="<?php echo $cid; ?>" label="_blank"><?php echo $cat_name; ?></option>
										<?php
                                            foreach($categorys as $cat):
                                            $cat_id=$cat->cid;
                                            $catname=$cat->cat_name;
                                            ?>
                                         <option value="<?php echo $cat_id; ?>" label="_blank"><?php echo $catname; ?></option>
											<?php
                                                endforeach;
                                            ?>
                                        </select>
<div class="input-errors" id="role_id_err"></div>
											</div>
										</div>		
                                        
                                        <div class="form-row">
											<div class="label label_class" style="">
												Select User Type:<span class="required star_class">*</span>											</div>
								
											<div class="field">
                              <select name="user_type" id="user_type" class="ui-widget-content ui-corner-all" style="width:150px;">
                    <option value="<?php echo $editUser['username'];?>" label="_blank"><?php echo $editUser['username'];?></option>
                                    <option value="Super Admin" label="_blank">Super Admin</option>
                                    <option value="Local user" label="_blank">Local user</option>
                              </select>
<div class="input-errors" id="role_id_err"></div>
											</div>
										</div>								
										<!--<div class="form-row">
											<div class="label label_class" style="">
												Password:<span class="required star_class" style="">*</span>											</div>
								
											<div class="field">
												
<input name="password" id="password" value="" size="40" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="password">											
													
												<div class="input-errors" id="password_err"></div>
											</div>
										</div>
										
																				
										<div class="form-row">
											<div class="label label_class" style="">
												Confirm Password:<span class="required star_class" style="">*</span>											</div>
								
											<div class="field">
												
<input name="password" id="confirmPassword" value="" size="40" class="ui-widget-content ui-corner-all" admin="1" frontend="1" type="password">											
													
												<div class="input-errors" id="confirmPassword_err"></div>
											</div>
										</div>-->
										<?php echo form_hidden('id',$editUser['id'],'id="id"');?>
																				
										<!--<div class="form-row">
											<div class="label label_class" style="">
												Select User Group:<span class="required star_class" style="">*</span>											</div>
								
											<div class="field">
												
<select name="role_id" id="role_id" size="1" title="Name of User Group" class="ui-widget-content ui-corner-all" admin="1" frontend="1">
    <option value="" label="Select User Role">Select User Role</option>
    <option value="109" label="Affiliate">Affiliate</option>
    <option value="107" label="Agent">Agent</option>
    <option value="104" label="Registered User" selected="selected">Registered User</option>
    <option value="108" label="Reseller">Reseller</option>
</select>											
													
												<div class="input-errors" id="role_id_err"></div>
											</div>
										</div>-->
										
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
