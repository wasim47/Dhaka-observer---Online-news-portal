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
    	
<div id="nav">
    <div class="nav-header"><div class="nav-title">User</div></div>
    <div class="nav-body">
    	<ul>
        	        	<li class="profile">
            	<a href="http://demo.phptourscript.com/Members/Index/profile">User Profile</a>
            </li>
                       	
			            <li class="user selected">
            	<a href="http://demo.phptourscript.com/Members/index/list">Users</a>
            </li>
                        
                        <!--<li  class="user-search selected"class="user-search">
            	<a href=""></a>           
            </li>-->
                        
                        <li class="user-add">
            	<a href="http://demo.phptourscript.com/Members/index/group">Add Users</a>
            </li>
                       	
                        <li class="user-role">
            	<a href="http://demo.phptourscript.com/Administrator/Role/list">User Roles</a>
            </li>
                        
                        <li class="form-list">
				<a href="http://demo.phptourscript.com/Members/form/list">Custom Form List</a>
            </li>
                        
                        <li class="password-change last">
				<a href="http://demo.phptourscript.com/Members/password/change">Change Password</a>
            </li>
                    </ul>
    </div>
</div>    </div>    
    <div id="content-inner">
    	        	<div class="toggle-link"><a href="#" id="slick-slidetoggle" class="user-icon">Search User</a></div>
            <div style="display: none;" id="slickbox" class="toggle-container">
                <form id="formUserSearch" name="formUserSearch" method="post" action="">
                	<div class="toggle-search">
                    	<div class="toggle-row">
                        	<div class="toggle-label">
                            	<span class="label">Search in</span>
                            </div>
                            
                            <div class="toggle-field">
                            	<select name="search_by" id="search_by">
                                    <option selected="selected" value="">Any</option>
                                    <option value="user_id">Search By User Id</option>
                                    <option value="full_name">Search By User Name</option>
                                    <option value="username">Search By Email Address</option>
						  		</select>
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">for</span>
                            </div>
                            
                            <div class="toggle-field">
                            	<input name="SearchKey" id="SearchKey" type="text">
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">in Role</span>
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
                        	<div class="toggle-label">
                            	<span class="label">Search By 
                                &nbsp; Year :</span>
                          	</div>
                            
                            <div class="toggle-field">
                            	<select name="search_year" id="search_year">
                                  	<option selected="selected" value="">Any</option>
                                                                        <option value="2013">2013</option>
                                                                        <option value="2012">2012</option>
                                                                        <option value="2011">2011</option>
                                                                        <option value="2010">2010</option>
                                                                        <option value="2009">2009</option>
                                                                        <option value="2008">2008</option>
                                                                        <option value="2007">2007</option>
                                                                        <option value="2006">2006</option>
                                                                        <option value="2005">2005</option>
                                                                        <option value="2004">2004</option>
                                                                        <option value="2003">2003</option>
                                                                        <option value="2002">2002</option>
                                                                        <option value="2001">2001</option>
                                                                        <option value="2000">2000</option>
                                                                        <option value="1999">1999</option>
                                                                        <option value="1998">1998</option>
                                                                        <option value="1997">1997</option>
                                                                        <option value="1996">1996</option>
                                                                        <option value="1995">1995</option>
                                                                        <option value="1994">1994</option>
                                                                        <option value="1993">1993</option>
                                                                        <option value="1992">1992</option>
                                                                        <option value="1991">1991</option>
                                                                        <option value="1990">1990</option>
                                                                        <option value="1989">1989</option>
                                                                        <option value="1988">1988</option>
                                                                        <option value="1987">1987</option>
                                                                        <option value="1986">1986</option>
                                                                        <option value="1985">1985</option>
                                                                        <option value="1984">1984</option>
                                                                        <option value="1983">1983</option>
                                                                        <option value="1982">1982</option>
                                                                        <option value="1981">1981</option>
                                                                        <option value="1980">1980</option>
                                                                        <option value="1979">1979</option>
                                                                        <option value="1978">1978</option>
                                                                        <option value="1977">1977</option>
                                                                        <option value="1976">1976</option>
                                                                        <option value="1975">1975</option>
                                                                        <option value="1974">1974</option>
                                                                        <option value="1973">1973</option>
                                                                        <option value="1972">1972</option>
                                                                        <option value="1971">1971</option>
                                                                        <option value="1970">1970</option>
                                                                        <option value="1969">1969</option>
                                                                        <option value="1968">1968</option>
                                                                        <option value="1967">1967</option>
                                                                        <option value="1966">1966</option>
                                                                        <option value="1965">1965</option>
                                                                        <option value="1964">1964</option>
                                                                        <option value="1963">1963</option>
                                                                        <option value="1962">1962</option>
                                                                        <option value="1961">1961</option>
                                                                        <option value="1960">1960</option>
                                                                        <option value="1959">1959</option>
                                                                        <option value="1958">1958</option>
                                                                        <option value="1957">1957</option>
                                                                        <option value="1956">1956</option>
                                                                        <option value="1955">1955</option>
                                                                        <option value="1954">1954</option>
                                                                        <option value="1953">1953</option>
                                                                        <option value="1952">1952</option>
                                                                        <option value="1951">1951</option>
                                                                        <option value="1950">1950</option>
                                                                        <option value="1949">1949</option>
                                                                        <option value="1948">1948</option>
                                                                        <option value="1947">1947</option>
                                                                        <option value="1946">1946</option>
                                                                        <option value="1945">1945</option>
                                                                        <option value="1944">1944</option>
                                                                        <option value="1943">1943</option>
                                                                  	</select>
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">Month :</span>
                          	</div>
                            
                            <div class="toggle-field">
                            	<select name="search_month" id="search_month">
                                <option selected="selected" value="">Any</option>						  	
                                					  	
                                <option value="January">January</option>
                                					  	
                                <option value="February">February</option>
                                					  	
                                <option value="March">March</option>
                                					  	
                                <option value="April">April</option>
                                					  	
                                <option value="May">May</option>
                                					  	
                                <option value="June">June</option>
                                					  	
                                <option value="July">July</option>
                                					  	
                                <option value="August">August</option>
                                					  	
                                <option value="September">September</option>
                                					  	
                                <option value="October">October</option>
                                					  	
                                <option value="November">November</option>
                                					  	
                                <option value="December">December</option>
                                													
                              	</select>
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">Day :</span>
                          	</div>
                            
                            <div class="toggle-field">
                            <select name="search_day" id="search_day">
							  	<option selected="selected" value="">Any</option>
							    								<option value="01">01</option>
																<option value="02">02</option>
																<option value="03">03</option>
																<option value="04">04</option>
																<option value="05">05</option>
																<option value="06">06</option>
																<option value="07">07</option>
																<option value="08">08</option>
																<option value="09">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
															  
							</select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="clr form-button-container">
                    	<span class="button  ui-widget-content-1"><a href="javascript:%20void(0);" class="user_search_btn"><span class="icon search">Submit</span></a></span>
                    </div>
				</form>
        	</div>					
                
                     <div class="k-grid k-widget">
					 <div style="border-width: 0px 0px 1px;" data-role="pager" class="k-pager-wrap k-grid-pager pagerTop k-widget"><a tabindex="-1" data-page="1" href="#" title="Go to the first page" class="k-link k-state-disabled">
					 <span class="k-icon k-i-seek-w">Go to the first page</span></a><a tabindex="-1" data-page="1" href="#" title="Go to the previous page" class="k-link k-state-disabled"><span class="k-icon k-i-arrow-w">Go to the previous page</span></a><ul class="k-pager-numbers k-reset"><li><span class="k-state-selected">1</span></li></ul><a tabindex="-1" data-page="1" href="#" title="Go to the next page" class="k-link k-state-disabled"><span class="k-icon k-i-arrow-e">Go to the next page</span></a><a tabindex="-1" data-page="1" href="#" title="Go to the last page" class="k-link k-state-disabled"><span class="k-icon k-i-seek-e">Go to the last page</span></a><span class="k-pager-sizes k-label"><span aria-busy="false" aria-readonly="false" aria-disabled="false" aria-owns="" tabindex="0" aria-expanded="false" aria-haspopup="true" role="listbox" unselectable="on" class="k-widget k-dropdown k-header" style=""><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">30</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select style="display: none;" data-role="dropdownlist"><option value="1">1</option><option value="5">5</option><option value="10">10</option><option selected="selected" value="30">30</option><option value="100">100</option><option value="500">500</option><option value="1000">1000</option></select></span>items per page</span><a href="#" class="k-pager-refresh k-link" title="Refresh"><span class="k-icon k-i-refresh">Refresh</span></a><span class="k-pager-info k-label">1 - 6 of 6 items</span></div>
					 <div style="height: 500px;">
					 
					 
					 <table style="height: auto; border-collapse:collapse;" border="1"cellspacing="0">
					 <tr>
					 	<td class="" role="gridcell"><input value="2" class="check_btn" type="checkbox"></td>
						<td class="" role="gridcell">2</td>
						<td class="" role="gridcell">User Email </td>
						<td class="" role="gridcell">User Name </td>
						<td class="" role="gridcell">Role</td>
						<td class="" role="gridcell" align="center">Last Login </td>
						<td class="" role="gridcell" align="center">Registered Date </td>
						<td class="" role="gridcell" align="center">Manage</td>
					</tr>
					<?php $i=1; foreach ($users as $user):?>
					<tr>
					 	<td class="" role="gridcell"><input value="2" class="check_btn" type="checkbox"></td>
						<td class="" role="gridcell">2</td>
						<td class="" role="gridcell">demo@phptourscript.com</td>
						<td class="" role="gridcell">Mr Demo Administrator</td>
						<td class="" role="gridcell">Administrator</td>
						<td class="" role="gridcell" align="center">19/06/2013</td>
						<td class="" role="gridcell" align="center">19/08/2013</td>
						<td class="" role="gridcell" align="center">
						<a href="#" title="Edit">
						<img src="<?php echo base_url();?>assets/images/user-edit.gif" alt="Edit" border="0"></a>
						<a href="javascript:void(0);" class="publish_btn">
						<img src="<?php echo base_url();?>assets/images/user-active.gif" border="0"></a> <a href="javascript:void(0);" class="delete_btn" ><img src="<?php echo base_url();?>assets/images/user-delete.gif" title="Delete" alt="Delete" border="0"></a></td></tr>
						
						<?php $i++; endforeach;?>   
					 </table>
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
	
