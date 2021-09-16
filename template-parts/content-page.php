<?php

/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogietech
 */

?>

<div class="container page-body">
	<div class="primary" role="main">
		<?php
		// Checking condition for featured image
		$featured_image_status = get_post_meta(get_the_ID(), 'enable_featured_imageenable-featured-image', true);
		if ($featured_image_status) : ?>
			<div class="entry-thumb">
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail('post-thumbnails');
				}
				?>
			</div>
		<?php endif;
		// Featured Image Condition Ends
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content() ?>
		</article>
		<?php if (comments_open() || get_comments_number()) :
			comments_template();
		endif; ?>
	</div>
	<aside class="sidebar">
		<?php dynamic_sidebar('single-sidebar-1');
		?>

		<div class="sticky-sidebar">
			<?php dynamic_sidebar('single-sticky'); ?>
		</div>
	</aside>


</div>
<!-- Page Body Ends -->