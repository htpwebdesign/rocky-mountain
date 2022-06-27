<?php
/**
 * The template for displaying the home page.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			?>
		
		
			<h2>Latest News Posts </h2>
			<?php 
				$args = array( 
					// this is the default but we want to be specific
					'post-type'     => 'post',
					// default is 10 but here we can define how many we want to pull. Default is most recent
					'posts_per_page' => 4
				 );
				 $blog_query = new WP_Query( $args );

				 if ( $blog_query -> have_posts()) :
					while( $blog_query -> have_posts()) :
						$blog_query -> the_post();
						// grab the title and link to the post
						?>
						
						<article>
							<a href="
								<?php the_permalink(); ?>">
							<?php
							// Example
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'landscape-blog', array( 'class' => 'home-blog-images' ) );
							}
							?>
							<!-- removed the alink here and instead wrapped the block -->
								<h3><?php the_title(); ?></h3>
							</a>
						</article>
						<?php 

						
						
					endwhile;
					wp_reset_postdata();
				 endif;
			
			
			?>

		</section>

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
