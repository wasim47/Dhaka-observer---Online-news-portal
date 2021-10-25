<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>..:: Welcome to admin Panel ::..</title>
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
</head>
<body>
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
<?php include("left_menu_album.php");?>
</div>
    
    <div id="content-inner">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>album_photo/link_form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div class="form">
						  
                        <div class="form-row">
						<div class="label label_class" style="">Select Album : </div>
						
						<div class="field"><span class="field article-field">
						  <select name="photo_album_id" id="photo_album_id" class="ui-widget-content ui-corner-all" style="width:150px;">
                          	<option><?php echo $album_photodata['photo_album_id'];?></option>
						<?php
							foreach($album_photolist as $album):
							$cat_id=$album->photo_album_id;
							$name=$album->photo_album_name;
							?>
						<option value="<?php echo $cat_id; ?>" label="_blank"><?php echo $name; ?></option>
						<?php
							endforeach;
          				?>
					</select>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                          
						<div class="form-row">
						<div class="label label_class" style="">Photo Name : </div>
						
					  <div class="field"><span class="field article-field">
						  <input name="ph_name" id="ph_name" size="70" type="text"  value="<?php echo $album_photodata['ph_name'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                         <div class="form-row">
                        <div class="label">
                            Banner Image:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
        <input type="file" name="userfile" id="file"/>
        <img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $album_photodata['ph_ima'];?>" width="30%" height="30%" />
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div> 
                          <div class="form-row"></div>
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
				<input name="seo_title" id="seo_title" size="80" type="text" value="<?php echo $album_photodata['seo_title'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						<input name="key_word" id="key_word" size="80" type="text" value="<?php echo $album_photodata['key_word'];?>" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $album_photodata['seo_details'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
                <input type="hidden" name="ph_id" value="<?php echo $album_photodata['ph_id'];?>" />
                  <input type="hidden" name="still_images" value="<?php echo $album_photodata['ph_ima'];?>" /> 
                
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
</body>
</html>