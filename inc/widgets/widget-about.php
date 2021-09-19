<?php

// Adds widget: About us
class Aboutus_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'aboutus_widget',
            esc_html__('About us', 'blogietech'),
            array('description' => esc_html__('Place this widget in between footer section for better result', 'blogietech'),) // Args
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Place site description',
            'id' => 'placesitedescri_textarea',
            'type' => 'textarea',
        ),
        array(
            'label' => 'Contact us',
            'id' => 'contactus_email',
            'type' => 'email',
        ),
    );

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Output generated fields
        echo '<p>' . $instance['placesitedescri_textarea'] . '</p>';
        $instance['contactus_email'];
        echo '<p> <span class="footer-contact-label">Contact us</span>: '  . $instance['contactus_email'] . '</p>';
        echo $args['after_widget'];
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'blogietech');
            switch ($widget_field['type']) {
                case 'textarea':
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'blogietech') . ':</label> ';
                    $output .= '<textarea class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" rows="6" cols="6" value="' . esc_attr($widget_value) . '">' . $widget_value . '</textarea>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'blogietech') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'blogietech');
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'blogietech'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_aboutus_widget()
{
    register_widget('Aboutus_Widget');
}
add_action('widgets_init', 'register_aboutus_widget');
