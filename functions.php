<?php

add_action( 'after_setup_theme', 'aws_bootstrap_setup' );
function aws_bootstrap_setup() {
	// Navbar Walker 
	require( get_template_directory() . '/includes/navbar-walker.php' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'aws-bootstrap' ) );
	// Post Support
	add_theme_support( 'post-thumbnails' );
}
add_action( 'wp_enqueue_scripts', 'aws_bootstrap_scripts_styles' );
function aws_bootstrap_scripts_styles() {
	global $wp_styles;

	wp_enqueue_script( 'aws_bootstrap-js', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	
	/*
	 * Loads twitter bootstrap css
	 */
	wp_enqueue_style( 'aws-bootstrap-framework', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'aws-bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array( 'aws-bootstrap-framework' ), '20130520' );
	
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'aws-bootstrap-style', get_stylesheet_uri(), array( 'aws-bootstrap-framework' ), '20130520' );

	
	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'aws-bootstrap-ie', get_template_directory_uri() . '/css/ie.css', array( 'aws-bootstrap-style' ), '20130520' );
	$wp_styles->add_data( 'aws-bootstrap-ie', 'conditional', 'lt IE 9' );
}

function aws_bootstrap_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'aws-bootstrap' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'aws-bootstrap' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'aws-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'aws-bootstrap' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'aws-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'aws-bootstrap' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'aws-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'aws-bootstrap' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'aws-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Area Four', 'aws-bootstrap' ),
		'id' => 'sidebar-6',
		'description' => __( 'An optional widget area for your site footer', 'aws-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'aws_bootstrap_widgets_init' );
?>