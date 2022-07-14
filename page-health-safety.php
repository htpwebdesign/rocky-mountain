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
get_template_part('template-parts/content-banner');
?>

	<main id="primary" class="site-main">
        <?php
		while ( have_posts() ) : 
            the_post();
		?>
        <?php if (function_exists ('get_field')) : ?>
        <div class='health-safety-wrapper interior-page-content'>
            <section>
                <?php
                if( have_rows('topic') ):
                    // Loop through rows.
                    while( have_rows('topic') ) : the_row();
                        ?>
                        <article>
                        <h2><?php the_sub_field('section_title'); ?></h2>
                            <div class='health-safety-content'>
                                <?php $image= get_sub_field('image');
                                    if ($image) {
                                        echo wp_get_attachment_image( $image['id'], 'large');
                                    }
                                ?>
                            <p><?php the_sub_field('description'); ?></p>
            
                            </div>
                        </article>
                        <?php
                    // End loop.
                    endwhile;
                endif;
            ?>
            </section>
            <section class='banned-items'>
                <article>
                <h2><?php the_field('section_title'); ?></h2>
                <ul>
                <?php 
                if( have_rows('banned_item') ):
                // Loop through rows.
                    while( have_rows('banned_item') ) : the_row();
                    ?>
                    <li><?php the_sub_field('item_name') ?></li>
                    <?php
                // End loop.
                    endwhile;
                endif;
                ?>
                </ul>
                </article>
            </section>
            <?php 
                endif; 
            ?>
            <?php  endwhile; // End of the loop. ?>

      
	</main><!-- #main -->

<?php
get_footer();
