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

				post_type_archive_title( '<h1 class="page-title">', '</h1>' );

				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			

		endif;
		?>

        <section>
            <div>
                <p>Sort content goes here. Filter by taxonomy (general, admission, camping, etc)</p>
            </div>
			<div class="button-group filter-button-group">
				<button data-filter="*">Show All</button>
				<?php
				$terms = get_terms( array(
					'taxonomy' => 'rmf-category-type',
					'hide_empty' => false,
				));
				foreach($terms as $term) {
					echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
				}
			?>
			</div>
        </section>

        <section class="grid">
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
					echo '<article class="grid-item '.isotope_faq_classes(get_the_id()).'">';
					?>
	
					<button class="accordion"><?php the_title(); ?></button>
					<div class="panel">

					<?php
					the_field('faq_description');
					?>
					</div>
					<?php
					echo '</article>';

				}
				?>
				<?php
				wp_reset_postdata();
			}
		?>
		</section>

	</main><!-- #primary -->

<?php
get_footer();
