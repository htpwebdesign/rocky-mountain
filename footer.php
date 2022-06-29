<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rocky_Mountain
 */

?>
	<footer id="colophon" class="site-footer">
		<section class="featured-vendors">
			<h2>Feature Vendors</h2>
			<?php
			$args = array(
                'post_type'      => 'rmf-vendor',
				'posts_per_page' => 3,
				'tax_query'      => array(
					array(
						'taxonomy' => 'rmf-vendor-tier',
						'field'    => 'slug',
						'terms'    => 'platinum'
					),
				),
			);
                $query = new WP_Query( $args );

			if ( $query -> have_posts() ){
				while ( $query -> have_posts() ) {
					$query -> the_post();
						?>
						<h3> <?php the_title() ?> </h3>
						<?php the_post_thumbnail(); ?>
					<?php

				}
				wp_reset_postdata();
			};
			?>
		</section>
		<section>
			<h2>Important Links</h2>
			<nav id="footer-navigation" class="footer-navigation">
				<?php
					wp_nav_menu( array("theme_location" => "footer"));
				?>
			</nav>
		</section>

		<section>
			<h2>Sign up for updates!</h2>
				<p>Stay up to date on news about our Vendors, Workshops and Musical Line-Up!</p>
				<?php echo do_shortcode('[contact-form-7 id="378" title="Newsletter Sign Up"]') ?>
		</section>
		<section>
			<h2>Follow Us!</h2>
			<nav id="social-navigation" class="social-navigation">
				<?php
					wp_nav_menu( array("theme_location" => "social"));
				?>
			</nav>
		</section>
		<section>
			<nav id="legal-navigation" class="legal-navigation">
				<?php
					wp_nav_menu( array("theme_location" => "legal"));
				?>
			</nav>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
