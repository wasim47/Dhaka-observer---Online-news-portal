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
	<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>news/form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div class="form">
						
						<div class="form-row">
						<div class="label label_class">Category:</div>
						
						<div class="field">
                        <span class="field article-field">
						  <select name="category[]" id="category" class="ui-widget-content ui-corner-all" style="width:150px;"multiple="multiple">
						<?php
							foreach($categorys as $cat):
							$cat_id=$cat->cid;
							$catname=$cat->cat_name;
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
						<div class="form-row">
						<div class="label label_class">Sub Category: </div>
						
						<div class="field">
                        <span class="field article-field">
					<select name="sub_category" id="sub_category" class="ui-widget-content ui-corner-all" style="width:150px;">
                    	<option>Subcategory</option>
						<?php
							foreach($subcategorys as $scat):
							//$scat_id=$menu->scid;
							$subcatname=$scat->sub_cat_name;
							$scid=$scat->scid;
							?>
						<option value="<?php echo $scid; ?>" label="_blank"><?php echo $subcatname; ?></option>
						<?php
							endforeach;
          				?>
					</select>
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
                          
                          
                          
						<div class="form-row">
						<div class="label label_class" style="">Headline : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="headline" id="headline" size="70" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						<div class="form-row">
						<div class="label label_class" style="">Auther Name : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="auther_name" id="auther_name" size="40" title="Enter Keywords here. Describes the meta keywords tag and provides tips for search engine optimization with meta keywords tags" type="text" />
						  </span>
						  <div class="input-errors" id="lastName_err"></div>
				          </div></div>
                        <div class="form-row">
                        <div class="label">
                            Picture:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<?php /*?><?php 	$data = array('id'=>'file', 'name'=>'userfile');
				echo form_upload($data);
		?><?php */?>
        <input type="file" name="userfile" id="file" />
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div>
						<div class="form-row">
						<div class="label label_class" style="">Images title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="image_title" id="image_title" size="70" title="Enter Meta Title here. The meta Title are a very important part of the HTML code for SEO robot attention. Usually they include a concise summary of the web page content and you should include your relevant keywords in them. Most meta tags are included within the 'header' code of a website" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						</div>
                        
                        
                        <div class="form_right">
                        	<div class="form-row">
                            	
                                <table width="100%">
                           	     <tr>
                                   	 <td height="38" colspan="3" align="right" valign="top" class="label label_class">
                                     <button type="submit" style="background:#f7f7f7; border:1px solid #ccc; padding:3px 5px; font-size:12px; color:#666666; cursor:pointer">Preview</button></td>
                                  </tr>
                                  <tr>
                                   	 <td width="565" height="25" class="label label_class">Top News</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="top_news" value="1" /></td>
                                  </tr>
                                  <tr>
                                   	 <td width="565" height="27" class="label label_class">Top Desk News</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="top_desk_news"  value="1" /></td>
                                  </tr>
                                  <tr>
                                   	 <td width="565" height="27" class="label label_class">Breaking News</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="breaking_news"  value="1" /></td>
                                  </tr>
                                  <tr>
                                   	 <td width="565" height="27" class="label label_class">Latest  News</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="last_updated"  value="1" /></td>
                                  </tr>
                                  <tr>
                                   	 <td width="565" height="27" class="label label_class">Popular  News</td>
                                     <td width="93">:</td>
                                    <td width="282"><input type="checkbox" name="popular_news"  value="1" /></td>
                                  </tr>
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
                	<legend class="legend">News Description</legend>                    
						<div class="form" style="width:97%">
						
						
						
						
						
                        
						
						
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top; width:120px;">
                        Short Description: 
                        </div>
						
						<div class="field">
                        <textarea name="short_description" rows="5" cols="40" style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>							
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top;width:120px;">Long Description: </div>
						
						<div class="field">
						
						<textarea name="full_description" id="ajaxfilemanager"  style="background-color:#FFFFFF; border:1px solid #ccc; color:#666666"  rows="50" cols="80"></textarea>											
							
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
