<script>		
  function qToolTipFunctions()
  {
	  $( document ).tooltip({
	  	  items: "input[title],textarea[title],div[title],td[title],span[title],img[title],a[title],li[title]",
		  //show: { effect: "slide" },
		  tooltipClass: "jui-tooltip", 
		  content: function() {
				var element = $( this );				
				if ( element.is( "[title]" )  && !element.hasClass('noTitle')) 
				{
					return element.attr( "title" );
				}			
			},
		  track: true
	  });				
  }
  $(document).ready(function(){
	  qToolTipFunctions();
  });		
</script>
<script type="text/javascript">
$(document).ready(function() {
	
	//Variable que almacena el arreglo que se mostrara en el dropdown
	var ddData = [
		{
			text: "User Profile",
			value: 0,
			link_value: "/Members/index/profile",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/user.png"
		}
		,
		{
			text: "Global Settings",
			value: 1,
			link_value: "/Settings/global/update",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/global-setting.png"
		}
				,
		{
			text: "Update Contact",
			value: 2,
			link_value: "/Contact/backend/update",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/contact.png"
		}
									];
	
	var dIndex = null;
	
	for(var i = 0; i < ddData.length; i++)
	{
		var dLink = ddData[i].link_value;
		var cLink	=	"/Members/index/list/menu_id/Tour-Home";
		var rgxp = new RegExp(dLink, "g");
		if(cLink.match(rgxp) != null)
		{
			dIndex = ddData[i].value;					
			break;
		}
	}
	
	//Dropdown Básico
	$('#dropdownBasico').ddslick({
		data: ddData,
		width: 220,		
		selectText: "<img src='application/modules/Administrator/layouts/scripts/images/tools/settings.png' class='option'>GENERAL SETTINGS",
		defaultSelectedIndex: dIndex,
		truncateDescription: true,
		imagePosition: "left",
		showSelectedHTML: true,
		clickOffToClose: true,
		onSelected: function(data){
			//Llama función que hace algo
			//console.log(data);
			window.location.href = data.selectedData.link_value;
		}
	});
});
</script>
<section id="main-container">
		                      
        <div class="" id="main_layout">
        	<div id="container">
<script type="text/javascript">
$(document).ready(function() {
	floatingbar('#floatingbar',"#button_top_bar",null);	
	var settingObj = {
						grid_id : 'grid',
						dest_url : "/Members/index/list/menu_id/Tour-Home",
						pageSize : '30',
						page: '',
						calendar: {
							culture: "en-US",
							value: ''
						},
						search_action: {
							search_form_id : 'formUserSearch',
							search_form_btn : 'user_search_btn',
							hasTinyMCE 	: false
						},
						common_action : {
								permission_arr : {
										publish_enable 	: 	'1',
										delete_enable	:	'1'
								},
								publish_dest_url			:	"/Members/index/ajaxactivedeactiveusers",
								publish_dest_data_field 	: 	['user_id', 'username', 'paction'],
								publish_active_icon_link	:	"application/modules/Administrator/layouts/scripts/images/tools/user-active.gif",
								publish_deactive_icon_link	:	"application/modules/Administrator/layouts/scripts/images/tools/user-deactivate.gif",
								
								delete_dest_url				:	"/Members/index/ajaxdeleteusers",
								delete_dest_data_field 		: 	['user_id', 'username'],
								
								publish_multi_dest_url		:	"/Members/index/publishall",
								delete_multi_dest_url		:	"/Members/index/deleteall",
								
								toolbar_button_loader		:	'<span class="icon loader"></span>',
								ajax_loader_link			:	"application/modules/Administrator/layouts/scripts/images/loader/ajax_loader.gif"
						},
						search_data : {},
						batch:		false,
						editable:	false,
						scrollable: { virtual: false },
						detailInit:	false,
						dataBound: false,
						filterable:{
						  extra: true,
						  messages: {
							  info: "Show Items with value that:", // sets the text on top of the filter menu
							  filter: "Filter", // sets the text for the "Filter" button
							  clear: "Clear", // sets the text for the "Clear" button
					  
							  // when filtering boolean numbers
							  isTrue: "custom is true", // sets the text for "isTrue" radio button
							  isFalse: "custom is false", // sets the text for "isFalse" radio button
					  
							  //changes the text of the "And" and "Or" of the filter menu
							  and: "And",
							  or: "Or"
						  },
						  operators: {
							  string: {
								  startswith: "Starts with",
								  contains: "Contains",
								  doesnotcontain: "Does not contain",
								  endswith: "Ends with",
								  eq: "Is equal to",
								  neq: "Is not equal to"
							  },
							  number: {
								  eq:	"Is equal to",
								  neq:	"Is not equal to",
								  gte:	"Is greater than or equal to",
								  gt:	"Is greater than",
								  lte:	"Is less than or equal to",
								  lt:	"Is less than"
							  },
							  date: {
								  gte:	"Is after than or equal to",
								  gt:	"Is after than",
								  lte:	"Is before than or equal to",
								  lt:	"Is before than",
							  	  eq:	"Is equal to",
								  neq:	"Is not equal to"
							  }
						  }
						},
						model: {
                                    fields: {
                                        user_id: { type: "number" },
                                        username: { type: "string" },
                                        full_name: { type: "string" },
                                        role_name: { type: "string" },
                                        last_access: { type: "date" },
                                        register_date: { type: "date" }
                                    }
                                },					
						column_fields: [
											{ field:"checkAll", 		headerTemplate: '<input type="checkbox" name="checkAll" id="checkAll" class="checkAll_btn"   />',	template: '<input type="checkbox" value="${user_id}" class="check_btn" />' , width: 28, filterable: false, sortable: false, columnMenu: false},  // For Header : #= Selected ? checked="checked" : "" #       For Body :  # (checkAll) ? checked="checked" :  ""  #  # if(checkAll){ # checked # } #
											{ 
												field: "user_id", 		
												title: 	"ID", 
												width: 48, 
												filterable: { 
													ui: function(element) {
														element.kendoNumericTextBox({
															culture: "en-US",
															format: "0",
															min: 0,															
															placeholder: "Selecte a value",
															upArrowText: "Increase value",
															downArrowText: "Decrease value"
														});
													}
												}  
											},
											{ field: "username", 		title: 	"Username/Email", width: 190},
											{ field: "full_name", 		title:	"Name" },											
											{ field: "role_name", 		title:	"User Roles", width: 150 },
											{ 
												field: "last_access", 	
												title:	"Last login",  
												format: "{0:MM/dd/yyyy}", 
												template: '<div title="<strong>Date : </strong>${last_access_format}">#= kendo.toString(last_access,\'dd/MM/yyyy\') #</div>',
												attributes:{ 'align' : 'center' },
												width: 90, 
												filterable: { 
													ui: function(element) {
														kendoDateTimeCalendar(element, settingObj);
													}
												}
											},
											{ 
												field: "register_date", 	
												title:	"Register Date",  
												format: "{0:MM/dd/yyyy}", 
												template: '<div title="<strong>Date : </strong>${register_date_format}">#= kendo.toString(register_date,\'dd/MM/yyyy\') #</div>',
												attributes:{ 'align' : 'center' },
												width: 110, 
												filterable: { 
													ui: function(element) {
														kendoDateTimeCalendar(element, settingObj);
													}
												}
											},
											{ 
												field: "common_action",	
												title:	"Manage", 
												width: 140, 
												attributes:{ 'align' : 'center' },
												template:	'# if(edit_enable){ # <a href="/Members/index/edit/user_id/${user_id}" title="Edit"><img src="application/modules/Administrator/layouts/scripts/images/tools/user-edit.gif" alt="Edit" border="0" /></a> # } #'+
															'# if(role_lock == "1"){ # <a href="/Members/password/change/user_id/${user_id}" title="Change Password"><img src="application/modules/Administrator/layouts/scripts/images/tools/user-password.gif" alt="Change Password" border="0" /></a> # } #'+
															'# if(role_lock == "1"){ # <a href="/Administrator/rule/userlist/user_id/${user_id}" title="Permission"><img src="application/modules/Administrator/layouts/scripts/images/tools/user-permission.gif" alt="Permission" border="0" /></a> # } #'+
															' <a href="javascript:void(0);" class="publish_btn"  rel="${user_id}_${publish_status_username}_#= (status == 1) ? \'unpublish\' : \'publish\' #"><img src="#= (status == 1) ? \'application/modules/Administrator/layouts/scripts/images/tools/user-active.gif\' : \'application/modules/Administrator/layouts/scripts/images/tools/user-deactivate.gif\' #" border="0" title="#= (status == 1) ? \'Click To Disapprove\' : \'Click To Approve\' #" alt="#= (status == 1) ? \'Click To Disapprove\' : \'Click To Approve\' #" /></a>'+ 
															' <a href="javascript:void(0);" class="delete_btn"  rel="${user_id}_${publish_status_username}"><img src="application/modules/Administrator/layouts/scripts/images/tools/user-delete.gif"  border="0" title="Delete" alt="Delete" /></a>', 
												filterable: false, 
												sortable: false,
												columnMenu: false 
											}
											//{ command: { text: "View Details", click: gridPublish }, title: " ", width: "140px" }
										],
						columnMenu:	{
							columns: true,
							messages: {
									sortAscending: "Sort Ascending",
									sortDescending: "Sort Descending",
									filter: "Filter",
									columns: "Columns"
								}
						},
						messages: {
										display				: 	'{0} - {1} of {2} items',
										empty				:	'No items to display',
										page				:	'Page',
										of					:	'of {0}',
										itemsPerPage		:	'items per page',
										first				:	'Go to the first page',
										previous			:	'Go to the previous page',
										next				:	'Go to the next page',
										last				:	'Go to the last page',
										refresh				:	'Refresh',
										
										common_msg_dialog_id 		:	'dialog_msg',
										common_confirn_dialog_id	:	'dialog-confirm',
										common_ok					:	"Ok",
										common_delete_title			:	"Delete",
										common_delete_selected		:	"Delete",
										common_cancel				:	"Cancel",
										common_delete_confirm		:	"<span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>Confirm to delete this member ?",
										common_publish_title		:	"Click To Approve",
										common_unpublish_title		:	"Click To Disapprove",										
										common_publish_selected		:	"Approve",
										common_unpublish_selected	:	"Disapprove",
										common_publish_perm	 		:	"<span class='ui-icon ui-icon-alert' style='float:left; margin:0 0px 0px 0;'></span>You do not have enough access privileges to publish or unpublish this.",
										common_selected_err	 		:	"<span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>Please Select at least One Item."
									}
					};
	commonGrid(settingObj);	
});
</script>
<div class="title-container">
	<div class="user-all"><h1>User</h1></div>
    
    <div class="button-container">
    	        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" rel="publish" class="publish_all"><span class="icon publish">Approve</span></a></span>
                        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" rel="unpublish" class="publish_all"><span class="icon unpublish">Disapprove</span></a></span>
                        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" class="delete_all"><span class="icon delete">Delete</span></a></span>
            </div>
</div>
<div id="button_top_bar"></div>
<div class="content-container">
	<div id="sidebar-inner">
    	
<?php include("left_menu_article.php");?>
    </div>    
    <div id="content-inner">
    	    <!--<div class="toggle-link"><a href="#" id="slick-slidetoggle" class="user-icon">Search Menu</a></div>
            <div id="slickbox" style="display:none;" class="toggle-container">
<form id="formUserSearch" name="formUserSearch" method="post" action="">
                	<div class="toggle-search">
                    	<div class="toggle-row">
                        	<div class="toggle-label">
                            	<span class="label">Select Main Menu</span>
                            </div>
                            
                            <div class="toggle-field">
                            	<select name="groupmenu" id="groupmenu" class="ui-widget-content ui-corner-all" style="width:150px;">
						<?php
							foreach($menus as $menu):
							$menu_id=$menu->mid;
							$name=$menu->name;
							?>
						<option value="<?php echo $menu_id; ?>" label="_blank"><?php echo $name; ?></option>
						<?php
							endforeach;
          				?>
					</select>
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">Select Left Menu</span>
                          	</div>
                            
                            <div class="toggle-field">
                                <select name="role_id" id="role_id">
                                  <option selected="selected" value="">Any</option>
									  <option value="103">Manager</option>
									  <option value="104">Registered User</option>
									  <option value="107">Agent</option>
									  <option value="108">Reseller</option>
									  <option value="109">Affiliate</option>
                                </select>
                           	</div>
                        </div>
                        
                        <div class="toggle-row">
                          <div class="toggle-field"></div>
                      </div>
                    </div>
                    <hr>
                    <div class="clr form-button-container">
                    	<span class="button  ui-widget-content-1"><a href="javascript:%20void(0);" class="user_search_btn"><span class="icon search">Submit</span></a></span>
                    </div>
				</form>
</div>	-->				
                
                     <div class="k-grid k-widget">
					 <div style="border-width: 0px 0px 1px;" data-role="pager" class="k-pager-wrap k-grid-pager pagerTop k-widget"><a tabindex="-1" data-page="1" href="#" title="Go to the first page" class="k-link k-state-disabled">
					 <span class="k-icon k-i-seek-w">Go to the first page</span></a><a tabindex="-1" data-page="1" href="#" title="Go to the previous page" class="k-link k-state-disabled"><span class="k-icon k-i-arrow-w">Go to the previous page</span></a><ul class="k-pager-numbers k-reset"><li><span class="k-state-selected">1</span></li></ul><a tabindex="-1" data-page="1" href="#" title="Go to the next page" class="k-link k-state-disabled"><span class="k-icon k-i-arrow-e">Go to the next page</span></a><a tabindex="-1" data-page="1" href="#" title="Go to the last page" class="k-link k-state-disabled"><span class="k-icon k-i-seek-e">Go to the last page</span></a><span class="k-pager-sizes k-label"><span aria-busy="false" aria-readonly="false" aria-disabled="false" aria-owns="" tabindex="0" aria-expanded="false" aria-haspopup="true" role="listbox" unselectable="on" class="k-widget k-dropdown k-header" style=""><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">30</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select style="display: none;" data-role="dropdownlist"><option value="1">1</option><option value="5">5</option><option value="10">10</option><option selected="selected" value="30">30</option><option value="100">100</option><option value="500">500</option><option value="1000">1000</option></select></span>items per page</span><a href="#" class="k-pager-refresh k-link" title="Refresh"><span class="k-icon k-i-refresh">Refresh</span></a><span class="k-pager-info k-label">1 - 6 of 6 items</span></div>
					 <div style="min-height: 400px;">
					   <div style="" class="k-grid k-widget k-reorderable" data-role="grid" id="grid">
					    	 <table style="height: auto;" role="grid" cellspacing="0">
					       <thead class="k-grid-header">
					         <tr>
					           <th data-role="droptarget" class="k-header" role="columnheader" data-field="checkAll"><a style="display: none;" tabindex="-1" class="k-header-column-menu" href="#"></a>
					               <input name="checkAll" id="checkAll" class="checkAll_btn" type="checkbox" /></th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="article_id" data-title="ID"><a tabindex="-1" class="k-header-column-menu" href="#"></a><a class="k-link" href="#">ID</a></th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="article_name" data-title="Title"><a tabindex="-1" class="k-header-column-menu" href="#"></a><a class="k-link" href="#">Title</a></th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="full_name" data-title="Entry By"><a tabindex="-1" class="k-header-column-menu" href="#"></a><a class="k-link" href="#">Entry By</a></th>
					           <th data-role="droptarget" class="k-header" role="columnheader" data-field="linked_menu" data-title="Joined with Menu(s)"><a style="display: none;" tabindex="-1" class="k-header-column-menu" href="#"></a>Joined with Menu(s)</th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="order" data-title="Order"><a class="k-link" href="javascript:void(0)">Order</a>&nbsp;&nbsp;<a href="javascript:%20void(0);" class="all_order_btn"> <img src="<?php echo base_url();?>assets/images/save.png" border="0" /></a></th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="article_date" data-title="Date"><a tabindex="-1" class="k-header-column-menu" href="#"></a><a class="k-link" href="#">Date</a></th>
					           <th data-role="sortable" class="k-header" role="columnheader" data-field="article_status" data-title="Publish"><a tabindex="-1" class="k-header-column-menu" href="#"></a><a class="k-link" href="#">Publish</a></th>
					           <th data-role="droptarget" class="k-header" role="columnheader" data-field="common_action" data-title="Action"><a style="display: none;" tabindex="-1" class="k-header-column-menu" href="#"></a>Action</th>
				             </tr>
				           </thead>
					       <tbody>
						    <?php
							foreach($pages as $article):
							$menu_title=$article->menu_title;
							?>
					         <tr role="row" style="border-bottom:1px solid #CCCCCC">
					           <td class="" role="gridcell"><input name="checkbox" type="checkbox" class="check_btn" value="1" /></td>
					           <td class="" role="gridcell">1</td>
					           <td class="" role="gridcell"><a href="http://demo.phptourscript.com/Articles/backend/edit/article_id/1"><?php echo $menu_title; ?></a> </td>
					           <td class="" role="gridcell">Mr Super admin root</td>
					           <td class="" role="gridcell">Home (1)&nbsp;&nbsp; ||  &nbsp;&nbsp;Home (3)</td>
					           <td class="" role="gridcell" align="center"><input size="1" name="order" id="order" class="order_text" value="1" type="text" />
					             &nbsp;<a href="javascript:%20void(0);" rel="1" class="up_btn"><img src="<?php echo base_url();?>assets/images/up-arrow.gif" border="0" /></a>&nbsp;<a href="javascript:%20void(0);" rel="1" class="down_btn"><img src="<?php echo base_url();?>assets/images/down-arrow.gif" border="0" /></a></td>
					           <td class="" role="gridcell"><div title="&lt;strong&gt;Date : &lt;/strong&gt;2010-05-22 11:03:02 AM&lt;br /&gt;&lt;strong&gt;Entry By : &lt;/strong&gt;info@demo.phptourscript.com">22/05/2010</div></td>
					           <td class="" role="gridcell" align="center"><a href="javascript:void(0);" class="publish_btn" rel="1__unpublish"><img src="<?php echo base_url();?>assets/images/published.gif" title="Click To Un-Publish" alt="Click To Un-Publish" border="0" /></a></td>
					           <td class="" role="gridcell" align="center"><a href="<?php echo base_url();?>pages/updateData/<?php echo $article->id; ?>"><img src="<?php echo base_url();?>assets/images/edit.png" title="Edit" alt="Edit" border="0" /></a> &nbsp;&nbsp;<a href="<?php echo base_url();?>pages/delete/<?php echo $article->id; ?>" class="delete_btn" rel="1_"><img src="<?php echo base_url();?>assets/images/delete.png" title="Delete" alt="Delete" border="0" /></a>&nbsp;&nbsp;&nbsp;<a class="cboxElement" rel="preview_btn" href="http://demo.phptourscript.com/Articles/backend/preview/article_id/1"><img src="<?php echo base_url();?>assets/images/preview.gif" title="Preview" border="0" /></a></td>
				             </tr>
							 <?php
								 endforeach;
          					  ?>
				           </tbody>
				         </table>
				       </div>
					 </div>
					 
					 </div>  
            
      	
    </div>
</div>

<div style="height: 0px;" id="floatingbar">
	<h1>User</h1>
	<div class="button-container">
    	        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" rel="publish" class="publish_all"><span class="icon publish">Approve</span></a></span>
                        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" rel="unpublish" class="publish_all"><span class="icon unpublish">Disapprove</span></a></span>
                        <span class="button ui-widget-content-1"><a href="javascript:%20void(0);" class="delete_all"><span class="icon delete">Delete</span></a></span>
            </div>
</div>

</div>
</div>
  	</section>
	
