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

		<div class='accessibility-wrapper'>
		<?php
		while ( have_posts() ) :
			
			the_post();
			if (function_exists ('get_field')) :
				if( have_rows('accessibility_topic') ):
						// Loop through rows.
					while( have_rows('accessibility_topic') ) : the_row();
						$image= get_sub_field('image');
						// Load sub field value.
						?>
						<section class='access-topic'>
							<h2><?php the_sub_field('section_title'); ?></h2>
							<div class='access-content'>
							<?php 							
							if ($image) {
								echo wp_get_attachment_image( $image['id'], 'large');
							};
							the_sub_field('content');?>
						</section>
						<?php
					// End loop.
					endwhile;
				endif;
			endif;
		endwhile; // End of the loop.?>
		</div>
	</main><!-- #main -->

<?php
get_footer();