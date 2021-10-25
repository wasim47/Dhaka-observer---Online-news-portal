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
    <div class="nav-header"><div class="nav-title">ক্যাটাগরি</div></div>
    <div class="nav-body">
    	<ul>
        	        	<!--<li class="profile">
            	<a href="<?php echo base_url();?>pages/edit_profile">User Profile</a>
            </li>-->
            <li class="user" id="manage">
            	<a href="<?php echo base_url();?>category/index">ক্যাটাগরি লিস্ট</a>
            </li>
                        
            <li class="user-add">
            	<a href="<?php echo base_url();?>category/create">নিউ ক্যাটাগরি</a>
            </li>      	
			
			<!--<li class="user" id="manage">
            	<a href="<?php echo base_url();?>category/category_list">Category Manage</a>
            </li>-->
                        
            <!--<li class="user-add selected">
            	<a href="<?php echo base_url();?>category/category_create">New Category</a>
            </li>-->
                       	
                        <!--<li class="user-role">
            	<a href="http://demo.phptourscript.com/Administrator/Role/list">User Roles</a>
            </li>-->
                        
                        <!--<li class="form-list">
				<a href="http://demo.phptourscript.com/Members/form/list">Custom Form List</a>
            </li>
                        
                        <li class="password-change last">
				<a href="<?php echo base_url();?>admin/change_password">Change Password</a>
            </li>
			 </li>-->
                        
                        <li class="password-change last">
				<a href="<?php echo base_url();?>admin/logout">লগআউট</a>
            </li>
                    </ul>
    </div>
</div>
</body></html>