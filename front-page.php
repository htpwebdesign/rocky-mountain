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

			<section class="home-hero">
			

			<?php
			// check to make sure the ACF plugin exists
			if (function_exists ('get_field')) {
			
			if( get_field('home_page_hero') ): 
				$hero = get_field('home_page_hero'); 
								?>
				<div id="hero">
					<img src="<?php echo esc_url( $hero['hero_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['hero_image']['alt'] ); ?>" />
					<section class="content">
						<h1><?php echo $hero['hero_title']; ?></h1>
						<h4><?php echo $hero['hero_subtitle']; ?></h4>
			
						<div>
							<a href="<?php echo esc_url($hero['hero_primary_cta']['url']); ?>">
							<?php echo esc_html( $hero['hero_primary_cta']['title'] ); ?></a>

							<a href="<?php echo esc_url($hero['hero_secondary_cta']['url']); ?>">
							<?php echo esc_html( $hero['hero_secondary_cta']['title'] ); ?></a>
						</div>

					</section>
				</div>
				
			<?php endif; 
			} ?>
			</section>

			<section class="home-artists">
				<!-- cpt pull 3 highlight artists wit their images -->
				<!-- perma link to lineup page -->
			</section>
			<section class="home-cards">
				<!-- ACF -->
			<?php 
			// check to make sure the ACF plugin exists
			if (function_exists ('get_field')) {
			
				$rows = get_field('home_page_image_content_links');
				if( $rows ) {

					foreach( $rows as $row ) {
					$title = $row['content_title'];
					$subtitle = $row['content_subtitle'];
					$excerpt = $row['content_excerpt'];
					$link = $row['content_page_pink'];
					$image = $row['content_image'];

					echo wpautop( $title );
					echo wpautop( $subtitle );
					echo wpautop( $excerpt );
					echo wpautop( $link );
					// echo wpautop( $image );
					?>
					<a href='<?php echo $link ?>'>Go to <?php echo $title ?> Page ></a>
					<?php

					if( $image ): ?>
						<img class="home-content-link-image" src="<?php echo $image['url']; ?>" alt="<?php echo $title ; ?>" />
					<?php endif;
				}
				}
			}
			?>
			</section>

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
