<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

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


$(function(){
	 var pickerOpts = {
     dateFormat:"d M yy"
   }; 
$("#start_date").datepicker(pickerOpts);
$("#end_date").datepicker(pickerOpts);

});
</script>

<section id="main-container">
<div id="container">
<div class="title-container">
	<div class="add-user">
	  <h1>Add voting</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_voting.php");?>
</div>
    
    <div id="content-inner">
	<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>voting/link_form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div class="form" style="width:97%;">
                          <div class="form-row">
						<div class="label label_class" style="">Voting Title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="title" id="title" size="100" type="text"  value="<?php echo $votingdata['title'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						<div class="form-row">
						<div class="label label_class" style="">Voting Subject : </div>
						
						<div class="field"><span class="field article-field">
					
                    <textarea name="headline" rows="5" cols="40" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $votingdata['voting_sub'];?></textarea>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                          
                        <div class="form-row">
						<div class="label label_class">Start Time:</div>
						
						<div class="field">
                        <span class="field article-field">
		<input name="start_date" id="start_date" size="20" type="text"  value="<?php echo $votingdata['start_date'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						<div class="form-row">
						<div class="label label_class">End Time: </div>
						
						<div class="field">
                        <span class="field article-field">
						<input name="end_date" id="end_date" size="20" type="text"  value="<?php echo $votingdata['end_date'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div> 
                          
                          <div class="form-row">
						<div class="label label_class">Status: </div>
						
						<div class="field">
                        <span class="field article-field">
						  <select name="status" class="ui-widget-content ui-corner-all" style="width:100px;">
                          	<option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div> 
						
						</div>
                </fieldset>
                
                
                <fieldset class="fieldset">
                	<legend class="legend">SEO Information</legend>                    
						<div class="form" style="width:97%">
						
						
						
						<div class="form-row">
						<div class="label label_class" style="">SEO Title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="seo_title" id="seo_title" size="80" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="key_word" id="key_word" size="80" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
                
                
                <input name="votingId" id="votingId" size="20" type="text"  value="<?php echo $votingdata['voting_id'];?>"/>
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
