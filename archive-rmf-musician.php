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
    <div class="button-group filter-button-group">
        <button data-filter="*">Show All</button>
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'rmf-music-genre',
            'hide_empty' => false,
        ));
        foreach($terms as $term) {
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        }
    ?>
    </div>

<div class="grid">
<main>
    <header>
        <?php
        the_archive_title( '<h1>', '</h1>' );
        the_archive_description( '<div>', '</div>')
        ?>
    </header>
    <?php
    $args = array(
        'post_type' => 'rmf-musician',

        'posts_per_page' => -1
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();

            echo '<article class="grid-item '.isotope_classes(get_the_id()).'">';
                echo '<h2>'. get_the_title() .'</h2>';
                the_post_thumbnail( );
                get_categories();
                if ( function_exists ( 'get_field' ) ) {
			
		 
			
                    if ( get_field( 'band_description' ) ) {
                        echo '<p>'. the_field( 'band_description' ) .'</p>';
                    }
                    if ( get_field( 'day' ) ) {
                        echo '<p>'. the_field( 'day' ) .'</p>';
                    }
                    if ( get_field( 'start_time' ) ) {
                        echo '<p>'. the_field( 'start_time' ) .'</p>';
                    }
                };


                the_excerpt();
            echo '</article>';

        }
        wp_reset_postdata();
    }
    ?>
</main>
</div>
<?php
get_footer();