<?php

/**
 * Blogietech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogietech
 */
// Widgets

require get_template_directory() . '/inc/widgets/widgets.php';


if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('blogietech_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blogietech_setup()
	{
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain('blogietech', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages. */
		add_theme_support('post-thumbnails');
		add_image_size('mix-post-landscape', 600, 314, true);

		register_nav_menus(
			array(
				'primary-menu' => esc_html__('Primary', 'blogietech'),
				'mobile-menu' => esc_html__('Mobile', 'blogietech'),
				'footer-menu' => esc_html__('Footer', 'blogietech')
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);


		add_theme_support(
			'custom-background',
			apply_filters(
				'blogietech_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);


		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 50,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
				'ul' => 'nav-menu'

			)
		);
	}
endif;
add_action('after_setup_theme', 'blogietech_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogietech_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blogietech_content_width', 640);
}
add_action('after_setup_theme', 'blogietech_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function new_excerpt_more($more)
{
	return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

function blogietech_excerpt_length($length)
{
	return 28;
}
add_filter('excerpt_length', 'blogietech_excerpt_length', 999);

/** * Completely Remove jQuery From WordPress Admin Dashboard */


if ( !is_user_logged_in() ) {
	add_action('wp_enqueue_scripts', 'no_more_jquery');
	function no_more_jquery(){
		wp_deregister_script('jquery');
	}
 } 
/** Plugins ** */
require get_template_directory() . '/inc/author-social-profiles.php';
require get_template_directory() . '/inc/plugins/subtitle.php';
require get_template_directory() . '/inc/plugins/view-counter.php';
require get_template_directory() . '/inc/plugins/emoji-off.php';
require get_template_directory() . '/inc/plugins/enable-featured-image.php';
require get_template_directory() . '/inc/plugins/between-related-posts.php';


// Filter only posts in wordpress search result

if (!is_admin()) {
	function wpb_search_filter($query)
	{
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts', 'wpb_search_filter');
}

// Filter Search Result Only By Title - Without Looking Content
function search_by_title($search, $wp_query)
{
	if (!empty($search) && !empty($wp_query->query_vars['search_terms'])) {
		global $wpdb;

		$q = $wp_query->query_vars;
		$n = !empty($q['exact']) ? '' : '%';

		$search = array();

		foreach ((array) $q['search_terms'] as $term)
			$search[] = $wpdb->prepare("$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like($term) . $n);

		if (!is_user_logged_in())
			$search[] = "$wpdb->posts.post_password = ''";

		$search = ' AND ' . implode(' AND ', $search);
	}

	return $search;
}


$args = array(
	's' => 'search string',
	'numberposts' => 5,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true
);

add_filter('posts_search', 'search_by_title', 10, 2);
$recent_posts = wp_get_recent_posts($args, ARRAY_A);
remove_filter('posts_search', 'search_by_title', 500);


