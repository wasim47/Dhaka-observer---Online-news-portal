<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<!--<link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
--><link href="<?php echo base_url();?>assets/css/jquery.ptTimeSelect.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/jquery.ptTimeSelect.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
--><script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">

function timecalender(id){
	$('#timecal'+id).ptTimeSelect({
		});
		
	//$(function(){
	 var pickerOpts = {
     dateFormat:"d M yy"
   }; 
$("#datepicker"+id).datepicker(pickerOpts);
//});
}


</script>
<!--<script type="text/javascript">
        $(document).ready(function(){
            $('#sample2 input').ptTimeSelect({
               
            }); 
        });
    </script>
-->    
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
	  <h1>Add cultural</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
  <div id="content-inner" style="float:left; width:100%">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>cultural/form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>    
                                  
						<div  class="form" style="width:97%; padding:30px 10px; " align="center">
                         <table width="90%" border="1" bordercolor="#AEAEAE" align="left" cellspacing="2" cellpadding="2" style="border-collapse:collapse; padding:10px; margin:0 5%">
                          <tr>
                            
                            <td width="38%" align="center"><strong style="">PROGRAMMER NAME</strong></td>
                            <td width="30%" align="center"><strong style="">PROGRAMMER NAME</strong></td>
                            <td width="17%" align="center" style="padding:10px;"><strong>DATE</strong></td>
                            <td width="15%" align="center"><strong>TIME</strong></td>
                          </tr>
                           <?php
							$i=1;
							foreach($culturallist as $cultural):
							$cultural_id=$cultural->cultural_id;
							$cultural_date=$cultural->cultural_date;
							$programmer_type=$cultural->programmer_type;
							$programmer_name=$cultural->programmer_name;
							$culturaltime=$cultural->culturaltime;
							$seo_title=$cultural->seo_title;
							$key_word=$cultural->key_word;
							$seo_details=$cultural->seo_details;
							$i++;
							?>
                            <tr>
                            
                            <td style="padding:10px; text-align:center"><input name="programmer_name<?php echo $i;?>" id="image_title2" size="40" type="text"  value="<?php echo $programmer_name; ?>"/></td>
                            <td style="padding:10px; text-align:center">
                       <input name="programmer_type<?php echo $i;?>" id="image_title2" size="25" type="text"  value="<?php echo $programmer_type; ?>"/>
                            <input type="hidden" name="culturalId<?php echo $i;?>" value="<?php echo $cultural_id; ?>" />
                            </td>
                            
                            
                            <td style="padding:10px;"><input name="cultural_date<?php echo $i;?>" id="datepicker<?php echo $i;?>" size="20" type="text"  value="<?php echo $cultural_date; ?>" onclick="timecalender(<?php echo $i;?>);"/>
                            </td>
                            <td style="padding:10px; text-align:center">
                           
                        
<input name="culturaltime<?php echo $i;?>" id="timecal<?php echo $i;?>" size="10" type="text" value="<?php echo $culturaltime; ?>" onclick="timecalender(<?php echo $i;?>);" />
                            
                            <input type="hidden" name="culturalId<?php echo $i;?>" value="<?php echo $cultural_id; ?>" />
                            </td>
                          </tr>
                           <?php
								 endforeach;
          					  ?>
                       
                        </table>
                </div>
                </fieldset>
                
                
                <fieldset class="fieldset">
                	<legend class="legend">SEO Information</legend>                    
						<div class="form" style="width:97%">
						
						<div class="form-row">
						<div class="label label_class" style="">SEO Title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="seo_title" id="seo_title" size="80" type="text" value="<?php echo $seodetails['seo_title']; ?>" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="key_word" id="key_word" size="80" type="text" value="<?php echo $seodetails['key_word']; ?>" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $seodetails['seo_details']; ?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
                
                
                
      </form>
    </div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
    
</div>

</div>
</section>
