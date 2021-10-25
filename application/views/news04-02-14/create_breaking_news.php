<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>..:: Welcome to admin Panel ::..</title>
    <link href="<?php echo base_url();?>assets/css/jquery.ptTimeSelect.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/jquery.ptTimeSelect.js"></script>
<script type="text/javascript">

function timecalender(){
	$('#timecal').ptTimeSelect({
		});
}
</script>

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
	  <h1>Add News</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_news.php");?>
</div>
    
    <div id="content-inner">
	<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>index.php/news/breaking_news_form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div class="form" style="width:96%">
						  <div class="form-row">
						<div class="label label_class" style="">Headline : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="headline" id="headline" size="70" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                          
                          <div class="form-row">
						<div class="label label_class" style="">News Time : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="time_line" id="timecal" size="10" type="text" onclick="timecalender();" />

						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                          <div class="form-row">
                        <div class="label">
                            Status:                        </div>
                        
                        <div class="field">
                            
                    <label><input name="status" id="show_after_login-1" value="1" title="Show after Login" type="radio">Yes</label>
                    <label><input name="status" id="show_after_login-0" value="0" title="Show after Login" type="radio">No</label>
                        </div>
                    </div>
						  
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