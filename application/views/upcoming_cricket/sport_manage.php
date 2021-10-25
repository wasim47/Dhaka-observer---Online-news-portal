<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/jquery.ptTimeSelect.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/jquery.ptTimeSelect.js"></script>
<script type="text/javascript">

function timecalender(id){
	$('#timecal'+id).ptTimeSelect({
		});
}

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
	  <h1>Upcoming Sports</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
    
    <div id="content-inner"  style="float:left; width:100%">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>upcoming_cricket/form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div  class="form" style="width:97%; padding:30px 10px; " align="center">
                         <table width="80%" border="1" bordercolor="#AEAEAE" align="left" cellspacing="2" cellpadding="2" style="border-collapse:collapse; padding:10px; margin:0 10%">
                          <tr>
                            
                            <td width="27%" align="center"><strong>TEAM 1</strong></td>
                            <td width="33%" align="center"><strong>TEAM 2</strong></td>
                            <td width="40%" align="center" style="padding:10px;"><strong>SPOETS VENUE</strong></td>
                             <td width="33%" align="center"><strong>TIME</strong></td>
                          </tr>
                           <?php
							$i=1;
							foreach($sportlist as $sport):
							$sport_id=$sport->sport_id;
							$sport_name=$sport->sport_venue;
							$team2=$sport->team2;
							$team1=$sport->team1;
							$time=$sport->time;
							$seo_title=$sport->seo_title;
							$key_word=$sport->key_word;
							$seo_details=$sport->seo_details;
							$i++;
							?>
                            <tr>
                            
                            <td style="padding:10px;"><input name="team1<?php echo $i;?>" id="image_title2" size="25" type="text"  placeholder="team1" onfocus="this.placeholder=''" onblur="this.placeholder='team1'" value="<?php echo $team1; ?>"/></td>
                            <td style="padding:10px;"><input name="team2<?php echo $i;?>" id="image_title2" size="25" type="text"  placeholder="team2" onfocus="this.placeholder=''" onblur="this.placeholder='team2'" value="<?php echo $team2; ?>"/>
                            <input type="hidden" name="sportId<?php echo $i;?>" value="<?php echo $sport_id; ?>" />
                            </td>
                            
                            
                            <td style="padding:10px;"><input name="sport_venue<?php echo $i;?>" id="image_title" size="25" type="text"  placeholder="sport name" onfocus="this.placeholder=''" onblur="this.placeholder='sport name'" value="<?php echo $sport_name; ?>"/>
                            </td>
                            <td style="padding:10px;">
<input name="sporttime<?php echo $i;?>" size="10" type="text"  id="timecal<?php echo $i;?>" value="<?php echo $time; ?>"  onclick="timecalender(<?php echo $i;?>);"/>
                            <input type="hidden" name="sportId<?php echo $i;?>" value="<?php echo $sport_id; ?>" />
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
						  <input name="seo_title" id="seo_title" size="80" type="text" 
                          value="
						  <?php 
						  if(isset($seodetails['seo_title'])){
						  echo $seodetails['seo_title']; 
						  }
						  ?>" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="key_word" id="key_word" size="80" type="text" value="
						  <?php 
						  if(isset($seodetails['key_word'])){
						  echo $seodetails['key_word']; 
						  }
						  ?>
						  " />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666">
						<?php 
						  if(isset($seodetails['seo_details'])){
						  echo $seodetails['seo_details']; 
						  }
						  ?>
						  </textarea>											
							
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
