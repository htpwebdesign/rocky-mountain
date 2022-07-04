<?php
/**
 * Rocky Mountain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rocky_Mountain
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rocky_mountain_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Rocky Mountain, use a find and replace
		* to change 'rocky-mountain' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rocky-mountain', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rocky-mountain' ),
			'social' => esc_html__( 'Social Menu Location', 'rocky-mountain' ),
			'legal' => esc_html__( 'Legal Links Location', 'rocky-mountain' ),
			'footer' => esc_html__( 'Footer Menu Location', 'rocky-mountain' ),
			'ecommerce' => esc_html__( 'E-commerce Header Menu', 'rocky-mountain' ),

		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rocky_mountain_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rocky_mountain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rocky_mountain_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rocky_mountain_content_width', 640 );
}
add_action( 'after_setup_theme', 'rocky_mountain_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function rocky_mountain_scripts() {
	wp_enqueue_style(
		'rmf-google-fonts', 'https://fonts.googleapis.com/css2?family=Marvel:ital,wght@0,400;0,700;1,400;1,700&family=Slackey&display=swap', array(), null, 'all',
	);

	wp_enqueue_style( 'rocky-mountain-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rocky-mountain-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rocky-mountain-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'rocky-mountain-accordion', get_template_directory_uri() . '/js/accordion.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'));
	wp_enqueue_script('isotope-settings', get_template_directory_uri() . '/js/isotope.js', array('isotope', 'jquery'));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//Enqueue the Google Maps script from the Google Server
	wp_enqueue_script( 'google-map',
		'https://maps.googleapis.com/maps/api/js?key=AIzaSyAmUF77vY2nwdJ-G-V9ZWXxQZs1OhOIcfA',
		array(),
		_S_VERSION,
		true );
		// Enqueue ACF helper code to display the Google Map
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() .
		'/js/google-map-script.js', array( 'google-map', 'jquery' ), _S_VERSION,
		true );	
}
add_action( 'wp_enqueue_scripts', 'rocky_mountain_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// import Custom Post Types //
require get_template_directory() . '/inc/cpt-taxonomy.php';

// Remove block editor on pages with listed IDs
function fwd_post_filter( $use_block_editor, $post ) {
 // # in the array is the ID of the page you want to remove block editor
    $page_ids = array( 34, 28, 32, 30, 36, 13, 17, 26, 38, 15, 22, 24, 20);
    if ( in_array( $post->ID, $page_ids ) ) {
        return false;
    } else {
        return $use_block_editor;
    }
}
add_filter( 'use_block_editor_for_post', 'fwd_post_filter', 10, 2 );

// Register Google Maps 

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAmUF77vY2nwdJ-G-V9ZWXxQZs1OhOIcfA';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function isotope_musician_classes($id){
	$classes = "";
	$terms = wp_get_post_terms( get_the_id(), 'rmf-music-genre');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}

	$terms = wp_get_post_terms( get_the_id(), 'rmf-age-group');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}

	$terms = wp_get_post_terms( get_the_id(), 'rmf-featured-musician');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}
	return $classes;
}

function isotope_vendor_classes($id){
	$classes = "";
	$terms = wp_get_post_terms( get_the_id(), 'rmf-vendor-type');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}
	return $classes;
}

function isotope_workshop_classes($id){
	$classes = "";
	$terms = wp_get_post_terms( get_the_id(), 'rmf-workshop-type');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}

	$terms = wp_get_post_terms( get_the_id(), 'rmf-age-group');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}
	return $classes;
}

function isotope_faq_classes($id){
	$classes = "";
	$terms = wp_get_post_terms( get_the_id(), 'rmf-category-type');
	foreach ($terms as $term) {
		$classes .= $term->slug.' ';
	}
	return $classes;
}

function rmf_colours_admin_color_scheme() {
	//Get the theme directory
	$theme_dir = get_stylesheet_directory_uri();
  
	//Rocky Mountain Fest 
	wp_admin_css_color( 'rocky-mountain-fest-colours', __( 'Rocky Mountain Fest ' ),
	  $theme_dir . '/rmf-colours.css',
	  array( '#337582', '#fdeddf', '#d54e21' , '#6e9fa8')
	);
  }
  add_action('admin_init', 'rmf_colours_admin_color_scheme');
  