	
</div><!-- // wrap -->   
    <?php  $options = get_option('plugin_options');
			$gridly_logo = $options['gridly_logo']; ?> 

<div id="footer-wrap">
   <div id="footer-area">
	    	<div id="logo">
	        	<a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="footerLogo">
	            
	                 <?php if ($gridly_logo != '') {?>
	                 	 <img src="<?php echo $gridly_logo; ?>" alt="<?php bloginfo('sitename'); ?>">
	                 <?php } else { ?>
	                       <img src="<?php echo get_template_directory_uri(); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>">
	                 <?php } ?>
	            </a>
	            
		   <?php if ( is_active_sidebar( 'gridly_footer_logo')) { ?>
				<?php dynamic_sidebar( 'gridly_footer_logo' ); ?>
		   <?php } ?>
	       </div>		   
<?php if ( is_active_sidebar( 'gridly_footer')) { ?>     
			<?php dynamic_sidebar( 'gridly_footer' ); ?>
        </div><!-- // footer area -->   
<?php }  ?>     
 <div id="copyright">
 <p><a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></a></p>
 </div><!-- // copyright -->   
</div>
	<?php wp_footer(); ?>
	
</body>
</html>