<?php

/**
 * Template Name: Archives
 * @package Blogietech
 */

get_header();
?>

<main>
	<div class="archive-header container">
		<h1 class="page-title"><?php single_cat_title(); ?></h1>
		<p><?php
			the_archive_description('<div class="taxonomy-description">', '</div>');
			?></p>
	</div>
	<div class="archive-body container">
		<div class="archive-primary">
			<?php get_template_part('template-parts/content', 'archive');
			?>
		</div>
		<aside>
			<aside class="sidebar">
				<?php dynamic_sidebar('single-sidebar-1');
				?>

				<div class="sticky-sidebar">
					<?php dynamic_sidebar('single-sticky'); ?>
				</div>
			</aside>
		</aside>
	</div>
</main>

<?php
get_footer(); ?>