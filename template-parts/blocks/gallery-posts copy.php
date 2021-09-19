<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$product_args = array(
    'post_type' => 'product',
    'posts_per_page' => 2, //the same as the parse_query filter in our functions.php file
    'paged' => $paged,
    'page' => $paged
);

$product_query = new WP_Query($product_args); ?>

<?php if ($product_query->have_posts()) : ?>
    <!-- The loop -->

    <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-item-2'); ?>>
            <div class="loop-content">
                <div class="post-thumb">

                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('mix-post-landscape');
                        }
                        ?>
                    </a>
                </div>
                <div class="post-content">
                    <?php the_category(); ?>

                    <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <h2><?php the_title(); ?></h2>
                    </a>
                </div>
            </div>
        </article>

    <?php endwhile; ?>
    <!-- end of the loop -->

    <?php wp_reset_postdata(); ?>

<?php else :  ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>