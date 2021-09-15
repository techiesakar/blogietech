<?php

/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogietech
 */

?>


<section class="single-header container">
	<?php the_category(); ?>

	<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	<?php
	$subtitle = get_post_meta(get_the_ID(), 'blogietech_subtitle_subtitle', true);
	if (!empty($subtitle)) {
		echo '<div class="entry-subtitle">' . $subtitle . '</div>';
	}
	?>

</section>
<!-- Single Header Ends -->


<div class="container single-body">
	<div class="single-primary" role="main">
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
<!-- Single Body Ends -->