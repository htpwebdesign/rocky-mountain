<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rocky_Mountain
 */

?>

<section class="page-header">

	<?php
	// h1 title for news archive page
	if (is_home()) {
		?>
			<h1>News & Announcements</h1> 
		<?php
	}
	// h1 title for single post (news article) page
	if (is_single()) {
		?>
			<h1><?php the_title();?></h1> 
		<?php
	}

	// h1 titles for specific template pages
	$page_ids=array(34,28,40,32,30,36,26,15,154,3,24);
	if(in_array( $post->ID, $page_ids )) {
	?>
    <h1><?php the_title();?></h1>

	<?php
	}
	// h1 title for archive pages
	if(is_post_type_archive()) {
		$postType = get_queried_object();
		if (esc_html($postType->labels->singular_name)=="Musician") {
			echo "<h1>The Line-Up</h1>";
		} 
		else if (esc_html($postType->labels->singular_name)=="Workshop") {
			echo "<h1>Workshops</h1>";
		} else if (esc_html($postType->labels->singular_name)=="Vendor") {
			echo "<h1>Vendors</h1>";
		} else {
			post_type_archive_title( '<h1>', '</h1>' );
		}
	}
	?>
</section>
