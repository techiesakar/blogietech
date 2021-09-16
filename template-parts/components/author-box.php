<div class="author-box">
    <div class="author-avatar">
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"> <?php echo get_avatar(get_the_author_meta('ID')); ?></a>
    </div>
    <div class="author-content">
        <div class="author-name">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>
        </div>
        <div class="author-desc">
            <?php echo wpautop(get_the_author_meta('description')); ?>
        </div>
        <div class="author-social-links">
            <?php echo blogietech_get_user_social_links(); ?>
        </div>
    </div>
</div>