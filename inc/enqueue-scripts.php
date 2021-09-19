<?php
function blogietech_scripts()
{
    wp_enqueue_style(
        'blogietech-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/header.css'),
        false
    );
    // for home only

    // if (is_home()) {

        wp_enqueue_style(
            'blogietech-mix-posts',
            get_template_directory_uri() . '/assets/css/mix-posts.css',
            array(),
            filemtime(get_template_directory() . '/assets/css/mix-posts.css'),
            false
        );

       
    // };

    if (is_singular()) {

        wp_enqueue_style(
            'blogietech-single',
            get_template_directory_uri() . '/assets/css/single.css',
            array(),
            filemtime(get_template_directory() . '/assets/css/single.css'),
            false
        );
    };
    wp_enqueue_style(
        'blogietech-gallery',
        get_template_directory_uri() . '/assets/css/gallery.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/gallery.css'),
        false
    );

    wp_enqueue_style('blogietech-style', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
    wp_style_add_data('blogietech-style', 'rtl', 'replace');

    wp_enqueue_style(
        'blogietech-sidebar',
        get_template_directory_uri() . '/assets/css/sidebar.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/sidebar.css'),
        false
    );

    wp_enqueue_style(
        'blogietech-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/footer.css'),
        false
    );

    // wp_enqueue_style('fonts-css', get_template_directory_uri() . '/assets/css/fonts.css', [], false, 'all');




    wp_enqueue_script(
        //For Navigation
        'blogietech-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        filemtime(get_template_directory() . '/js/navigation.js'),
        true
    );





    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blogietech_scripts');
