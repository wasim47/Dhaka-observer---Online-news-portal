<?php 
$category_id=$_REQUEST['category_id'];
$query="select * from sub_category where cat_id='$category_id'";
$result=mysql_query($query);

?>
<select name="sub_category" id="sub_category" class="ui-widget-content ui-corner-all" style="width:150px;">
<option value="">Select Sub Category</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['scid']; ?>"><?php echo $row['sub_cat_name']; ?></option>
<?php } ?>
</select>