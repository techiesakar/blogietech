<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogietech
 */

get_header();
?>
<div id="content">
    <div class="container main-container homepage-content">
        <main id="primary" class="site-main">
            <div class="featured-content">
                <?php get_template_part('template-parts/blocks/mixed-style', 'posts');
                ?>
            </div>
        </main>
        <aside class="sidebar">
            <?php
            dynamic_sidebar('home-sidebar-1');

            ?>
            <div class="sticky-sidebar">
                <?php dynamic_sidebar('home-sticky'); ?>
            </div>
        </aside>
    </div>
    <div class="pagination">
        <?php
        blogietech_pagination(); ?>
    </div>
</div>

<?php
get_footer();
