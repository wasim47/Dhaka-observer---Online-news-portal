<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
<div id="nav">
    <div class="nav-header">
      <div class="nav-title">Coin</div>
  </div>
    <div class="nav-body">
    	<ul>
			<li class="user" id="manage">
            	<a href="<?php echo base_url();?>coin/index">Coin Manage</a>
            </li>
                        
            <li class="user-add selected">
            	<a href="<?php echo base_url();?>coin/create">New coin</a>
            </li>
                    
               <li class="password-change last">
				<a href="<?php echo base_url();?>admin/logout">Logout</a>
            </li>
                    </ul>
    </div>
</div>