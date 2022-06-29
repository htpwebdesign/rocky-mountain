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
        post_type_archive_title( '<h1>', '</h1>' );
        the_archive_description( '<div>', '</div>')
        ?>
    </header>
    <div class="grid">

    <div class="button-group filter-button-group">
        <button data-filter="*">Show All</button>
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'rmf-vendor-type',
            'hide_empty' => false,
        ));
        foreach($terms as $term) {
            echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
        }
        ?>
    </div>
    
    <div>
    <?php
    $args = array(
        'post_type' => 'rmf-vendor',

        'posts_per_page' => -1
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();

            echo '<article class="grid-item '.isotope_vendor_classes(get_the_id()).'">';
                echo '<h2>'. get_the_title() .'</h2>';
                the_post_thumbnail( 'large' );
                the_excerpt();
            echo '</article>';

        }
        wp_reset_postdata();
    }
    ?>
</div>
</div>
</main>

<?php
get_footer();