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
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>


<section id="main-container">
<div id="container">
<div class="title-container">
	<div class="add-user">
	  <h1>&#2472;&#2494;&#2478;&#2494;&#2479;&#2503;&#2480; &#2488;&#2478;&#2527;&#2488;&#2498;&#2458;&#2496;</h1>
	</div>
    <div class="button-container">
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" /></span>
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/></span>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/></span>
    </div>
</div>
<div class="content-container">
<div id="sidebar-inner">
<?php //include("left_menu_coin.php");?>
</div>
    
    <div id="content-inner">
		<form name="MemberForm" id="MemberForm" method="post" action="<?php echo base_url();?>pray_time/form" enctype="multipart/form-data">
				
				
				<fieldset class="fieldset">
                	<legend class="legend">General Information</legend>                    
						<div  class="form" style="width:97%; padding:30px 10px; " align="center">
                         <table width="53%" border="1" bordercolor="#AEAEAE" align="left" cellspacing="2" cellpadding="2" style="border-collapse:collapse; padding:10px; margin:0 20%">
                          <tr>
                            <td width="40%" align="center" style="padding:10px;"><span class="style3">&#2472;&#2494;&#2478;&#2494;&#2479;&#2503;&#2480; &#2451;&#2527;&#2494;&#2453;&#2509;&#2468;</span></td>
                            <td width="27%" align="center"><span class="style3">&#2488;&#2478;&#2527;</span></td>
                            <!--<td width="33%" align="center"><strong>SELL</strong></td>-->
                          </tr>
                           <?php
							$i=1;
							foreach($coinlist as $coin):
							$coin_id=$coin->coin_id;
							$coin_name=$coin->coin_name;
							$sell=$coin->sell;
							$buy=$coin->buy;
							$seo_title=$coin->seo_title;
							$key_word=$coin->key_word;
							$seo_details=$coin->seo_details;
							$i++;
							?>
                            <tr>
                            <td style="padding:10px;"><input name="coin<?php echo $i;?>" id="image_title" size="20" type="text"  placeholder="Coin name" onfocus="this.placeholder=''" onblur="this.placeholder='Coin name'" value="<?php echo $coin_name; ?>" style="font-weight:bold;"/>
                            </td>
                            <td style="padding:10px;"><input name="buy<?php echo $i;?>" id="image_title2" size="10" type="text"  placeholder="Buy" onfocus="this.placeholder=''" onblur="this.placeholder='Buy'" value="<?php echo $buy; ?>"/></td>
                            <!--<td style="padding:10px;"><input name="sell<?php echo $i;?>" id="image_title2" size="10" type="text"  placeholder="Sell" onfocus="this.placeholder=''" onblur="this.placeholder='Sell'" value="<?php echo $sell; ?>"/>
                            <input type="hidden" name="coinId<?php echo $i;?>" value="<?php echo $coin_id; ?>" />
                            </td>-->
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
        <span class="button ui-widget-content-1"><input type="button" value="Back" id="back" />
        <span class="button ui-widget-content-1"><input type="button" value="Reset"  id="reset"/>
        <span class="button ui-widget-content-1"><input type="button" value="Save"  id="save" onclick="form_submit();"/>
    </div>
    
</div>

</div>
</section>
