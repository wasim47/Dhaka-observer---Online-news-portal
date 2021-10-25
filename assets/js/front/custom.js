var jw_inputs_init = function(parent_selector){
	/*fancy inputs*/
	var parent_container = $(parent_selector);
	$("div.option", parent_container).each(function(index, element) {
		$(element).find("div.text").html( $(this).find("select:first option[value='"+ $(this).find("select:first").val() +"']").html() );
		$("select:first",element).change(function(){
			$(this).parent().find("div.text").html($(this).find("option[value='"+ $(this).val() +"']").html());
			});
	});

	$("div.file", parent_container).find("input:first").change(function(){
		$(this).css("top","-18px");
		var a=$(this).val().replace(/^.*\\/,"").substr(0,24);
		$(this).parent().find("div.text").html(a);
		});

	$(".datetimepicker", parent_container).datetimepicker({dateFormat: 'yy-mm-dd',timeFormat: "HH:mm"});
	$(".datepicker", parent_container).datepicker({dateFormat: 'yy-mm-dd'});

	$("div.date", parent_container).each(function(index, element) {
		$("input:first",element).change(function(){
			/*if(BrowserDetect.browser!="Explorer"){
				$(this).css("top","-21px");
				}
			else{
				if(BrowserDetect.version>7){
					$(this).css("top","-21px");
				}else{
					$(this).css("top","-10px");
					}
				}*/
			$("div.text",$(this).parent()).html($(this).val());
			});
		$("div.text",this).html($("input:first",this).val());
	});
	}


$(function(){
	$("table.global tbody tr").mouseenter(function(){
		$(this).css("background","#f9f9f9");
		});
	
	$("table.global tbody tr").mouseleave(function(){
		$(this).css("background","#ffffff");
		});
	
	$(".notifications").click(function(){
		$(this).fadeOut("slow");
		});
		
	
	//initialize the inputs on document load
	jw_inputs_init('body');
	
});

/*cookie controler*/
function setCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
		}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
	}

function setCookieSeconds(name,value,sec) {
	if( sec ){
		var date = new Date();
		date.setTime(date.getTime()+(sec*1000));
		var expires = "; expires="+date.toGMTString();
		}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
	}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i < ca.length; i++){
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
	return null;
	}
function deleteCookie(name) { createCookie(name,"",-1); }
/*cookie controller*/
function login_expire_refresh(){ 
	if( !getCookie('jw_session') && !getCookie('PHPSESSID') && !getCookie('jadewits_cross_cookie') && !getCookie('jadewits_no_login_expire_check') ){
		setCookieSeconds( 'jadewits_no_login_expire_check', 'yes', 0 );
		window.location.href += ''; 
		}
	}
	

var jw_bn_convert = function(n,ln){
	if( !ln || ln == 'en' ) return n;
	var bn = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
	var str = String(n);
	var ret = '';
	for( i in str ){
		ret += bn[str[i]];
		}
	return ret;
	}
	
var jw_limit_text_chars = function(o){
	var ths = new Object();
	ths.element = o.element?o.element:'';
	ths.char_limit = o.char_limit?o.char_limit:160;
	ths.language = o.language?o.language:'en';
	if( !ths.element ) return false;
	
	ths.char_counter = function(){
		var comment_char_counter = $(this).parent().find('.comment_char_count');
		if( !comment_char_counter.length ){
			$(this).before('<div class="comment_char_count p10" align="left"></div>');
			comment_char_counter = $(this).parent().find('.comment_char_count');
			}
		
		if( ths.char_limit < $(this).val().length ){
			$(this).val($(this).val().substring(0,ths.char_limit-1));
			}
		
		comment_char_counter.html(jw_bn_convert($(this).val().length,ths.language) + ' / ' + jw_bn_convert(ths.char_limit,ths.language));
		}

	$(ths.element).live('keypress',ths.char_counter).live('change',ths.char_counter).live('keyup',ths.char_counter);
	}

var jadewits_horizontal_hover_menu = function(o){
	var ths = o;
	ths.waittime = ths.waittime?ths.waittime:500;
	ths.timer = null;
	ths.hides = null;
	ths.shows = null;
	ths.oldone = null;
	ths.oldone2 = null;
	ths.nextone = null;
	ths.mousein = false;

	ths.applicable_lis = $(ths.container + ' li').has('ul');

	ths.hide_show = function(){
		clearInterval(ths.timer);
		$(ths.hides).hide();
		if( ths.shows ) ths.shows.show();
		else if( ths.nextone && ths.oldone != ths.oldone2 ){
			ths.oldone = ths.oldone2;
			if( ths.mousein ) ths.nextone.show();
			else ths.oldone = null;
			}
		else{
			ths.oldone = null;
			}
		
		if( !ths.oldone ){
			$(ths.container + ' li').not('.active').find('>ul').hide();
			//also restore show of the selected item
			$(ths.container + ' li.active > ul').show();
			}
		}

	ths.applicable_lis.hover(function(){
		
		ths.mousein = true;
		
		if( this == ths.oldone ) clearInterval(ths.timer); //same item so clear hide timer

		if( !ths.oldone ){
			ths.hides = ths.applicable_lis.not(this).find('>ul');
			ths.shows = $('>ul',this);
			ths.oldone = this;
			ths.hide_show();
			}
		else{
			ths.nextone = $('>ul',this);
			ths.oldone2 = this;
			}
		},function(){
		
		ths.mousein = false;
		//try to clear after one second
		ths.hides = ths.applicable_lis.find('>ul');
		ths.shows = null;
		clearInterval(ths.timer);
		ths.timer = setInterval(ths.hide_show,ths.waittime);
		});
	};

//menu fixer
function jw_menu_fixer(menu,tiny_label){
	var aas = $('a.archive',$(menu));
	var the_url = window.location.href;
	var home_page = jw_full_url+'home/'+current_archive_time;
	var current_page_url_check = current_page_url.split(jw_full_url)[1] ? current_page_url.split(jw_full_url)[1].split('/')[0] : 'jadewits_not_allowed_root';
	var the_url_check = the_url.split(jw_full_url)[1] ? the_url.split(jw_full_url)[1].split('/')[0] : 'jadewits_not_allowed_root';
	var home_page_url_check = home_page.split(jw_full_url)[1] ? home_page.split(jw_full_url)[1].split('/')[0] : 'jadewits_not_allowed_root';
	
	for( i=0; i< aas.length; i++ ){
	//aas.each(function(index, element) {
		var index = i;
		var element = aas[i];
		//is the url for this site
		usl = $(element).attr('href').split(jw_full_url)[1];
		if( usl ){
			var sl = usl.split('/');
			var the_link = $(element).attr('href') + '/' + current_archive_time ;
			if( !sl[1] ){
				$(element).attr('href',the_link);
				}
			
			var check_link = $(element).attr('href').split(jw_full_url)[1] ? $(element).attr('href').split(jw_full_url)[1].split('/')[0] : 'jadewits_not_allowed';
			//active the current page
			if(
				check_link == current_page_url_check 
				//|| ( current_page_url_check == 'home' && check_link == 'jadewits_not_allowed' )
				//|| check_link == home_page_url_check
				|| check_link == the_url_check
				){
				var thisli = $(element)
				.addClass('active') //a active
				.parent().addClass('active').addClass('selected');	//li active
				
				//expand child menu if parent selected
				var sub_menu = thisli.find('>ul');
				if( sub_menu.length ){
					sub_menu.addClass('expanded');
					$(menu).addClass('child_opened');
					}
				
				if( thisli.parent().parent().prop('tagName').toLowerCase() == 'li' ){
					//expand parent sub menu wich contains this
					var parentli = thisli.parent().addClass('expanded') //ul expanded
					.parent().addClass('active');	//li active
					parentli.find('> a').addClass('active');
					
					$(menu).addClass('child_opened');
					}
				}
			}
		}
		//);
		
	var aas2 = $('a',$(menu)).not('.archive');
	for( i=0; i< aas2.length; i++ ){
	//aas2.each(function(index, element){
		var index = i;
		var element = aas2[i];
		
		var check_link = $(element).attr('href').split(jw_full_url)[1] ? $(element).attr('href').split(jw_full_url)[1].split('/')[0] : 'jadewits_not_allowed';
		//active the current page
		if( 
			//$(element).attr('href') == the_url
			check_link == current_page_url_check 
			|| ( current_page_url_check == 'home' && check_link == 'jadewits_not_allowed' && $(element).attr('href').search(jw_full_url) > -1 )
			//|| check_link == home_page_url_check
			|| check_link == the_url_check
			){
			var thisli = $(element)
			.addClass('active') //a active
			.parent().addClass('active').addClass('selected');	//li active
			
			//expand child menu if parent selected
			var sub_menu = thisli.find('>ul');
			if( sub_menu.length ){
				sub_menu.addClass('expanded');
				$(menu).addClass('child_opened');
				}
			
			if( thisli.parent().parent().prop('tagName').toLowerCase() == 'li' ){
				//expand parent sub menu wich contains this
				var parentli = thisli.parent().addClass('expanded') //ul expanded
				.parent().addClass('active');	//li active
				parentli.find('> a').addClass('active');
				
				$(menu).addClass('child_opened');
				}
			}
		}
		//);
	
	// now initiate tinynav
	 $(menu + '>ul').tinyNav({
        active: 'selected',
        label: tiny_label ? tiny_label : ''
      });
	}

//jw content media post render
var jw_media_post_render = function(index, element) {
	var e =  $(element);
	
	var base_path = jw_full_url + 'contents/uploads/';
	var image = e.hasClass('image');
	var file = e.hasClass('file');
	e.removeClass('image');
	var data = $.parseJSON(e.attr('data-jadewitsmedia').replace(/'/g, '"'));
	var name = data['name'];
	var alt = data['alt'] ? data['alt'] : data['name'];
	var path = data['path'];
	var title = data['title'] ? data['title'] : ( data['name'] ? data['name'] : alt );
	var width = e.width() ? e.width() : '';
	//var data = new Object();
	
	if( image ){
		e.after('<span id="media_' + index + '" style="width:' + width + 'px;" class="jw_media_holder ' + e.attr('class') + '" ><img width="' + width + '"  src="' + e.attr('src') + '" alt="' + alt + '" /><span class="jw_media_caption">' + title + '</span></span>').remove();
		
		$('#media_' + index).hover(function(){
			var e = $(this).find('.jw_media_caption');
			if( e.html() ) e.stop().slideDown();
			},
		function(){
			var e = $(this).find('.jw_media_caption');
			if( e.html() ) e.stop().slideUp();
			});
		}
	if( file ){
		e.after('<a target="_blank" id="media_' + index + '" class="jw_media_holder_file ' + e.attr('class') + '" href="' + base_path + path + '" title="' + title + '" >' + name + '</a>').remove();
		}
	
	}

var jw_change_font_size = function(el,step){
	var max_size = 24;
	var min_size = 14;
	var e = $(el);
	var cur_font_size = parseInt(e.css('font-size'),10);
	if( step > 0 && cur_font_size < max_size || step < 0 && cur_font_size > min_size ){
		var font_size = cur_font_size + step;
		e.css({fontSize:font_size+'px',lineHeight:(font_size+10) + 'px'});
		}
	}

$('.jw_content_zoom_out').live('click',function(){
	el = $('.' + $(this).attr('rel'));
	jw_change_font_size(el,-2);
	});
	
$('.jw_content_zoom_in').live('click',function(){
	el = $('.' + $(this).attr('rel'));
	jw_change_font_size(el,+2);
	}); 

//custom sharer 

function jadewits_custom_sharer(platform){
	var this_title = encodeURIComponent(document.title);
	var this_link = encodeURIComponent(window.location.href);
	var goto_url = '';
	switch(platform){
		case 'facebook' :
			goto_url = 'https://www.facebook.com/sharer/sharer.php?u=' + this_link;
			break;
		case 'twitter':
			goto_url = 'https://twitter.com/intent/tweet?text=' + this_title + '&url=' + this_link;
			break;
		case 'google_plusone_share':
			goto_url = 'https://plus.google.com/share?url=' + this_link;
			break;
		default:
			return false;
			break;
		}
	window.open(goto_url, '_blank','width=500,height=400');
	return false;
	}


$('.addthis_facebook_share').live('click',function(){
	return jadewits_custom_sharer('facebook');
	});
	
$('.addthis_twitter_share').live('click',function(){
	//return addthis_sendto('twitter');
	return jadewits_custom_sharer('twitter');
	});

$('.addthis_google_share').live('click',function(){
	return jadewits_custom_sharer('google_plusone_share');
	});

$('.addthis_print').live('click',function(){
	var x = window.location.href.split('#');
	window.open( x[0] + '#jadewits_print','_blank');
	//window.print();
	//return addthis_sendto('print');
	});
	
var jadewits_delay_print_timer = null;
var jadewits_delay_print = function(){
	clearInterval(jadewits_delay_print_timer);
	}
$(document).ready(function(e) {
	var x = window.location.href.split('#');
	if( x[1] && x[1] == 'jadewits_print' ){
		$('head link').each(function(index, element) {
			if( $(element).attr('media') == 'print' ){
				$(element).attr('media','all').attr('data-pmedia','print');
				}
			});
		jadewits_delay_print_timer = setInterval(jadewits_delay_print,1000);
		}
	});

$('.addthis_share').live('click',function(){
	return addthis_sendto('more');
	});

if( window.location.href.search('jadewits=') > 0 ){
	
	var t1 = window.location.href.split('?');
	var jw_color_param = 1;
	if( t1[1] ){
		var t2 = t1[1].split('#')[0].split('&');
		for(i in t2 ){
			var t3 = t2[i].split('=');
			if( t3[0] == 'jadewits' )
				jw_color_param = t3[1];
			}
		}
	
	//color distributor
	$(document).ready(function(e) {
		var my_color_picker = ['purple','red','blue','orange','green','megenta','ash'];
		var my_color_picker_pointer = 0; 
		$('.main_menu > ul > li').each(function(i,e){
			if( ++my_color_picker_pointer >= 6 ) my_color_picker_pointer = 0;
			
			//keep provided color - 2
			if( jw_color_param >= 2 ) my_color_picker_pointer = jw_color_param - 2;
			
			$(e).addClass('menu_color_' + my_color_picker[my_color_picker_pointer]);
		  if( window.location.href.search($(e).find('>a').attr('href')) > -1 ){
			 $('body').addClass('page_color_' + my_color_picker[my_color_picker_pointer]);
			 $('.widget_color_').addClass('widget_color_' + my_color_picker[my_color_picker_pointer]); 
			 $('.color_theme_').addClass('color_theme_' + my_color_picker[my_color_picker_pointer]); 
			 
			 for( k in my_color_picker ){
				$('.widget_color_' + my_color_picker[k]).removeClass('widget_color_' + my_color_picker[k]).addClass('widget_color_' + my_color_picker[my_color_picker_pointer]);
				$('.color_theme_' + my_color_picker[k]).removeClass('color_theme_' + my_color_picker[k]).addClass('color_theme_' + my_color_picker[my_color_picker_pointer]);
				}
		  }
		});
	});
	
	//click tracking
	$('a').live('click',function(){
		var e = $(this);
		if( !e.data('jadewits_ready') ){
			e.data('jadewits_ready','yes');
			var h = $(e).attr('href').split('#');
			var x = h[0].split('?');
			var y = '';
			if( h[1] ) y = '#' + h[1];
			if( x[1] ){
				$(e).attr( 'href', h[0] + '?jadewits=' + jw_color_param + '&' + x[1] + y );
				}
			else{
				$(e).attr( 'href', h[0] + '?jadewits=' + jw_color_param + y );
				}
			}
		});
	}
