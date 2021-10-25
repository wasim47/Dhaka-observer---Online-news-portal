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
<style>
.ui-front {
    z-index:1000000 !important; 
}
</style>


<section id="main-container">
        	<div id="container">


<div class="title-container">
	<div class="menu-add"><h1>Add New Menu</h1></div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>

<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>category/subcategory_form" enctype="multipart/form-data">
<div class="content-container">
	<div id="sidebar-inner">
	  <?php include("left_sub_category.php");?>
	</div>
    
    <div id="content-inner-middle">
    	<div id="actionMessage"></div>
        <div id="button_top_bar"></div>
        <div id="generalInfo">
            <fieldset class="fieldset">
                <legend class="legend">Sub Category Setting</legend>
				
                <div class="form">
					<div class="form-row">
                        <div class="label">
                            Select Group <span class="required">*</span>
                        </div>
                        
                    <div class="field">
					<select name="groupcategory" id="groupcategory" class="ui-widget-content ui-corner-all" style="width:150px;">
						<?php
							foreach($categorys as $category):
							$cat_id=$category->cid;
							$name=$category->cat_name;
							?>
						<option value="<?php echo $cat_id; ?>" label="_blank"><?php echo $name; ?></option>
						<?php
							endforeach;
          				?>
					</select>
					<div class="input-errors" id="target_err"></div>
                      </div>
                    </div>
					
                    <div class="form-row">
                        <div class="label">
                            Menu Name:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<input aria-describedby="ui-tooltip-0" name="sub_category_name" id="sub_category_name" size="50" class="ui-widget-content ui-corner-all" type="text"> 
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="label">
                            Menu Title:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<input name="sub_category_title" id="sub_category_title" size="50" title="Enter Sub Category Title" class="ui-widget-content ui-corner-all" type="text">                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="label">
                            Status:                        </div>
                        
                        <div class="field">
                            
<label><input name="status" id="show_after_login-1" value="1" title="Show after Login" type="radio">Yes</label>
<label><input name="status" id="show_after_login-0" value="0" checked="checked" title="Show after Login" type="radio">No</label>
                        </div>
                    </div>
                    
                    <!--<div class="form-row">
                        <div class="label">
                            Select Target:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<select name="target" id="target" size="1" class="ui-widget-content ui-corner-all" title="Select Menu Target">
    <option selected="selected" value="_self" label="_self">_self</option>
    <option value="_blank" label="_blank">_blank</option>
    <option value="_parent" label="_parent">_parent</option>
    <option value="_top" label="_top">_top</option>
</select>
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div>-->
					
					<!--<div class="form-row">
                        <div class="label">
                            Select Image:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<?php 	$data = array('id'=>'file', 'name'=>'userfile');
				echo form_upload($data);
		?>
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div>-->
                    
                    
              	</div>
            </fieldset>
        </div>
	</div>

    <div id="sidebar-inner-right">
      <div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="accordion">
        <h3 tabindex="0" aria-selected="true" aria-controls="ui-accordion-accordion-panel-0" id="ui-accordion-accordion-header-0" role="tab" class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active ui-corner-top"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span><a href="#" style="font-size:16px; font-weight:bold;">Category List</a></h3>
        <div aria-hidden="false" aria-expanded="true" role="tabpanel" aria-labelledby="ui-accordion-accordion-header-0" id="ui-accordion-accordion-panel-0" style="display: block; height: 161.083px;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active">
          <div class="chart">
            <div id="page_select" style="min-height:100px;">
              <div>
                <div class="k-grid k-widget" data-role="grid" id="simpleGrid">
                  <table role="grid" cellspacing="0">
                    <colgroup>
                    <col style="width:10px" />
                    <col style="width:10px" />
                    <col />
                    </colgroup>
                    <thead class="k-grid-header">
                      <tr>
                        <th width="23" class="k-header" role="columnheader" data-field="order" data-title="Order">SI</th>
                        <th width="83" class="k-header" role="columnheader" data-field="id" data-title="ID">Name</th>
                        <th width="42" class="k-header" role="columnheader" data-field="name" data-title="Menu Name">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
									$i=0;
									foreach($subcategorys as $menu):
									$name=$menu->sub_cat_name;
									$status=$menu->status;
									$i++;
								?>
                      <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td role="gridcell"><?php echo $name; ?></td>
                        <td role="gridcell"><?php echo $status; ?></td>
                      </tr>
                      <?php
                                     endforeach;
                                  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div aria-hidden="true" aria-expanded="false" role="tabpanel" aria-labelledby="ui-accordion-accordion-header-1" id="ui-accordion-accordion-panel-1" style="display: none; height: 161.083px;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
          <div class="left-float"> <span class="label">Image:</span>
              <input name="menu_image" value="" title="Upload Image" id="menu_image" type="hidden" />
              <span class="select-btn ui-widget-content-1"><a class="upload_btn" href="javascript:void(0);"><span class="icon select">Select</span></a></span> </div>
        </div>
        <div aria-hidden="true" aria-expanded="false" role="tabpanel" aria-labelledby="ui-accordion-accordion-header-2" id="ui-accordion-accordion-panel-2" style="display: none; height: 161.083px;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"> <span class="label">Template:</span>
            <select name="menu_template" id="menu_template" size="1" style="width:150px;" class="ui-widget-content ui-corner-all" title="Select Template">
              <option selected="selected" value="" label="Select template">Select template</option>
              <option value="default" label="Default">Default</option>
              <option value="tour_default" label="Tour Script">Tour Script</option>
            </select>
        </div>
      </div>
      <div id="popup-layout-dialog" title="Content layout area"></div>
      <div id="popup-confirm" title="Content layout area"></div>
      <div id="dialog_msg" title="Add New Menu Dialog"></div>
      <div id="dialog_container" style="display:none" title="Processing........ Please wait.">
        <div id="progressbar"></div>
      </div>
    </div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
</form>
 </div>
</section>
