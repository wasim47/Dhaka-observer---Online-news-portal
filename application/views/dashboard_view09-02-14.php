<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
</head>
<body>

<div id="main-container">
    <div class="user-info">
	<h2>&#2465;&#2509;&#2479;&#2494;&#2486;&#2476;&#2507;&#2480;&#2509;&#2465;</h2>
<img src="<?php echo base_url();?>assets/images/avatar.png" width="auto" height="auto">
       
		 <span class="data">
        <span class="label">Administrator Profile</span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/admin/logout"><strong>( Log Out )</strong></a><br>
       	User Name : <?php echo $user_type=$this->session->userdata('first_name')."&nbsp;".$user_type=$this->session->userdata('last_name');?><br>
       	Email : <?php echo $this->session->userdata('email');?><br>
       	Last Login : <?php echo $this->session->userdata('old_last_login');?><br>
        </span>

	</div>
   
<div id="dashboard-col-left">
	<div class="verticalslider" id="bodySlider">
	  <ul class="verticalslider_contents">
              <li class="activeContent">
                <?php 
						$user_type=$this->session->userdata('username');
						if($user_type=="Super Admin"){
					?>	
                    <fieldset>
                		<legend>??????????????? ????????????????????????????????????</legend>
						                    	
						                        <div class="tools-nav"><a href="<?php echo base_url();?>admin/index"><div class="icon user-manage-tools"><img src="<?php echo base_url();?>assets/images/user/usermanag.jpg" width="50" height="50" /></div><p class="tools-tip">????????????????????? ???????????????</p></a></div>
                        						
                        						<div class="tools-nav"><a href="<?php echo base_url();?>admin/change_password"><div class="icon password-change-tools"><img src="<?php echo base_url();?>assets/images/user/changepassword.jpg" width="50" height="50" /></div><p class="tools-tip">????????????????????? ??????????????????????????????</p></a></div>
                        						<div class="tools-nav"><a href="<?php echo base_url();?>admin/edit_profile"><div class="icon user-profile-tools"><img src="<?php echo base_url();?>assets/images/user/profile.jpg" width="50" height="50" /></div><p class="tools-tip">????????? ????????????????????????</p></a></div>
                        						
				</fieldset>
                    <fieldset>
                		<legend>????????????????????? ????????????????????????????????????</legend>
                        <div class="tools-nav"><a href="<?php echo base_url();?>logo/index">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">??????????????? ????????????</p>
                    </a></div>
                     <div class="tools-nav"><a href="<?php echo base_url();?>banner/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">?????????????????????</p></a>
                            </div>
						    
                              <div class="tools-nav"><a href="<?php echo base_url();?>gallery/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">????????? ????????????????????????</p></a>
                            </div>
                            
						   
                                                
                                   
                                   
                                   
                                    <div class="tools-nav"><a href="<?php echo base_url();?>album_photo/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">???????????????????????? ?????????</p></a>
                            </div>
                            
						   
                                                
                                                
                                                             
                                                
                        <div class="tools-nav"><a href="<?php echo base_url();?>category/index">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/article1.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">???????????????????????????</p>
                    </a></div>
                    	
                        <div class="tools-nav"><a href="<?php echo base_url();?>category/category_list">
						                          <div class="icon article-link-tools"><img src="<?php echo base_url();?>assets/images/article/menu.jpg" width="50" height="50" /></div>
						                        <p class="tools-tip">????????? ???????????????????????????</p>
                    </a></div>
                    
                    <div class="tools-nav"><a href="<?php echo base_url();?>advertisement/index">
                                <div class="icon article-add-tools">
                                <img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" />
                                </div>
                                <p class="tools-tip">??????????????????????????????????????????</p></a>
                            </div>
                 	  
						                        
                        							
				</fieldset>
                	<?php 
					  }
					?>
                
                    <fieldset>
                		<legend>???????????? ????????????????????????????????????</legend>
                    		<div class="tools-nav"><a href="<?php echo base_url();?>news/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">???????????? ????????????????????????????????????</p></a>
                            </div>
                           <?php 
							$user_type=$this->session->userdata('username');
							if($user_type=="Super Admin"){
							?> 
						    <div class="tools-nav"><a href="<?php echo base_url();?>coin/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">????????? ?????????????????????</p></a>
                            </div>             
                            <div class="tools-nav"><a href="<?php echo base_url();?>pray_time/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">????????????????????? ????????????</p></a>
                            </div>
                            <div class="tools-nav"><a href="<?php echo base_url();?>cricket/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">????????????????????? ??????????????????</p></a>
                            </div>
                            <div class="tools-nav"><a href="<?php echo base_url();?>football/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">??????????????? ??????????????? ??????????????????</p></a>
                            </div>
                            <div class="tools-nav"><a href="<?php echo base_url();?>cultural/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">???????????????????????? ??????????????????</p></a>
                            </div>
                            <div class="tools-nav"><a href="<?php echo base_url();?>theatre/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">?????????????????????????????? ??????????????????</p></a>
                            </div>
  						    <div class="tools-nav"><a href="<?php echo base_url();?>voting/index">
                                 <div class="icon article-add-tools"><img src="<?php echo base_url();?>assets/images/article/article12.jpg" width="50" height="50" /></div>
                                 <p class="tools-tip">???????????????</p></a>
                            </div>
                        	<?php
                        	}
							?>					
				</fieldset>
              </li>
			</ul>
	</div>
</div>
</div>

</body></html>