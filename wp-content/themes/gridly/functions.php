<?php
   
	// Add RSS links to <head> section
	add_theme_support('automatic-feed-links') ;
	
	// Load jQuery
	if ( !function_exists('core_mods') ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"));
				wp_register_script('jquery.masonry', (get_template_directory_uri()."/js/jquery.masonry.min.js"),'jquery',false,true);
				wp_register_script('gridly.functions', (get_template_directory_uri()."/js/functions.js"),'jquery.masonry',false,true);
				
				wp_enqueue_script('jquery');
				wp_enqueue_script('jquery.masonry');
				wp_enqueue_script('gridly.functions');
			}
		}
		core_mods();
	}
	
	// content width
	if ( !isset( $content_width ))  {
		$content_width = 710; 
	}

function style_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
            <label for="s">' . __('') . '</label>
            <div>';
    if (is_search()) {
        $form .='<input type="text" value="' . attribute_escape(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="Explore. Dream. Discover…" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '<input type="submit" id="searchsubmit" value="'.attribute_escape(__('Go')).'" /></div></form>';
    return $form;
}
add_filter('get_search_form', 'style_search_form');

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Gridly post thumbnails
	add_theme_support( 'post-thumbnails' );
		add_image_size('summary-image', 310, 9999);
		add_image_size('detail-image', 770, 9999);
	
	
    // menu 
	add_action( 'init', 'register_gridly_menu' );

	function register_gridly_menu() {
		register_nav_menu( 'main_nav', __( 'Main Menu' ) );
	} 

     //setup header widget area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Header',
    		'id'   => 'gridly_header',
    		'description'   => 'Header Widget Area',
    		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-copy">',
    		'after_widget'  => '</div></div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
	}
	
     //setup footer widget area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Footer',
    		'id'   => 'gridly_footer',
    		'description'   => 'Footer Widget Area',
    		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-copy">',
    		'after_widget'  => '</div></div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
	}	
	
	
     //setup footer widget area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Beneath Footer Logo',
    		'id'   => 'gridly_footer_logo',
    		'description'   => 'Beneath Footer Logo Widget Area',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
	}
	
     //setup page sidebar area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar',
    		'id'   => 'gridly_sidebar',
    		'description'   => 'Sidebar',
    		'before_widget' => '<div id="%1$s" class="type-sidebar %2$s"><div class="gridly-copy">',
    		'after_widget'  => '</div></div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
	}			

     //setup footer widget area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Homepage',
    		'id'   => 'gridly_homepage',
    		'description'   => 'Homepage Widget Area',
    		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-copy">',
    		'after_widget'  => '</div></div>'
    	));
	}

	// Exclude Homepage category from listing
	function the_category_filter($thelist,$separator=' ') {
		if(!defined('WP_ADMIN')) {
			//list the category names to exclude
			$exclude = array('Homepage');
			$cats = explode($separator,$thelist);
			$newlist = "";
			foreach($cats as $cat) {
				$catname = trim(strip_tags($cat));
				if(!in_array($catname,$exclude))
					$newlist .= $cat.$separator;
			}
			$newlist = rtrim($newlist,$separator);
			return $newlist;
		} else
			return $thelist;
	}
	add_filter('the_category','the_category_filter',10,2);


	// hide blank excerpts 
	function custom_excerpt_length( $length ) {
	return 0;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function new_excerpt_more($more) {
       global $post;
	return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');



	// Gridly theme options 
	include 'options/admin-menu.php';

?>