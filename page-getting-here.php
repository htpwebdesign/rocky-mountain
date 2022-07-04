<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

get_header();
?>

	<main id="primary" class="site-main">
        <?php
		while ( have_posts() ) :
			the_post();
            ?>
            <h1><?php the_title();?></h1>
            <section>
                <p><?php the_field('getting_here_description') ?></p>
            </section>
            <section>
                <?php 
                if( have_rows('travel') ):
                    // Loop through rows.
                    while( have_rows('travel') ) : the_row();
                        // Load sub field value.
                    ?>
                    <article>
                        <h2><?php the_sub_field('travel_title')?> </h2>
                        <p><?php the_sub_field('travel_instructions') ?></p>
                    </article>                
                        <?php
                    // End loop.
                    endwhile;
                endif; ?>
            </section>
            <section>
            <?php
            // Google Maps 
                $location = get_field('google_maps');
                if( $location ): ?>
                    <div class="acf-map" data-zoom="16">
                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endwhile; // End of the loop. ?>
	</main><!-- #main -->
<?php
get_footer();