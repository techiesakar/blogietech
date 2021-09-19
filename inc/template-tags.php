<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blogietech
 */

if (!function_exists('blogietech_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blogietech_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'blogietech'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('blogietech_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blogietech_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'blogietech'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('blogietech_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blogietech_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'blogietech'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'blogietech') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'blogietech'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'blogietech') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blogietech'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'blogietech'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if (!function_exists('blogietech_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blogietech_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;




if (!function_exists('blogietech_pagination')) :
	/**
	 * Display Pagination
	 */

	function blogietech_pagination()
	{
		$prev_arrow = is_rtl() ? 'Next &raquo;' : '&laquo; Previous';
		$next_arrow = is_rtl() ? '&laquo; Previous' : 'Next &raquo;';
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 99999999;
		if ($total > 1) {
			echo '<div class="pagination">';
			echo paginate_links(array(
				'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'       => '?paged=%#%',
				'current'		=> max(1, get_query_var('paged')),
				'total' 		=> $total,
				'mid_size'		=> 2,
				'type' 			=> 'plain',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
				'add_args'     => false,
				'add_fragment' => '',
			));
			echo '</div>';
		}
	}
endif;

// Pagination Ends

// Dummy pagination

if (!function_exists('test_pagination')) :
	/**
	 * Display Pagination
	 */

	function test_pagination()
	{
		global $wp_query;
		$total = $wp_query->max_num_pages;
		if ($total > 1) {
			if (!$currentPage = get_query_var('paged'))
				$currentPage = 1;
			if (get_option('permalink_structure')) {
				$format = '?paged=%#%';
			}
			echo paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => $format,
				'current' => $currentPage,
				'total' => $total,
				'mid_size' => 4,
				'type' => 'list'
			));
		}
	}
endif;
// Dummy pagination ends


function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return '<i class="far fa-eye"></i> 0 Views';
	}
	return '<i class="far fa-eye"></i> ' . $count . ' Views';
}
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Add to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
function posts_column_views($defaults)
{
	$defaults['post_views'] = __('Views', 'jnews');
	return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
	if ($column_name === 'post_views') {
		echo getPostViews(get_the_ID());
	}
}
