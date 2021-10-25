<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
<div id="nav">
    <div class="nav-header"><div class="nav-title">Article</div></div>
    <div class="nav-body">
    	<ul>
        	        	<!--<li class="profile">
            	<a href="<?php echo base_url();?>pages/edit_profile">User Profile</a>
            </li>-->
                       	
			<li class="user" id="manage">
            	<a href="<?php echo base_url();?>pages/index">Article Manage</a>
            </li>
                        
            <li class="user-add selected">
            	<a href="<?php echo base_url();?>pages/create">Add Article</a>
            </li>
                       	
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
				<a href="<?php echo base_url();?>admin/logout">Logout</a>
            </li>
                    </ul>
    </div>
</div>