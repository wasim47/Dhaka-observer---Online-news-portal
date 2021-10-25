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
	  <h1>Add coin</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php include("left_menu_coin.php");?>
</div>
    
    <div id="content-inner">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>coin/form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div  class="form" style="width:97%; padding:30px 10px; " align="center">
                         <table width="53%" border="1" bordercolor="#AEAEAE" align="left" cellspacing="2" cellpadding="2" style="border-collapse:collapse; padding:10px; margin:0 20%">
                          <tr>
                            <td width="40%" align="center" style="padding:10px;"><strong>COIN NAME</strong></td>
                            <td width="27%" align="center"><strong>BUY</strong></td>
                            <td width="33%" align="center"><strong>SELL</strong></td>
                          </tr>
                          <?php 
						  	//$i=0;
							for($i=0; $i<=6; $i++){
							?>
                            <tr>
                            <td style="padding:10px;"><input name="coin<?php echo $i;?>" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="buy<?php echo $i;?>" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="sell<?php echo $i;?>" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                            <?php
							}
						  ?>
                           
                         <!--  <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                           <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                           <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                           <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                           <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>
                           <tr>
                            <td style="padding:10px;"><input name="image_title" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'"/></td>
                            <td style="padding:10px;"><input name="image_title2" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'"/></td>
                          </tr>	-->
                        </table>
                </div>
                        
						<!--<div class="form-row">
						<div class="label label_class" style="">coin title : </div>
						
						<div class="field"><span class="field article-field">
						  <input name="image_title" id="image_title" size="70" type="text" />
						  </span>
						  <div class="input-errors" id="firstName_err"></div>
					      </div></div>-->

						
                        
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
