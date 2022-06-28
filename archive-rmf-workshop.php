<?php
/**
 * The template for displaying work archive pages
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

get_header();
?>

<main>
    <header>
        <?php
        the_archive_title( '<h1>', '</h1>' );
        the_archive_description( '<div>', '</div>')
        ?>
    </header>

    <?php
    $args = array(
        'post_type' => 'rmf-workshop',

        'posts_per_page' => -1
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();

            echo '<article>';
                echo '<h2>'. get_the_title() .'</h2>';
                the_post_thumbnail( 'large' );
                the_excerpt();
            echo '</article>';

        }
        wp_reset_postdata();
    }
    ?>
</main>