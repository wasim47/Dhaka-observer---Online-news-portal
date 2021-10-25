<script>
$(document).ready(function(){
$("#manage").click(function(){
$("#manage").removeClass('user-add selected');
$("#manage").addClass('user');

});
</script>
<div id="nav">
    <div class="nav-header">
      <div class="nav-title">Breaking News</div>
  </div>
    <div class="nav-body">
    	<ul>
			<li class="user" id="manage">
            	<a href="<?php echo base_url();?>index.php/news/breaking_news_index">News Manage</a>
            </li>
                        
            <li class="user-add">
            	<a href="<?php echo base_url();?>index.php/news/breaking_news_create">New news</a>
            </li>
                    
               <li class="password-change last">
				<a href="<?php echo base_url();?>index.php/admin/logout">Logout</a>
            </li>
                    </ul>
    </div>
</div>