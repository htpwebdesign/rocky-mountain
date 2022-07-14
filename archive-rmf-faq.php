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
		endif; 				
		?>
		<div class="faq-beige-box">
			<div class="faq-green-box">
				<section class=" faq-wrapper">
				<?php
					$args = array( 
						// matches with unique name we gave the cpt
						'post_type' => 'rmf-faq',
						'posts_per_page' => -1
					);

					$query = new WP_Query( $args );

						if ($query -> have_posts()) :
							while ( $query -> have_posts()) :
								$query -> the_post();
								if (function_exists ('get_field')) :
								?><div class="faq-even-odd">
									<article class="faq-article">
										<button class="accordion"><?php the_title(); ?></button>
										<div class="panel">
											<?php the_field('faq_description'); ?>
										</div>
									</article>
								</div>
							<?php endif;
							endwhile;
						wp_reset_postdata();
						endif; ?>
				</section>
			</div>
		</div>
	</main><!-- #primary -->

<?php

get_footer();
