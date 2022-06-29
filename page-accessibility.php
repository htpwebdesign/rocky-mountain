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
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			if( have_rows('accessibility_topic') ):
					// Loop through rows.
				while( have_rows('accessibility_topic') ) : the_row();
					$image= get_sub_field('image');
					// Load sub field value.
					?>
					<section>
						<h2><?php the_sub_field('section_title'); ?></h2>
						<?php the_sub_field('content');
							if ($image) {
								echo wp_get_attachment_image( $image['id'], 'large');
							};?>
					</section>
					<?php
				// End loop.
				endwhile;
			endif;
		endwhile; // End of the loop.?>
	</main><!-- #main -->

<?php
get_footer();