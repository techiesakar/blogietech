<?php

/**
 * Blogietech Theme Customizer
 *
 * @package Blogietech
 */

use function PHPSTORM_META\type;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogietech_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blogietech_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blogietech_customize_partial_blogdescription',
			)
		);
	}
	// For Typography 
	$wp_customize->add_panel('bt_colors', array(
		'title' => __('Colors', 'blogietech'),
		'priority'          => 10,
		'capability' => 'edit_theme_options'
	));
	
	$wp_customize->add_section('bt_bg_color', array(
		'title' => __('Global', 'blogietech'),
		'description'       => __('Color Settings', 'blogietech'),
		'panel' => 'bt_colors',
	));

	// For Header BG Color //
	$wp_customize->add_setting('bt_header_bg_color', array(
		'default' => "#fffff",
	));

	$wp_customize->add_control('bt_header_bg_color', array(
		'label' => __('Header Bg Color', 'blogietech'),
		'section' => 'bt_bg_color',
		'priority'          => 1,
		'type' => 'color'
	));
	// Header BG Color Ends

	// Footer BG Color
	$wp_customize->add_setting('bt_top_footer_bg', array(
		'default' => "#212025",
	));

	$wp_customize->add_control('bt_top_footer_bg', array(
		'label' => __('Top Footer Color', 'blogietech'),
		'section' => 'bt_bg_color',
		'priority'          => 1,
		'type' => 'color'
	));
// bottom footer bg
	$wp_customize->add_setting('bt_bottom_footer_bg', array(
		'default' => "#0D0D0D",
	));

	$wp_customize->add_control('bt_bottom_footer_bg', array(
		'label' => __('Bottom Footer Color', 'blogietech'),
		'section' => 'bt_bg_color',
		'priority'          => 1,
		'type' => 'color'
	));
	// Footer BG Color Ends

	// Typo Ends

	// for dark mode logo

	$wp_customize->add_section('dark_mode_logo', array(
		'title'             => __('Dark Mode Logo', 'blogietech'),
		'priority'          => 10,
		'description'       => __('Upload Image', 'blogietech'),
	));

	// Add settings and controls
	$logo_names = [
		'Header Logo' => 'header_logo',
		'Footer Logo' => 'footer_logo',
	];

	foreach ($logo_names as $logo_label => $logo_name) {
		$setting_id = sprintf('bt_%s', $logo_name);
		$wp_customize->add_setting($setting_id);

		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				$setting_id,
				[
					'label' => __($logo_label, 'blogietech'),
					'section' => 'dark_mode_logo',
					'settings' => $setting_id,
				]
			)
		);
	}

	$wp_customize->remove_section('colors');
}
add_action('customize_register', 'blogietech_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogietech_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogietech_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogietech_customize_preview_js()
{
	wp_enqueue_script('blogietech-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'blogietech_customize_preview_js');
