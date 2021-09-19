<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogietech_widgets_init()
{


    // default 
    register_sidebar(
        array(
            'name'          => esc_html__('Home Sidebar 1', 'blogietech'),
            'id'            => 'home-sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'blogietech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Home Sticky', 'blogietech'),
            'id'            => 'home-sticky',
            'description'   => esc_html__('Add widgets here.', 'blogietech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Single Sidebar 1', 'blogietech'),
            'id'            => 'single-sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'blogietech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Single Sticky', 'blogietech'),
            'id'            => 'single-sticky',
            'description'   => esc_html__('Add widgets here.', 'blogietech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'blogietech'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'blogietech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(array(
        'name'          => esc_html__('Footer Logo', 'blogietech'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer Widget number 1', 'blogietech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('About us', 'blogietech'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Place', 'blogietech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Social Area', 'blogietech'),
        'id'            => 'footer-social',
        'description' => "Place Social Widget Here",
        'before_widget' => '<section id="social-widget" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Copyright Area', 'blogietech'),
        'id'            => 'footer-copyright',
        'description' => "Only Place HTML Field Here",
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Menu', 'blogietech'),
        'id'            => 'footer-bottom-menu',
        'description' => "Place Footer Menu Here",
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'blogietech_widgets_init');
