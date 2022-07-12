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
				<div class="featured-vendors-wrapper">
					<div class='the-vendors'>
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
							<article class="featured-vendor">
							<h3> <?php the_title() ?> </h3>
							<?php the_post_thumbnail(); ?>
							</article>
						<?php

					}
					wp_reset_postdata();
				};
				?>
				</div>
			</div>
		</section>
		<section class='footer'>
			<div class='footer-wrapper'>
				<article class="important-links">
					<h2>Important Links</h2>
					<nav class="footer-navigation">
						<?php
							wp_nav_menu( array("theme_location" => "footer"));
						?>
					</nav>
				</article>

<<<<<<< Updated upstream
		<section class="newsletter-updates">
			<h2>Sign up for updates!</h2>
				<p>Stay up to date on news about our Vendors, Workshops and Musical Line-Up!</p>
				<?php echo do_shortcode('[contact-form-7 id="378" title="Newsletter Sign Up"]') ?>
		</section>
		<section class="social-links">
			<h2>Follow Us!</h2>
			<nav id="social-navigation" class="social-navigation">
				<?php
					// wp_nav_menu( array("theme_location" => "social"));
				?>
				<svg xmlns="http://www.w3.org/2000/svg" width="19.35" height="36.145" viewBox="0 0 19.35 36.145">
					<path id="facebook-orange" d="M40.986,20.331l1-6.544H35.713V9.544c0-1.786.875-3.537,3.685-3.537H42.25V.445A34.594,34.594,0,0,0,37.188,0c-5.168,0-8.549,3.134-8.549,8.8v4.984H22.9v6.544h5.746V36.145H35.72V20.331Z" transform="translate(-22.9)" fill="#fdeddf"/>
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" width="31.644" height="31.637" viewBox="0 0 31.644 31.637">
					<path id="instagram-orange" d="M15.751,39.532a8.111,8.111,0,1,0,8.111,8.111A8.1,8.1,0,0,0,15.751,39.532Zm0,13.385a5.273,5.273,0,1,1,5.273-5.273,5.283,5.283,0,0,1-5.273,5.273ZM26.086,39.2a1.892,1.892,0,1,1-1.892-1.892A1.888,1.888,0,0,1,26.086,39.2Zm5.372,1.92A9.363,9.363,0,0,0,28.9,34.492a9.424,9.424,0,0,0-6.629-2.556c-2.612-.148-10.441-.148-13.053,0a9.411,9.411,0,0,0-6.629,2.548A9.393,9.393,0,0,0,.036,41.114c-.148,2.612-.148,10.441,0,13.053A9.363,9.363,0,0,0,2.592,60.8a9.436,9.436,0,0,0,6.629,2.556c2.612.148,10.441.148,13.053,0A9.363,9.363,0,0,0,28.9,60.8a9.424,9.424,0,0,0,2.556-6.629c.148-2.612.148-10.434,0-13.046ZM28.084,56.969a5.339,5.339,0,0,1-3.007,3.007c-2.083.826-7.024.635-9.326.635s-7.25.184-9.326-.635a5.339,5.339,0,0,1-3.007-3.007c-.826-2.083-.635-7.024-.635-9.326s-.184-7.25.635-9.326a5.339,5.339,0,0,1,3.007-3.007c2.083-.826,7.024-.635,9.326-.635s7.25-.184,9.326.635a5.339,5.339,0,0,1,3.007,3.007c.826,2.083.635,7.024.635,9.326S28.91,54.894,28.084,56.969Z" transform="translate(0.075 -31.825)" fill="#fdeddf"/>
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" width="31.62" height="36.138" viewBox="0 0 31.62 36.138">
					<path id="tiktok-brands-orange" d="M31.72,14.818a14.852,14.852,0,0,1-8.669-2.767V24.666A11.475,11.475,0,1,1,11.579,13.187a11.8,11.8,0,0,1,1.574.106V19.64A5.269,5.269,0,1,0,16.6,26.247a5.206,5.206,0,0,0,.24-1.581V0H23.05a8.343,8.343,0,0,0,.134,1.567h0A8.638,8.638,0,0,0,26.99,7.229a8.6,8.6,0,0,0,4.73,1.419v6.17Z" transform="translate(-0.1)" fill="#fdeddf"/>
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" width="36.145" height="29.346" viewBox="0 0 36.145 29.346">
					<path id="twitter-brands-orange" d="M32.431,55.507c.021.318.021.642.021.96,0,9.792-7.455,21.08-21.08,21.08A20.9,20.9,0,0,1,0,74.221a14.905,14.905,0,0,0,1.786.092,14.865,14.865,0,0,0,9.2-3.163,7.423,7.423,0,0,1-6.925-5.139,9.109,9.109,0,0,0,1.4.113,7.761,7.761,0,0,0,1.948-.254A7.4,7.4,0,0,1,1.468,58.6v-.092a7.416,7.416,0,0,0,3.346.939A7.422,7.422,0,0,1,2.52,49.534,21.058,21.058,0,0,0,17.8,57.3a8.471,8.471,0,0,1-.184-1.694,7.416,7.416,0,0,1,12.82-5.069,14.517,14.517,0,0,0,4.7-1.786,7.394,7.394,0,0,1-3.254,4.08,14.929,14.929,0,0,0,4.264-1.144,16.03,16.03,0,0,1-3.713,3.819Z" transform="translate(0 -48.2)" fill="#fdeddf"/>
				</svg>
				
			</nav>
		</section>
		<section class="legal-links">
			<nav id="legal-navigation" class="legal-navigation">
				<?php
					wp_nav_menu( array("theme_location" => "legal"));
				?>
			
			</nav>
=======
				<article class="newsletter-updates">
					<h2>Sign up for updates!</h2>
						<p>Stay up to date on news about our Vendors, Workshops and Musical Line-Up!</p>
						<?php echo do_shortcode('[contact-form-7 id="378" title="Newsletter Sign Up"]') ?>
				</article>
				<article class="social-links">
					<h2>Follow Us!</h2>
					<nav id="social-navigation" class="social-navigation">
						<?php
							wp_nav_menu( array("theme_location" => "social"));
						?>				
					</nav>
					<article class="legal-links">
						<nav id="legal-navigation" class="legal-navigation">
							<?php
								wp_nav_menu( array("theme_location" => "legal"));
							?>
						
						</nav>
					</section>
				</article>
			</div>
>>>>>>> Stashed changes
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
