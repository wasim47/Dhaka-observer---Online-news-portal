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
			var hrefdata ="<?php echo base_url();?>index.php/news/approved?approve_val="+data;
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
			var hrefdata ="<?php echo base_url();?>index.php/news/deapproved?deapprove_val="+data;
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
			var hrefdata ="<?php echo base_url();?>index.php/news/delete?cid="+data+"&&catId="+catId;
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
		location.href= "<?php echo base_url();?>index.php/news/delete?cid="+pid+"&&catId="+catId;
	else
	 return;
}
function update_sequence(id){
var updateid = document.getElementById("sequence"+id).value;
window.location.href='<?php echo base_url();?>news/update_sequence?sequence='+updateid+"&&id="+id;
//alert(updateid);
/*if(updateid){
document.MemberForm.submit();
}
else{
alert("Auther Name Must be Required");
}*/
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
	  <h1>News Management</h1>
	</div>
    
    <div class="button-container">
    	        <span class="button ui-widget-content-1">
                
<input type="button" class="publish_all"  onclick="approve();" value="Approve"/></span>
                        <span class="button ui-widget-content-1">
<input type="button" class="unpublish"  onclick="deapprove();" value="Disapprove" /></span>
                        <span class="button ui-widget-content-1">
        <input type="button" class="unpublish"  onclick="deletedata();" value="Delete" />
        
        </span>
                    <!--<span class="button ui-widget-content-1"><a href="javascript:%20void(0);" class="delete_all"><span class="icon delete">Delete</span></a></span>-->
            </div>
</div>
<div id="button_top_bar"></div>
<div class="content-container">
	    
    <div id="content-inner" style="width:100%">
                     <div class="k-grid k-widget">
                       <div style="height: 500px;">
					   <div style="" class="k-grid k-widget k-reorderable" data-role="grid" id="grid">
					     <div style="border-width: 0px 0px 1px;" data-role="pager" class="k-pager-wrap k-grid-pager pagerTop k-widget"></div>
                       <form id="form_check" name="formUserSearch" method="post">
					     <table style="height: auto;" role="grid" width="66%" cellspacing="0">
					       
					       <thead class="k-grid-header">
					         <tr>
					           
					           <th width="42" class="k-header" data-role="sortable" role="columnheader" data-field="article_id" data-title="ID"><strong><a class="k-link" href="#">ID</a></strong></th>
					           <th width="264" class="k-header" data-role="sortable" role="columnheader" data-field="article_name" data-title="Title"><strong><a class="k-link" href="#">News Headline</a></strong></th>
					           <!--<th width="126" class="k-header" data-role="sortable" role="columnheader" data-field="article_date" data-title="Date"><strong><a class="k-link" href="#">Auther Name</a></strong></th>-->
					           
					           <th width="318" align="center" class="k-header" data-role="sortable" role="columnheader" data-field="article_date" data-title="Date"><strong><a class="k-link" href="#">Squence</a></strong></th>
				             </tr>
				           </thead>
					       <tbody>
                           <tr role="row">
                           	<td colspan="9" style="padding:0; margin:0">
                            	<table style="height: auto;border-collapse:collapse" role="grid" width="100%" cellspacing="0" cellpadding="0" border="0">
						    <?php
							
							$i=0;
							
							
                          	$cat_query=mysql_query("select * from news_manage where top_desk_news=1 order by n_id desc limit 25");
							while($row=mysql_fetch_array($cat_query)){
							$headline=$row['headline'];
							$n_id=$row['n_id'];
							$squence=$row['squence'];
							
							$i++;
							?>
					         <tr role="row" style="border-bottom:1px solid #CCCCCC">
					           <td width="43" class="" role="gridcell"><?php echo $i;?></td>
					           <td width="266" class="" role="gridcell"><a href="#"><?php echo $headline; ?></a> </td>
					           
					           
					           <td width="321" class="" align="left" role="gridcell">
                               <input type="text" name="sequence" id="sequence<?php echo $n_id;?>" value="<?php echo $squence;?>" style="width:30px" />
             
                               <input type="button" name="update" id="update" value="Save" style="background:none; font-size:11px; width:35px; padding:0px; color:#666; border:1px solid #999999; padding:2px 3px;" onclick="update_sequence(<?php echo $n_id;?>);" />                               </td>
					           </tr>
							 <?php
								 }
          					  ?>
                              </table>                            </td>
                           </tr>
                           <tr role="row">
                             <td colspan="9" style="padding:0; margin:0">&nbsp;</td>
                           </tr>
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