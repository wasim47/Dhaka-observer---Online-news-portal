<?php //****************************************************************************************?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>..:: Welcome to admin Panel ::..</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>assets/css/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/stylesheet.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/megamenu.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/pagination.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/floatingbar.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/verticaltabs.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/admin.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/kendo_002.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/kendo.css" media="screen" rel="stylesheet" type="text/css">

<script type="" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/jquery_003.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/ddslick.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/verticaltabs.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery_002.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/kendo.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/kendo_002.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/kendo_003.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/kendo_003.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/slicker.js"></script>
<script type="" src="<?php echo base_url();?>assets/js/uploader.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jqueryFileTree.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	//Variable que almacena el arreglo que se mostrara en el dropdown
	var ddData = [
		{
			text: "User Profile",
			value: 0,
			link_value: "/Members/index/profile",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/user.png"
		}
		,
		{
			text: "Global Settings",
			value: 1,
			link_value: "/Settings/global/update",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/global-setting.png"
		}
				,
		{
			text: "Update Contact",
			value: 2,
			link_value: "/Contact/backend/update",
			//description: "",
			imageSrc: "application/modules/Administrator/layouts/scripts/images/tools/contact.png"
		}
									];
	
	var dIndex = null;
	
	for(var i = 0; i < ddData.length; i++)
	{
		var dLink = ddData[i].link_value;
		var cLink	=	"/Administrator";
		var rgxp = new RegExp(dLink, "g");
		if(cLink.match(rgxp) != null)
		{
			dIndex = ddData[i].value;					
			break;
		}
	}
	
	//Dropdown B�sico
	$('#dropdownBasico').ddslick({
		data: ddData,
		width: 220,		
		selectText: "<img src='application/modules/Administrator/layouts/scripts/images/tools/settings.png' class='option'>GENERAL SETTINGS",
		defaultSelectedIndex: dIndex,
		truncateDescription: true,
		imagePosition: "left",
		showSelectedHTML: true,
		clickOffToClose: true,
		onSelected: function(data){
			//Llama funci�n que hace algo
			//console.log(data);
			window.location.href = data.selectedData.link_value;
		}
	});
});
</script>

</head>


<?php @session_start(); ?>

<!--<body onload="selectedmenu('<?php echo $onload; ?>') " >-->
<body>

<div id="wrapper">
<header id="header">
        <div class="logo">
    <img src="<?php echo base_url();?>assets/images/header_logo.gif" width="60%">
    </div>
    <h1>Administrator's Control Panel</h1>
  	    </header>
<div>
<nav class="wrapper_menu menu_dark_theme">	
    <ul class="menu menu_black"><li>&nbsp;</li></ul>
</nav>
</div>

	
