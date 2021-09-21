<?php

/**
 * Name: Popular Posts widget.
 * Author: Sakar Aryal
 */
class Popular_Post_Widget extends WP_Widget
{

    // actual widget processes
    function __construct()
    {
        parent::__construct(
            'popular_post_widget', // Base ID
            esc_html__('Popular Posts', 'blogietech'), // Name
            array('description' => esc_html__('A Popular Post Widget', 'blogietech'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $title = $instance['title'];
        $postscount = $instance['posts'];
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
?>

        <ul>
            <?php
            global $wpdb;
            $popular_posts_args = array(
                'posts_per_page' => $postscount,
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',

                // Using the date_query to filter posts from last week
                'date_query' => array(
                    array(
                        'after' => '1 month ago'
                    )
                )
            );
            $popularpost = new WP_Query($popular_posts_args);
            while ($popularpost->have_posts()) : $popularpost->the_post(); ?>
                <?php set_query_var('show_date', $show_date);
                get_template_part('template-parts/popular-posts/popular-posts', 'style1'); ?>
            <?php
            endwhile;
            ?>
        </ul>

    <?php

        echo $args['after_widget'];;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Popular Posts', 'blogietech');
        $posts = !empty($instance['posts']) ? $instance['posts'] : esc_html__('5', 'blogietech');
        $show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            <label for="<?php echo esc_attr($this->get_field_id('posts')); ?>"><?php esc_html_e('Number of Posts:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('posts')); ?>" name="<?php echo esc_attr($this->get_field_name('posts')); ?>" type="text" value="<?php echo esc_attr($posts); ?>">
            <input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
            <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?'); ?></label>
        </p>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['posts'] = (!empty($new_instance['posts'])) ? sanitize_text_field($new_instance['posts']) : '';
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }
}



// Popular Posts Widget
function register_popular_post_widget()
{
    register_widget('Popular_Post_Widget');
}
add_action('widgets_init', 'register_popular_post_widget');
