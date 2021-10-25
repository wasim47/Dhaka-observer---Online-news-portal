<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>..:: Welcome to admin Panel ::..</title>
    <script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		//alert(req);
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/jscripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/jscripts/general.js"></script>
	<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager",
			theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?php echo base_url();?>assets/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "<?php echo base_url();?>assets/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}
	</script>
    <script type="text/jscript">
$(document).ready(function(){
$("#auther_name").hide();
//$("#auther_name").attr("disabled", "disabled");
//$('#auther_name').attr('readonly', true);


$("#autherNameVal").change(function(){
var autherNameVal= $("#autherNameVal").val();
if(autherNameVal=='others'){
	//alert(autherNameVal);
	$("#auther_name").show('slow');
}
else{
$("#auther_name").hide('slow');
}


});

//alert(autherNameVal);
/*$("#auther_name").click(function(){
	alert('df');

});*/

});

</script>
<script>
function form_back(){
	window.history.back();
}

function form_reset(){
	document.MemberForm.reset();
}
function form_submit(){
var backid = document.getElementById("back").value;
var resetid = document.getElementById("reset").value;
var saveid = document.getElementById("save").value;
var auther_name= document.getElementById('auther_name').value;

//alert(saveid);
if(saveid){
//alert(saveid);
/*if(auther_name=='Auther name' || auther_name!=''){
document.MemberForm.submit();
}
else{
	alert("Auther Name Must be Required");
}*/

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
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/jscripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/jscripts/general.js"></script>
<script>
tinyMCE.init({

			mode : "exact",

			elements : "ajaxfilemanager",
			theme : "advanced",

		plugins : "dvimage,advlink,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras",

			theme_advanced_buttons1 : "bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfullz,fontselect,fontsizeselect",

			//theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			//theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			//theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});


//////////////////////////Textarea 1//////////////////////////////

tinyMCE.init({

			mode : "exact",

			elements : "ajaxfilemanager1",
			theme : "advanced",

		plugins : "safari,pagebreak,dvimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras",

			theme_advanced_buttons1 : "bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",

			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});		

		
				
function ajaxfilemanager(field_name, url, type, win) {

			var ajaxfilemanagerurl = "jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";

			switch (type) {

				case "image":

					break;

				case "media":

					break;

				case "flash": 

					break;

				case "file":

					break;

				default:

					return false;

			}

            tinyMCE.activeEditor.windowManager.open({

                url: "jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",

                width: 700,

                height: 440,

                inline : "yes",

                close_previous : "no"

            },{

                window : win,

                input : field_name

            });

		}
</script>	
</head>
<body>
<section id="main-container">
<div id="container">
<div class="title-container">
	<div class="add-user">
	  <h1>News Update</h1>
	</div>
    <div class="button-container">
         <span class="button ui-widget-content-1"><input type="button" value="Back" id="back"  onclick="form_back();"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset" onclick="form_reset();"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_news.php");?>
</div>
    
    <div id="content-inner">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>index.php/columist_article/link_form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">জেনারেল ইনফর্মেশন</legend>                        
						<div class="form">
						
						<div class="form-row">
						<div class="label label_class">ক্যাটাগরি:</div>
						
						<div class="field">
                        <span class="field article-field">
						  <select name="category" id="category" class="ui-widget-content ui-corner-all" style="width:150px;"  onChange="getCity('<?php echo base_url();?>news/ajax_category_view?category_id='+this.value)">
                          <?php
						  	$category_id=$newsdata['category'];
                          	$cat_query=mysql_query("select * from columist where banner_id='$category_id'");
							$row=mysql_fetch_array($cat_query);
							$cat_name=$row['image_title'];
							$cat_id=$row['banner_id'];
							
						  ?>
                          <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
						<?php
							foreach($categorys as $cat):
							$cat_id=$cat->banner_id;
							$catname=$cat->image_title;
							?>
						<option value="<?php echo $cat_id; ?>" label="_blank"><?php echo $catname; ?></option>
						<?php
							endforeach;
          				?>
					</select>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						<!--<div class="form-row">
						<div class="label label_class">সাব ক্যাটাগরি: </div>
						
						<div class="field">
                        <span class="field article-field">
						<div id="citydiv">
                    <select name="sub_category" id="sub_category" class="ui-widget-content ui-corner-all" style="width:150px;">
                    <option value="">সাব ক্যাটাগরি</option>
                    </select>
                    </div>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>-->
                          
                          
                          
						<div class="form-row">
						<div class="label label_class" style="">শিরোনাম : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="headline" id="headline" size="70" type="text" value="<?php echo $newsdata['headline'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						<div class="form-row">
						<div class="label label_class" style="">অথার নাম : </div>
						
						<div class="field"><span class="field article-field">
						  
                          <select name="auther_name" id="autherNameVal" class="ui-widget-content ui-corner-all" style="width:150px;">
                          	<option value="<?php echo $newsdata['auther_name'];?>"><?php echo $newsdata['auther_name'];?></option>
                            <option value="অনলাইন ডেস্ক নিউজ">অনলাইন ডেস্ক নিউজ</option>
                            <option value="স্টাফ">স্টাফ</option>
                            <option value="প্রতিনিধী">প্রতিনিধী</option>
                            <option value="বিশেষ প্রতিনিধী">বিশেষ প্রতিনিধী</option>
                            <option value="কলামিস্ট">কলামিস্ট</option>
                            <option value="জনপ্রতিনিধী">জনপ্রতিনিধী</option>
                            <option value="অন্যান্য">অন্যান্য</option>
                          </select>
                          <input type="text" name="authername" value="<?php echo $newsdata['auther_name'];?>" id="auther_name" style="width:300px; color:#ccc;" onfocus="if(this.value=='Auther name'); this.value=''; this.style.color='#000'" onblur="if(this.value==''); this.style.color='#ccc'">
						  </span>
						  <div class="input-errors" id="lastName_err"></div>
				          </div></div>
                        <div class="form-row">
                       <div class="label">
                           ফটো:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<?php /*?><?php 	$data = array('id'=>'file', 'name'=>'userfile');
				echo form_upload($data);
		?><?php */?>
        <input type="file" name="userfile" id="file"/>
                        <img src="<?php echo base_url();?>uploads/images/news/<?php echo $newsdata['image'];?>" width="30%" height="30%" />
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div>
						<div class="form-row">
						<div class="label label_class" style="">ফটো টাইটেল : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="image_title" id="image_title" size="70" value="<?php echo $newsdata['image_title'];?>" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						</div>
                        
                        
                        <div class="form_right">
                        	<div class="form-row">
                            	
                                <table width="100%">
                           	     <!--<tr>
                                   	 <td height="38" colspan="3" align="right" valign="top" class="label label_class">
                                     <button type="button" style="background:#f7f7f7; border:1px solid #ccc; padding:3px 5px; font-size:12px; color:#666666; cursor:pointer">Preview</button></td>
                                  </tr>-->
                                  <tr>
                                    <td width="565" class="label label_class">টপ নিউজ</td>
                                   	 <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="top_news" value="1" 
									<?php 
									$topnews=$newsdata['top_news'];
									if($topnews==1){
									?>
                                    checked="checked"
                                     <?php
									}
									?> />                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="565" class="label label_class">টপ ডেস্ক নিউজ</td>
                                   	 <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="top_desk_news"  value="1" 
									<?php 
									$topnews=$newsdata['top_desk_news'];
									if($topnews==1){
									?>
                                    checked="checked"
                                     <?php
									}
									?> />                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="565" class="label label_class">ল্যাটেস্ট নিউজ</td>
                                   	 <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="breaking_news"  value="1" 
									<?php 
									$topnews=$newsdata['breaking_news'];
									if($topnews==1){
									?>
                                    checked="checked"
                                     <?php
									}
									?> />                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="565" class="label label_class">স্ট্যাটাস</td>
                                   	 <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="status"  value="1" 
                                    <?php 
									$topnews=$newsdata['status'];
									if($topnews==1){
									?>
                                    checked="checked"
                                     <?php
									}
									?> />                                    </td>
                                  </tr>
                                </table>
                            	
                          </div>
                        </div>
                        
                </fieldset>
                <fieldset class="fieldset">
                	<legend class="legend">News Description</legend>                    
						<div class="form" style="width:97%">
						
						
						
						
						
                        
						
						
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top; width:120px;">
                        Short Description: 
                        </div>
						
						<div class="field">
                        <textarea name="short_description" rows="5" cols="40" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $newsdata['short_description'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>							
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top;width:120px;">Long Description: </div>
						
						<div class="field">
						
						<textarea name="full_description"  id="ajaxfilemanager" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"  rows="5" cols="100"><?php echo $newsdata['full_description'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
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
						  <input name="seo_title" id="seo_title" size="80" type="text" value="<?php echo $newsdata['seo_title'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
						
                        
						
						<div class="form-row">
						<div class="label label_class" style="">Keyword : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="key_word" id="key_word" size="80" type="text" value="<?php echo $newsdata['key_word'];?>"/>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div>
                          </div>
													
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top">
                        SEO Details: </div>
						
						<div class="field">
						
						<textarea name="seo_details" rows="5" cols="100" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"><?php echo $newsdata['seo_details'];?></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
               <input type="hidden" name="newsId" value="<?php echo $newsdata['n_id'];?>" />
                  <input type="hidden" name="still_images" value="<?php echo $newsdata['image'];?>" /> 
                
                
      </form>
    </div>
    
    <div class="button-container">
         <span class="button ui-widget-content-1"><input type="button" value="Back" id="back"  onclick="form_back();"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset" onclick="form_reset();"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
    
</div>

</div>
</section>
</body>
</html>
