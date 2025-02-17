<?php
class CS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget', // Base ID
            esc_html__('* Social', 'itfirm'), // Name
            array('description' => esc_html__('Social Widget', 'itfirm'),) // Args
        );
    }

    function widget($args, $instance) {
        global $woocommerce;

        extract($args);
        if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'itfirm' ) : $instance['title'], $instance, $this->id_base);
        }

        $icon_facebook = 'caseicon-facebook';
        $link_facebook = isset($instance['link_facebook']) ? $instance['link_facebook'] : '';

        $icon_rss = 'caseicon-rss';
        $link_rss = isset($instance['link_rss']) ? $instance['link_rss'] : '';

        $icon_youtube = 'caseicon-youtube';
        $link_youtube = isset($instance['link_youtube']) ? $instance['link_youtube'] : '';

        $icon_twitter = 'caseicon-twitter';
        $link_twitter = isset($instance['link_twitter']) ? $instance['link_twitter'] : '';

        $icon_google = 'caseicon-google-plus';
        $link_google = isset($instance['link_google']) ? $instance['link_google'] : '';

        $icon_skype = 'caseicon-skype';
        $link_skype = isset($instance['link_skype']) ? $instance['link_skype'] : '';

        $icon_dribbble = 'caseicon-dribbble';
        $link_dribbble = isset($instance['link_dribbble']) ? $instance['link_dribbble'] : '';

        $icon_flickr = 'caseicon-flickr';
        $link_flickr = isset($instance['link_flickr']) ? $instance['link_flickr'] : '';

        $icon_linkedin = 'caseicon-linkedin';
        $link_linkedin = isset($instance['link_linkedin']) ? $instance['link_linkedin'] : '';

        $icon_vimeo = 'caseicon-vimeo';
        $link_vimeo = isset($instance['link_vimeo']) ? $instance['link_vimeo'] : '';

        $icon_pinterest = 'caseicon-pinterest';
        $link_pinterest = isset($instance['link_pinterest']) ? $instance['link_pinterest'] : '';

        $icon_bloglovin = 'caseicon-blogger';
        $link_bloglovin = isset($instance['link_bloglovin']) ? $instance['link_bloglovin'] : '';

        $icon_instagram = 'caseicon-instagram';
        $link_instagram = isset($instance['link_instagram']) ? $instance['link_instagram'] : '';

        echo wp_kses_post($args['before_widget']);

        if (!empty($title))
                echo ''.$before_title . $title . $after_title;

            echo "<ul class='ct-social'>";

            if ($link_facebook != '') {
                echo '<li><a class="social-facebook" target="_blank" href="'.esc_url($link_facebook).'"><i class="'.$icon_facebook.'"></i></a></li>';
            }

            if ($link_rss != '') {
                echo '<li><a class="social-rss" target="_blank" href="'.esc_url($link_rss).'"><i class="'.$icon_rss.'"></i></a></li>';
            }

            if ($link_youtube != '') {
                echo '<li><a class="social-youtube" target="_blank" href="'.esc_url($link_youtube).'"><i class="'.$icon_youtube.'"></i></a></li>';
            }

            if ($link_twitter != '') {
                echo '<li><a class="social-twitter" target="_blank" href="'.esc_url($link_twitter).'"><i class="'.$icon_twitter.'"></i></a></li>';
            }

            if ($link_google != '') {
                echo '<li><a class="social-google" target="_blank" href="'.esc_url($link_google).'"><i class="'.$icon_google.'"></i></a></li>';
            }

            if ($link_skype != '') {
                echo '<li><a class="social-skype" target="_blank" href="'.esc_url($link_skype).'"><i class="'.$icon_skype.'"></i></a></li>';
            }

            if ($link_dribbble != '') {
                echo '<li><a class="social-dribbble" target="_blank" href="'.esc_url($link_dribbble).'"><i class="'.$icon_dribbble.'"></i></a></li>';
            }

            if ($link_flickr != '') {
                echo '<li><a class="social-flickr" target="_blank" href="'.esc_url($link_flickr).'"><i class="'.$icon_flickr.'"></i></a></li>';
            }

            if ($link_linkedin != '') {
                echo '<li><a class="social-linkedin" target="_blank" href="'.esc_url($link_linkedin).'"><i class="'.$icon_linkedin.'"></i></a></li>';
            }

            if ($link_vimeo != '') {
                echo '<li><a class="social-vimeo" target="_blank" href="'.esc_url($link_vimeo).'"><i class="'.$icon_vimeo.'"></i></a></li>';
            }

            if ($link_pinterest != '') {
                echo '<li><a class="social-pinterest" target="_blank" href="'.esc_url($link_pinterest).'"><i class="'.$icon_pinterest.'"></i></a></li>';
            }

            if ($link_bloglovin != '') {
                echo '<li><a class="social-bloglovin" target="_blank" href="'.esc_url($link_bloglovin).'"><i class="'.$icon_bloglovin.'"></i></a></li>';
            }

            if ($link_instagram != '') {
                echo '<li><a class="social-instagram" target="_blank" href="'.esc_url($link_instagram).'"><i class="'.$icon_instagram.'"></i></a></li>';
            }

            echo "</ul>";

        echo wp_kses_post($args['after_widget']);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['link_facebook'] = strip_tags($new_instance['link_facebook']);

         $instance['link_rss'] = strip_tags($new_instance['link_rss']);

         $instance['link_youtube'] = strip_tags($new_instance['link_youtube']);

         $instance['link_twitter'] = strip_tags($new_instance['link_twitter']);

         $instance['link_google'] = strip_tags($new_instance['link_google']);

         $instance['link_skype'] = strip_tags($new_instance['link_skype']);

         $instance['link_dribbble'] = strip_tags($new_instance['link_dribbble']);

         $instance['link_flickr'] = strip_tags($new_instance['link_flickr']);

         $instance['link_linkedin'] = strip_tags($new_instance['link_linkedin']);

         $instance['link_vimeo'] = strip_tags($new_instance['link_vimeo']);

         $instance['link_pinterest'] = strip_tags($new_instance['link_pinterest']);

         $instance['link_bloglovin'] = strip_tags($new_instance['link_bloglovin']);

         $instance['link_instagram'] = strip_tags($new_instance['link_instagram']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $link_facebook = isset($instance['link_facebook']) ? esc_attr($instance['link_facebook']) : '';

         $link_rss = isset($instance['link_rss']) ? esc_attr($instance['link_rss']) : '';

         $link_youtube = isset($instance['link_youtube']) ? esc_attr($instance['link_youtube']) : '';

         $link_twitter = isset($instance['link_twitter']) ? esc_attr($instance['link_twitter']) : '';

         $link_google = isset($instance['link_google']) ? esc_attr($instance['link_google']) : '';

         $link_skype = isset($instance['link_skype']) ? esc_attr($instance['link_skype']) : '';

         $link_dribbble = isset($instance['link_dribbble']) ? esc_attr($instance['link_dribbble']) : '';

         $link_flickr = isset($instance['link_flickr']) ? esc_attr($instance['link_flickr']) : '';

         $link_linkedin = isset($instance['link_linkedin']) ? esc_attr($instance['link_linkedin']) : '';

         $link_vimeo = isset($instance['link_vimeo']) ? esc_attr($instance['link_vimeo']) : '';

         $link_pinterest = isset($instance['link_pinterest']) ? esc_attr($instance['link_pinterest']) : '';

         $link_bloglovin = isset($instance['link_bloglovin']) ? esc_attr($instance['link_bloglovin']) : '';

         $link_instagram = isset($instance['link_instagram']) ? esc_attr($instance['link_instagram']) : '';

         ?>
         <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_facebook')); ?>"><?php esc_html_e( 'Link Facebook:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_rss')); ?>"><?php esc_html_e( 'Link Rss:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_rss') ); ?>" type="text" value="<?php echo esc_attr( $link_rss ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_youtube')); ?>"><?php esc_html_e( 'Link Youtube:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_twitter')); ?>"><?php esc_html_e( 'Link Twitter:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_google')); ?>"><?php esc_html_e( 'Link Google:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_google') ); ?>" type="text" value="<?php echo esc_attr( $link_google ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_skype')); ?>"><?php esc_html_e( 'Link Skype:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_skype') ); ?>" type="text" value="<?php echo esc_attr( $link_skype ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_dribbble')); ?>"><?php esc_html_e( 'Link Dribbble:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $link_dribbble ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_flickr')); ?>"><?php esc_html_e( 'Link Flickr:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_flickr') ); ?>" type="text" value="<?php echo esc_attr( $link_flickr ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_linkedin')); ?>"><?php esc_html_e( 'Link Linkedin:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $link_linkedin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_vimeo')); ?>"><?php esc_html_e( 'Link Vimeo:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $link_vimeo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_pinterest')); ?>"><?php esc_html_e( 'Link Pinterest:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $link_pinterest ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_bloglovin')); ?>"><?php esc_html_e( 'Link Bloglovin:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_bloglovin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_bloglovin') ); ?>" type="text" value="<?php echo esc_attr( $link_bloglovin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('link_instagram')); ?>"><?php esc_html_e( 'Link Instagram:', 'itfirm' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>" /></p>
        
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    if(function_exists('ct_register_wp_widget')) {
        ct_register_wp_widget('CS_Social_Widget');
    }
}

add_action('widgets_init', 'register_social_widget');
?>