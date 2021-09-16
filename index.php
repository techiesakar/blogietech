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
<main>

    <div class="container main-container homepage-content">
        <div class="primary">
            <div class="featured-content">
                <?php
                get_template_part('template-parts/blocks/mixed-style', 'posts');
                ?>
            </div>


        </div>
        <aside class="sidebar">
            <?php
            dynamic_sidebar('home-sidebar-1');

            ?>
            <div class="sticky-sidebar">
                <?php dynamic_sidebar('home-sticky'); ?>
            </div>
        </aside>
    </div>


    <?php
    blogietech_pagination(); ?>


</main>


<?php
get_footer();
