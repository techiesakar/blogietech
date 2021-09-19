<?php
class Blogietech_Social_Profile extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'Blogietech_Social_Profile',
            __('BT : Social Profiles', 'blogietech'), // Name
            array(
                'description' => __('Link Site Social Profiles', 'blogietech'),
            )
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

        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $youtube = $instance['youtube'];
        $github = $instance['github'];

        // social profile link
        $facebook_profile = '<li><a target="_blank" class="facebook" href="https://www.facebook.com/' . $facebook . '"><i class="fab icon-facebook"></i></a></li>';
        $twitter_profile = '<li><a target="_blank" class="twitter" href="https://twitter.com/' . $twitter . '"><i class="icon-twitter"></i></a></li>';
        $youtube_profile = '<li><a target="_blank" class="youtube" href="https://youtube.com/' . $youtube . '"><i class="icon-youtube"></i></a></li>';
        $instagram_profile = '<li><a target="_blank" class="instagram" href="https://instagram.com/' . $instagram . '"><i class="icon-instagram"></i></a></li>';
        $github_profile = '<li><a target="_blank" class="github" href="https://www.github.com/' . $github . '"><i class="icon-github"></i></a></li>';


        echo '<section class="widget social-widget">';
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo '<ul class="list-inline social-icons">';
        echo (!empty($facebook)) ? $facebook_profile : null;
        echo (!empty($twitter)) ? $twitter_profile : null;
        echo (!empty($instagram)) ? $instagram_profile : null;
        echo (!empty($youtube)) ? $youtube_profile : null;
        echo (!empty($github)) ? $github_profile : null;
        echo '</ul>';
        echo '</section><!-- Social Widget -->';
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
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'My Social Profile' : null;

        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
        isset($instance['youtube']) ? $youtube = $instance['youtube'] : null;
        isset($instance['github']) ? $github = $instance['github'] : null;
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p><i><b>Username Only</b></i></p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('instagram:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>">
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
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram'])) ? strip_tags($new_instance['instagram']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube'])) ? strip_tags($new_instance['youtube']) : '';
        $instance['github'] = (!empty($new_instance['github'])) ? strip_tags($new_instance['github']) : '';
        return $instance;
    }
}

function register_blogietech_social_profile()
{
    register_widget('blogietech_Social_Profile');
}

add_action('widgets_init', 'register_blogietech_social_profile');
