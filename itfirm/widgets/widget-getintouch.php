<?php
class GetInTouch_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'getintouch_widget',
            esc_html__('* Get In Touch', 'itfirm'),
            array('description' => esc_html__('Get In Touch Widget', 'itfirm'),)
        );
    }

    function widget($args, $instance) {

        extract($args);

        $title = isset($instance['title']) ? (!empty($instance['title']) ? $instance['title']: '') : '';
        $address_label = isset($instance['address_label']) ? (!empty($instance['address_label']) ? $instance['address_label']: '') : '';
        $address_text = isset($instance['address_text']) ? (!empty($instance['address_text']) ? $instance['address_text']: '') : '';
        $phone_label = isset($instance['phone_label']) ? (!empty($instance['phone_label']) ? $instance['phone_label']: '') : '';
        $phone_text = isset($instance['phone_text']) ? (!empty($instance['phone_text']) ? $instance['phone_text']: '') : '';
        $time_label = isset($instance['time_label']) ? (!empty($instance['time_label']) ? $instance['time_label']: '') : '';
        $time_text = isset($instance['time_text']) ? (!empty($instance['time_text']) ? $instance['time_text']: '') : '';
        $btn_text = isset($instance['btn_text']) ? (!empty($instance['btn_text']) ? $instance['btn_text']: '') : '';
        $btn_link = isset($instance['btn_link']) ? (!empty($instance['btn_link']) ? $instance['btn_link']: '') : '';
        ?>
        <section class="ct-getintouch widget">
            <?php if(!empty($title)) : ?>
                <h3 class="widget-title"><?php echo esc_attr($title); ?></h3>
            <?php endif; ?>
            <div class="ct-getintouch-inner">
                <?php if(!empty($address_label) || !empty($address_text)): ?>
                    <div class="ct-getintouch-item">
                        <div class="ct-getintouch-icon"><i class="flaticon flaticon-address text-gradient"></i></div>
                        <div class="ct-getintouch-meta">
                            <label><?php echo esc_attr( $address_label  ); ?></label>
                            <span><?php echo esc_attr( $address_text  ); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($phone_label) || !empty($phone_text)): ?>
                    <div class="ct-getintouch-item">
                        <div class="ct-getintouch-icon"><i class="flaticon flaticon-24-hours-support text-gradient"></i></div>
                        <div class="ct-getintouch-meta">
                            <label><?php echo esc_attr( $phone_label  ); ?></label>
                            <span><?php echo esc_attr( $phone_text  ); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($time_label) || !empty($time_text)): ?>
                    <div class="ct-getintouch-item">
                        <div class="ct-getintouch-icon"><i class="flaticon flaticon-24-hours text-gradient"></i></div>
                        <div class="ct-getintouch-meta">
                            <label><?php echo esc_attr( $time_label  ); ?></label>
                            <span><?php echo esc_attr( $time_text ); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($btn_text)) : ?>
                    <div class="ct-getintouch-item">
                        <a class="btn" href="<?php echo esc_url($btn_link); ?>"><i class="fac fac-location-arrow"></i><?php echo esc_attr( $btn_text ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['address_label'] = strip_tags($new_instance['address_label']);
         $instance['address_text'] = strip_tags($new_instance['address_text']);
         $instance['phone_label'] = strip_tags($new_instance['phone_label']);
         $instance['phone_text'] = strip_tags($new_instance['phone_text']);
         $instance['time_label'] = strip_tags($new_instance['time_label']);
         $instance['time_text'] = strip_tags($new_instance['time_text']);
         $instance['btn_text'] = strip_tags($new_instance['btn_text']);
         $instance['btn_link'] = strip_tags($new_instance['btn_link']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
         $address_label = isset($instance['address_label']) ? esc_attr($instance['address_label']) : '';
         $address_text = isset($instance['address_text']) ? esc_attr($instance['address_text']) : '';
         $phone_label = isset($instance['phone_label']) ? esc_attr($instance['phone_label']) : '';
         $phone_text = isset($instance['phone_text']) ? esc_attr($instance['phone_text']) : '';
         $time_label = isset($instance['time_label']) ? esc_attr($instance['time_label']) : '';
         $time_text = isset($instance['time_text']) ? esc_attr($instance['time_text']) : '';
         $btn_text = isset($instance['btn_text']) ? esc_attr($instance['btn_text']) : '';
         $btn_link = isset($instance['btn_link']) ? esc_attr($instance['btn_link']) : '';

         ?>
        <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('address_label')); ?>"><?php esc_html_e( 'Address Label', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address_label') ); ?>" name="<?php echo esc_attr( $this->get_field_name('address_label') ); ?>" type="text" value="<?php echo esc_attr( $address_label ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('address_text')); ?>"><?php esc_html_e( 'Address', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('address_text') ); ?>" type="text" value="<?php echo esc_attr( $address_text ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('phone_label')); ?>"><?php esc_html_e( 'Phone Label', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_label') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_label') ); ?>" type="text" value="<?php echo esc_attr( $phone_label ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('phone_text')); ?>"><?php esc_html_e( 'Phone', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_text') ); ?>" type="text" value="<?php echo esc_attr( $phone_text ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('time_label')); ?>"><?php esc_html_e( 'Time Label', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('time_label') ); ?>" name="<?php echo esc_attr( $this->get_field_name('time_label') ); ?>" type="text" value="<?php echo esc_attr( $time_label ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('time_text')); ?>"><?php esc_html_e( 'Time', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('time_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('time_text') ); ?>" type="text" value="<?php echo esc_attr( $time_text ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('btn_text')); ?>"><?php esc_html_e( 'Button Text', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('btn_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('btn_text') ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('btn_link')); ?>"><?php esc_html_e( 'Button Link', 'itfirm' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('btn_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('btn_link') ); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" /></p>
        
    <?php
    }
}
function register_getintouch_widget() {
    if(function_exists('ct_register_wp_widget')){
        ct_register_wp_widget( 'GetInTouch_Widget' );
    }
}
add_action('widgets_init', 'register_getintouch_widget');
