<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

get_header();
get_template_part('template-parts/content-banner');
?>

	<main id="primary" class="site-main">
		<header class="entry-header">
			<?php while ( have_posts() ) : the_post(); ?>
		</header>
		<div class='content-wrapper'>
				<p><?php the_field('process_description') ?></p>
		
				<div class="sign-up-form">
					<?php echo do_shortcode('[contact-form-7 id="359" title="Vendor Sign-Up"]') ?>
				</div>
		</div>

			
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php
get_footer();
