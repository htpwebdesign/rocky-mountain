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
					<article class="content">
						<h1><?php echo $hero['hero_title']; ?></h1>
						<h4><?php echo $hero['hero_subtitle']; ?></h4>
			
						<div>
							<a href="<?php echo esc_url($hero['hero_primary_cta']['url']); ?>">
							<?php echo esc_html( $hero['hero_primary_cta']['title'] ); ?></a>

							<a href="<?php echo esc_url($hero['hero_secondary_cta']['url']); ?>">
							<?php echo esc_html( $hero['hero_secondary_cta']['title'] ); ?></a>
						</div>

					</article>
				</div>
				
			<?php endif; 
			} ?>

					<article>
						<?php
						// check to make sure the ACF plugin exists
						if (function_exists ('get_field')) {
						
						if( get_field('home_page_promo_links') ): 
							$home_promo_links = get_field('home_page_promo_links'); 
											?>
							<nav id="home-promo-links-wrapper">
								<ul>
									<li><a href="<?php echo esc_url($home_promo_links['promo_link_1']['url']); ?>">
									<?php echo esc_html( $home_promo_links['promo_link_1']['title'] ); ?></a></li>
									<li><a href="<?php echo esc_url($home_promo_links['promo_link_2']['url']); ?>">
									<?php echo esc_html( $home_promo_links['promo_link_2']['title'] ); ?></a></li>
									<li><a href="<?php echo esc_url($home_promo_links['promo_link_3']['url']); ?>">
									<?php echo esc_html( $home_promo_links['promo_link_3']['title'] ); ?></a></li>
								</ul>
						
							</nav>
							
						<?php endif; 
						} ?>
					
					</article>
			</section>

			<section class="home-artists">
				<!-- cpt pull 3 highlight artists wit their images -->
				<!-- perma link to lineup page -->
				<?php 

				$args = array(
					'post_type'      => 'rmf-musician',
					'posts_per_page' => 3, 'orderby' => 'title', 'order' => 'ASC',
					// rmf-featured-musician
					'tax_query' => array(
						array(
							'taxonomy'  => 'rmf-featured-musician',
							'field' 	=> 'slug',
							'terms' 	=> 'featured'
							)
					)
				);
				
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) {
					while( $query->have_posts() ) {
						$query->the_post();
						echo '<article>';
							echo '<h2>'. get_the_title() .'</h2>';
							echo '<p>'. get_field('band_description') .'</p>';

							// Genres
							?> 
							<p>Genres:</p>
							<?php 
							$terms = wp_get_post_terms( $post->ID, 'rmf-music-genre');
							foreach ( $terms as $term ) {
							$term_link = get_term_link( $term );
							
							echo '<h4>'. $term->name .'</h4>';

							}
							// the_content();
							// ECHO OUT THE SPECIALITY
						echo '</article>';

						echo '<figure>';
						//  insert image
							the_post_thumbnail('medium_large');
						echo '</figure>';
					}
					wp_reset_postdata();
				} 
				?>

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

			<h2>News  </h2>
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
							</a>
							<!-- removed the alink here and instead wrapped the block -->
								<h3><?php the_title(); ?></h3>
								<p><?php the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>">Read More ></a>
							
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
