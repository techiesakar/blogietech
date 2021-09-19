<?php
$default_posts_per_page = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = array(
    'post_type' => 'post',
    'posts_per_page' => $default_posts_per_page, 
    'paged' => $paged,
);
$wp_query = new WP_Query($the_query);
$count = 1;
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  <?php if ($count <= $default_posts_per_page) : ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
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
    <?php
    endif; ?>
<?php $count++;

endwhile;

wp_reset_postdata();

?>
