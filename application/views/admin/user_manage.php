
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>..:: Welcome to admin Panel ::..</title>
<script type="text/javascript">
function form_submit(){
var saveid = document.getElementById("save").value;
//alert(saveid);
if(saveid){
//alert(saveid);
document.formSearch.submit();
}
}
</script>
<script type="text/javascript">
checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}

function approve(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>index.php/admin/approved?approve_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deapprove(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>index.php/admin/deapproved?deapprove_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deletedata(){
	var catId=document.getElementById("catId").value;
	//alert(catId);
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
		var b = window.confirm('Are you sure, you want to Delete This ?');
		if(b==true){
			var hrefdata ="<?php echo base_url();?>index.php/admin/delete?cid="+data+"&&catId="+catId;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}
</script>
<script type="text/JavaScript">
function openPage1(pid)
{
	var catId=document.getElementById("catId").value;
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true)
		location.href= "<?php echo base_url();?>index.php/admin/delete?cid="+pid+"&&catId="+catId;
	else
	 return;
}
</script>
<style type="text/css">
.style1 {font-weight: bold}
</style>
</head>
<body>
<div id="main-container"> 
        	<div id="container">

<div class="title-container">
	<div class="user-all">
	  <h1>User Management</h1>
	</div>
    
    <div class="button-container">
    	        <span class="button ui-widget-content-1">
                
<input type="button" class="publish_all"  onclick="approve();" value="Approve"/></span>
                        <span class="button ui-widget-content-1">
<input type="button" class="unpublish"  onclick="deapprove();" value="Disapprove" /></span>
                        <span class="button ui-widget-content-1">
        <input type="button" class="unpublish"  onclick="deletedata();" value="Delete" />
        <?php
		if(isset($_REQUEST['cid'])){
			$catId= $_REQUEST['cid'];
		?>
        <input type="hidden" name="catId" id="catId" value="<?php echo $catId; ?>" />
        <?php
        }
		else{
		?>
        <input type="hidden" name="catId" id="catId" value="" />
        <?php
		}
		?>
        </span>
                    <!--<span class="button ui-widget-content-1"><a href="javascript:%20void(0);" class="delete_all"><span class="icon delete">Delete</span></a></span>-->
            </div>
</div>
<div id="button_top_bar"></div>
<div class="content-container">
	<div id="sidebar-inner">
	  <?php include("left_menu.php");?>
      <br />
	  <?php //include("category_list.php");?>
	</div>    
    <div id="content-inner">
    	        	<div class="toggle-link"><a href="#" id="slick-slidetoggle" class="user-icon">Search User</a></div>
                    
            <div style="display: none;" id="slickbox" class="toggle-container">
                <form id="formSearch" name="formSearch" method="post" action="<?php echo base_url();?>index.php/news/index">
                	<div class="toggle-search">
                    	<div class="toggle-row">
                        	<div class="toggle-label">
                            	<span class="label">Search By Name</span>
                            </div>
                            <div class="toggle-field">
                            	<input type="text" name="field_name" />
                            </div>
                            
                           <!-- <div class="toggle-label">
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
                           	</div>-->
                      </div>
                    </div>
                    <hr>
                    <div class="clr form-button-container">
                    <span class="button ui-widget-content-1">
                    <input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
                    </div>
				</form>
        	</div>					
                
                     <div class="k-grid k-widget">
                       <div style="height: 500px;">
					   <div style="" class="k-grid k-widget k-reorderable" data-role="grid" id="grid">
					     <div style="border-width: 0px 0px 1px;" data-role="pager" class="k-pager-wrap k-grid-pager pagerTop k-widget"></div>
                       <form id="form_check" name="formUserSearch" method="post">
					     <table style="height: auto;" role="grid" width="100%" cellspacing="0">
					       
					       <thead class="k-grid-header">
					         <tr>
					           <th width="26" height="22" class="k-header style1" data-role="droptarget" role="columnheader" data-field="checkAll">
			                   <input name="checkbox" onclick='checkedAll();' type="checkbox" /></th>
					           <th width="27" class="k-header" data-role="sortable" role="columnheader" data-field="article_id" data-title="ID"><strong><a class="k-link" href="#">ID</a></strong></th>
					           <th width="259" class="k-header" data-role="sortable" role="columnheader" data-field="article_name" data-title="Title"><strong><a class="k-link" href="#">User Name</a></strong></th>
					           <th width="140" class="k-header" data-role="sortable" role="columnheader" data-field="article_date" data-title="Date"><strong><a class="k-link" href="#">Email</a></strong></th>
					           <th width="91" class="k-header" data-role="sortable" role="columnheader" data-field="article_date" data-title="Date"><strong><a class="k-link" href="#">Category</a></strong></th>
					           <th width="156" class="k-header" data-role="sortable" role="columnheader" data-field="article_status" data-title="Publish"><strong><a class="k-link" href="#">Publish</a></strong></th>
					           <th width="243" class="k-header" data-role="droptarget" role="columnheader" data-field="common_action" data-title="Action"><strong>Action</strong></th>
				             </tr>
				           </thead>
					       <tbody>
						    <?php
							
							$i=0;
							foreach ($users_view as $user):
							$news_id=$user->id ;
							$first_name=$user->first_name;
							$last_name=$user->last_name;
							$role=$user->role;
							$email=$user->email;
							$status=$user->active;
							$i++;
							
                          	$cat_query=mysql_query("select * from category where cid='$role'");
							$row=mysql_fetch_array($cat_query);
							$cat_name=$row['cat_name'];
							?>
					         <tr role="row" style="border-bottom:1px solid #CCCCCC">
					           <td class="" role="gridcell">
                               
                               <input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>" value="<?php echo $news_id;?>" /></td>
					           <td class="" role="gridcell"><?php echo $i;?></td>
					           <td class="" role="gridcell"><a href="#"><?php echo $user->first_name.$user->last_name; ?></a> </td>
					           <td class="" role="gridcell"><a href="#"><?php echo $user->email; ?></a></td>
					           <td class="" role="gridcell"><a href="#"><?php echo $cat_name; ?></a></td>
					           <td class="" role="gridcell" align="center">
                               
                               
                               <?php if($status==1){  ?>
                               <img src="<?php echo base_url();?>assets/images/published.gif" border="0" />
                               <?php
							   }
							   else{ ?>
                               <img src="<?php echo base_url();?>assets/images/cancel.png" border="0" />
                               <?php
							   }
							   ?>                               </td>
					           <td class="" role="gridcell" align="center">
                               <a href="<?php echo base_url();?>admin/edit_user/<?php echo $user->id; ?>" title="Edit">
						<img src="<?php echo base_url();?>assets/images/user-edit.gif" alt="Edit" border="0"></a>
                  &nbsp;&nbsp;
                  <a href="javascript:void(0)"  onClick="openPage1('<?php echo $news_id;?>');">
                  <img src="<?php echo base_url();?>assets/images/user-delete.gif" title="Delete" alt="Delete" border="0" />                  </a>&nbsp;&nbsp;</td>
				             </tr>
							 <?php
								 endforeach;
          					  ?>
				           </tbody>
				         </table>
                         </form>
                       </div>
                       </div>
					 
					 </div>  
            
      	
    </div>
</div>
            </div>
</div> 
	
</body>
</html>