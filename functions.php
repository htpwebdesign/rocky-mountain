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
    $page_ids = array( 34, 28, 32, 30, 36, 13, 17, 26, 38, 15, 22, 24, 20, 40);
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
  
  // Add submenu functionality for mobile
  require get_template_directory() . '/inc/submenus.php';

  /**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

// Remove admin menu links for non-Administrator accounts
function fwd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    		remove_menu_page( 'edit-comments.php' );  // Remove Comments link
	}
}
add_action( 'admin_menu', 'fwd_remove_admin_links' );

// Add logo to back-end login
function wpb_login_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url("http://rockymountainfest.bcitwebdeveloper.ca/wp-content/uploads/2022/06/RMF-logo-horizontal-1.svg");
height:100px;
width:300px;
background-size: 300px 100px;
background-repeat: no-repeat;
padding-bottom: 10px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

// Change link on back end login
function my_login_logo_url() {
return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
return 'Your Site Name to Here';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

// Styling for the back end login form
function my_login_form() { ?>
<style type="text/css">
body.login{
	background-color:#FDEDDF;
}
body.login div#login form#loginform {
background-color: #598A7E;
border-radius:27px;
border: 3px solid #FDEDDF;
color: #FDEDDF;
box-shadow: 3px 3px 10px 1px rgba(0, 0, 0, 35%),
    -3px -3px 10px 1px rgba(0, 0, 0, 35%);

}
input#wp-submit{
	background-color: #E46C43;
	clip-path: polygon(0 0, 100% 20%, 98% 88%, 5% 100%);
	padding: 1rem;
	border: none;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_form' );

// Removing dashboard widgets
function remove_dashboard_widgets()
{
//first parameter -> slug/id of the widget
//second parameter -> where the meta box is displayed, it can be page, post, dashboard etc.
//third parameter -> position of the meta box. If you have used wp_add_dashboard_widget to create the widget or
//deleting default widget then provide the value "normal".
remove_meta_box('wc_admin_dashboard_setup', 'dashboard', "normal");
remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
remove_meta_box('dashboard_activity', 'dashboard', 'normal');
remove_meta_box('jetpack_summary_widget', 'dashboard', 'normal');
remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');
remove_meta_box('wc_newsletter_subscription_stats', 'dashboard', 'normal');
remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action("wp_dashboard_setup", "remove_dashboard_widgets");

// Adding custom widgets
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
echo '<p>Welcome to the back end of your Rocky Mountain Fest website! Need help? <a
href="mailto:yourusername@gmail.com">Contact MAJC Creative Solutions</a>. And here are the tutorial videos that we put together for you if you need a refresher.
	<p>News Tutorial</p>
	<video controls><source src='.wp_get_attachment_url('451').' type="video/mp4">Your browser does not support embedded videos.</video>
	<p>Content Tutorial</p>
	<video controls><source src='.wp_get_attachment_url('450').' type="video/mp4">Your browser does not support embedded videos.</video>
	<p>Home Page Tutorial</p>
	<video controls><source src='.wp_get_attachment_url('449').' type="video/mp4">Your browser does not support embedded videos.</video>
	<p>Line-Up/Workshops/Vendors Tutorial</p>
	<video controls><source src='.wp_get_attachment_url('448').' type="video/mp4">Your browser does not support embedded videos.</video>
	<p>Tickets Tutorial</p>
	<video controls><source src='.wp_get_attachment_url('447').' type="video/mp4">Your browser does not support embedded videos.</video>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
// wp_get_attachment_url() enter ID for the video, enter as source for video 
// Custom back end menu 
function wpse_custom_menu_order( $menu_ord ) {
if ( !$menu_ord ) return true;
	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php', // Posts
		'edit.php?post_type=rmf-musician', //Line up
		'edit.php?post_type=rmf-workshop',// Workshops
		'edit.php?post_type=rmf-vendor', //Vendors
		'edit.php?post_type=rmf-faq', // FAQ
		'edit.php?post_type=page', // Pages
		'upload.php', // Media
		'separator2', // Second separator
		'woocommerce',
		'edit.php?post_type=product', // Products
		'wpseo_dashboard', // Yoast SEO
		"admin.php?page=wc-admin&path=%2Fpayments%2Fconnect", //Payments
		'wpcf7', // Contact forms
		'link-manager.php', // Links
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
		'separator-last', // Last separator
	);
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order');
add_filter( 'menu_order', 'wpse_custom_menu_order' );
//Links to remove
add_action( 'admin_init', 'custom_remove_menu_pages' );
function custom_remove_menu_pages() {
	remove_menu_page( 'edit-comments.php' );
}
// Remove magnifying glass on woocommerce products
add_action( 'after_setup_theme', 'bc_remove_magnifier', 100 ); function bc_remove_magnifier() { remove_theme_support( 'wc-product-gallery-zoom' ); }

// Remove woocommerce sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );