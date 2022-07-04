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
            <p><?php the_field('map_description') ?></p>
            
            <?php 
            $image = get_field('general_map_image');

            if ($image) {
                echo wp_get_attachment_image( $image['id'], 'large');
            }?>
            
            <?php 
            if( have_rows ('map_locations') ):
                // Loop through rows.
                while( have_rows('map_locations') ) : the_row();
                    // Load sub field value.
                    ?>
                    <?php $locationsImage = get_sub_field('legend_image'); ?>
                    <img src="<?php echo esc_url($locationsImage['url']); ?>" alt="<?php echo esc_attr($locationsImage['alt']);?>" />
                    <?php
                    // End loop.
                endwhile;
            endif;
            ?>
        </section>
        <?php  endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();
