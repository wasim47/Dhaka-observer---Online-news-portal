	<script type="text/javascript">
	$(document).ready(function(){
		$("#bodySlider").verticaltabs({speed: 500, slideShowSpeed: 50000, slideShow: true,activeIndex: 0});
				initializeTable('invoiceTable', 0);
						initializeTable('commentTable', 0);
						initializeTable('memberTable', 0);
						initializeTable('voteTable', 3);
		
		
		$(".pollpercent").tipsy({gravity:'south'});
		$(".weight").each(function(){
			interval = 3000; // the time (in ms) to animate the results
			lp = $(this).attr("data-lp");
			$(this).css({width:"0%"}).animate({width:lp+"%"}, interval);
		});	
			
		
		$("table.highlighter tr:nth-child(even)").addClass("even");
   		$("table.highlighter tr:nth-child(odd)").addClass("odd");	
	});
	function initializeTable(id, aaSorting)
	{
		/****************************Sorting Table Start*********************/
		var oTable = $("#"+id).dataTable({
					"bPaginate": false,
					"bDestroy":true,
					"bLengthChange": true,
					"bSearchable": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bProcessing": false,
					"bSortClasses": true,
					"bStateSave": false,
					"bServerSide": false,
					"aaSorting": [[ aaSorting, "desc" ]],				
					"aoColumnDefs": [ 
							{ "bSortable": false, "bSortClasses": false,  "aTargets": [ 5 ] }
						],
					"oLanguage" : { "sSearch": "Quick Search :" }
				}); 	
		
		$('td', oTable.fnGetNodes()).hover( function() {		
			$(this).parents("tr:first").children('td').addClass( 'highlighted' );
		}, function() {
			$('td.highlighted').removeClass('highlighted');
		});	
		
		/****************************Sorting Table End*********************/
	}
</script>
<div id="main-container">
    <div class="user-info">
	<h2>Dashboard</h2>
       <img src="<?php echo base_url();?>assets/images/avatar.png" width="auto" height="auto">
       
		 <span class="data">
        <span class="label">Administrator Profile</span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>admin/logout"><strong>( Log Out )</strong></a><br>
       	User Name : <?php echo $viewUser['first_name']."&nbsp;".$viewUser['last_name'];?><br>
       	Email : <?php echo $viewUser['email'];?><br>
       	Last Login : <?php echo $viewUser['last_login'];?><br>
        </span>
        <!--<span class="stat">
			        	<div class="stat-box"><a href="http://demo.phptourscript.com/Members/index/list"><h1>6</h1><p class="tools-tip">Users</p></a></div>
																
			            <div class="stat-box"><a href="http://demo.phptourscript.com/Tours/backendpro/list"><h1>24</h1><p class="tools-tip">Listings</p></a></div>
					
			            <div class="stat-box last"><a href="http://demo.phptourscript.com/Invoice/backend/list"><h1>2</h1><p class="tools-tip">Invoices</p></a></div>
                        <div class="calendar">
                <div class="month">Sep</div>
                <h1>22</h1>
                <div class="year">2013</div>
            </div>
        </span>-->
	</div>
   
<div id="dashboard-col-left">
	<div class="verticalslider" id="bodySlider">
	  <ul class="verticalslider_contents">
              <li class="activeContent">
                	<fieldset>
                		<legend>User Management</legend>
						                    		<!--<div class="tools-nav"><a href="<?php echo base_url();?>admin/user_account"><div class="icon user-tools"><img src="<?php echo base_url();?>assets/images/user/new.jpg" width="50" height="50" /></div><p class="tools-tip">Add Users</p></a></div>-->
						                        <div class="tools-nav"><a href="<?php echo base_url();?>admin/index"><div class="icon user-manage-tools"><img src="<?php echo base_url();?>assets/images/user/usermanag.jpg" width="50" height="50" /></div><p class="tools-tip">Manage Users</p></a></div>
                        						<!--<div class="tools-nav"><a href="<?php echo base_url();?>admin/index"><div class="icon user-search-tools"><img src="<?php echo base_url();?>assets/images/user/search.jpg" width="50" height="50" /></div><p class="tools-tip">User Search</p></a></div>-->
                        						<div class="tools-nav"><a href="<?php echo base_url();?>admin/change_password"><div class="icon password-change-tools"><img src="<?php echo base_url();?>assets/images/user/changepassword.jpg" width="50" height="50" /></div><p class="tools-tip">Change Password</p></a></div>
                        						<div class="tools-nav"><a href="<?php echo base_url();?>admin/edit_profile"><div class="icon user-profile-tools"><img src="<?php echo base_url();?>assets/images/user/profile.jpg" width="50" height="50" /></div><p class="tools-tip">View Profile</p></a></div>
                        						
				</fieldset>
                    
                    
                    <fieldset>
                		<legend>Content Management</legend>
                         <div class="tools-nav"><a href="<?php echo base_url();?>banner/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">Banner</p></a>
                            </div>
                            <div class="tools-nav"><a href="<?php echo base_url();?>advertisement/index">
                                <div class="icon article-add-tools">
                                <img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" />
                                </div>
                                <p class="tools-tip">Advertisement</p></a>
                            </div>
                        
                    	<!--<div class="tools-nav"><a href="<?php echo base_url();?>category/create">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/caticcon.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">New Category</p>
                    </a></div>-->
                        
                 	    <!--<div class="tools-nav"><a href="<?php echo base_url();?>category/category_create">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/subcat.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">New Sub Category</p>
                    </a></div>-->
                    							<!--<div class="tools-nav"><a href="<?php echo base_url();?>pages/create"><div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/new.jpg" width="50" height="50" /></div><p class="tools-tip">Add Article</p></a></div>
						                        <div class="tools-nav"><a href="<?php echo base_url();?>pages/index"><div class="icon article-manage-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div><p class="tools-tip">Manage Article(s)</p></a></div>
                        						<div class="tools-nav"><a href="<?php echo base_url();?>menu/create"><div class="icon menu-add-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div><p class="tools-tip">New Menu</p></a></div>
                        						<div class="tools-nav"><a href="<?php echo base_url();?>menu/index"><div class="icon menu-manage-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div><p class="tools-tip">Manage Menu(s)</p></a></div>
						                    -->
						                        
                        							
				</fieldset>
                
                
                    <fieldset>
                		<legend>News Management</legend>
                        <div class="tools-nav"><a href="<?php echo base_url();?>category/index">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">Category</p>
                    </a></div>
                   		<div class="tools-nav"><a href="<?php echo base_url();?>category/category_list">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/menu.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">Sub Category</p>
                    </a></div>
                    	<div class="tools-nav"><a href="<?php echo base_url();?>news/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">News Management</p></a>
                            </div>
						    <!--<div class="tools-nav"><a href="<?php echo base_url();?>news/create">
                                                <div class="icon article-manage-tools">
                                                <img src="<?php echo base_url();?>assets/images/article/new.jpg" width="50" height="50" />
                                                </div>
                                                <p class="tools-tip">Add New News</p>
						                        </a></div>-->
                                                
                           
						    <!--<div class="tools-nav"><a href="<?php echo base_url();?>banner/create">
                                                <div class="icon article-manage-tools">
                                                <img src="<?php echo base_url();?>assets/images/article/new.jpg" width="50" height="50" />
                                                </div>
                                                <p class="tools-tip">Add New Banner</p>
						                        </a></div>-->   
                                                
                                                
                                                
                                                
                            
                            
						    <!--<div class="tools-nav"><a href="<?php echo base_url();?>addvertisement/create">
                                <div class="icon article-manage-tools">
                                <img src="<?php echo base_url();?>assets/images/article/new.jpg" width="50" height="50" />
                                </div>
                                <p class="tools-tip">Add New Ad</p></a>
                            </div>-->
                                                            
                                                
                            <div class="tools-nav"><a href="<?php echo base_url();?>coin/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">Coin Market</p></a>
                            </div>
                            
                            
                            <div class="tools-nav"><a href="<?php echo base_url();?>sport/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">Sports Shcedule</p></a>
                            </div>
                            
                            
                            <div class="tools-nav"><a href="<?php echo base_url();?>football/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">Football Match Shcedule </p></a>
                            </div>
                            
                            
                            
						    <!--<div class="tools-nav"><a href="<?php echo base_url();?>coin/create">
                                                <div class="icon article-manage-tools">
                                                <img src="<?php echo base_url();?>assets/images/article/new.jpg" width="50" height="50" />
                                                </div>
                                                <p class="tools-tip">Add New Coin</p>
						                        </a></div>-->
												
                        							
				</fieldset>
              </li>
			</ul>
	</div>
</div>
</div>

