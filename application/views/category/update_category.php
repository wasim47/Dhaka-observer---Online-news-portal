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


<section id="main-container">
		                      
        <div class="" id="main_layout">
        	<div id="container">
<style>
.ui-front {
    z-index:1000000 !important; /* The default is 100. !important overrides the default. */
}
</style>


<div class="title-container">
	<div class="menu-add"><h1>Update Menu</h1>
	</div>
    
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>

<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>category/subcategory_link_form" enctype="multipart/form-data">
<div class="content-container">
	<div id="sidebar-inner">
	  <?php include("left_sub_category.php");?>
	</div>
    
    <div id="content-inner-middle">
        <div id="generalInfo">
            <fieldset class="fieldset">
                <legend class="legend">Sub Category Update</legend>
<div class="form">
				
						<div class="form-row">
                        <div class="label">
                            Select Category:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                        	<select name="groupcategory" id="groupcategory" class="ui-widget-content ui-corner-all" style="width:150px;">
								<?php
									foreach($categorys as $menudata):
									$menu_id=$menudata->cid;
									$name=$menudata->cat_name;
									?>
								<option value="<?php echo $menu_id; ?>" label="_blank"><?php echo $name; ?></option>
								<?php
									endforeach;
								?>
							</select>    
						
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label">
                            Sub Category Name:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<input aria-describedby="ui-tooltip-0" name="sub_category_name" id="sub_category_name" value="<?php echo $category['sub_cat_name'];?>" size="50" class="ui-widget-content ui-corner-all" type="text"> 
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="label">
                            Sub Category Title:<span class="required">*</span>                        </div>
                        
                      <div class="field">
                            
<input name="sub_category_title" id="sub_category_title" size="50"  value="<?php echo $category['sub_cat_title'];?>" title="Enter Menu Title" class="ui-widget-content ui-corner-all" type="text">                            
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="label">
                            Status:                        </div>
                        
                        <div class="field">
                            
<label>
<input name="status" value="1" title="Show after Login" type="radio" <?php $status=$category['status'];if($status==1){?> checked="checked" <?php } ?> />
Yes
<input name="status" value="0" title="Show after Login" type="radio" <?php $status=$category['status'];if($status==0){?> checked="checked" <?php } ?> />
No </label>
                      </div>
                </div>
                    
                    
                    <?php /*?><div class="form-row">
                        <div style="font-weight:bold">Upload:</div>
                        
                        <div class="field">
					<?php 
					$images=$menu['image'];
					$data = array('id'=>'file', 'name'=>'userfile'); 
					echo form_upload($data);?>
					<input type="hidden" value="<?php echo $images; ?>" name="images" />
					<div style="float:right; width:100px; margin-right:50px;"><img src="<?php echo base_url();?>uploads/images/menu/<?php echo $images; ?>" width="100" height="100" /></div>
				</div>
                    </div>
                    <div class="form-row">
                        <div class="label">
                            Select Target:<span class="required">*</span>
                        </div>
                        
                        <div class="field">
                            
<select name="target" id="target" size="1" class="ui-widget-content ui-corner-all" title="Select Menu Target">
    <option selected="selected" value="<?php echo $menu['target'];?>"><?php echo $menu['target'];?></option>
	 <option value="_self" label="_self">_self</option>
    <option value="_blank" label="_blank">_blank</option>
    <option value="_parent" label="_parent">_parent</option>
    <option value="_top" label="_top">_top</option>
</select>
<input type="hidden" name="mid" value="<?php echo $menu['smid'];?>"/>
<div class="input-errors" id="target_err"></div>
                        </div>
                    </div><?php */?>
                    
    <div class="form-row">
                      <div class="field">
                        <div class="input-errors" id="menu_type_err">
                        </div>
                    </div>
                </div>
              	</div>
            </fieldset>
        </div>
	</div>

    <div id="sidebar-inner-right">
      <div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="accordion">
        <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active ui-corner-top"><a href="#" style="font-size:16px; font-weight:bold;">Category List</a></h3>
          <div class="chart">
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
<input type="hidden" name="scid" value="<?php echo $category['scid'];?>" />
</form>
<div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="reset" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div> 
</div>
</section>
