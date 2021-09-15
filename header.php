<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogietech
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="header">
        <div id="desktop" class="container">
            <div class="left">
                <span id="menuToggle" class="menu-toggle mobile-menu-icon-svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                        <path d="M307.528 231.187c0 47.227-38.267 85.494-85.494 85.494s-85.514-38.257-85.514-85.494c0-47.247 38.277-85.514 85.514-85.514 47.227 0 85.494 38.257 85.494 85.514zM597.494 231.187c0 47.227-38.246 85.494-85.484 85.494s-85.514-38.257-85.514-85.494c0-47.247 38.277-85.514 85.514-85.514s85.484 38.257 85.484 85.514zM887.47 231.187c0 47.227-38.257 85.494-85.494 85.494-47.217 0-85.514-38.257-85.514-85.494 0-47.247 38.287-85.514 85.514-85.514 47.237 0 85.494 38.257 85.494 85.514zM307.528 521.153c0 47.217-38.267 85.504-85.494 85.504s-85.514-38.277-85.514-85.504c0-47.247 38.277-85.514 85.514-85.514 47.227 0 85.494 38.267 85.494 85.514zM597.494 521.153c0 47.217-38.246 85.504-85.484 85.504s-85.514-38.277-85.514-85.504c0-47.247 38.277-85.514 85.514-85.514s85.484 38.267 85.484 85.514zM887.47 521.153c0 47.217-38.257 85.504-85.494 85.504-47.217 0-85.514-38.277-85.514-85.504 0-47.247 38.287-85.514 85.514-85.514 47.237 0 85.494 38.267 85.494 85.514zM307.538 811.119c0 47.223-38.281 85.504-85.504 85.504s-85.504-38.281-85.504-85.504c0-47.223 38.281-85.504 85.504-85.504s85.504 38.281 85.504 85.504zM597.494 811.119c0 47.217-38.277 85.494-85.494 85.494s-85.494-38.277-85.494-85.494c0-47.217 38.277-85.494 85.494-85.494s85.494 38.277 85.494 85.494zM887.47 811.119c0 47.223-38.281 85.504-85.504 85.504s-85.504-38.281-85.504-85.504c0-47.223 38.281-85.504 85.504-85.504s85.504 38.281 85.504 85.504z">
                        </path>
                    </svg></span>
                <div class="site-branding">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                        <div class="logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php
                    else : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php $blogietech_description = get_bloginfo('description', 'display');
                        if ($blogietech_description || is_customize_preview()) :
                        ?>
                            <p class="site-description">
                                <?php echo $blogietech_description;
                                ?>
                            </p>
                        <?php
                        endif; ?>
                    <?php
                    endif; ?>
                </div>
            </div>
            <div class="right">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_id' => 'primary-menu',
                        'container' => '',
                    ));
                    ?>
                </nav>
                <div id="searchDesktopContainer" class="search-container" onclick="toggleDesktopSearch()">

                    <i class="icon icon-search"></i>
                    <i class="icon icon-cancel"></i>
                </div>

            </div>

            <div id="searchDesktopOverlay" class="search-form-wrapper">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div id="canvasBackground" class="canvas-menu-background">
            <div class="canvas-container">
                <div class="canvas-header">
                    <div class="canvas-branding site-branding">
                        <?php
                        if (has_custom_logo()) :
                        ?>
                            <div class="canvas-logo">
                            <?php the_custom_logo();
                        endif
                            ?>
                            </div>
                    </div>
                    <span id="canvasClose" class="canvas-close">
                        <i class="icon icon-cancel"></i>
                    </span>
                </div>
                <div class="canvas-content">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'mobile-menu',
                        'menu_id' => 'mobile-menu',
                        'container' => '',
                        'items_wrap' => '<ul id="mobile-menu" class="menu">%3$s</ul>',

                    ));
                    ?>
                </div>
                <div class="socials-wrap"></div>
            </div>

        </div>

        <div class="scroll-wrapper">
            <div id="scrollIndicator"></div>
        </div>

    </header>