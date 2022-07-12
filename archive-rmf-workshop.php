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
<!-- <div class="main-interior-wrapper"> -->
<div class="filter-wrapper">
    <section class="button-group filter-button-group">
        <button data-filter="*">Show All</button> <?php
        
        $terms = get_terms( array(
            'taxonomy' => 'rmf-workshop-type',
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
        endforeach;?>

    </section>
</div>
<div class="main-interior-wrapper">
<section class="grid workshops-wrapper grid-wrapper">
    
        <header> <?php
            // post_type_archive_title( '<h1>', '</h1>' );
            // the_archive_description( '<div>', '</div>'); ?>
        </header> <?php

        $args = array(
            'post_type' => 'rmf-workshop',
            'posts_per_page' => -1
        );

        $query = new WP_Query( $args );
        
        echo '<section class="workshop-layout">';
            
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();

                    echo '<article class="grid-item workshop-item '.isotope_workshop_classes(get_the_id()).'">';
                        the_post_thumbnail( 'large' );

                        ?>
                        <div class="workshop-text">
                        <?php
                        
                        if ( function_exists ( 'get_field' ) ) :   
                            echo '<h2>'. get_the_title() .'</h2>';
             
                            if ( get_field( 'workshop_description' ) ) :
                                ?>
                                <p>
                                <?php
                                echo the_field( 'workshop_description' );

                                ?>
                                </p>
                                <?php
                            endif;

                            if ( get_field( 'workshop_day' ) ) :
                                ?> <p class="line-up-day"> <?php
                                    the_field( 'workshop_day' );
                                ?> </p> <?php
                            endif;

                            if ( get_field( 'workshop_time' ) ) :?>
                                <p class="line-up-location-time"><?php the_field('workshop_location'); 
                               $startTime = explode('2022', get_field('workshop_time'));
                               echo $startTime[1], ' -';
                               $endTime = explode('2022', get_field('workshop_end_time')); 
                               echo $endTime[1]; ?>
                               </p> <?php


                            endif;
                            //  end jayson new code to fix venue and time

                            // if ( get_field( 'workshop_day' ) ) :
                            //     echo '<p>'. get_the_field( 'workshop_day' ) .'</p>';
                            // endif;
                            // if ( get_field( 'workshop_time' ) ) :
                            //     echo '<p>'. the_field( 'workshop_time' ) .'</p>';
                            // endif;
                        endif;
                        ?>
                        </div>
                        <?php
                        // the_excerpt();
                    echo '</article>';

                endwhile;
                wp_reset_postdata();
            endif;
        echo '</section>'; ?>
    </main>
        </section>
        </div>
<?php
get_footer();