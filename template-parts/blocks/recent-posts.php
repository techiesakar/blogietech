<?php
$default_posts_per_page = get_option('posts_per_page');
$count = 1;
query_posts($default_posts_per_page);
while (have_posts()) :
    the_post();


    if ($post->ID == $do_not_duplicate) continue;

?>
<?php if ($count <= $default_posts_per_page) : ?>



<?php
        set_query_var('show_date', $show_date);
        set_query_var('show_author', $show_author); ?>



<?php else : ?>
<?php return; ?>
<?php
    endif; ?>
<?php $count++;
endwhile;
?>
<?php wp_reset_query(); ?>