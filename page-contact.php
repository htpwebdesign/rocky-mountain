<?php
/**
 *
 * Template for displaying the contact page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

				
		<main id="primary" class="site-main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

					
				<div class="entry-content">
					<?php
					the_content(); 
					?>
				</div>

			</article>

		<?php endwhile; // End of the loop. ?>

		</main>

<?php
get_footer();
