<?php

/**
 * Custom Search Form.
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'blogietech'); ?></span>
    <input id="search-input" class="search-data" type="search" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'aquila'); ?>" value="<?php the_search_query(); ?>" aria-label="Search" name="s">
    <button class="" type="submit">
        <i class="icon icon-search"></i>
    </button>
</form>