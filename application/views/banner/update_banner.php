<script>
function form_submit(){
var backid = document.getElementById("back").value;
var resetid = document.getElementById("reset").value;
var saveid = document.getElementById("save").value;
//alert(saveid);
if(saveid){
//alert(saveid);
document.MemberForm.submit();
}
else if(resetid){
//alert(saveid);
document.MemberForm.reset();
}
else if(backid){
//alert(saveid);
document.MemberForm.back();
}
}
</script>

<section id="main-container">
<div id="container">
<div class="title-container">
	<div class="add-user">
	  <h1>Add banner</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_banner.php");?>
</div>
    
    <div id="content-inner">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>banner/link_form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div class="form">
						  
                        
						<div class="form-row">
						<div class="label label_class" style="">Banner title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="image_title" id="image_title" size="70" type="text"  value="<?php echo $bannerdata['image_title'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                         <div class="form-row">
                        <div class="label">
                            Banner Image:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
        <input type="file" name="userfile" id="file"/>
        <img src="<?php echo base_url();?>uploads/images/banner/<?php echo $bannerdata['image'];?>" width="30%" height="30%" />
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div> 
                          <div class="form-row">
						<div class="label label_class" style="vertical-align:top; width:120px;">
                        Description:                        </div>
						
						<div class="field">
                        <textarea name="short_description" rows="5" cols="40" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $bannerdata['short_description'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						</div>
                        
                        
                        <div class="form_right">
                        	<div class="form-row">
                                <table width="100%">
                                  <tr>
                                   	 <td width="565" class="label label_class">Status</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="status"  value="1" /></td>
                                  </tr>
                                </table>
                            	
                          </div>
                        </div>
                        
                </fieldset>
                
                
                <fieldset class="fieldset">
                	<legend class="legend">SEO Information</legend>                    
						<div class="form" style="width:97%">
						
						
						
						<div class="form-row">
						<div class="label label_class" style="">SEO Title : </div>
						
						<div class="field"><span class="field article-field">
				<input name="seo_title" id="seo_title" size="80" type="text" value="<?php echo $bannerdata['seo_title'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						<input name="key_word" id="key_word" size="80" type="text" value="<?php echo $bannerdata['key_word'];?>" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $bannerdata['seo_details'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
                <input type="hidden" name="bannerId" value="<?php echo $bannerdata['banner_id'];?>" />
                  <input type="hidden" name="still_images" value="<?php echo $bannerdata['image'];?>" /> 
                
      </form>
    </div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" />
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/>
    </div>
    
</div>

</div>
</section>
