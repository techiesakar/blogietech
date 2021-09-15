<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blogietech
 */

get_header();
?>

<main>

	<?php
	while (have_posts()) :
		the_post();
		setPostViews(get_the_ID());
		get_template_part('template-parts/content', get_post_type());

	// If comments are open or we have at least one comment, load up the comment template.

	endwhile; // End of the loop.
	?>
</main>
<!-- Main Ends -->
<?php
get_footer();
