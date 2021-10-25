<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php global $woo_options; ?>

<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
    
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php $GLOBALS['feedurl'] = $woo_options['woo_feed_url']; if ( ! empty( $feedurl ) ) { echo $feedurl; } else { echo get_bloginfo_rss( 'rss2_url' ); } ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
<!--[if lt IE 7]>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/ie.css" type="text/css" media="screen, projection">
<![endif]-->
    
<?php if ( is_singular() ) { wp_enqueue_script('comment-reply'); } ?>
    
<?php wp_head(); ?>
<style type="text/css">
.hc_menu{
	width:100%;
	position: relative;
	float: left;
	background-color: #ab0000;
}

.orion-menu{margin-top: 0px;}

.orion-menu{
	width:100%;
	padding:0;
	margin:0;
	position:relative;
	float:left;
	background:#454545;
	list-style:none;
	font-family:'Roboto Condensed',sans-serif;
	box-sizing:border-box;
  -moz-box-sizing:border-box; /* Firefox */
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #CCCCCC;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;

 }

.orion-menu li{
	display:inline;
	font-size:12px;
	font-weight:bold;
	margin:0;
	padding:0;
	float:left;
	line-height:normal;
	position:relative;
	color: #000000;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: none;
	border-right-width: 1px;
	border-bottom-width: 1px;
	}

.orion-menu li a{
  padding:5px 11px;
	color: #000000;
	text-decoration:none;
	display:inline-block;
	-o-transition:color .3s linear,background .3s linear;-webkit-transition:color .3s linear,background .3s linear;-moz-transition:color .3s linear,background .3s linear;transition:color .3s   linear,background .3s linear
	}

.orion-menu li:hover>a{color:#CCCCCC;font-weight:bold;}

.orion-menu li.active>a{
	background-color: #6C6C6C;
	font-weight:bold;
}

.orion-menu>li>a{text-transform:uppercase;font-weight:bold;}

.orion-menu ul,
.orion-menu ul li ul{list-style:none;margin:0;padding:0;display:none;position:absolute;z-index:999;width:200px;background:#454545}
.orion-menu ul{top:40px;left:0}

.orion-menu ul li ul{top:0;left:200px}
.orion-menu ul li{clear:both;width:100%;font-size:12px;font-weight:bold;}
.orion-menu ul li a{
	width:100%;
	padding:5px 22px;
	font-weight:bold;
	display:inline-block;
	float:left;
	clear:both;
	box-sizing:border-box;
-moz-box-sizing:border-box;-webkit-box-sizing:border-box; 	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #D7D7D7;
	border-right-color: #D7D7D7;
	border-bottom-color: #D7D7D7;
	border-left-color: #D7D7D7;
}

.orion-menu ul li:hover>a{background:#555;font-weight:bold;}

.orion-menu .indicator{color:#bababa;position:absolute;right:6px;top:10px;font-family:FontAwesome;font-size:12px;font-weight:bold;}
.orion-menu .indicator:before{content:"\f0d7"}
.orion-menu ul li .indicator{right:20px;top:6px}
.orion-menu ul li .indicator:before{content:"\f0da"}

.orion-menu>li.showhide{display:none;width:100%;height:50px;cursor:pointer;color:#dedede;background:#454545}
.orion-menu>li.showhide span.title{margin:16px 0 0 18px;float:left}.orion-menu> li.showhide span.icon{margin:17px 20px;float:right}
.orion-menu>li.showhide .icon em{margin-bottom:3px;display:block;width:20px;height:2px;background:#ccc}

.green,.green li ul,.green ul li ul,.green>li.showhide{
	background-color: #ab0000;
	color:#FFFFFF;
	font-weight:bold;
}
.green li a,.orion-menu li.social a{
	color:#FFFFFF;
	font-weight: bold;
}
.green li.active>a,.green  li:hover>a,.green li.social a .tooltip{
	background-color: #F8F8F8;
	color:#333333;
}
.green li.search form input.search:focus{background-color:#d53f3f}
.green li.social a .tooltip:before,.green li.social a .tooltip:after{border-top-color:#d53f3f}


@media only screen and (max-width:767px){

.orion-menu{
   margin:0;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #000000;
	border-left-color: #000000;
		border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #000000;

	 }
.orion-menu li{
  display:block;
	width:100%;
	border-right-style: none;
	}
.orion-menu>li>a{
  width:100%;
	padding:10px 22px;
	text-align:left;
	border-top:solid 1px rgba(255,255,255,.05);
	box-sizing:border-box;-moz-box-sizing:border-box;
	-webkit-box-sizing:border-box;
	}
	.orion-menu ul li.last{
	border: none;
  }
.orion-menu ul,.orion-menu ul li ul{
  width:100%;
	left:0;
	padding:0 20px;
	position:static;
	box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-box-sizing:border-box
	}
.orion-menu ul li a{	
	box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box; 
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #D7D7D7;
	border-right-color: #D7D7D7;
	border-bottom-color: #D7D7D7;
	border-left-color: #D7D7D7;
}
.orion-menu .indicator{
  right:20px;
	top:14px
	}
.orion-menu ul li .indicator{display:none}

.orion-menu>li.showhide{display:block}



}


</style>
</head>

<body <?php body_class(); ?>>

    <div class="container">
    
        <div id="header" class="column span-14" style="background:url(http://blog.dhakaobserver.com/wp-content/themes/themorningafter/images/banner.jpg) no-repeat;">
        
            <div id="logo" class="column first">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                
        	<?php if ($woo_options['woo_texttitle'] == 'false' ) { $logo = $woo_options['woo_logo']; 
        			if ( ! empty( $logo ) ) { ?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'description' ); ?>">
        			<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
        		</a>
        	<?php }        	
        		} else { ?>
        	<div class="title">
        	<?php if( is_singular() ) { ?>
            	<span class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></span>
        	<?php } else { ?>
            	<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        	<?php } ?>
            	<div class="site-description desc"><?php bloginfo( 'description' ); ?></div>
			</div>
			<?php } ?> 
                    
            </div>
                    
        </div>
		<div class="hc_menu">
    
    <ul class="orion-menu green">
    <li class="active"><a href="http://dhakaobserver.com/english/" style="text-transform:uppercase">Home</a></li>
                 <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=1" style="text-transform:uppercase">National </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=2" style="text-transform:uppercase">Politics </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=3" style="text-transform:uppercase">International </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=4" style="text-transform:uppercase">District News</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=5" style="text-transform:uppercase">Business </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=6" style="text-transform:uppercase">Sports</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=7" style="text-transform:uppercase">Entertainment </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=8" style="text-transform:uppercase">Science & Tech</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=9" style="text-transform:uppercase">Eduction </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=10" style="text-transform:uppercase">Health </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=11" style="text-transform:uppercase">Lifestyle </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=12" style="text-transform:uppercase">Feature</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=13" style="text-transform:uppercase">Environment </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=14" style="text-transform:uppercase">City Life</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=15" style="text-transform:uppercase">Literature </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=16" style="text-transform:uppercase">Career </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=17" style="text-transform:uppercase">Inspirations </a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=18" style="text-transform:uppercase">Kids Corner</a></li>
                        <?php /*?> <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=19" style="text-transform:uppercase">Blog</a></li><?php */?>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=20" style="text-transform:uppercase">Jobs Corner</a></li>
                         <li><a href="http://dhakaobserver.com/english/index/news_gallery?cat_id=21" style="text-transform:uppercase">Opinion</a></li>
                  </ul>
			</div>
        <div class="clear"></div>
       <div style="padding-top:6px;"></div>
		<?php // Only supports WordPress Menus
		if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) { ?>
			<div id="navigation" class="col-full">
				<?php
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
				?>
				<ul class="rss fr">
        			<?php $email = $woo_options['woo_subscribe_email']; if ( $email ) { ?>
        			<li class="sub-email"><a href="<?php echo $email; ?>" target="_blank"><?php _e('Subscribe by Email', 'woothemes') ?></a></li>
        			<?php } ?>
        			<li class="sub-rss"><a href="<?php if ( $GLOBALS['feedurl'] ) { echo $GLOBALS['feedurl']; } else { echo get_bloginfo_rss( 'rss2_url' ); } ?>"><?php _e( 'Subscribe to RSS', 'woothemes' ); ?></a></li>
        		</ul>

			</div><!-- /#navigation -->
		<?php
		} 
        ?>