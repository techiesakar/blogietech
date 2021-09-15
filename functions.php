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
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blogietech, use a find and replace
		 * to change 'blogietech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('blogietech', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('mix-post-landscape', 600, 314, true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__('Primary', 'blogietech'),
				'mobile-menu' => esc_html__('Mobile', 'blogietech'),
				'footer-menu' => esc_html__('Footer', 'blogietech')
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


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

// Filter except length to 35 words.
// blogietech custom excerpt length
function blogietech_excerpt_length($length)
{
	return 28;
}
add_filter('excerpt_length', 'blogietech_excerpt_length', 999);




require get_template_directory() . '/inc/author-social-profiles.php';

require get_template_directory() . '/inc/plugins/subtitle.php';

require get_template_directory() . '/inc/plugins/view-counter.php';

require get_template_directory() . '/inc/plugins/emoji-off.php';
require get_template_directory() . '/inc/plugins/enable-featured-image.php';

// require get_template_directory() . '/inc/plugins/compare/compare.php';


// /** * Completely Remove jQuery From WordPress */
// function my_init()
// {
// 	if (!is_admin()) {
// 		wp_deregister_script('jquery');
// 		wp_register_script('jquery', false);
// 	}
// }
// add_action('init', 'my_init');

// /* Remove admin bar */
// remove_action('init', 'wp_admin_bar_init');
