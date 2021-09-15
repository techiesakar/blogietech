<?php
$default_posts_per_page = get_option('posts_per_page');
$count = 1;
while (have_posts()) :
    the_post(); ?>
    <?php if ($count <= $default_posts_per_page) : ?>
        <?php
        // set_query_var('show_date', $show_date);
        // set_query_var('show_author', $show_author); 
        ?>
        <?php
        if ($count == 1) : ?>


            <!-- Place First Design -->
            <?php $post_id = get_the_ID(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item-1'); ?>>
                <div class="loop-content no-featured">
                    <?php the_category(); ?>

                    <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <h2><?php the_title(); ?></h2>
                    </a>

                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
                </div>

            </article><!-- #post-<?php the_ID(); ?> -->

        <?php elseif ($count == 2) : ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item-2'); ?>>
                <div class="loop-content">
                    <div class="post-thumb">

                        <a href="<?php the_permalink(); ?>"> <?php
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


                    </div>
                </div>

            </article><!-- #post- -->


        <?php elseif ($count == 3) : ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item-3'); ?>>
                <div class="loop-content">
                    <div class="post-thumb">

                        <a href="<?php the_permalink(); ?>"> <?php
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
                    </div>
                </div>

            </article><!-- #post- -->
        <?php else : ?>
            <!-- For Remaining Posts -->

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
        <?php endif; ?>
    <?php
    endif; ?>
<?php $count++;

endwhile;
?>