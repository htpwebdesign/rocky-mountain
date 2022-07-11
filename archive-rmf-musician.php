<?php
/**
 * The template for displaying work archive pages
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

get_header();
get_template_part('template-parts/content-banner'); ?>

<div class="filter-wrapper">
    <section class="button-group filter-button-group">
        <button data-filter="*">Show All</button> <?php

        $terms = get_terms( array(
            'taxonomy' => 'rmf-music-genre',
            'hide_empty' => false,
        ));
        
        foreach($terms as $term) :
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        endforeach;

        $terms = get_terms( array(
            'taxonomy' => 'rmf-age-group',
            'hide_empty' => false,
        ));

        foreach($terms as $term) :
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        endforeach;

        $terms = get_terms( array(
            'taxonomy' => 'rmf-featured-musician',
            'hide_empty' => false,
        ));

        foreach($terms as $term) :
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        endforeach; ?>

    </section>
</div>

<div class="grid lineup-wrapper">
    <main>
    <?php

        $args = array(
            'post_type' => 'rmf-musician',
            'posts_per_page' => -1
        );

        $query = new WP_Query( $args );

        echo '<section class="lineup-layout">';

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();

                    echo '<article class="line-up-card grid-item '.isotope_musician_classes(get_the_id()).'">';
                    ?> 
                    <div class="line-up-whole-text">
                     <h2 class="line-up-text"> 

                        <?php 
                            echo get_the_title(); 
                        ?> 
                        </h2>
                        <?php

                        if ( function_exists ( 'get_field' ) ) :
                            if ( get_field( 'band_description' ) ) :
                                ?> <p class="line-up-text"> <?php
                                    the_field( 'band_description' );
                                ?> </p> <?php
                            endif;

                            if ( get_field( 'day' ) ) :
                                ?> <p class="line-up-text"> <?php
                                    the_field( 'day' );
                                ?> </p> <?php
                            endif;

                            if ( get_field( 'start_time' ) ) :?>
                                <p><?php the_field('location'); 
                               $startTime = explode('2022', get_field('start_time'));
                               echo $startTime[1], ' -';
                               $endTime = explode('2022', get_field('end_time')); 
                               echo $endTime[1]; ?>
                               </p> <?php


                            endif;
                        endif;
                        echo '</div>';
                        ?> <div class="line-up-img">

                    <?php
                    echo the_post_thumbnail( 'large' );
                    ?> </div>
                    </article> <?php
                    
                endwhile;
                wp_reset_postdata();
            endif;
        echo '</section>'; ?>
    </main>
</div>
<?php
get_footer();