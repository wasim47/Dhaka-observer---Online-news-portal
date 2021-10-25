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
document.formUserSearch.submit();
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
			var hrefdata ="<?php echo base_url();?>category/subapproved?approve_val="+data;
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
			var hrefdata ="<?php echo base_url();?>category/subdeapproved?deapprove_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deletedata(){
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
			var hrefdata ="<?php echo base_url();?>category/subcategory_delete?cid="+data;
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
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true)
		location.href= "<?php echo base_url();?>category/subcategory_delete?scid="+pid;
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
	  <h1>?????????</h1>
	</div>
    
    <div class="button-container"> <span class="button ui-widget-content-1">
      <input type="button" class="publish_all"  onclick="approve();" value="Approve"/>
      </span> <span class="button ui-widget-content-1">
      <input type="button" class="unpublish"  onclick="deapprove();" value="Disapprove" />
        </span> <span class="button ui-widget-content-1">
      <input type="button" class="unpublish"  onclick="deletedata();" value="Delete" />
          </span>
      <!--<span class="button ui-widget-content-1"><a href="javascript:%20void(0);" class="delete_all"><span class="icon delete">Delete</span></a></span>-->
    </div>
</div>
<div id="button_top_bar"></div>
<div class="content-container">
	<div id="sidebar-inner">
    	
<?php include("left_sub_category.php");?>
    </div>    
    <div id="content-inner">
    	        	<div class="toggle-link"><a href="#" id="slick-slidetoggle" class="user-icon">Search User</a></div>
                    
            <div style="display: none;" id="slickbox" class="toggle-container">
                <form id="formUserSearch" name="formUserSearch" method="post" action="<?php echo base_url();?>category/category_list">
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
					     <table style="height: auto;" role="grid" width="100%" cellspacing="0">
					       
					       <thead class="k-grid-header">
					         <tr>
					           <th width="20" class="k-header style1" data-role="droptarget" role="columnheader" data-field="checkAll"> <!--<input name="checkbox" onclick='checkedAll();' type="checkbox" />--></th>
					           <th width="25" class="k-header" data-role="sortable" role="columnheader" data-field="article_id" data-title="ID"><strong><a class="k-link" href="#">ID</a></strong></th>
					           <th width="216" class="k-header" data-role="sortable" role="columnheader" data-field="article_name" data-title="Title"><strong><a class="k-link" href="#">Category Name</a></strong></th>
					           <th width="118" class="k-header" data-role="sortable" role="columnheader" data-field="article_date" data-title="Date"><strong><a class="k-link" href="#">Date</a></strong></th>
					           <th width="96" class="k-header" data-role="sortable" role="columnheader" data-field="article_status" data-title="Publish"><strong><a class="k-link" href="#">Publish</a></strong></th>
					           <th width="162" class="k-header" data-role="droptarget" role="columnheader" data-field="common_action" data-title="Action"><strong>Action</strong></th>
					         </tr>
				           </thead>
					       <tbody>
						    <?php
							$i=0;
							foreach($categorys as $menu):
							$menu_id=$menu->scid;
							$menu_title=$menu->sub_cat_title;
							$name=$menu->sub_cat_name;
							$target=$menu->target;
							$create_date=$menu->create_date;
							$status=$menu->status;
							$i++;
							?>
					         <tr role="row" style="border-bottom:1px solid #CCCCCC">
					           <td class="" role="gridcell"><input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>" value="<?php echo $menu_id;?>" /></td>
					           <td class="" role="gridcell"><?php echo $i;?></td>
					           <td class="" role="gridcell"><a href="#"><?php echo $name; ?></a> </td>
					           <td class="" role="gridcell"><a href="#"><?php echo $create_date; ?></a></td>
					           <td class="" role="gridcell" align="center"><?php if($status==1){  ?>
                                   <img src="<?php echo base_url();?>assets/images/published.gif" border="0" />
                                   <?php
							   }
							   else{ ?>
                                   <img src="<?php echo base_url();?>assets/images/cancel.png" border="0" />
                                   <?php
							   }
							   ?>
                               </td>
					           <td class="" role="gridcell" align="center"><a href="<?php echo base_url();?>category/subcategory_updateData/<?php echo $menu_id; ?>"><img src="<?php echo base_url();?>assets/images/edit.png" title="Edit" alt="Edit" border="0" /></a> &nbsp;&nbsp; <a href="javascript:void(0)"  onclick="openPage1('<?php echo $menu_id;?>');"> <img src="<?php echo base_url();?>assets/images/delete.png" title="Delete" alt="Delete" border="0" /> </a>&nbsp;&nbsp;</td>
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

</div>
</div> 
</body>
</html>
	
