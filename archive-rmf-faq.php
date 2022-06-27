<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			// while ( have_posts() ) :
			// 	the_post();

			// 	/*
			// 	 * Include the Post-Type-specific template for the content.
			// 	 * If you want to override this in a child theme, then include a file
			// 	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			// 	 */
			// 	get_template_part( 'template-parts/content', get_post_type() );

			// endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

        <section>
			<h2>FAQ</h2>
            <div>
                <p>Sort content goes here. Filter by taxonomy (general, admission, camping, etc)</p>
            </div>
        </section>

        <section>
		<?php
			$args = array( 
				// matches with unique name we gave the cpt
				'post_type' => 'rmf-faq',
				'posts_per_page' => -1
			);

			$query = new WP_Query( $args );
			if ($query -> have_posts()) {
				
				while ( $query -> have_posts()) {
					$query -> the_post();
					?>
	
					<button class="accordion"><?php the_title(); ?></button>
					<div class="panel">

					<?php
					the_field('faq_description');
					?>
					</div>
					<?php

				}
				?>
				<?php
				wp_reset_postdata();
			}
		?>
		</section>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
