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
        <section>
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );


            endwhile; // End of the loop.
            
            // Health Topics ex First Aid
            if( have_rows('topic') ):
                // Loop through rows.
                while( have_rows('topic') ) : the_row();
                    ?>
                    <article>
                    <h2><?php the_sub_field('section_title'); ?></h2>
                    <p><?php the_sub_field('description'); ?></p>
                    <?php $image= get_sub_field('image'); ?> 
                    <figure> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </figure>
                    </article>
                    <?php
                // End loop.
                endwhile;
            endif;
        ?>
        </section>
        <section>
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
        </section>

	</main><!-- #main -->

<?php
get_footer();
