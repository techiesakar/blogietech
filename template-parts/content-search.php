<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogietech
 */
$default_posts_per_page = get_option('posts_per_page');
$count = 1;
?>

<div class="featured-content">
    <?php get_template_part('template-parts/blocks/mixed-style', 'posts'); ?>
</div>