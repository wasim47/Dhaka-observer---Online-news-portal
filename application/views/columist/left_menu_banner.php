<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
<div id="nav">
    <div class="nav-header">
      <div class="nav-title">Columist</div>
  </div>
    <div class="nav-body">
    	<ul>
			<li class="user" id="manage">
            	<a href="<?php echo base_url();?>columist/index">Columist Manage</a>
            </li>
                        
            <li class="user-add selected">
            	<a href="<?php echo base_url();?>columist/create">New Columist</a>
            </li>
                    
               <li class="password-change last">
				<a href="<?php echo base_url();?>columist/logout">Logout</a>
            </li>
                    </ul>
    </div>
</div>