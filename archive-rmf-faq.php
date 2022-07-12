<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
get_template_part('template-parts/content-banner'); ?>

	<main id="primary" class="site-main"> <?php 
		
		if ( have_posts() ) : 
		endif; ?>
        <!-- <div class="main-interior-wrapper"> -->
		<div class="filter-wrapper">
			<section class="button-group filter-button-group">
				<button data-filter="*">Show All</button> <?php
				
				$terms = get_terms( array(
					'taxonomy' => 'rmf-category-type',
					'hide_empty' => false,
				));
				
				foreach($terms as $term) :
					echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
				endforeach; ?>
			</section>
		</div>
        <div class="main-interior-wrapper">

        <section class="grid faq-wrapper grid-wrapper"> <?php
			$args = array( 
				// matches with unique name we gave the cpt
				'post_type' => 'rmf-faq',
				'posts_per_page' => -1
			);

			$query = new WP_Query( $args );

			echo '<section class="faq-layout">';

				if ($query -> have_posts()) :
					
					while ( $query -> have_posts()) :
						$query -> the_post();
						echo '<article class="faq-item grid-item '.isotope_faq_classes(get_the_id()).'">'; ?>
						<button class="accordion"><?php the_title(); ?></button>
							<div class="panel">
								<?php the_field('faq_description'); ?>
							</div> <?php
						echo '</article>';
					endwhile;
					wp_reset_postdata();
				endif; ?>
			</section>
		</section>
			</div>
	</main><!-- #primary -->

<?php

get_footer();
