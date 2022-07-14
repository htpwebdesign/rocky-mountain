<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rocky_Mountain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rocky-mountain' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class='screen-reader-text'><?php esc_html_e( 'Primary Menu', 'rocky-mountain' ); ?></span>
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 280 305" style="enable-background:new 0 0 280 305;" xml:space="preserve">
					<path id="Path_170"  d="M276.1,64.6C264-25.2,127.3,9.9,63.3,7.1C-13,25.9,16.4,117.5,6.4,182.5
						C-13.4,278.1,57.1,298.8,130,298.8l5.2-73.9C85.8,253,60,233.1,60,233.1c47.1,5.6,70.5-69.7,70.5-69.7c-11.7,6-50,3.3-50,3.3
						c50-3.3,54.9-73,54.9-73c-14.3,10.3-31.4-4.5-31.4-4.5c25.7-11.8,40.5-60.5,40.5-60.5c-4.6,33.6,34.6,86.1,34.6,86.1
						c-18.6,7.8-21.7-12.8-21.7-12.8c-6.1,53.9,44.3,77.7,44.3,77.7c-14.8,4.3-30.8,0.6-42.3-9.8c-3,42.8,39.9,75.2,39.9,75.2
						c-29.9,6.9-50.5-21.7-50.5-21.7l-5.4,75.9C301.4,330.5,279.1,179.2,276.1,64.6z"/>
				</svg>
			</button>
			<div class="header-hover">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'walker'         => new FWD_Add_Sub_Menu_Button_Walker(),
				)
			);
			?>
			</div>
		</nav><!-- #site-navigation -->
		<!-- <nav class="ecomm-nav">>
		</nav> -->

	</header><!-- #masthead -->
