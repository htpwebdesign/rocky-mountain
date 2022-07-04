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
        <section>
            <h1><?php the_title();?></h1>
            <p><?php the_field('description'); ?></p>
        </section>

        <section>
            <h2>Musical Line Up</h2>
            <?php
            $date_now = date('2022-07-29');
            $args = array(
                'posts_per_page' => -1,
                'post_type'      => 'rmf-musician',
                'order'          => 'ASC',
                'orderby'        => 'meta_value',
                'meta_key'       => 'start_time',
                );
                $query = new WP_Query( $args );
            ?>
            <section>
            
            <button class="accordion"><h3>Day 1</h3></button>
            <div class="panel">
            <?php
            if ( $query -> have_posts() ){
                while ( $query -> have_posts() ) {
                    $query -> the_post();
                foreach( $query as $post ) :
                    //Day 1 Schedule
                    if (get_field('day') == "Day 1"): 
                    ?>
                    <article>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_field('location'); ?></p>
                        <p> <?php $startTime = explode('2022', get_field('start_time')); echo $startTime[1]; ?> - <?php $endTime = explode('2022', get_field('end_time')); echo $endTime[1]; ?></p>
                    </article>
                    <?php
                    endif;
                endforeach;
            }}
            ?>
            </section>
            </section>
            <section>
            <button class="accordion"><h3>Day 2</h3></button>
            <div class="panel">
            <?php
            if ( $query -> have_posts() ){
                while ( $query -> have_posts() ) {
                    $query -> the_post();
                foreach( $query as $post ) :
                    //Day 2 Schedule
                    if (get_field('day') == "Day 2"): 
                    ?>
                    <article>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_field('location'); ?></p>
                        <p> <?php $startTime = explode('2022', get_field('start_time')); echo $startTime[1]; ?> - <?php $endTime = explode('2022', get_field('end_time')); echo $endTime[1]; ?></p>
                    </article>
                    <?php
                    endif;
                endforeach;
            }}
            ?>
            </div>
            
            <section>
            <h2>Workshops</h2>
            <?php
            $date_now = date('2022-07-29');
            $args = array(
                'posts_per_page' => -1,
                'post_type'      => 'rmf-workshop',
                'order'          => 'ASC',
                'orderby'        => 'meta_value',
                'meta_key'       => 'workshop_time',
                );
                $query = new WP_Query( $args );
            ?>
            <button class="accordion"><h3>Day 1</h3></button>
            <div class="panel">
            <?php
            if ( $query -> have_posts() ){
                while ( $query -> have_posts() ) {
                    $query -> the_post();
                    
                    foreach( $query as $post ) :
                        //Day 1 Schedule
                        if (get_field('workshop_day') == "Saturday"): 
                        ?>
                        <article>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_field('workshop_location'); ?></p>
                            <p> <?php $startTime = explode('2022', get_field('workshop_time')); echo $startTime[1]; ?> - <?php $endTime = explode('2022', get_field('workshop_end_time')); echo $endTime[1]; ?></p>
                        </article>
                        <?php
                        endif;
                    endforeach;
            }}
            ?>
            </div>
            </section>
            <section>
            <button class="accordion"><h3>Day 2</h3></button>
            <div class="panel">
            <?php
            if ( $query -> have_posts() ){
                while ( $query -> have_posts() ) {
                    $query -> the_post();
                    foreach( $query as $post ) :
                        //Day 2 Schedule
                        if (get_field('workshop_day') == "Sunday"): 
                        ?>
                        <article>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_field('location'); ?></p>
                            <p> <?php $startTime = explode('2022', get_field('workshop_time')); echo $startTime[1]; ?> - <?php $endTime = explode('2022', get_field('workshop_end_time')); echo $endTime[1]; ?></p>
                        </article>
                        <?php
                        endif;
                    endforeach;
            }}
            ?>
            </div>
            </section>


		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->

<?php
get_footer();
