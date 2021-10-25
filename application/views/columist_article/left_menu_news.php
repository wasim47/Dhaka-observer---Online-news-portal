<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
<div id="nav">
    <div class="nav-header">
      <div class="nav-title">Columist Article</div>
  </div>
    <div class="nav-body">
    	<ul>
			<li class="user" id="manage">
            	<a href="<?php echo base_url();?>index.php/columist_article/index">Columist Article</a>
            </li>
                        
            <li class="user-add selected">
            	<a href="<?php echo base_url();?>index.php/columist_article/create">New Article</a>
            </li>
                    
               <li class="password-change last">
				<a href="<?php echo base_url();?>index.php/admin/logout">Logout</a>
            </li>
                    </ul>
    </div>
</div>