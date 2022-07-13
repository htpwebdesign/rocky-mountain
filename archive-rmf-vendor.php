<?php
/**
 * The template for displaying work archive pages
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

    get_header();
    get_template_part('template-parts/content-banner');?>
    <main id="primary" class="site-main">
<div class="filter-wrapper">
    <section class="button-group filter-button-group">
        <button data-filter="*">Show All</button><?php
        $terms = get_terms( array(
            'taxonomy' => 'rmf-vendor-type',
            'hide_empty' => false ));

        foreach($terms as $term) :
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        endforeach;?>
    </section>
</div>

    <section class="grid vendor-wrapper grid-wrapper">
        
            <header>
                <?php the_archive_description( '<section>', '</div>') ?>
            </header>

            <?php
            $args = array(
                'post_type' => 'rmf-vendor',
                'posts_per_page' => -1
            );

            $query = new WP_Query( $args );
 
            echo '<section class="vendor-layout">';
                echo '<div class="grid-item-wrapper">';
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                            $query->the_post();

                            echo '<article class="vendor-item grid-item '.isotope_vendor_classes(get_the_id()).'">';
                                echo '<h2>'. get_the_title() .'</h2>';
                                    the_post_thumbnail( 'large' );
                                    the_excerpt();
                            echo '</article>';

                        endwhile;
                        wp_reset_postdata();
                    endif; 
                echo '</div>';
            echo '</section>'; ?>
            
        </main>

    <?php
    get_footer();