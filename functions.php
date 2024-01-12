<?php


if ( ! isset( $content_width ) ) {
	$content_width = 720;
}


/**
 * koko_setup()
 * Sets up the Kokoi theme.
 *
 * @version 1.1
 * @since 1.0
 */
if( ! function_exists('koko_setup') ) {
	function koko_setup() {

		// Translation
		load_theme_textdomain( 'kokoi', get_template_directory() . '/lang' );


		// Adds RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'header-menu', __( 'Header Menu', 'kokoi' ) );
		register_nav_menu( 'footer-menu', __( 'Footer Menu', 'kokoi' ) );


		// WordPress will handle the <title> tag, it is not hard-coded.
		add_theme_support( 'title-tag' );


		// This theme uses a custom image size for featured images, displayed on "standard" posts.
		add_theme_support( 'post-thumbnails' );


		// Images Sizes
		add_image_size( 'square', 778, 778, true ); // Square, hard crop
		add_image_size( 'square-large', 1140, 1140, true ); // Square, hard crop


		// Custom Logo
		add_theme_support( 'custom-logo' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'align-full' );


		// HTML5 Support for scripts and styles
		add_theme_support( 'html5', [ 'script', 'style', 'meta' ] );

	}
}
add_action( 'after_setup_theme', 'koko_setup' );


/**
* koko_support()
* Sets up theme defaults and registers support for various WordPress features.
*
* @package WordPress
* @subpackage Kokoi
* @since  1.0
* @return void
*/
if ( ! function_exists( 'koko_support' ) ) {
	function koko_support() {

		// Add support for block styles.
		//add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}
}
add_action( 'after_setup_theme', 'koko_support' );


/**
* koko_styles()
* Enqueue styles.
* 
* @package WordPress
* @subpackage Kokoi
* @since 1.0
* @return void
*/
if ( ! function_exists( 'koko_styles' ) ) {
	function koko_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style( 'koko-style', get_template_directory_uri() . '/style.css', array(), $version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'koko-style' );

	}
}
add_action( 'wp_enqueue_scripts', 'koko_styles' );


/**
* koko_typekit_scripts_styles()
* Enqueue styles.
*
* @package WordPress
* @subpackage Kokoi
* @since 1.0
* @return void
*/
if ( ! function_exists( 'koko_typekit_scripts_styles' ) ) {
	function koko_typekit_scripts_styles() {

		// Register theme version.
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		wp_register_style(
			'fontshare-style-gen',
			get_template_directory_uri() . '/assets/fonts/GeneralSans/Fonts/WEB/css/general-sans.css',
			array(),
			$version_string
		);

		wp_register_style(
			'typekit-style-kokoi',
			'https://use.typekit.net/sev7fxk.css',
			array(),
			$version_string
		);

		wp_register_script(
			'koko-menu-nav',
			get_template_directory_uri() . '/includes/js/koko-nav-hamburger.js',
			array(),
			'1.0',
			true
		);


		// Enqueue theme stylesheet.
		wp_enqueue_style( 'typekit-style-kokoi' );
		wp_enqueue_style( 'fontshare-style-gen' );

		wp_enqueue_script('koko-menu-nav');

	}
}
add_action( 'wp_enqueue_scripts', 'koko_typekit_scripts_styles' );


/**
* koko_typekit_fonts_editor()
* Inserts Typekit(Adobe) fonts into the Editor page.
*
* @package WordPress
* @subpackage Kokoi
* @since 1.0
* @return void
*/
if( ! function_exists( 'koko_typekit_fonts_editor' ) ) {
	function koko_typekit_fonts_editor() {

		wp_enqueue_style( 'font-css-gen', get_template_directory_uri() . '/assets/fonts/GeneralSans/Fonts/WEB/css/general-sans.css');
		wp_enqueue_style( 'font-typekit', 'https://use.typekit.net/sev7fxk.css');
	}
}
add_action( 'enqueue_block_editor_assets', 'koko_typekit_fonts_editor' );


/**
* koko_custom_post_type()
* Sets up custom post types for the theme.
*
* @package WordPress
* @subpackage Kokoi
* @since  1.0
* @return void
*/
if ( ! function_exists( 'koko_custom_post_type' ) ) {
	function koko_custom_post_type() {
    register_post_type('koko_portfolio',
        array(
            'labels'      => array(
                'name'          => __( 'Portfolio', 'textdomain' ),
                'singular_name' => __( 'Portfolio', 'textdomain' ),
            ),
            'public'       => true,
            'publicly_queryable'    => true,
            'has_archive'  => true,
            'hierarchical' => true,
            "show_ui" => true,
            'show_in_rest' => true,
            'taxonomies' 	      => array( 'koko_types' ),
            'supports' => array('editor', 'title', 'thumbnail', 'custom-fields', 'revisions'),
            'rewrite'     => array( 'slug' => 'portfolio' ), // my custom slug
        )
    );
	}
}
add_action('init', 'koko_custom_post_type');


/**
* koko_portfolio_cpt_taxonomy()
* Create a custom taxonomy name it "type" for your posts.
*
* @package WordPress
* @subpackage Kokoi
* @since  1.0
* @return void
*/
if ( ! function_exists( 'koko_portfolio_cpt_taxonomy' ) ) {
	function koko_portfolio_cpt_taxonomy() {
	 
	  $labels = array(
	    'name' => _x( 'Types', 'taxonomy general name' ),
	    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Types' ),
	    'all_items' => __( 'All Types' ),
	    'parent_item' => __( 'Parent Type' ),
	    'parent_item_colon' => __( 'Parent Type:' ),
	    'edit_item' => __( 'Edit Type' ), 
	    'update_item' => __( 'Update Type' ),
	    'add_new_item' => __( 'Add New Type' ),
	    'new_item_name' => __( 'New Type Name' ),
	    'menu_name' => __( 'Types' ),
	  ); 	
	 
	  register_taxonomy( 'koko_types', array('koko_portfolio'), array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_ui' => true,
	    'show_in_rest' => true,
	    'show_admin_column' => true,
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'type' ),
	  ));
	}
}
add_action( 'init', 'koko_portfolio_cpt_taxonomy', 0 );

include_once( get_template_directory() . '/includes/functions/theme-functions.php' );