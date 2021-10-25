/********************************************FOR DYNAMIC FORM START*************************************************/
function focusFirst(field_name, field_value, id)
{	
	if(id == 0)
	{
		if($('#'+field_name))
		{
			if($('#'+field_name)[0]){ $('#'+field_name)[0].focus(); }
			$('#'+field_name).focus();
		}
	}
}

function openFirstErrTab(key_arr, tab_id, content_id_prefix)
{
	var err_id = '';
	var sel = null;
	var getTab = false;
	
	for(var i = 1; i <= $('#'+tab_id).children('ul:first').children('li').length ; i++)
	{				
		for(var j= 0; j < key_arr.length; j++)
		{	
			err_id = '#'+key_arr[j].key+'_err';	
			if($('#'+content_id_prefix+i+':has('+err_id+')').html())
			{
				sel = (i - 1);				
				$("#"+tab_id).tabs({ active: sel }).find(".ui-tabs-nav").sortable({axis:'xy'});	
				if($('#'+key_arr[j].key)[0])
				{	
					$('#'+key_arr[j].key)[0].focus();
				}
				else
				{
					$('#'+key_arr[j].key).focus();
				}
				getTab = true;
				break;							
			}
		}
		if(getTab == true)
		{
			break;
		}
	}
}

function commonStripslashes(str) 
{
	str=str.replace(/\\'/g,'\'');
	str=str.replace(/\\"/g,'"');
	str=str.replace(/\\0/g,'\0');
	str=str.replace(/\\\\/g,'\\');
	return str;
}
/********************************************FOR DYNAMIC FORM END*************************************************/


function errMsgDesign(msg)
{
	var data = '<div class="ui-widget">'+
				'<div class="ui-state-error ui-corner-all">'+ 
					'<p><span class="ui-icon ui-icon-alert"></span>'+
					msg+
					'</p>'+
				'</div>'+
			'</div>';
	return data;
}

function succMsgDesign(msg)
{
	var data = '<div class="ui-widget">'+
				'<div class="ui-state-success ui-corner-all">'+ 
					'<p><span class="ui-icon ui-icon-check"></span>'+
					msg+
					'</p>'+
				'</div>'+
			'</div>';
	return data;
}

function lastClassAdd(oTable)
{
	/*************************************Last Class Start*****************************/
	$('td.last').removeClass('last');
	$('td', oTable.fnGetNodes()).parents("tr:first").parents("tbody:first").children('tr:last-child').children('td').addClass('last');
	$('th').click(function() {
		$('td.last').removeClass('last');
		$('td', oTable.fnGetNodes()).parents("tr:first").parents("tbody:first").children('tr:last-child').children('td').addClass('last');
	});	
	$('td.dataTables_empty').addClass('last');
	/*************************************Last Class End*****************************/
}

function html_entity_decode (txt) {
	var randomID = Math.floor((Math.random()*100000)+1);
    $('body').append('<div id="random'+randomID+'"></div>');
    $('#random'+randomID).html(txt);
    var entity_decoded = $('#random'+randomID).html();
    $('#random'+randomID).remove();
    return entity_decoded;
}


/*************************************Floating Bar Start*****************************/
function floatingbar(floatingbar,top_button,bottom_button)
{
	if($(floatingbar))
	{		
		$(window).scroll(function() {	
									
			if($(top_button).position())
			{																	
				if(parseFloat($(top_button).position().top) < parseFloat($(window).scrollTop()))
				{	
					$(floatingbar).css({height: 0}).animate({ height: '55'}, 0);			
				}
				else
				{
					$(floatingbar).animate({ height: 0}, 0);
				}
			}
		});
	}
}

/*************************************Floating Bar End*****************************/


/*************************************Floating Bar Start*****************************/
function upload_floatingbar(floatingbar,top_button,bottom_button, h)
{
	if($(floatingbar))
	{	
		$(document).scroll(function() {		
			if($(top_button).position())
			{																	
				if(parseFloat($(top_button).position().top) < parseFloat($(window).scrollTop()))
				{	
					$(floatingbar).css({height: 0}).animate({ height: h}, 40);			
				}
				else
				{
					$(floatingbar).animate({ height: 0}, 40);
				}
			}
		});
	}
}

/*************************************Floating Bar End*****************************/

/*************************************Refresh Captcha Start*****************************/
function refreshCaptcha(json_arr, parent_tag)
{
	parent_tag = (parent_tag == null || parent_tag == '') ? 'div' : parent_tag;
	if(json_arr.captcha && json_arr.captcha.status && json_arr.captcha.status == 'ok')
	{
		var captcha_name = json_arr.captcha.captcha_name;
		$('input[name="'+captcha_name+'[id]"]').parents(parent_tag+':first').children('img:first').attr('src', json_arr.captcha.ImgUrl+json_arr.captcha.id+json_arr.captcha.Suffix);
		$('input[name="'+captcha_name+'[id]"]').val(json_arr.captcha.id);
		$('input[name="'+captcha_name+'[input]"]').val('');
		$('#'+captcha_name+'_err').html('');		
	}
}
/*************************************Refresh Captcha End*****************************/


/**************************************JPicker Code Start*************************/	
function colorPicker(field_name_prefix)
{		
	$('#'+field_name_prefix+'picker').jPicker(	
		{
		  window:
		  {
			expandable: true,
			updateInputColor: true,
			bindToInput: true,
			input:  $('#'+field_name_prefix+'r,'+'#'+field_name_prefix+'g,'+'#'+field_name_prefix+'b'),
			position:
			{
			  x: 'screenCenter', // acceptable values "left", "center", "right", "screenCenter", or relative px value
			  y: '500px', // acceptable values "top", "bottom", "center", or relative px value
			},
			alphaSupport: true
		  },		  
		  color:
		  {			
			active: new $.jPicker.Color({ r: $('#'+field_name_prefix+'r').val(), g: $('#'+field_name_prefix+'g').val(), b: $('#'+field_name_prefix+'b').val() })
		  },
		  images:
		  {
			clientPath: 'application/modules/Administrator/layouts/scripts/vendor/scripts/js/jpicker/images/',
		  }
	 },
	  function(color, context)
		{
			var all = color.val('all');
			// alert('Color chosen - hex: ' + (all && '#' + all.hex || 'none') + ' - alpha: ' + (all && all.a + '%' || 'none') + ' r : '+ all.r + ' g : '+ all.g + ' b : '+ all.b);
			 $('#'+field_name_prefix+'r').val(all.r);			 
			 $('#'+field_name_prefix+'g').val(all.g);
			 $('#'+field_name_prefix+'b').val(all.b);
			 $('#'+field_name_prefix+'r,'+'#'+field_name_prefix+'g,'+'#'+field_name_prefix+'b').css(
				{
				  backgroundColor: all && '#' + all.hex || 'transparent'
				});
		},
        function(color, context)
        {
			
        },
        function(color, context)
        {
          var all = this.color.active.val('all');
			//alert('Active Color chosen - hex: ' + (all && '#' + all.hex || 'none') + ' - alpha: ' + (all && all.a + '%' || 'none') + ' r : '+ all.r + ' g : '+ all.g + ' b : '+ all.b);
			 $('#'+field_name_prefix+'r').val(all.r);			 
			 $('#'+field_name_prefix+'g').val(all.g);
			 $('#'+field_name_prefix+'b').val(all.b);
			 $('#'+field_name_prefix+'r,'+'#'+field_name_prefix+'g,'+'#'+field_name_prefix+'b').css(
				{
				  backgroundColor: all && '#' + all.hex || 'transparent'
				});
        }	 
	 );		 
}
/************************************JPicker Code End**************************/


/**************************************UPay Code Start*************************/
function UPay_Pay()
{
	$('a.UPay_Pay').unbind('click');
	$('a.UPay_Pay').click(function() {
		var self = this;
		
		if($(self).parent().is('div'))
		{
			$(self).parents('div:first').children('#upay_div').children('form:first').submit();
		}
		else if($(self).parent().is('span'))
		{
			$(self).parents('span:first').children('#upay_div').children('form:first').submit();
		}
	});
}
/**************************************UPay Code End*************************/	


/**************************************Editors Code Start*************************/
	
function buttonShow(name, title)
{
	$('#file_'+name).html(title);
	$('#file_path_'+name).val('');
	$.each($('#floatingbar').children('div:first').children('span'), function(index) { 	 
	  var rel = $(this).children('a:first').attr('rel');
	  if(rel == name)
	  {
		$(this).fadeIn();
	  }
	  else
	  {
		$(this).fadeOut();
	  }
	});
}
/**************************************Editors Code Start*************************/


/**************************************IP Address Validation Start*************************/

function validateIp(value, type)
{	
	var ipv4 = '^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$';
	var ipv4CIDR = '^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])(\/(\d|[1-2]\d|3[0-2]))$';
	
	var ipv6 = '^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*';
	
	var ipv6CIDR = '^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*(\/(\d|\d\d|1[0-1]\d|12[0-8]))$';
	
	
	var return_val = false;
	switch(type)
	{
		case '4':
			var ipRE = new RegExp( ipv4   );
			var ipRE_CIDR = new RegExp( ipv4CIDR   );
			return_val = (ipRE.test( value ) || ipRE_CIDR.test( value ));
			break;
		case '6':
			var ipRE = new RegExp( ipv6   );
			var ipRE_CIDR = new RegExp( ipv6CIDR   );
			return_val = (ipRE.test( value ) || ipRE_CIDR.test( value ));
			break;
	}
	return return_val;
}

/**************************************IP Address Validation End*************************/




/*************************************************JQUERY COMMON FUNCTION START***********************************************/

(function( $ ) {
	/************************************************COMBOBOX START***********************************************/
	$.widget( "ui.combobox", {
		_create: function() {
			var input,
			that = this,
			wasOpen = false,
			select = this.element.hide(),
			selected = select.children( ":selected" ),
			value = selected.val() ? selected.text() : "",
			wrapper = this.wrapper = $( "<span>" )
				.addClass( "ui-combobox" )
				.insertAfter( select );
			function removeIfInvalid( element ) {
				var value = $( element ).val(),
					matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ) + "$", "i" ),
					valid = false;
				select.children( "option" ).each(function() {
					if ( $( this ).text().match( matcher ) ) {
						this.selected = valid = true;
						return false;
					}
				});
				if ( !valid ) {
					// remove invalid value, as it didn't match anything
					$( element )
						.val( "" )
						.attr( "title", value + " didn't match any item" )
						.tooltip( "open" );
					select.val( "" );
					setTimeout(function() {
						input.tooltip( "close" ).attr( "title", "" );
					}, 2500 );
					input.data( "ui-autocomplete" ).term = "";
				}
			}
			input = $( "<input>" )
				.appendTo( wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "ui-state-default ui-combobox-input" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: function( request, response ) {
						var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
						response( select.children( "option" ).map(function() {
							var text = $( this ).text();
							if ( this.value && ( !request.term || matcher.test(text) ) )
								return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
								}) );
					},
			select: function( event, ui ) {
				ui.item.option.selected = true;
				that._trigger( "selected", event, {
					item: ui.item.option
				});
			},
			change: function( event, ui ) {
					if ( !ui.item ) {
						removeIfInvalid( this );
					}
				}
			})
			.addClass( "ui-widget ui-widget-content ui-corner-left" );
			input.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};
			$( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Show All Items" )
				.tooltip()
				.appendTo( wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				 })
				.removeClass( "ui-corner-all" )
				.addClass( "ui-corner-right ui-combobox-toggle" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// close if already visible
					if ( wasOpen ) {
						return;
					}
					// pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			input.tooltip({
				tooltipClass: "ui-state-highlight"
			});
		},
		_destroy: function() {
			this.wrapper.remove();
			this.element.show();
		}
	});
	/************************************************COMBOBOX END***********************************************/
	
	/************************************************REMOVE ATTRIBUTES START*************************************/
	$.fn.removeAttributes = function(only, except) {
			if (only) {
				only = $.map(only, function(item) {
					return item.toString().toLowerCase();
				});
			};
			if (except) {
				except = $.map(except, function(item) {
					return item.toString().toLowerCase();
				});
				if (only) {
					only = $.grep(only, function(item, index) {
						return $.inArray(item, except) == -1;
					});
				};
			};
			return this.each(function() {
				var attributes;
				if(!only){
					attributes = $.map(this.attributes, function(item) {
						return item.name.toString().toLowerCase();
					});
					 if (except) {
						attributes = $.grep(attributes, function(item, index) {
							return $.inArray(item, except) == -1;
						});
					};
				} else {
					attributes = only;
				}      
				var handle = $(this);
				$.each(attributes, function(index, item) {
					handle.removeAttr(item);
				});
			});
		};
	/***********************************************REMOVE ATTRIBUTES END*************************************/	
	
})( jQuery );

/************************************************AUTOCOMPLETE START***********************************************/
		
  function autoSuggestion(field_id, dest_url, input_arr, output_arr, file_path, min_length)
  {	
  	if($("#"+field_id).is('input'))
	{			  
	   $( "#"+field_id ).autocomplete({		 
		  source: function( request, response ) {
			  var dataObj = {};		
		  	  $.each(input_arr, function(key, value){ dataObj[key] = (value) ? value : $.trim(request.term); });		  
			  $.ajax({
				  url: dest_url,
				  type: 'POST',
				  dataType: "json",
				  data: dataObj,
				  success: function( data ) {					  
					if(data.status == 'ok')
					{						
					  response( $.map( data.search_data, function( item ) {		
					  	  var picture = '';						  
						  var other = '';
						  if(file_path != '')
						  {				  
							  var img_arr = (item[output_arr[0]])? item[output_arr[0]].split(',') : item[output_arr[1]].split(',');
							  	  picture = '<img src="'+file_path+'/'+img_arr[0]+'" width="25" height="20"/>';
						  }
						  if(item[output_arr[2]])
						  {
							  $.each(output_arr, function(key, value){
								  if(key > 3)
								  {
									 other +=  item[value];
								  }
							  });
						  }
						  return {
							  label: item[output_arr[2]], 
							  value: item[output_arr[3]],
							  pic: picture,
							  other: other
						  }
					  }));
					}
					else
					{
						response( $.map( data, function( item ) {
								return
							}));
					}
				  }
			  });
		  },
		  minLength: min_length,
		  select: function( event, ui ) {
			  /*log( ui.item ?
			  "Selected: " + ui.item.label :
			  "Nothing selected, input was " + this.value);*/
		  },
		  open: function() {
			  $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		  },
		  close: function() {
			  $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		  }
	  })
	  .data( "uiAutocomplete" )
	  ._renderItem = function( ul, item ) {
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>"  + item.pic+ "  <b>"  + item.label+ "</b>  " + item.other+ "</a>" )
            .appendTo( ul );
    	}; 
	}
  }
  /************************************************AUTOCOMPLETE END***********************************************/

/************************************************IMAGE THUMBNIL START************************************************/
function commonImageThumbnil()
{	
	$('div.thumb img').hoverpulse({
        size: 40,  // number of pixels to pulse element (in each direction)
        speed: 400 // speed of the animation 
    });
}
/************************************************IMAGE THUMBNIL END************************************************/

/************************************************FILE INFO START************************************************/
function commonFilePath(file_path, filename)
{
		var ext = getCommonFileExtension(filename);
		var img_path = '';
		switch(ext.toLowerCase())
		{
			case 'flv':
			case 'swf':
			case 'FLV':
			case 'SWF':
				img_path = 'application/modules/Administrator/layouts/scripts/images/common/flash.png';
				break;
			case 'mp3':
			case 'MP3':
				img_path = 'application/modules/Administrator/layouts/scripts/images/common/mp3.png';
				break;
			case 'avi':
			case 'wmv':
			case 'wma':
			case 'WMA':
			case 'AVI':
			case 'WMV':
				img_path = 'application/modules/Administrator/layouts/scripts/images/common/avi_thumb.png';
				break;
			case 'pdf':
			case 'doc':
			case 'docx':
			case 'xls':
			case 'xlsx':
			case 'ppt':
			case 'pptx':
			case 'PDF':
			case 'DOC':
			case 'DOCX':
			case 'XLS':
			case 'XLSX':
			case 'PPT':
			case 'PPTX':
				img_path = 'application/modules/Administrator/layouts/scripts/images/common/'+ext.toLowerCase()+'.png';
				break;
			case 'jpg':
			case 'png':
			case 'gif':
			case 'bmp':
				img_path = file_path +'/'+ filename; 
				break;
			default:
				img_path = 'application/modules/Administrator/layouts/scripts/images/common/all_file_thumb.png'; 
				break;
		}
	return img_path;
}

function getCommonFileExtension(filename)
{
	return filename.replace(/^.*?\.([a-zA-Z0-9]+)$/, "$1");
}

/************************************************FILE INFO END************************************************/

/**************************************CATEGORY TREE FUNCTION START*******************************************/
function commonCategoryTreeGen(settingObj)
{
	if($("#"+settingObj.form_action.category_tree.category_tree_id).is('div'))
	{
		$(".example").treeTable({
		  initialState: "expanded"
		});
		
		// Drag & Drop Example Code
		$("#dnd-example .file, #dnd-example .folder").draggable({
		  helper: "clone",
		  opacity: .75,
		  refreshPositions: true,
		  revert: "invalid",
		  revertDuration: 300,
		  scroll: true
		});
		
		
		$("#dnd-example .folder").each(function() {
		  $($(this).parents("tr")[0]).droppable({
			accept: ".file, .folder",
			drop: function(e, ui) { 
				var fieldObj = {};
					fieldObj.id = $(ui.draggable).parents("tr")[0].id;
					fieldObj.to =	this.id;
				var url = settingObj.form_action.category_tree.category_tree_dest_url;
			  $($(ui.draggable).parents("tr")[0]).postDataTo(this,fieldObj,url); 
			  $($(ui.draggable).parents("tr")[0]).appendBranchTo(this);
			  
			  // Issue a POST call to send the new location (this) of the 
			  // node (ui.draggable) to the server.		  
			},
			hoverClass: "accept",
			over: function(e, ui) {
			  if(this.id != $(ui.draggable.parents("tr.parent")[0]).id && !$(this).is(".expanded")) {
				$(this).expand();
			  }
			}
		  });
		});
		
		 $("#dnd-example .file").each(function() {
		  $($(this).parents("tr")[0]).droppable({
			accept: ".file, .folder",
			drop: function(e, ui) {
				var fieldObj = {};
					fieldObj.id = $(ui.draggable).parents("tr")[0].id;
					fieldObj.to =	this.id;
				var url = settingObj.form_action.category_tree.category_tree_dest_url;
			  $($(ui.draggable).parents("tr")[0]).postDataTo(this,fieldObj,url);  
			  $($(ui.draggable).parents("tr")[0]).appendBranchTo(this);
			  
			  // Issue a POST call to send the new location (this) of the 
			  // node (ui.draggable) to the server.		 
			},
			hoverClass: "accept",
			over: function(e, ui) {
			  if(this.id != $(ui.draggable.parents("tr.parent")[0]).id && !$(this).is(".expanded")) {
				$(this).expand();
			  }
			}
		  });
		});
		
		// Make visible that a row is clicked
		$("table#dnd-example tbody tr").mousedown(function() {
		  $("tr.selected").removeClass("selected"); // Deselect currently selected rows
		  $(this).addClass("selected");
		});
		
		// Make sure row is selected when span is clicked
		$("table#dnd-example tbody tr span").mousedown(function() {
			var node_id = $(this).parents("tr")[0].id.substr(5);
			var node_name = $(this).html()+' ('+node_id+')';
			$('#' + settingObj.form_action.category_tree.category_tree_input_field_id).val(node_id);
			$('#' + settingObj.form_action.category_tree.category_tree_input_html_id).html(node_name);
		  $($(this).parents("tr")[0]).trigger("mousedown");
		});
	}
}
/*********************************************CATEGORY TREE FUNCTION END*******************************************/

/**********************************DYNAMIC FIELD GENERATOR START****************************************************/
function commonDynamicFieldGenrator(field_obj, settingObj)
{
	if(field_obj.status == 'ok')
	{		
		var tab_counter =$("#" + settingObj.form_action.dynamic_field_generator.tab_id).children('ul:first').children('li').length;
		tab_counter++;	
		var tab_content = '';	
		
		for(var i = 0; i < field_obj.dynamic_fields.length; i++)
		{
			var tab_title = field_obj.dynamic_fields[i][settingObj.form_action.dynamic_field_generator.constants.DYNAMIC_FIELD_GROUP_TITLE];
			var total_obj = new Array();
			tab_content = '<fieldset class="fieldset">'+															
								'<legend class="legend">'+tab_title+'</legend>'+
								'<span class="top-go right-float"><a href="#topGo"><img src="application/modules/Administrator/layouts/scripts/images/tools/top.png" border="0" alt="'+settingObj.form_action.dynamic_field_generator.langueges.common_go_top_title+'" title="'+settingObj.form_action.dynamic_field_generator.langueges.common_go_top_title+'" /></a></span>'+
								'<div class="form">';
			var tb = 0;									
			for(var j = 0; j < field_obj.dynamic_fields[i][settingObj.form_action.dynamic_field_generator.constants.DYNAMIC_FIELD_GROUP_ELEMENTS].length; j++)
			{
				var element_obj		= field_obj.dynamic_fields[i][settingObj.form_action.dynamic_field_generator.constants.DYNAMIC_FIELD_GROUP_ELEMENTS][j];
				var element_type 	= element_obj.type;				
				if(element_obj.admin == '1')
				{		
					switch(element_type)
					{
						case 'file':
							var element = element_obj.element; 	
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							var file_type		= 	field_obj.form_info.attach_file_type;
							var file_type_arr	=	file_type.split(',');
							for(var f = 0; f < file_type_arr.length; f++)
							{
								file_type_arr[f] = '*.'+file_type_arr[f];
							}
							var file_format = file_type_arr.join(';');
							
								tab_content +='<div class="form-row">'+
												  '<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												  '<div class="field">'+
															'<div style="float:left"><input type="file" name="'+element_obj.name+'_upload" id="'+element_obj.name+'_upload" /><input type="hidden" name="'+element_obj.name+'" id="'+element_obj.id+'" class="'+element_obj.id+'_class empty_class" value="" /></div>'+
															info+
															'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+
													'</div>'+																																					
											'</div>'+
											'<div class="form-row">'+
												'<div class="label"></div>'+
												'<div class="field">'+
													'&nbsp;<span id="selected_file_'+element_obj.name+'"></span>'+
												'</div>'+
											'</div>';
									
									var setting_info = {};
									setting_info = field_obj.form_info;
									setting_info.table_name = 'forms';
									setting_info.primary_id_field = 'id';
									setting_info.primary_id_field_value = field_obj.form_info.id;
									setting_info.file_path_field 		= 'attach_file_path';
									setting_info.file_extension_field 	= 'attach_file_type';
									setting_info.file_max_size_field 	= 'attach_file_max_size';
									total_obj[tb] = { 'dynamicUpload' : { upload_field : element_obj.name+'_upload', upload_value_field : element_obj.name, setting_info: setting_info , language_array: languageArray(), save_url: settingObj.form_action.dynamic_field_generator.uploader_upload_url, remove_url: settingObj.form_action.dynamic_field_generator.uploader_remove_url }, 'calendar' : ''};
									tb++;										
							break;
						case 'text':
							var element = element_obj.element; 
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							var id_f 			=	element_obj.id;
							var id_arr			=	id_f.split('_');
							var name_arr		=	element_obj.name.split('_');
							if($.inArray(settingObj.form_action.dynamic_field_generator.constants.DATE, id_arr) > -1)
							{
								total_obj[tb] = { 'dynamicUpload' : '', 'calendar' : { 'id' : id_f }};
								tb++;
							}
							var sumbol = ($.inArray(settingObj.form_action.dynamic_field_generator.constants.PRICE, name_arr) > -1) ? '&nbsp;'+settingObj.form_action.currency_symbol : '';	
								tab_content +='<div class="form-row">'+
												'<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												'<div class="field">'+											 	 
													element+sumbol+
													info+	
													'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+													
												'</div>'+											
											'</div>';						
							break;
						case 'textarea':
							var element = element_obj.element; 
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							
								tab_content +='<div class="form-row">'+
												'<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												'<div class="field">'+											 	 
													element+
													info+	
													'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+													
												'</div>'+											
											'</div>';						
							break;
						case 'multicheckbox':
							var element = element_obj.element; 
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							
								tab_content +='<div class="form-row">'+
												'<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												'<div class="field">'+											 	 
													'<div class="autos-features property-features vacationrental-features tours-features">'+element+'</div>'+
													info+	
													'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+													
												'</div>'+
											'</div>';						
							break;
						case 'radio':
							var element = element_obj.element; 
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							
								tab_content +='<div class="form-row">'+
												'<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												'<div class="field">'+											 	 
													'<div class="property-features">'+element+'</div>'+
													info+	
													'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+													
												'</div>'+
											'</div>';						
							break;
						default:
							var element = element_obj.element; 
							var required_html 	= 	(element_obj.required) ? '<span class="required '+field_obj.form_info.star_class+'" style="'+field_obj.form_info.star_style+'">*</span>' : ''; 
							var info			=	(element_obj.info) ? '<div class="ui-widget ui-helper-clearfix info"><div class="ui-widget-header ui-corner-all ui-state-default"  title="'+element_obj.info+'"><p><span class="ui-icon ui-icon-info"></span></p></div></div>' : '';		
							
								tab_content +='<div class="form-row">'+
												'<div class="label '+field_obj.form_info.label_class+'" style="padding-left:5px;'+field_obj.form_info.label_style+'">'+element_obj.label+required_html+'</div>'+
												'<div class="field">'+											 	 
													element+
													info+	
													'<div class="input-errors" id="'+element_obj.name+'_err"></div>'+													
												'</div>'+
											'</div>';
							break;
					}
				}
			}
			tab_content += 		'</div></fieldset>';
			commonAddTabs(tab_title, tab_content, tab_counter, settingObj);	
			commonAfterAddFunction(total_obj, settingObj);	
			tab_counter++;			
		}
	}
}

function commonAddTabs(tab_title, tab_content, tab_counter, settingObj)
{	
	if(settingObj.form_action.dynamic_field_generator.has_tab)
	{
		$( "#" + settingObj.form_action.dynamic_field_generator.tab_id ).append( "<div id='" + settingObj.form_action.dynamic_field_generator.tab_id + "-"+tab_counter+"'>" + tab_content + "</div>" );
		$( "<li><a href='" + settingObj.tab_base_link + "#" + settingObj.form_action.dynamic_field_generator.tab_id + "-" + tab_counter + "' rel='" + settingObj.form_action.dynamic_field_generator.tab_id + "-" + tab_counter + "'>"+tab_title+"</a></li>" ).appendTo( "#" + settingObj.form_action.dynamic_field_generator.tab_id + " .ui-tabs-nav" );
		$( "#" + settingObj.form_action.dynamic_field_generator.tab_id ).tabs( "refresh" );
	}
	else
	{
		$('#' + settingObj.form_action.dynamic_field_generator.html_input_id).append(tab_content);
	}
			
}

function commonRemoveTabs(settingObj)
{	
	if(settingObj.form_action.dynamic_field_generator.has_tab)
	{
		$.each($( "#" + settingObj.form_action.dynamic_field_generator.tab_id ).find( ".ui-tabs-nav li" ), function(i, element){
			
			if($(element).children('a:first').attr('rel') != null && $(element).children('a:first').attr('rel') != '')
			{
				var panelId = $(element).children('a:first').attr('rel');
				$(this).remove();
				$( "#" + panelId ).remove();
			}
			$( "#" + settingObj.form_action.dynamic_field_generator.tab_id ).tabs( "refresh" );
		});
	}
	else
	{
		$( '#' + settingObj.form_action.dynamic_field_generator.html_input_id).html('');
	}
}

function commonAfterAddFunction(total_obj, settingObj)
{
	for(var tb = 0; tb < total_obj.length; tb++)
	{
		if(total_obj[tb]['dynamicUpload'])
		{
			dynamicUploader(total_obj[tb]['dynamicUpload']['upload_field'], total_obj[tb]['dynamicUpload']['upload_value_field'], total_obj[tb]['dynamicUpload']['setting_info'], total_obj[tb]['dynamicUpload']['language_array'], total_obj[tb]['dynamicUpload']['save_url'], total_obj[tb]['dynamicUpload']['remove_url'], true);
		}
		if(total_obj[tb]['calendar'])
		{
			commonCalendar(total_obj[tb]['calendar']['id'], settingObj, settingObj.calendar.calendar_include_time);
		}
	}
		
	$('#toc a').unbind('click');
	$('#toc a').click(function(){//$.scrollTo works EXACTLY the same way, but scrolls the whole screen
		$.scrollTo( this.hash, 1500, { easing:'swing' });
		$(this.hash).find('span.message').text( this.title );
		return false;
	});
	
	$('span.top-go a').unbind('click');
	$('span.top-go a').click(function(){//$.scrollTo works EXACTLY the same way, but scrolls the whole screen
		$.scrollTo( this.hash, 1500, { easing:'swing' });		
		return false;
	});
	
	settingObj.form_action.dynamic_field_generator.after_add_function();
}
/**********************************DYNAMIC FIELD GENERATOR END****************************************************/



/*************************************************AJAX BROWSER URL CHANGE START************************************/
function processAjaxData(obj){
	if(obj.posted_data && obj.posted_data.browser_url)
	{
		 //alert(obj.posted_data.browser_url);     
		 if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6){//Firefox
		 //Allow 
			window.history.pushState("","", obj.posted_data.browser_url);
		 }else if (navigator.userAgent.indexOf('Chrome') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15){//Chrome
		 //Allow
			window.history.pushState("","", obj.posted_data.browser_url);
		 }else if(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Version') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Version') + 8).split(' ')[0]) >= 5){//Safari
		 //Allow
			window.history.pushState("","", obj.posted_data.browser_url);
		 }else{
		 // Block
		 }
	}
 }
 /*************************************************AJAX BROWSER URL CHANGE END************************************/

/*************************************************JQUERY COMMON FUNCTION END***********************************************/

/*************************************************JQUERY TOOLTIP FUNCTION START***********************************************/

/*************************************************JQUERY TOOLTIP FUNCTION END***********************************************/

/*************************************************JQUERY FORM FUNCTION START***********************************************/

function commonGetFormData(form_id, hasTinyMCE)
{
	var fieldObj = {};
	var filename = '';
	var filevalue = '';
	$.each($('#'+form_id).serializeArray(), function(i, field) {	
		if(field.name.match(/\[\]$/))
		{
			var filearr = field.name.split('[]');
			filename = filearr[0];
			filevalue = $('#'+filename).val();
			if($('input[name="'+field.name+'"]').is(':checkbox'))
			{
				var val_arr = [];
				$('input[name="'+field.name+'"]:checkbox:checked').each(function(i){
				 	val_arr[i] = $(this).val();
				});
				filevalue = (val_arr[0] != null) ? val_arr.join(',') : null;					
			}
		}
		else
		{
			filename 	= 	field.name;
			filevalue 	= 	field.value;
		}
					
		fieldObj[filename] = ( hasTinyMCE === true && tinyMCE.get(filename) ) ? tinyMCE.get(filename).getContent() : filevalue;
		
	});
	return fieldObj;
}

function commonResetFormFields(settingObj)
{
	$( "#"+settingObj.form_action.form_id )[ 0 ].reset();
	$('input.empty_class').each(function(){
		$(this).val('');
	});	
	$.each($("input[type='file'],input[type='hidden']"),function(index, obj){
		try
		{
			var upload_file_name = $(obj).attr('name');	
			if(upload_file_name)
			{
				var upload_file_name_err = upload_file_name.replace('_upload', '');		
				$('#'+upload_file_name_err+'_err').html('');
				$('#selected_file_'+upload_file_name_err).html('&nbsp;');
			}
		}
		catch(e)
		{
			//alert(e.toSource());
		}
	});	
	
	if(settingObj.form_action.extra_field_for_reset)
	{
		$.each(settingObj.form_action.extra_field_for_reset,function(index, obj){ 
			switch(obj.field_type)
			{
				case 'html':
						$('#'+obj.field_id).html(obj.field_value);
					break;
				case 'val':
						$('#'+obj.field_id).val(obj.field_value);
					break;
			}
		});
	}
	
	if(settingObj.form_action.extra_function_for_reset)
	{
		settingObj.form_action.extra_function_for_reset();
	}
}

function commonAddFormError(key,errMsg)
{
	var err_id = key+'_err';
	var field_name = key;
	$('#'+field_name+'-input').addClass('ui-state-error');
	$('#'+field_name).addClass('ui-state-error');
	$('#'+err_id).append(errMsg);
}

function commonRemoveFormError(settingObj)
{
	$('#'+settingObj.form_action.common_msg_field_id).html('');
	
	var filename = '';
	var filevalue = '';		
	$.each($("#"+settingObj.form_action.form_id).serializeArray(), function(i, field) {	
			if(field.name.match(/\[\]$/))
			{
				var filearr = field.name.split('[]');
				filename = filearr[0];					
			}
			else if(field.name.match(/\[input\]$/))
			{
				var filearr = field.name.split('[input]');
				filename = filearr[0];					
			}
			else
			{
				filename 	= 	field.name;
			} 			
			$('#'+filename).removeClass('ui-state-error');	
			$('#'+filename+'-input').removeClass('ui-state-error');			
			$('#'+filename+'_err').html('');
			$('.input-errors').html('');							
	});				
}

function commonOpenLoaderDialog(settingObj)
{
	$('#'+settingObj.form_action.dialog_container_id).dialog({
		autoOpen: true,
		modal: true,
		show: 'explode',
		resizable: false,				
		open: function(event, ui)
		 {
			$('#'+settingObj.form_action.dialog_progressbar_id).progressbar({
				value:100			
			});							
		 }
	});
}

function commonCloseLoaderDialog(settingObj)
{
	$('#'+settingObj.form_action.dialog_container_id).dialog('option','hide','explode').dialog('close');
}

function commonRefreshCaptcha(json_arr, parent_tag)
{
	if(json_arr.captcha && json_arr.captcha.status && json_arr.captcha.status == 'ok')
	{
		var captcha_name = json_arr.captcha.captcha_name;
		$('input[name="'+captcha_name+'[id]"]').parents(parent_tag+':first').children('img:first').attr('src', json_arr.captcha.ImgUrl+json_arr.captcha.id+json_arr.captcha.Suffix);
		$('input[name="'+captcha_name+'[id]"]').val(json_arr.captcha.id);
		$('#'+captcha_name+'_err').html('');		
	}
}

function commonCalendar(calendar_id, settingObj, include_time)
{
	if(include_time == false)
	{
		commonJqueryDatePicker(calendar_id, settingObj);
	}
	else
	{
		kendoDateTimeCalendar($('#'+calendar_id), settingObj)
	}
}

function commonJqueryDatePicker(calendar_id, settingObj)
{
	var d_format = (settingObj.calendar && settingObj.calendar.dateFormat) ? settingObj.calendar.dateFormat : 'yy-mm-dd';
	$("#"+calendar_id).datepicker({
		showOn: 'button',
		buttonImage: settingObj.calendar.calendar_img_link,
		buttonImageOnly: true,
		monthNamesShort: settingObj.calendar.monthNamesShort,
		monthNames: settingObj.calendar.monthNames,
		dayNamesMin: settingObj.calendar.dayNamesMin,
		showAnim: 'slide',
		buttonText: settingObj.calendar.buttonText,
		dateFormat: d_format,
		autoSize:false,
		showButtonPanel:false,
		changeMonth: true,
		changeYear: true
	});	
}

/*************************************************JQUERY FORM FUNCTION END***********************************************/

/************************************************KENDO COMMON FUNCTION START***********************************************/

function commonGrid(settingObj)
{
	settingObj.pageSize = (settingObj.pageSize) ? settingObj.pageSize : 30;	
	var checkbox_id	= (settingObj.checkbox_id) ? settingObj.checkbox_id : '';
	var grid = $("#"+settingObj.grid_id).kendoGrid({
				  dataSource: {
					  type: "json",
					  serverPaging: true,
					  serverFiltering: true,
					  serverSorting: true,
					  pageSize: settingObj.pageSize,
					  page:	settingObj.page,
					  batch: settingObj.batch,
					  schema: {
						  data:	function(response){ 
							  //alert(response.toSource()); 
							  return response.data_result; 
						  },
						  total: 'total',
						  model: settingObj.model
					  },
					  error: function (e) {
						   //var json = jQuery.parseJSON(e.responseText);
						   commonMsgDialog(settingObj, e.xhr.responseText);
					  },
					  transport: {				  
						  read: {
							  type: "POST",
							  dataType: "json",								
							  url: settingObj.dest_url,
							  data : settingObj.search_data,
							  complete: function(e) {								 
								  var json = $.parseJSON(e.responseText);								
								  if(json.status == 'ok')
								  {
									 processAjaxData(json);
									 gridAction(settingObj);
									 if(settingObj.dataSource_transport_read_complete)
									 {
										 settingObj.dataSource_transport_read_complete(json);
									 }
								  }
								  else
								  {
									 commonMsgDialog(settingObj, json.msg);
								  }
							  }
						  },
                          update: settingObj.dataSource_transport_update,
						  destroy: (settingObj.dataSource_transport_destroy) ? settingObj.dataSource_transport_destroy : {},
						  create: settingObj.dataSource_transport_create,
						  parameterMap: settingObj.dataSource_transport_parameterMap
					  },
					  filter: (settingObj.dataSource_filter) ? settingObj.dataSource_filter : null
				  },
				  toolbar: settingObj.toolbar,
				  rowTemplate: settingObj.rowTemplate,
				  altRowTemplate: settingObj.altRowTemplate,
				  height: (settingObj.scrollable) ? ( (settingObj.height) ? settingObj.height :  840) : 'auto',
				  columnMenu: settingObj.columnMenu,
				  filterable: settingObj.filterable,
				  detailTemplate: (settingObj.detailTemplate) ? settingObj.detailTemplate : null,
				  detailInit: settingObj.detailInit,
				  dataBound: settingObj.dataBound,
				  pageable: {
					  refresh: true,
					  pageSizes: true,
					  buttonCount: 3,
					  pageSizes: [1,5,10,30, 100, 500, 1000],
					  messages: settingObj.messages
				  },
				  scrollable: settingObj.scrollable,
				  sortable: {
					  mode: "multiple",
					  allowUnsort: true
				  },
				  editable: settingObj.editable,
				  saveChanges: settingObj.saveChanges,
				  reorderable: true,
				  resizable: true,
				  columns: settingObj.column_fields
			  })
			  .delegate(".checkAll_btn"+checkbox_id, "click", function () {
					 var checkbox = $(this);
					 if(checkbox.attr('collapse') !== undefined)
					 {
						grid.data('kendoGrid').cancelChanges(); 
					 }
					 grid.data('kendoGrid').table.find("tr")
						.find("input.check_btn")
						.prop("checked", checkbox.is(":checked"))
						.trigger("change");
			 })
			 .delegate("tr", "mouseover", function () {				 	
					 $(this).children('td').addClass( 'highlighted' );
			 })
			 .delegate("tr", "mouseout", function () {				 	
					 $(this).children('td').removeClass( 'highlighted' );
			 });
			 
			  var kendoGrid = grid.data("kendoGrid");
			  var wrapper = (settingObj.scrollable) ? $('<div class="k-pager-wrap k-grid-pager pagerTop"/>').insertBefore(kendoGrid.element.children(".k-grid-header")) : $('<div class="k-pager-wrap k-grid-pager pagerTop"/>').insertBefore(kendoGrid.element.children("table"));
			  kendoGrid.pagerTop = new kendo.ui.Pager(wrapper, $.extend({}, kendoGrid.options.pageable, { dataSource: kendoGrid.dataSource }));
			  kendoGrid.element.height("").find(".pagerTop").css("border-width", "0 0 1px 0");
			  				
			  gridToolbarAction(settingObj);
			  kendoSearchAction(settingObj);
			   
			  $.each(settingObj.column_fields,function(index, obj){
				  if(obj.columnMenu === false)
				  {
					  $('#'+settingObj.grid_id+' .k-header-column-menu').eq(index).hide();
				  }
			  });
}

function detailInit(e, settingObj) 
{	
	settingObj.column_fields[0].headerTemplate = '<input type="checkbox" name="checkAll" id="checkAll_'+e.data.uid+'" class="checkAll_btn_'+e.data.uid+'"   />';
	var subGrid = $("<div/>").appendTo(e.detailCell).kendoGrid({
						dataSource: {
							type: "json",
							serverPaging: true,
							serverSorting: true,
							serverFiltering: true,
							pageSize: settingObj.pageSize,
					  		batch: settingObj.batch,	
							schema: {
								data: function(response){ 
									//alert(response.toSource()); 
									return response.data_result; 
								},
								total: 'total',
								model: settingObj.model
							},
							error: function (e) {				 
								 commonMsgDialog(settingObj, e.xhr.responseText);
							},		
							transport: {					
								read: {
									type: "POST",
									dataType: "json",
									url: settingObj.detailInit_action.detailInit_dest_url,
									data : settingObj.search_data,
									complete: function(e) {
										var json = $.parseJSON(e.responseText);								
										if(json.status == 'ok')
										{
											settingObj.detailInit_action['subGrid'] = subGrid;
										    gridAction(settingObj);
										}
										else
										{
										   commonMsgDialog(settingObj, json.msg);
										}
									}
								},
								update: settingObj.dataSource_transport_update,
								destroy: (settingObj.dataSource_transport_destroy) ? settingObj.dataSource_transport_destroy : {},
								create: settingObj.dataSource_transport_create,
								parameterMap: settingObj.dataSource_transport_parameterMap
							},						
							filter: { field: settingObj.detailInit_action.detailInit_filter_field_name, operator: "eq", value: e.data[settingObj.detailInit_action.detailInit_filter_field_id] }
						},
						toolbar: settingObj.detailInit_action.toolbar,
						height: (settingObj.scrollable) ? 400 : 'auto',
						columnMenu: settingObj.columnMenu,
						filterable: settingObj.filterable,
						detailTemplate: settingObj.detailTemplate,
						detailInit: settingObj.detailInit,
						dataBound: settingObj.dataBound,
						pageable: {
							refresh: true,
							pageSizes: true,
							buttonCount: 3,
							pageSizes: [1,5,10,30,100,500,1000],
							messages: settingObj.messages
						},
						scrollable: settingObj.scrollable,
						sortable: {
							mode: "multiple",
							allowUnsort: true
						},
						editable: settingObj.editable,
				  		saveChanges: settingObj.saveChanges,
						reorderable: true,
						resizable: true,
						columns: settingObj.column_fields
					})
					.delegate(".checkAll_btn_"+e.data.uid, "click", function () {
					 var checkbox = $(this);					
					 subGrid.data('kendoGrid').table.find("tr")
						.find("input.check_btn")
						.prop("checked", checkbox.is(":checked"))
						.trigger("change");
			 		});
	
	var kendoGrid = subGrid.data("kendoGrid");
	var wrapper = (settingObj.scrollable) ? $('<div class="k-pager-wrap k-grid-pager pagerTop"/>').insertBefore(kendoGrid.element.children(".k-grid-header")) : $('<div class="k-pager-wrap k-grid-pager pagerTop"/>').insertBefore(kendoGrid.element.children("table"));
	kendoGrid.pagerTop = new kendo.ui.Pager(wrapper, $.extend({}, kendoGrid.options.pageable, { dataSource: kendoGrid.dataSource }));
	kendoGrid.element.height("").find(".pagerTop").css("border-width", "0 0 1px 0");
		
	$.each(settingObj.column_fields,function(index, obj){		
		if(obj.columnMenu === false)
		{
			subGrid.find('.k-header-column-menu').eq(index).hide();
		}
	});
	
	gridToolbarAction(settingObj);
}

function gridAction(settingObj)
{
	/*********************************************************************MULTI ACTION START****************************************************/
	commonMultipleAction(settingObj);	
	/*********************************************************************MULTI ACTION END******************************************************/
		
	/*********************************************************************PUBLISH START*********************************************************/
	$('a.publish_btn').unbind('click');	
	$('a.publish_btn').click(function(){
		var self = this;
		if(settingObj.common_action.permission_arr.publish_enable == '1')
		{
			var arr = $(self).attr('rel').split('_');	
			var dataObj = {};		
			$.each(settingObj.common_action.publish_dest_data_field, function(key, value){
				dataObj[value] = (arr[key]) ? arr[key] : '';
			});
			if(settingObj.common_action.publish_dest_data_field[3] && arr[2] == 'unpublish' )
			{
				var inputHtml = inputActivation();
				$("#add-date-confirm").html(inputHtml).dialog({
					resizable: false,
					width:450,
					height:'auto',
					modal: true,
					show: 'explode',
					hide: 'explode',
					buttons:[{
						text : settingObj.messages.common_save_btn_text, 
						click: function() {	
								dataObj[settingObj.common_action.publish_dest_data_field[3]] = ($('#'+settingObj.common_action.publish_dest_data_field[3]).is(':checked')) ? '1' : '0';
								dataObj[settingObj.common_action.publish_dest_data_field[4]] = $('#'+settingObj.common_action.publish_dest_data_field[4]).val();
								dataObj[settingObj.common_action.publish_dest_data_field[5]] = $('#'+settingObj.common_action.publish_dest_data_field[5]).val();
								
								if((dataObj[settingObj.common_action.publish_dest_data_field[4]] != '' && dataObj[settingObj.common_action.publish_dest_data_field[5]] != '') || (dataObj[settingObj.common_action.publish_dest_data_field[3]] == '1'))
								{
									$(this).dialog('close');
									$.ajax({
											 url: settingObj.common_action.publish_dest_url,
											 type: 'POST',
											 data: dataObj,
											 beforeSend: function(){						
												$(self).html('<img src="'+settingObj.common_action.ajax_loader_link+'" border="0" height="19" />');
											 },
											 success: function(response) 
											 {
												//alert(response);
												var json_arr = eval("("+response+")");
												if(json_arr.status == 'ok')
												{
													// get a reference to the grid widget
													var grid = $("#"+settingObj.grid_id).data("kendoGrid");
													var row = $(self).closest("tr");	
													if(grid.dataItem(row))
													{						
														grid.dataItem(row).active = json_arr.active;
													}
													
													if(json_arr.active == '1')
													{
														$(self).html('<img src="'+settingObj.common_action.publish_active_icon_link+'" border="0" title="'+settingObj.messages.common_unpublish_title+'" alt="'+settingObj.messages.common_unpublish_title+'" />').attr('rel',arr[0]+"_"+arr[1]+"_unpublish");
													}
													else
													{
														$(self).html('<img src="'+settingObj.common_action.publish_deactive_icon_link+'" border="0" title="'+settingObj.messages.common_publish_title+'" alt="'+settingObj.messages.common_publish_title+'" />').attr('rel',arr[0]+"_"+arr[1]+"_publish");
													}
												}
												else
												{
													commonMsgDialog(settingObj, json_arr.msg);
												}
											 },
											 error: function(xhr, status, error){				
												var msg = "Error! " + xhr.status + " " + error;
												commonMsgDialog(settingObj, msg);
											 }
										});							
								}
								else
								{
									$('#actionMessage').html(errMsgDesign(settingObj.messages.common_field_must_not_empty));
								}															
							}
					},
					{
						text :	settingObj.messages.common_cancel,
						click: 	function() {
									$(this).dialog('close');
							}
					}]
				});
				var calendar_include_time = (settingObj.calendar && settingObj.calendar.calendar_include_time) ? settingObj.calendar.calendar_include_time : false;
				commonCalendar(settingObj.common_action.publish_dest_data_field[4], settingObj, calendar_include_time);
				commonCalendar(settingObj.common_action.publish_dest_data_field[5], settingObj, calendar_include_time);
			}
			else
			{
				$.ajax({
					 url: settingObj.common_action.publish_dest_url,
					 type: 'POST',
					 data: dataObj,
					 beforeSend: function(){						
						$(self).html('<img src="'+settingObj.common_action.ajax_loader_link+'" border="0" height="19" />');
					 },
					 success: function(response) 
					 {
						//alert(response);
						var json_arr = eval("("+response+")");
						if(json_arr.status == 'ok')
						{
							// get a reference to the grid widget
							var grid = $("#"+settingObj.grid_id).data("kendoGrid");
							var row = $(self).closest("tr");	
							if(grid.dataItem(row))
							{						
								grid.dataItem(row).active = json_arr.active;
							}
							
							if(json_arr.active == '1')
							{
								$(self).html('<img src="'+settingObj.common_action.publish_active_icon_link+'" border="0" title="'+settingObj.messages.common_unpublish_title+'" alt="'+settingObj.messages.common_unpublish_title+'" />').attr('rel',arr[0]+"_"+arr[1]+"_unpublish");
							}
							else
							{
								$(self).html('<img src="'+settingObj.common_action.publish_deactive_icon_link+'" border="0" title="'+settingObj.messages.common_publish_title+'" alt="'+settingObj.messages.common_publish_title+'" />').attr('rel',arr[0]+"_"+arr[1]+"_publish");
							}
						}
						else
						{
							commonMsgDialog(settingObj, json_arr.msg);
						}
					 },
					 error: function(xhr, status, error){				
						var msg = "Error! " + xhr.status + " " + error;
						commonMsgDialog(settingObj, msg);
					 }
				});	
			}
		}
		else
		{
			var msg = settingObj.messages.common_publish_perm;
			commonMsgDialog(settingObj, msg);
		}
	});
	/*********************************************************************PUBLISH END***********************************************************/
	
	/*********************************************************************DELETE START**********************************************************/
	var delete_btn	=	(settingObj.common_action && settingObj.common_action.delete_dest_btn) ? settingObj.common_action.delete_dest_btn : 'a.delete_btn';
	$(delete_btn).unbind('click');	
	$(delete_btn).click(function() {
		var self = this;
		commonConfirmDialog(settingObj, 'deleteSingle', self);
	});
	/********************************************************************DELETE END*************************************************************/
	
	/*********************************************************************ORDER UP START********************************************************/
	$('a.up_btn').unbind('click');
	$('a.up_btn').click(function() {
		var self = this;
		var dataObj = {};					
		var arr = $(self).attr('rel').split('_');		
		var prev_order = $(self).parents("td:first").children("input:nth-child(1)").val();	
			dataObj[settingObj.order_action.order_dest_data_field[0]] =	arr[0];
			dataObj[settingObj.order_action.order_dest_data_field[1]] =	prev_order;
		$.ajax({
				 url: settingObj.order_action.order_up_dest_url,
				 type: 'POST',
				 data: dataObj,
				 beforeSend: function(){
					$(self).html('<img src="'+settingObj.order_action.order_up_ajax_loader_link+'" border="0" />');
					kendo.ui.progress($("#"+settingObj.grid_id), true);
				 },
				 success: function(response) 
				 {
					kendo.ui.progress($("#"+settingObj.grid_id), false);
				 	// alert(response);
					var json_arr = eval("("+response+")");
					if(json_arr.status == 'ok')
					{
						$(self).parents("td:first").children("input:nth-child(1)").val((prev_order-1));
						if(json_arr.id_arr != '' && json_arr.id_arr != null)
						{
							for(var i = 0; i < json_arr.id_arr.length; i++)
							{
								for(var j=0;j < $('a.up_btn').length ;j++)
								{
									var arrUp = $('a.up_btn:eq('+j+')').attr('rel').split('_');									
									if(arrUp[0] == json_arr.id_arr[i])	
									{										
										$('a.up_btn:eq('+j+')').parents("td:first").children("input:nth-child(1)").val(prev_order);
									}					
								}
							}							
						}						
					}
					else
					{
						commonMsgDialog(settingObj, json_arr.msg);
					}
					$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/up-arrow.gif" border="0" />');
				 },
				 error: function(xhr, status, error){	
				 	kendo.ui.progress($("#"+settingObj.grid_id), false);			
					var msg = "Error! " + xhr.status + " " + error;
					commonMsgDialog(settingObj, msg);
				 }
			});
	});	
	/*********************************************************************ORDER UP END**********************************************************/
		
	/*********************************************************************ORDER DOWN START******************************************************/
	$('a.down_btn').unbind('click');
	$('a.down_btn').click(function() {
		var self = this;
		var dataObj = {};				
		var arr = $(self).attr('rel').split('_');		
		var prev_order = $(self).parents("td:first").children("input:nth-child(1)").val();		
			dataObj[settingObj.order_action.order_dest_data_field[0]] =	arr[0];
			dataObj[settingObj.order_action.order_dest_data_field[1]] =	prev_order;
		$.ajax({
				 url: settingObj.order_action.order_down_dest_url,
				 type: 'POST',
				 data: dataObj,
				 beforeSend: function(){
					$(self).html('<img src="'+settingObj.order_action.order_down_ajax_loader_link+'" border="0" />');
					kendo.ui.progress($("#"+settingObj.grid_id), true);
				 },
				 success: function(response) 
				 {
					kendo.ui.progress($("#"+settingObj.grid_id), false);
				 	// alert(response);
					var json_arr = eval("("+response+")");
					if(json_arr.status == 'ok')
					{
						var new_order = parseInt(prev_order) + 1;
						$(self).parents("td:first").children("input:nth-child(1)").val(new_order);
						if(json_arr.id_arr != '' && json_arr.id_arr != null)
						{
							for(var i = 0; i < json_arr.id_arr.length; i++)
							{
								for(var j=0;j < $('a.up_btn').length ;j++)
								{
									var arrUp = $('a.up_btn:eq('+j+')').attr('rel').split('_');									
									if(arrUp[0] == json_arr.id_arr[i])	
									{										
										$('a.up_btn:eq('+j+')').parents("td:first").children("input:nth-child(1)").val(prev_order);
									}					
								}
							}							
						}						
					}
					else
					{
						commonMsgDialog(settingObj, json_arr.msg);
					}
					$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/down-arrow.gif"  border="0" />');
				 },
				 error: function(xhr, status, error){	
				 	kendo.ui.progress($("#"+settingObj.grid_id), false);			
					var msg = "Error! " + xhr.status + " " + error;
					commonMsgDialog(settingObj, msg);
				 }
			});
	});
	/*********************************************************************ORDER DOWN END********************************************************/
	
	/*********************************************************************DELETE ALL START******************************************************/
	$('a.all_order_btn').unbind('click');
	$('a.all_order_btn').click(function() {
		var self = this;
		var order_str = '';
		var id_str = '';
		var dataObj = {};		
			$.each($('input.order_text'), function(index, obj){
				order_str +=  (index == 0) ? $(obj).val() : ',' + $(obj).val();
				id_str += (index == 0) ? $(obj).parents("td:first").children("a:first").attr('rel') : ',' + $(obj).parents("td:first").children("a:first").attr('rel');
			});			
			dataObj[settingObj.order_action.order_all_dest_data_field[0]] =	id_str;
			dataObj[settingObj.order_action.order_all_dest_data_field[1]] =	 order_str;
			
		$.ajax({
				 url: settingObj.order_action.order_all_dest_url,
				 type: 'POST',
				 data: dataObj,
				 beforeSend: function(){					
					$(self).html('<img src="'+settingObj.order_action.order_all_ajax_loader_link+'" border="0" />');
					kendo.ui.progress($("#"+settingObj.grid_id), true);
				 },
				 success: function(response) 
				 {
					kendo.ui.progress($("#"+settingObj.grid_id), false);
				 	//alert(response);
					var json_arr = eval("("+response+")");
					commonMsgDialog(settingObj, json_arr.msg);
					$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/save.png" border="0" />');				 	
				 },
				 error: function(xhr, status, error){
					kendo.ui.progress($("#"+settingObj.grid_id), false);				
					var msg = "Error! " + xhr.status + " " + error;
					commonMsgDialog(settingObj, msg);
					$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/save.png" border="0" />');	
				 }
		});
	});
	/*********************************************************************DELETE ALL END********************************************************/
	
	/*********************************************************************DEFAULT START*********************************************************/
	$('a.dafault_btn').unbind('click');
	$('a.dafault_btn').click(function() {
		var self = this;				
		var arr = $(self).attr('rel').split('_');
		var hrf = $(self).attr('href');
		var dataObj = {};		
			$.each(settingObj.common_action.default_dest_data_field, function(key, value){
				dataObj[value] = arr[key];
			});
			
		if(hrf != null)
		{			
			$.ajax({
				 url: settingObj.common_action.default_dest_url,
				 type: 'POST',
				 data: dataObj,
				 beforeSend: function(){
					$(self).html('<img src="'+settingObj.common_action.ajax_loader_link+'" height="19" border="0" />');
					kendo.ui.progress($("#"+settingObj.grid_id), true);
				 },
				 success: function(response) 
				 {
					kendo.ui.progress($("#"+settingObj.grid_id), false);
					var json_arr = eval("("+response+")");
					if(json_arr.status == 'ok')
					{						
						$('a.dafault_btn').html('<img src="'+settingObj.common_action.default_deactive_icon_link+'" title="'+settingObj.messages.menu_default_title+'" alt="'+settingObj.messages.menu_default_title+'" border="0" />');
						$('a.dafault_btn').attr('href','javascript: void(0)');						
						
						$(self).html('<img src="'+settingObj.common_action.default_active_icon_link+'" title="'+settingObj.messages.menu_defaulted_title+'" alt="'+settingObj.messages.menu_defaulted_title+'" border="0" />');
						$(self).removeAttr("href");					
					}
					else
					{
						commonMsgDialog(settingObj, json_arr.msg);
						$(self).html('<img src="'+settingObj.common_action.default_deactive_icon_link+'" title="'+settingObj.messages.menu_default_title+'" alt="'+settingObj.messages.menu_default_title+'" border="0" />');
					}
				 },
				 error: function(xhr, status, error){	
				 	kendo.ui.progress($("#"+settingObj.grid_id), false);			
					var msg = "Error! " + xhr.status + " " + error;
					commonMsgDialog(settingObj, msg);
				 }		
			});
		}
	});
	/*********************************************************************DEFAULT END***********************************************************/
}

function gridToolbarAction(settingObj)
{
	/*********************************************************************MULTI ACTION START************************************************************/
	commonMultipleToolbarAction(settingObj);	
	/*********************************************************************MULTI ACTION END**************************************************************/
	
	/*********************************************************************PUBLISH MULTIPLE START*********************************************************/
	$('a.publish_all').unbind('click');
	$('a.publish_all').click(function() {
		var self = this; 
		var bigrel = $(self).attr('rel'); 
		if($('input.check_btn:checked').length > 0)
		{
			var id_str = '';			
			$.each($('input.check_btn:checked'), function(index, obj){
				id_str +=  (index == 0) ? $(obj).val() : ',' + $(obj).val();
			});		
			
			$.ajax({
					url: settingObj.common_action.publish_multi_dest_url,
				 	type: 'POST',
				 	data: { id_st: id_str, paction: bigrel},
					beforeSend: function(){
						$(self).html(settingObj.common_action.toolbar_button_loader);
						kendo.ui.progress($("#"+settingObj.grid_id), true);
					 },
					success: function(response) 
				 	{
						//alert(response);
						var json_arr = eval("("+response+")");
						if(json_arr.status == 'ok')
						{
							// get a reference to the grid widget
							var grid = $("#"+settingObj.grid_id).data("kendoGrid");						
							$.each($('input.check_btn:checked'), function(index, obj){									
									var row 					= 	$(obj).closest("tr");
									var rel 					= 	$(obj).parents('tr:first').find('a.publish_btn').attr('rel');
									var rel_arr 				= 	rel.split('_');
									var new_rel 				= 	(bigrel=='publish') ? rel_arr[0]+'_'+rel_arr[1]+'_unpublish' : rel_arr[0]+'_'+rel_arr[1]+'_publish';
									var publish_icon_link		= 	(bigrel=='publish') ? settingObj.common_action.publish_active_icon_link : settingObj.common_action.publish_deactive_icon_link;
									var	publish_icon_title 		= 	(bigrel=='publish') ? settingObj.messages.common_unpublish_title : settingObj.messages.common_publish_title;
									if(grid.dataItem(row))
									{
										grid.dataItem(row).active 	= 	(bigrel=='publish') ? '1' : '0';
									}
									$(obj).parents('tr:first').find('a.publish_btn').attr('rel', new_rel);
									$(obj).parents('tr:first').find('a.publish_btn').html('<img src="'+publish_icon_link+'"  border="0" title="'+publish_icon_title+'" alt="'+publish_icon_title+'" />');
								});
						}
						else
						{
							commonMsgDialog(settingObj,json_arr.msg);
						}	
						if(bigrel=='publish')
						{	
							$(self).html('<span class="icon publish">'+settingObj.messages.common_publish_selected+'</span>');
						}
						else
						{
							$(self).html('<span class="icon unpublish">'+settingObj.messages.common_unpublish_selected+'</span>');
						}
						kendo.ui.progress($("#"+settingObj.grid_id), false);
					},
					error: function(xhr, status, error){
						kendo.ui.progress($("#"+settingObj.grid_id), false);				
						var msg = "Error! " + xhr.status + " " + error;
						commonMsgDialog(settingObj, msg);
						if(bigrel=='publish')
						{	
							$(self).html('<span class="icon publish">'+settingObj.messages.common_publish_selected+'</span>');
						}
						else
						{
							$(self).html('<span class="icon unpublish">'+settingObj.messages.common_unpublish_selected+'</span>');
						}
					}
			});			
		}
		else
		{	
			var msg = settingObj.messages.common_selected_err;
			commonMsgDialog(settingObj, msg);
		}
	});
	/*********************************************************************PUBLISH MULTIPLE END***********************************************************/

	/*********************************************************************DELETE MULTIPLE START**********************************************************/
	var delete_multi_btn	=	(settingObj.common_action && settingObj.common_action.delete_multi_dest_btn) ? settingObj.common_action.delete_multi_dest_btn : 'a.delete_all';
	$(delete_multi_btn).unbind('click');
	$(delete_multi_btn).click(function() {
		var self = this;
		if($('input.check_btn:checked').length > 0)
		{
			commonConfirmDialog(settingObj, 'deleteMultiple', self);
		}
		else
		{
			var msg = settingObj.messages.common_selected_err;
			commonMsgDialog(settingObj, msg);
		}
	});
	/********************************************************************DELETE MULTIPLE END*************************************************************/
	
	/*********************************************************************DYNAMIC LIST ACTION START******************************************************/
	commonDynamicListAction(settingObj);
	/*********************************************************************DYNAMIC LIST ACTION END******************************************************/
}

function toggleKendoGridRow(grid, settingObj)
{
	if(settingObj.toggle_btn)
	{
		$.each(settingObj.toggle_btn, function(key, btn){			
			$(btn).unbind('click');
			$(btn).click(function(){
					var self = this;
					var row  = $(self).parents("tr:first");			
					if(row.has(".k-minus").length) 
					{
						grid.collapseRow(row);
					} 
					else 
					{
						grid.expandRow(row);
					}
				 });
		});
	}
}

function commonMsgDialog(settingObj, msg)
{
	$('#'+settingObj.messages.common_msg_dialog_id).html(msg).dialog({
		autoOpen: true,
		modal: true,
		show: 'explode',
		resizable: true,				
		buttons: [{ text: settingObj.messages.common_ok, click: function() { $(this).dialog('option', 'hide', 'explode').dialog("close"); } } ],
		open: function(event, ui)
			 {
				setTimeout(function() 
				{									
					if($('#' + event.target.id).dialog('isOpen'))
					{
						$('#' + event.target.id).dialog('option', 'hide', 'explode').dialog('close');										
					}
				}, 10000);
			  }
	});
}

function commonConfirmDialog(settingObj, action, self)
{
	$('#'+settingObj.messages.common_confirn_dialog_id).html(settingObj.messages.common_delete_confirm).dialog({
			resizable: true,
			width:400,
			height:'auto',
			modal: true,
			show: 'explode',
			hide: 'explode',
			buttons: [{
						text : settingObj.messages.common_delete_selected, 
						click: function() {	
								switch(action)
								{
									case 'deleteSingle':
										deleteSingle(settingObj, self);
									break;
									case 'deleteMultiple':
										deleteMultiple(settingObj, self);
									break;
								}
								$(this).dialog('close');															
							}
					},
					{
						text :	settingObj.messages.common_cancel,
						click: 	function() {
									$(this).dialog('close');
							}
					}]
		});
}

function deleteSingle(settingObj, self)
{
	var arr = $(self).attr('rel').split('_');
	var dataObj = {};		
	$.each(settingObj.common_action.delete_dest_data_field, function(key, value){
		dataObj[value] = arr[key];
	});	
	
	$.ajax({
		 url:	settingObj.common_action.delete_dest_url,
		 type: 'POST',
		 data: dataObj,
		 beforeSend: function(){
				$(self).html('<img src="'+settingObj.common_action.ajax_loader_link+'" height="16" border="0" />');
			 },
		 success: function(response) 
		 {
			//alert(response);
			var json_arr = eval("("+response+")");
			if(json_arr.status == 'ok')
			{
				// get a reference to the grid widget
				var grid = (settingObj.detailInit_action && settingObj.detailInit_action.subGrid) ? settingObj.detailInit_action.subGrid.data("kendoGrid") : $("#"+settingObj.grid_id).data("kendoGrid");
				// remove first table row
				var dataItem = grid.dataItem($(self).parents('tr:first'));				
				grid.removeRow($(self).parents('tr:first'));
				grid.dataSource.remove(dataItem);
				
				gridAction(settingObj);
			}
			else
			{
				commonMsgDialog(settingObj, json_arr.msg);
				$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/delete.png" title="'+settingObj.messages.common_delete_title+'" alt=="'+settingObj.messages.common_delete_title+'" border="0" />');
			}
		 },
		error: function(xhr, status, error){				
			var msg = "Error! " + xhr.status + " " + error;
			commonMsgDialog(settingObj, msg);
			$(self).html('<img src="application/modules/Administrator/layouts/scripts/images/tools/delete.png" title="'+settingObj.messages.common_delete_title+'" alt=="'+settingObj.messages.common_delete_title+'" border="0" />');
		}
	});
}

function deleteMultiple(settingObj, self)
{
	var id_str = '';	
	var gridElement = (settingObj.detailInit_action && settingObj.detailInit_action.subGrid) ? settingObj.detailInit_action.subGrid : $("#"+settingObj.grid_id);
	$.each($('input.check_btn:checked'), function(index, obj){
		  id_str +=  (index == 0) ? $(obj).val() : ',' + $(obj).val();
	  });		
	
	$.ajax({
			url: settingObj.common_action.delete_multi_dest_url,
			type: 'POST',
			data: { id_st: id_str},
			beforeSend: function(){
				if(!settingObj.detailInit_action || !settingObj.detailInit_action.subGrid)
				{
					$(self).html(settingObj.common_action.toolbar_button_loader);
				}
				kendo.ui.progress(gridElement, true);				
			 },
			success: function(response) 
			{
				kendo.ui.progress(gridElement, false);				
				//alert(response);
				var json_arr = eval("("+response+")");
				if(json_arr.status == 'ok')
				{
					// get a reference to the grid widget
					var grid = (settingObj.detailInit_action && settingObj.detailInit_action.subGrid) ? settingObj.detailInit_action.subGrid.data("kendoGrid") : $("#"+settingObj.grid_id).data("kendoGrid");
					$.each($('input.check_btn:checked'), function(index, obj){	
						var dataItem = grid.dataItem($(obj).parents('tr:first'));						
						if(json_arr.non_del_arr)
						{
							if(!checkNonDeletedData($(obj).val(),json_arr.non_del_arr))
							{
								// remove first table row
								grid.removeRow($(obj).parents('tr:first'));
								//grid.dataSource.remove(dataItem);
							}
						}
						else
						{
							// remove first table row
							grid.removeRow($(obj).parents('tr:first'));
							//grid.dataSource.remove(dataItem);
						}
					});
					gridAction(settingObj);
				}
				else
				{							
					commonMsgDialog(settingObj, json_arr.msg);
				}
				if(!settingObj.detailInit_action || !settingObj.detailInit_action.subGrid)
				{
					$(self).html('<span class="icon delete">'+settingObj.messages.common_delete_selected+'</span>');
				}
			},
			error: function(xhr, status, error){
				kendo.ui.progress(gridElement, false);				
				var msg = "Error! " + xhr.status + " " + error;
				commonMsgDialog(settingObj, msg);
			}
	});	
}

function commonMultipleAction(settingObj)
{
	if(settingObj.common_action.multi_action)
	{
		$.each(settingObj.common_action.multi_action, function(i, obj){
			$(obj.multi_action_caller_id).unbind('click');
			$(obj.multi_action_caller_id).click(function(){
					var self = this;
					if(settingObj.common_action.permission_arr[obj.multi_action_data_permission_field[0]] == '1')
					{					
						var arr = $(self).attr('rel').split('_');
						var sendData = {};
						$.each(obj.multi_action_dest_data_field, function(key, value){
							sendData[value] = arr[key];
						});						
						$.ajax({
							 url: obj.multi_action_dest_url,
							 type: 'POST',
							 data: sendData,
							 beforeSend: function(){
								 $(self).html('<img src="'+settingObj.common_action.ajax_loader_link+'" border="0" height="16" />');
							 },
							 success: function(response) 
							 {
								//alert(response);
								var json_arr = eval("("+response+")");
								if(json_arr.status == 'ok')
								{
									var result_value = json_arr[obj.multi_action_data_return_field[0]];
									$(self).html('<img src="'+obj.multi_action_dest_data_paction[result_value].icon_link+'" border="0" title="'+obj.multi_action_dest_data_paction[result_value].title+'" alt="'+obj.multi_action_dest_data_paction[result_value].title+'" />').attr('rel',arr[0]+"_"+arr[1]+"_"+obj.multi_action_dest_data_paction[result_value].paction);
								}
								else
								{
									commonMsgDialog(settingObj, json_arr.msg);
								}
							 },
							error: function(xhr, status, error){				
								var msg = "Error! " + xhr.status + " " + error;
								commonMsgDialog(settingObj, msg);
							}
						});
					}
					else
					{
						var msg = settingObj.messages.common_perm_err;
						commonMsgDialog(settingObj, msg);
					}
				});
		});
	}
}

function commonMultipleToolbarAction(settingObj)
{	
	if(settingObj.common_action.multi_toolbar_action)
	{
		$.each(settingObj.common_action.multi_toolbar_action, function(i, obj){
			$(obj.multi_toolbar_action_caller_id).unbind('click');
			$(obj.multi_toolbar_action_caller_id).click(function(){			
				if(settingObj.common_action.permission_arr[obj.multi_toolbar_action_data_permission_field[0]] == '1')
				{
					var self = this;
					var self_html = $(self).html();
					var bigrel = $(self).attr('rel');
					if($('input.check_btn:checked').length > 0)
					{
						var id_str = '';			
						$.each($('input.check_btn:checked'), function(index, obj){
							id_str +=  (index == 0) ? $(obj).val() : ',' + $(obj).val();
						});
						$.ajax({
								url: obj.multi_toolbar_action_dest_url,
								type: 'POST',
								data: { id_st: id_str, paction: bigrel},
								beforeSend: function(){
									$(self).html(settingObj.common_action.toolbar_button_loader);
									kendo.ui.progress($("#"+settingObj.grid_id), true);
								 },
								success: function(response) 
								{
									kendo.ui.progress($("#"+settingObj.grid_id), false);
									//alert(response);
									var json_arr = eval("("+response+")");
									if(json_arr.status == 'ok')
									{
										$.each($('input.check_btn:checked'), function(i, checkObj){
											var result_value = json_arr[obj.multi_toolbar_action_data_return_field[0]];
											$.each(obj.multi_toolbar_action_dest_data_paction[result_value].cols, function(col_key, col_arr){
													var action_path = (col_arr.children) ? $(checkObj).parents("tr:first").children("td:nth-child("+col_arr.num+")").find(col_arr.children) : $(checkObj).parents("tr:first").children("td:nth-child("+col_arr.num+")");
													var input_html = (col_arr.icon_link) ? '<img src="'+col_arr.icon_link+'" border="0" title="'+col_arr.title+'" alt="'+col_arr.title+'" />' : col_arr.title;
													action_path.html(input_html);	
													if(col_arr.action){
															col_arr.action(checkObj, col_arr);
														}												
												});											
										});
									}
									else
									{
										commonMsgDialog(settingObj, json_arr.msg);
									}									
									$(self).html(self_html);										
								},
								error: function(xhr, status, error){
									kendo.ui.progress($("#"+settingObj.grid_id), false);
									$(self).html(self_html);						
									var msg = "Error! " + xhr.status + " " + error;
									commonMsgDialog(settingObj, msg);
								}
						});		
					}
					else
					{
						var msg = settingObj.messages.common_selected_err;
						commonMsgDialog(settingObj, msg);
					}
				}
				else
				{
					var msg = settingObj.messages.common_perm_err;
					commonMsgDialog(settingObj, msg);
				}
			});
		});
	}
}

function checkNonDeletedData(id,id_arr)
{
	var tmp = false;
	for(var i = 0;i < id_arr.length;i++)
	{
		if(id_arr[i] == id)
		{
			tmp = true;
			break;
		}
	}
	return tmp;
}

function commonDynamicListAction(settingObj)
{
	if(settingObj.dynamic_list_action)
	{
		$.each(settingObj.dynamic_list_action, function(index, listObj){
				if(listObj.list_id)
				{
					commonDynamicList(listObj);
				}
			});
	}
}

function commonDynamicList(listObj)
{
	if(listObj.sub_list)
	{
		$('#'+listObj.list_id).change(function(){
				var self = this;
				if($(self).val() == 'any' || $(self).val() == '')
				{
					$.each(listObj.sub_list.list_loader_info.on_loading, function(key, obj){
							$('#'+obj.id).html('<option value="any">'+obj.normal_lang+'</option>');
						});
				}
				else
				{				
					$.ajax({
						  url: listObj.sub_list.list_dest_url,
						  type: 'POST',
						  data: { id: $(self).val() },
						  beforeSend: function(){	
						  			$.each(listObj.sub_list.list_loader_info.on_loading, function(key, obj){
										$('#'+obj.id).html('<option value="any">'+obj.loading_lang+'</option>');
									});					
									$('#'+listObj.sub_list.list_loader_info.loader_id).html('<img src="'+listObj.sub_list.list_loader_info.loader_img+'" border="0" height="16" />');	
								 },
						  success: function(response){
							//alert(response);
							var json_arr = eval("("+response+")");
							var option = '<option value="any">'+listObj.sub_list.list_any_value+'</option>';				
							if(json_arr.status == 'ok')
							{
								if(json_arr[listObj.sub_list.list_return_field])
								{
									$.each(json_arr[listObj.sub_list.list_return_field], function(key, arr){
											option += '<option value="'+arr[listObj.sub_list.list_input_value_field]+'" >'+arr[listObj.sub_list.list_input_option_field]+'</option>';
										});
								}				
								
								$('#'+listObj.sub_list.list_id).html(option);
							}
							else
							{
								$('#'+listObj.sub_list.list_id).html('<option value="any">'+json_arr.msg+'</option>');
							}
							$('#'+listObj.sub_list.list_loader_info.loader_id).html('');
						  },
						  error: function(xhr, status, error){							  
							  var msg = "Error! " + xhr.status + " " + error;
							  var msgSettingObj = { messages : { common_msg_dialog_id : 'dialog_msg'}};
							  commonMsgDialog(msgSettingObj, msg);
						  }
					});
				}
			});
		commonDynamicList(listObj.sub_list)
	}
}

function commonFieldToggle(settingObj)
{
	if(settingObj.form_action.field_toggle_action)
	{
		$.each(settingObj.form_action.field_toggle_action, function(key, obj){				
				$('input[name="'+obj.from_field_id+'"]').click(function(){					
						var self = this; 		
						if($(self).val() == obj.active_value )
						{
							$('#'+obj.to_field_id).removeAttr('disabled');
						}
						else
						{
							$('#'+obj.to_field_id).attr('disabled', 'disabled');
						}
					});
			});
	}
}

function kendoDateTimeCalendar(element, settingObj)
{
	var d_format =  (settingObj.calendar && settingObj.calendar.dateTimeFormat) ? settingObj.calendar.dateTimeFormat : "yyyy/MM/dd hh:mm:ss tt";
	element.kendoDateTimePicker({
				culture: settingObj.calendar.culture,
				format: d_format,
				timeFormat: "HH:mm:ss",
				parseFormats: ["yy-mm-dd", "HH:mm:ss"],
				value: settingObj.calendar.value
			});
}

function kendoSearchAction(settingObj)
{
	if(settingObj.search_action)
	{
		$('a.'+settingObj.search_action.search_form_btn).click(function(){		
			var formData = commonGetFormData(settingObj.search_action.search_form_id, settingObj.search_action.hasTinyMCE);
			var stringObj = {};
			var filters = [];
			var i = 0;
			$.each(formData, function(key,value){
				
				if($.trim(value) != "" && value.toLowerCase() != "any" && key != 'search_by')
				{
					switch(key)
					{
						case 'SearchKey':	
								if(formData.search_by != "" && formData.search_by.toLowerCase() != "any")
								{
									var operator = 'startswith';
									switch(formData.search_by)
									{
										case 'user_id':
												operator = 'eq';
											break;
										case 'full_name':
												operator = 'contains';
											break;
										case 'username':
												operator = 'startswith';
											break;
									}
									stringObj = {field: formData.search_by, operator: operator, value: $.trim(value) };								
								}
							break;
						case 'search_year':						
								stringObj = {field: key, operator: 'eqy', value: $.trim(value) };						
							break;	
						case 'search_month':
								stringObj = {field: key, operator: 'eqm', value: $.trim(value) };
							break;	
						case 'search_day':
								stringObj = {field: key, operator: 'eqd', value: $.trim(value) };							
							break;
						default:
								var operator = ($('#'+key).attr('operator') !== undefined) ? $('#'+key).attr('operator') : 'eq';
								stringObj = {field: key, operator: operator, value: $.trim(value) };							
							break;
					}
					filters[i] = stringObj;
					i++;
				}
			});				
			var grid = $("#"+settingObj.grid_id).data("kendoGrid").dataSource.filter(filters);		
		});
	}
}

function kendoComboBox(settingObj)
{
	$(settingObj.combobox.combobox_id).kendoDropDownList(settingObj.combobox.combobox_settings);
}

function kendoWindowBox(settingObj)
{
	var windowbox = $(settingObj.windowbox.windowbox_id).kendoWindow(settingObj.windowbox.windowbox_settings);
	return windowbox;
}

function commonDestroyKendoTreeGen(settingObj)
{
	if($("#"+settingObj.form_action.category_tree.category_tree_id).data("kendoTreeView"))
	{	
		var treeView = $("#"+settingObj.form_action.category_tree.category_tree_id).data("kendoTreeView");	
		// detach events
		treeView.destroy();
		$("#"+settingObj.form_action.category_tree.category_tree_id).html('&nbsp;');		
		$("#"+settingObj.form_action.category_tree.category_tree_id).removeClass('k-treeview');
	}
}

function commonKendoTreeGen(settingObj)
{
	commonDestroyKendoTreeGen(settingObj);
	$("#"+settingObj.form_action.category_tree.category_tree_id).kendoTreeView({
		dragAndDrop: settingObj.form_action.category_tree.tree_view.dragAndDrop,
		dataSource: settingObj.form_action.category_tree.tree_view.dataSource,
		dataBound: settingObj.form_action.category_tree.tree_view.dataBound,
		select: function(obj){
			var data = $("#"+settingObj.form_action.category_tree.category_tree_id).data('kendoTreeView').dataItem(obj.node);
			var node_id = data.id;
			var node_name = data.text+' ('+node_id+')';
			if(settingObj.form_action.category_tree.category_tree_input_field_id)
			{
				$('#' + settingObj.form_action.category_tree.category_tree_input_field_id).val(node_id);
			}
			if(settingObj.form_action.category_tree.category_tree_input_html_id)
			{
				$('#' + settingObj.form_action.category_tree.category_tree_input_html_id).html(node_name);
			}
			if(settingObj.form_action.category_tree.tree_view.onSelect)
			{
				settingObj.form_action.category_tree.tree_view.onSelect(obj);
			}
		},
		animation: settingObj.form_action.category_tree.tree_view.animation,
		template: settingObj.form_action.category_tree.tree_view.template,
		expand: settingObj.form_action.category_tree.tree_view.onExpand,
		change: function(obj){
			if(settingObj.form_action.category_tree.tree_view.onChange)
			{
				settingObj.form_action.category_tree.tree_view.onChange(obj);
			}
		},
		dragend: function(e) {			
			if(settingObj.form_action.category_tree.tree_view.onDragend)
			{
				settingObj.form_action.category_tree.tree_view.onDragend(e);
			}			
		},
		drop: function(e) {
			var source_data = $("#"+settingObj.form_action.category_tree.category_tree_id).data('kendoTreeView').dataItem(e.sourceNode);
			var source_node_id = source_data.id;
			var source_node_name = source_data.text;
			
			var destination_data = $("#"+settingObj.form_action.category_tree.category_tree_id).data('kendoTreeView').dataItem(e.destinationNode);
			var destination_node_id = destination_data.id;
			
			var fieldObj = {};
				fieldObj.id = 'node-'+source_node_id;
				fieldObj.to =	'node-'+destination_node_id;
			if(source_node_id == destination_node_id)
			{
				e.preventDefault();
			}
			else
			{
				var self = e;
				var parentUrl = settingObj.form_action.category_tree.category_tree_dest_url;				
				$.ajax({
						url: parentUrl,
						type: 'POST',
						data: fieldObj,
						beforeSend: function(){},
						success: function(response){
							//alert(response);
							var json_arr = eval("("+response+")");
							if(json_arr.status == 'err')
							{
								self.preventDefault();
								commonMsgDialog(settingObj, json_arr.msg);								
							}
						},
						error: function(xhr, status, error){
							var msg = "Error! " + xhr.status + " " + error;
							commonMsgDialog(settingObj, msg);
						}
				});
			}			
			
			if(settingObj.form_action.category_tree.tree_view.onDrop)
			{
				settingObj.form_action.category_tree.tree_view.onDrop(e);
			}			
		},
		dragstart: function(e) {
			if ($(e.sourceNode).parentsUntil(".k-treeview", ".k-item").length == 0) {
				e.preventDefault();
			}
		}
	});
}

function refreshKendoTreeView(group_id, parent_id, settingObj)
{
	if(group_id != '')
	{
		settingObj.form_action.category_tree.tree_view.dataSource.transport.read.data['grp_id'] = group_id; 
		settingObj.form_action.category_tree.tree_view.dataBound = function(obj){	
																				try
																				{																													
																					var treeView = $("#"+settingObj.form_action.category_tree.category_tree_id).data('kendoTreeView');
																					var getitem = treeView.dataSource.get(parent_id);
																					if(getitem)
																					{
																						var selectitem = treeView.findByUid(getitem.uid);
																						treeView.select(selectitem);
																					}
																				}
																				catch(e)
																				{
																					//alert(e.toSource());
																				}
																			};		
		
		if(settingObj.form_action.category_tree.tree_view.refresh_action)
		{
			settingObj.form_action.category_tree.tree_view.refresh_action(group_id);	
		}
		commonKendoTreeGen(settingObj);	
	}
}
/************************************************KENDO COMMON FUNCTION END*************************************************/