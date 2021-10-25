        <div id="footer" class="column span-14" style="background:#990100; line-height:40px;">
	
		<div id="copyright" class="column span-7 first" style="font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;">
		<?php if( get_option( 'woo_footer_left' ) == 'true' ){
		
				echo stripslashes( get_option( 'woo_footer_left_text' ) );	

		} else { ?>
			<p style="font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo(); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>
		
		<div id="credit" class="column span-7 last" style="font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;">
        <?php if ( get_option( 'woo_footer_right' ) == 'true' ) {
		
        	echo stripslashes( get_option( 'woo_footer_right_text' ) );
       	
		} else { ?>
			<p style="font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;"><?php _e('Powered by', 'woothemes') ?> <a href="http://www.wordpress.org">WordPress</a>. <?php _e('Designed by', 'woothemes') ?> <a href="<?php $aff = get_option( 'woo_footer_aff_link' ); if( ! empty( $aff ) ) { echo $aff; } else { echo 'http://www.woothemes.com'; } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/woothemes.png" width="74" height="19" alt="WooThemes" /></a></p>
		<?php } ?>
		</div>
		
	</div>
   </div>
        
<?php wp_footer(); ?>
</body>
</html>