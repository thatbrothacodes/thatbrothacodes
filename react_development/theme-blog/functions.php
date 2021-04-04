<?php
    function myprefix_enqueue_scripts() {
        wp_enqueue_script( 'bundle', get_template_directory_uri() . '/assets/js/runtime-main.388eb179.js', array(), '1.0.0', true);
        wp_enqueue_script( 'vendors', get_template_directory_uri() . '/assets/js/2.17021f5a.chunk.js', array(), '1.0.0', true);
        wp_enqueue_script( 'bundle-vendors', get_template_directory_uri() . '/assets/js/3.79f9fc23.chunk.js', array(), '1.0.0', true);
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.25a9ad29.chunk.js', array(), '1.0.0', true);

        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap' );
        wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
    }
    
    add_action( 'wp_enqueue_scripts', 'myprefix_enqueue_scripts' );

    /**
     * Adds TBC_Author_Widget widget.
     */
    class TBC_Author_Widget extends WP_Widget {
    
        /**
         * Register widget with WordPress.
         */
        public function __construct() {
            parent::__construct(
                'TBC_Author_Widget', // Base ID
                'TBC_Author_Widget', // Name
                array( 'description' => __( 'TBC Author Widget', 'tbc_author_widget_domain' ), ) // Args
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
        public function widget( $args, $instance ) {
            extract( $args );
            
            if ( ! empty( $instance['headshot'] ) ) {
                $headshot = $instance['headshot'];
            }

            if ( ! empty( $instance['first_name'] ) ) {
                $first_name = $instance['first_name'];
            }

            if ( ! empty( $instance['last_name'] ) ) {
                $last_name = $instance['last_name'];
            }
            
            if ( ! empty( $instance['title'] ) ) {
                $title = $instance['title'];
            }

            if ( ! empty( $instance['city'] ) ) {
                $city = $instance['city'];
            }

            if ( ! empty( $instance['state'] ) ) {
                $state = $instance['state'];
            }

            if ( ! empty( $instance['biography'] ) ) {
                $biography = $instance['biography'];
            }

            if ( ! empty( $instance['email'] ) ) {
                $email = $instance['email'];
            }
    
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

            echo $before_widget;

            ?>
                <div className="profile">
                    <div className="headshot">
                        <img alt="headshot" src="images/10857986_10204105692415410_3700629164483544784_n.jpg" />
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            <?php

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
            if ( isset( $instance[ 'headshot' ] ) ) {
                $headshot = $instance[ 'headshot' ];
            }
            else {
                $headshot = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'first_name' ] ) ) {
                $first_name = $instance[ 'first_name' ];
            }
            else {
                $first_name = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'last_name' ] ) ) {
                $last_name = $instance[ 'last_name' ];
            }
            else {
                $last_name = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'city' ] ) ) {
                $city = $instance[ 'city' ];
            }
            else {
                $city = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'state' ] ) ) {
                $state = $instance[ 'state' ];
            }
            else {
                $state = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'biography' ] ) ) {
                $biography = $instance[ 'biography' ];
            }
            else {
                $biography = __( 'New title', 'text_domain' );
            }

            if ( isset( $instance[ 'email' ] ) ) {
                $email = $instance[ 'email' ];
            }
            else {
                $email = __( 'New title', 'text_domain' );
            }

            ?>
                <p>
                    <label for="<?php echo $this->get_field_name( 'first_name' ); ?>"><?php _e( 'First Name:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'first_name' ); ?>" name="<?php echo $this->get_field_name( 'first_name' ); ?>" type="text" value="<?php echo esc_attr( $first_name ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'last_name' ); ?>"><?php _e( 'Last Name:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'last_name' ); ?>" name="<?php echo $this->get_field_name( 'last_name' ); ?>" type="text" value="<?php echo esc_attr( $last_name ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'city' ); ?>"><?php _e( 'City:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'state' ); ?>"><?php _e( 'State:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" type="text" value="<?php echo esc_attr( $state ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'email' ); ?>"><?php _e( 'E-Mail:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_name( 'biography' ); ?>"><?php _e( 'Biography:' ); ?></label>
                    <textarea class="widefat" id="<?php echo $this->get_field_id( 'biography' ); ?>" name="<?php echo $this->get_field_name( 'biography' ); ?>">
                        <?php echo esc_attr( $biography ); ?>
                    </textarea>
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

    add_action( 'widgets_init', function() {
        register_widget( 'TBC_Author_Widget' );

        register_sidebar( 
            array(
                'name'          => __( 'Profile Sidebar' ),
                'id'            => 'profile-sidebar',
                'before_widget' => NULL,
                'after_widget'  => NULL,
                'before_title'  => NULL,
                'after_title'   => NULL,
            ) 
        );
    });
?> 
