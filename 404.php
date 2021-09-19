<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blogietech
 */

get_header();
?>

<main id="primary" class="site-main container">
	<div class="error404-wrapper">
		<h1 class="entry-title"><?php esc_html_e('Oops! That page can’t be found.', 'blogietech'); ?></h1>
		<p class="entry-subtitle"><?php esc_html_e(' It looks like nothing was found at this location. Maybe try to search for something else?', 'blogietech'); ?></p>

		<?php
		get_search_form();

		?>
	</div>
	<div class="gallery-posts">
		<?php
		get_template_part('template-parts/blocks/gallery', 'posts');
		?>
	</div>
	<?php blogietech_pagination();?>
</main>
<?php
get_footer();
