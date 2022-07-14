<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

get_header();
get_template_part('template-parts/content-banner');
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>

                <!-- // why is this not working? -->
				<header>
                    <h1 class="page-title screen-reader-text"><?php the_title();?></h1>
				</header>
				<?php
			endif;
            ?>
			<section class="main-news-section">
			<?php 
				$args = array( 
					// this is the default but we want to be specific
					'post-type'     => 'post',
					// default is 10 but here we can define how many we want to pull. Default is most recent
					'posts_per_page' => 12
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
								the_post_thumbnail( 'landscape-blog', array( 'class' => 'main-blog-images' ) );
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
				endif;?>

		</section>
        <?php
			// endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #main -->
<?php
get_footer();
