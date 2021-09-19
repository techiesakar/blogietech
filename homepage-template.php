<?php

/**
 * Template Name: Homepage
 *
 *
 * @package Blogietech
 */

get_header();
?>
<main>

    <div class="container main-container homepage-content">
        <div class="primary">
            <div class="blog-post">
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

   


</main>


<?php
get_footer();
