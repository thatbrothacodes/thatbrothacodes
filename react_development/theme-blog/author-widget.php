<?php
 
/**
 * Adds TBC_Author_Widget widget.
 */
class TBC_Author_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'tbc_author_widget', // Base ID
            'TBC_Author_Widget', // Name
            array( 'description' => __( 'TBC Author Widget', 'text_domain' ), ) // Args
        );

        add_action( 'widgets_init', function() {
            register_widget( 'TBC_Author_Widget' );
        });
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $headshot = apply_filters( 'widget_headshot', $instance['headshot'] );
        $first_name = apply_filters( 'widget_first_name', $instance['first_name'] );
        $last_name = apply_filters( 'widget_last_name', $instance['last_name'] );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $city = apply_filters( 'widget_city', $instance['city'] );
        $state = apply_filters( 'widget_state', $instance['state'] );
        $biography = apply_filters( 'widget_biography', $instance['biography'] );
        $email = apply_filters( 'widget_email', $instance['email'] );
 
        echo $before_widget;
        if ( ! empty( $headshot ) ) {
            echo $headshot;
        }

        if ( ! empty( $first_name ) ) {
            echo $first_name;
        }

        if ( ! empty( $last_name ) ) {
            echo $last_name;
        }

        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

        if ( ! empty( $city ) ) {
            echo $city;
        }

        if ( ! empty( $state ) ) {
            echo $state;
        }

        if ( ! empty( $biography ) ) {
            echo $biography;
        }

        if ( ! empty( $email ) ) {
            echo $email;
        }

        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <div className="profile content">
            <div className="headshot">
                <img alt="headshot" src="<?php echo $this->get_field_name( 'headshot' ); ?>" />
            </div>
            <div><?php echo $this->get_field_name( 'first_name' ); ?>&nbsp;<?php echo $this->get_field_name( 'last_name' ); ?></div>
            <div><?php echo $this->get_field_name( 'title' ); ?></div>
            <div><?php echo $this->get_field_name( 'city' ); ?>, <?php echo $this->get_field_name( 'state' ); ?></div>
            <div><?php echo $this->get_field_name( 'biography' ); ?></div>
            <div><?php echo $this->get_field_name( 'email' ); ?></div>
        </div>
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
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['first_name'] = ( !empty( $new_instance['first_name'] ) ) ? strip_tags( $new_instance['first_name'] ) : '';
        $instance['last_name'] = ( !empty( $new_instance['last_name'] ) ) ? strip_tags( $new_instance['last_name'] ) : '';
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['city'] = ( !empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
        $instance['state'] = ( !empty( $new_instance['state'] ) ) ? strip_tags( $new_instance['state'] ) : '';
        $instance['biography'] = ( !empty( $new_instance['biography'] ) ) ? strip_tags( $new_instance['biography'] ) : '';
        $instance['email'] = ( !empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
        $instance['headshot'] = ( !empty( $new_instance['headshot'] ) ) ? strip_tags( $new_instance['headshot'] ) : '';

        return $instance;
    }
 
} // class TBC_Author_Widget
 
?>