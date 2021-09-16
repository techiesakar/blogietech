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

<div class="blog-post">
    <?php
    $default_posts_per_page = get_option('posts_per_page');
    $count = 1;
    while (have_posts()) :
        the_post(); ?>
        <?php if ($count <= $default_posts_per_page) : ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item-else'); ?>>
                <div class="loop-content">
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('mix-post-landscape');
                            }
                            ?></a>
                    </div>
                    <div class="post-content">
                        <?php the_category(); ?>

                        <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </article><!-- #post-->

        <?php
        endif; ?>
    <?php $count++;

    endwhile;

    wp_reset_postdata();

    ?>
</div>