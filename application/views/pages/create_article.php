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
}
</script>
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

<section id="main-container">
<div id="container">
<div class="title-container">
	<div class="add-user"><h1>Add User</h1></div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_article.php");?>
</div>
    
    <div id="content-inner">
    	<!--<form name="MemberForm" id="MemberForm">-->
				<?php
		$options = array(
						  '0'  => 'No',
						  '1'    => 'Yes'
						);
						
 		//	echo form_open("admin/create_user");
?>                
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>pages/form">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">Meta Information</legend>                    
						<div class="form">
							<div class="form-row">
						<div class="label label_class" style=""><div class="toggle-link"><a href="#" id="slick-slidetoggle" class="user-icon">Search Menu</a></div></div>
						  </div>
						  
						  		
						
						<div class="form-row">
						<div class="label label_class" style=""></div>
						
						<div class="field">
						<div id="slickbox" style="display:none; width:600px; float:left" class="toggle-container">
<form id="formUserSearch" name="formUserSearch" method="post" action="">
                	<div class="toggle-search">
                    	<div class="toggle-row">
                        	<div class="toggle-label">
                            	<span class="label">Select Main Menu</span>
                            </div>
                            
                            <div class="toggle-field">
                            	<select name="groupmenu" id="groupmenu" class="ui-widget-content ui-corner-all" style="width:150px;">
						<?php
							foreach($menus as $menu):
							$menu_id=$menu->mid;
							$name=$menu->name;
							?>
						<option value="<?php echo $menu_id; ?>" label="_blank"><?php echo $name; ?></option>
						<?php
							endforeach;
          				?>
					</select>
                            </div>
                            
                            <div class="toggle-label">
                            	<span class="label">Select Left Menu</span>
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
                           	</div>
                        </div>
                        
                        <div class="toggle-row">
                          <div class="toggle-field"></div>
                      </div>
                    </div>
                    <hr>
                    <div class="clr form-button-container">
                    	<span class="button  ui-widget-content-1"><a href="javascript:%20void(0);" class="user_search_btn"><span class="icon search">Submit</span></a></span>
                    </div>
				</form>
</div>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						
						
						
						<div class="form-row">
						<div class="label label_class" style="">Meta Title: </div>
						
						<div class="field"><span class="field article-field">
						  <input name="seo_title" id="article_meta_title" size="100" title="Enter Meta Title here. The meta Title are a very important part of the HTML code for SEO robot attention. Usually they include a concise summary of the web page content and you should include your relevant keywords in them. Most meta tags are included within the 'header' code of a website" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>
						
														
						<div class="form-row">
						<div class="label label_class" style="">Keywords: </div>
						
						<div class="field"><span class="field article-field">
						  <input name="keywords" id="keywords" size="100" title="Enter Keywords here. Describes the meta keywords tag and provides tips for search engine optimization with meta keywords tags" type="text" />
						  </span>
						  <div class="input-errors" id="lastName_err"></div>
				          </div></div>
						
														
						<div class="form-row">
						<div class="label label_class" style="vertical-align:top"><span class="label article-label">Description: </span></div>
						
						<div class="field">
						
						<textarea name="meta_description" id="ajaxfilemanager"  rows="20" cols="60"></textarea>											
							
						<div class="input-errors" id="companyName_err"></div>
						</div>
						</div>
						
						</div>
                </fieldset>
                
      </form>
    </div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" />
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/>
    </div>
    
</div>

</div>
</section>
