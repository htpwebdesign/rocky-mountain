<?php
/**
 *
 * Template for displaying the contact page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
get_template_part('template-parts/content-banner');
?>

				
		<main id="primary" class="site-main">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<header class="entry-header">

			</header>
			<div class="content-wrapper">
				<div class="entry-content">
						<?php echo do_shortcode('[contact-form-7 id="328" title="Contact Us Form"]')?>
				</div>
			</div>
		<?php endwhile; // End of the loop. ?>

		</main>

<?php
get_footer();
