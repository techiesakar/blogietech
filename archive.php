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
		<p>
			<?php
			the_archive_description('<div class="taxonomy-description">', '</div>');
			?>
		</p>
	</div>
	<div class="container main-container archive-body">
		<div class="primary">
			<?php get_template_part('template-parts/content', 'archive');
			?>
		</div>
		<aside class="sidebar">
			<?php dynamic_sidebar('single-sidebar-1'); ?>
		</aside>
	</div>
</main>

<?php
get_footer(); ?>