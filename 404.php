<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Rocky_Mountain
 */

get_header();
get_template_part('template-parts/content-banner');
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class='wrapper-404'>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rocky-mountain' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rocky-mountain' ); ?></p>

						<?php
						get_search_form();
						?>
				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
