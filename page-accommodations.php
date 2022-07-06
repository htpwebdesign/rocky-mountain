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
		<h1><?php the_title() ?></h1>
		<?php
		while ( have_posts() ) :
			the_post();
		?>
		<section class='camping'>
			<button class="accordion"><h2><?php the_field('camping_title') ?></h2></button>
			<div class="panel">
				<p><?php the_field('camping_description') ?></p>
			</div>
		</section>
		<section class='alt-accom'>
			<button class="accordion"><h2><?php the_field('accomm_title') ?></h2></button>
			<div class="panel">
				<p><?php the_field('accomm_description') ?></p>
				<?php
				if( have_rows('nearby_accomm') ):
					// Loop through rows.
					while( have_rows('nearby_accomm') ) : the_row();
					?>
					<article class='hotel'>
						<div>
							<h3><a href="<?php the_sub_field('accom_link') ?> "><?php the_sub_field('name') ?></a></h3>
							<div class='hotel-contact'>
								<address><?php the_sub_field('address') ?></address>
								<p><a href="tel: <?php the_sub_field('phone_number')?>"><?php the_sub_field('phone_number')?></a></p>
							</div>
						</div>
						<figure>
							<?php $image= get_sub_field('image');  
							if ($image) {
								echo wp_get_attachment_image( $image['id'], 'large');
							} ?>
						</figure>

					</article>
				<?php
			// End loop.
					endwhile;
				endif;
			?>
			</div>
		</section>
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();
