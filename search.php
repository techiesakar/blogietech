<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blogietech
 */
get_header();
global $wp_query;
$total_results = $wp_query->found_posts;

?>
<main>
	<div class="search-header container">
		<h1 class="page-title">
			<?php
			printf(esc_html__('Search Results - %s', 'partner'), '<span>' . get_search_query() . '</span>');
			?>
		</h1>
	</div>
	<div class="container main-container search-body">
		<div class="primary">
			<?php
			get_template_part('template-parts/content', 'search');
			?>
		</div>
		<aside class="sidebar">
			<?php
			dynamic_sidebar('home-sidebar-1');

			?>
			<div class="sticky-sidebar">
				<?php dynamic_sidebar('home-sticky'); ?>
			</div>
		</aside>
	</div>
	<?php
	blogietech_pagination();
	?>
</main>

<?php
get_footer();
