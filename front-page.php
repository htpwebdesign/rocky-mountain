<?php
/**
 * The template for displaying the home page.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header(); ?>
	
	<main id="primary" class="site-main"> <?php
	while ( have_posts() ) :
		the_post();
		if (function_exists ('get_field')) :
			if( get_field('home_page_hero') ): 
				$hero = get_field('home_page_hero'); ?>
					<section class="home-hero-wrapper">
						<img src="<?php echo esc_url( $hero['hero_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['hero_image']['alt'] ); ?>" /> 
						<div class='hero-banner-content'><?php
							the_title( '<h1>', '</h1>' ); ?>
							<h2><?php echo $hero['hero_subtitle']; ?></h2>
								<nav class='hero-ctas'>
									<ul>
										<li><a href="<?php echo esc_url($hero['hero_primary_cta']['url']); ?>"><?php echo esc_html( $hero['hero_primary_cta']['title'] ); ?></a></li>
										<li><a href="<?php echo esc_url($hero['hero_secondary_cta']['url']); ?>"><?php echo esc_html( $hero['hero_secondary_cta']['title'] ); ?></a></li>
									</ul>
								</nav>
						</div>
					</section><?php
			endif; 
		endif; ?>
		
		<?php
			// check to make sure the ACF plugin exists
			if (function_exists ('get_field')) :
			
				if( get_field('home_page_promo_links')) : 
					$home_promo_links = get_field('home_page_promo_links'); ?>
					<nav class="home-promo-links">
						<ul>
							<li><a href="<?php echo esc_url($home_promo_links['promo_link_1']['url']); ?>"><?php echo esc_html( $home_promo_links['promo_link_1']['title'] ); ?></a></li>
							<li><a href="<?php echo esc_url($home_promo_links['promo_link_2']['url']); ?>"><?php echo esc_html( $home_promo_links['promo_link_2']['title'] ); ?></a></li>
							<li><a href="<?php echo esc_url($home_promo_links['promo_link_3']['url']); ?>"><?php echo esc_html( $home_promo_links['promo_link_3']['title'] ); ?></a></li>
						</ul>
					</nav> <?php
				endif; 
			endif; ?>
		<div class='card-wrapper'>
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
						echo '<article class="artist-card">';
						echo '<div class="artist-text-wrapper">';
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
						echo '</div>';

						echo '<figure>';
						//  insert image
							the_post_thumbnail('medium_large');
						echo '</figure>';
						echo '</article>';
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
					$link = $row['content_page_link'];
					$image = $row['content_image'];

					?>
					<article>
					<div id="home-card-cta-text">
						<?php
						echo '<h3>'. $title .'</h3>';
						echo '<h4>'. $subtitle .'</h4>';
						echo '<p>'. $excerpt .'</p>';
						// echo $link;
						// echo wpautop( $image );
						?>
						<a href='<?php echo $link ?>'>Go to <?php echo $title ?> Page ></a>
					</div>
					<?php
					if ($image) {
						echo wp_get_attachment_image( $image['id'], 'large');
					}
					?>
					</article>
					<?php
				}
				}
			}
			?>
			</section>

			<section class="home-vendor">
				<!-- ACF -->
			<?php 
			// check to make sure the ACF plugin exists
			if (function_exists ('get_field')) {
			
				$rows = get_field('home_page_vendor');
				if( $rows ) {

					foreach( $rows as $row ) {
					$title = $row['content_title'];
					$subtitle = $row['content_subtitle'];
					$excerpt = $row['content_excerpt'];
					$link = $row['content_page_link'];
					$link_secondary = $row['content_page_link_secondary'];

					$image = $row['content_image'];

					?>
					<article>
					<article id="vendor-content-wrapper">
						<div id="vendor-text">
						<?php
						echo '<h3>'. $title .'</h3>';
						echo '<h4>'. $subtitle .'</h4>';
						echo '<p>'. $excerpt .'</p>';
						?>
						</div>
					<?php
					// echo $link;
					// echo $link_secondary;
					// echo wpautop( $image );
					?>
					<div id="vendor-image">
						<?php
						if ($image) {
							echo wp_get_attachment_image( $image['id'], 'large');
						}
						?>
					</div>
					</article>
					<nav id="vendor-ctas-wrapper">
						<a href='<?php echo $link ?>'>Go to <?php echo $title ?> Page ></a>
						<a href='<?php echo $link_secondary ?>'> <?php echo $title ?> Sign-up ></a>
					</nav>
					</article>
					<?php
				}
				}
			}
			?>
			</section>
			<section class="home-news">
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
						
						<article class="news-article">
							<h3><?php the_title(); ?></h3>
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
								
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>">Read More ></a>
							
						</article>
						<?php 

						
						
					endwhile;
					wp_reset_postdata();
					endif;
			
			
			?>

			</section>
		</div>

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
