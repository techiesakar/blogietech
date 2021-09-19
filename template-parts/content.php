<?php

/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogietech
 */

?>


<section class="single-header container">
    <?php the_category(); ?>

    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php
    $subtitle = get_post_meta(get_the_ID(), 'blogietech_subtitle_subtitle', true);
    if (!empty($subtitle)) {
        echo '<div class="entry-subtitle">' . $subtitle . '</div>';
    }
    ?>
    <div class="entry-meta">
        <div class="meta-author">

            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php echo get_avatar(get_the_author_meta('ID')); ?></a>

            <span class="meta-author-by">By</span>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>
        </div>
        <div class="date-posted">
            <span>
                <svg width="12" height="12" aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path>
                </svg> <?php echo get_the_date('d M Y', $post->ID)  ?></span>
        </div>
        <div class="post-views">

            <svg width="12" height="12" aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path>
            </svg>
            <?php
            echo getPostViews(get_the_ID());
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/components/social', 'share'); ?>




    <!-- Entry Meta Ends -->
</section>
<!-- Single Header Ends -->


<div class="container single-body">
    <div class="primary" role="main">
        <?php
        // Checking condition for featured image
        $featured_image_status = get_post_meta(get_the_ID(), 'enable_featured_imageenable-featured-image', true);
        if ($featured_image_status) : ?>
            <div class="entry-thumb">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('post-thumbnails pinterest-img');
                }
                ?>
            </div>
        <?php endif;
        // Featured Image Condition Ends
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content() ?>
            
        </article>
        <?php get_template_part('template-parts/components/social', 'share'); ?>
        <div class="post-tags">
            <?php echo get_the_tag_list('<p>Tags: ','','</p>'); ?>
        </div>
        <?php get_template_part('template-parts/components/author','box'); ?>

        <?php if (comments_open() || get_comments_number()) :
            comments_template();
        endif; ?>
    </div>
    <aside class="sidebar">
        <?php dynamic_sidebar('single-sidebar-1');
        ?>

        <div class="sticky-sidebar">
            <?php dynamic_sidebar('single-sticky'); ?>
        </div>
    </aside>


</div>
<!-- Single Body Ends -->