<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );
	
	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		// Load Stylesheets
//		wp_enqueue_style( 'html5reset-reset', get_template_directory_uri() . '/reset.css' );
//		wp_enqueue_style( 'html5reset-style', get_stylesheet_uri() );
	
		// Load IE Stylesheet.
//		wp_enqueue_style( 'html5reset-ie', get_template_directory_uri() . '/css/ie.css', array( 'html5reset-style' ), '20130213' );
//		$wp_styles->add_data( 'html5reset-ie', 'conditional', 'lt IE 9' );

		// Modernizr
		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.
		// wp_enqueue_script( 'html5reset-modernizr', get_template_directory_uri() . '/_/js/modernizr-2.6.2.dev.js' );
		
	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );
	
	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
//		 Add the site name.
		$title .= get_bloginfo( 'name' );
	
//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
//FIX
//		if (function_exists('is_tag') && is_tag()) {
//		   single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
//		elseif (is_archive()) {
//		   wp_title(''); echo ' Archive - '; }
//		elseif (is_search()) {
//		   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
//		elseif (!(is_404()) && (is_single()) || (is_page())) {
//		   wp_title(''); echo ' - '; }
//		elseif (is_404()) {
//		   echo 'Not Found - '; }
//		if (is_home()) {
//		   bloginfo('name'); echo ' - '; bloginfo('description'); }
//		else {
//		    bloginfo('name'); }
//		if ($paged>1) {
//		   echo ' - page '. $paged; }
	
		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );




//OLD STUFF BELOW


	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

	// Widgets
	if ( !function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

	// Add new image type
	add_action('after_setup_theme','blur_image_size');
		function blur_image_size() {
		add_image_size('blur-image', 1000, 1000, true);
	}

	add_filter('wp_generate_attachment_metadata','blur_filter');
	function blur_filter($meta) {
	    $file = wp_upload_dir();
	    $file = trailingslashit($file['path']).$meta['sizes']['blur-image']['file'];
	    list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
	    $image = wp_load_image($file);
	    imagesavealpha($image, true);
	  	// $gaussian = array(array(1.0, 2.0, 1.0), array(2.0, 4.0, 2.0), array(1.0, 2.0, 1.0));
			// imageconvolution($image, $gaussian, 66, 0);
			imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0, 90);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	    switch ($orig_type) {
	        case IMAGETYPE_GIF:
	            imagegif( $image, $file );
	            break;
	        case IMAGETYPE_PNG:
	            imagepng( $image, $file );
	            break;
	        case IMAGETYPE_JPEG:
	            imagejpeg( $image, $file );
	            break;
	    }
	    return $meta;
	}



?>
