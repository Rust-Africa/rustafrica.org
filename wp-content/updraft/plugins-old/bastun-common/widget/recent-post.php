<?php
/**
 * Recent_Posts widget class
 *
 * @sbastune 2.8.0
 */
class bastun_widget_newss extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_news', 'description' => esc_html__( "The most recent posts on your site", 'bastun') );
        parent::__construct('recent-posts', esc_html__('Bastun Recent Posts', 'bastun'), $widget_ops);
        $this->alt_option_name = 'widget_news';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('bastun_widget_newss', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'bastun' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
       
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <?php if ( $title ) echo wp_specialchars_decode(esc_attr($before_title),ENT_QUOTES) . esc_attr($title) . wp_specialchars_decode(esc_attr($after_title),ENT_QUOTES); ?>
        <div class="sidebar__post">
            <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <?php $image_recent = get_post_meta(get_the_ID(),'_cmb_image_recent', true); ?>
            <?php $title_recent = get_post_meta(get_the_ID(),'_cmb_title_recent', true); ?>
            <?php $price = get_post_meta(get_the_ID(),'_cmb_price', true); ?>
            <?php $student = get_post_meta(get_the_ID(),'_cmb_student', true); ?>
                <li>
                    <a href="<?php the_permalink();?>">
                        <?php if (wp_get_attachment_url($image_recent) !='')  { ?>
                        <div class="sidebar__post__img">
                            <img src="<?php echo wp_get_attachment_url($image_recent);?>" alt="">
                        </div> 
                        <?php } ?>
                       <div class="sidebar__post__text">
                        <?php if ($title_recent !='')  { ?>
                        <h6><?php echo esc_attr($title_recent) ?></h6>
                        <?php } else {?>
                        <h6><?php the_title(); ?></h6>
                        <?php } ?>
                        <span class="text__gradient"><?php the_time(get_option( 'date_format' ));?></span>
                       </div>
                    </a>
                </li>
            <?php endwhile; ?> 
            </ul>
        </div>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('bastun_widget_newss', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_news']) )
            delete_option('widget_news');

        return $instance;
    }


    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'bastun' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'bastun' ); ?></label></p>
<?php
    }
}


class bastun_widget_search extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'search', 'description' => esc_html__( "Search on your site", 'bastun') );
        parent::__construct('search', esc_html__('Bastun Search', 'bastun'), $widget_ops);
        $this->alt_option_name = 'widget_search';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('bastun_widget_search', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Search', 'bastun' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        ?>

        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <div class="sidebar__widget" data-aos="fade-up" data-aos-duration="1500">
            <div class="sidebar__search">
                <form  action="<?php echo esc_url(home_url('/')); ?>" style="position: relative;">
                    <input class="sidebar__common__input" type="text" name="s" placeholder="<?php echo esc_attr__('Search Here...', 'bastun' );?>">
                    <button class="sidebar__search__button" type="submit">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.4 13.372L17.91 16.864C17.97 16.924 18 17.002 18 17.098C18 17.194 17.97 17.272 17.91 17.332L16.758 18.484C16.698 18.544 16.62 18.574 16.524 18.574C16.428 18.574 16.35 18.544 16.29 18.484L15.966 18.142L15.804 17.998C15.72 17.926 15.672 17.884 15.66 17.872L12.816 15.028C12.756 14.956 12.672 14.92 12.564 14.92C12.468 14.908 12.384 14.932 12.312 14.992C11.664 15.448 10.962 15.802 10.206 16.054C9.426 16.306 8.628 16.432 7.812 16.432C6.396 16.432 5.082 16.078 3.87 15.37C2.694 14.674 1.758 13.738 1.062 12.562C0.354 11.35 0 10.036 0 8.62C0 7.204 0.354 5.89 1.062 4.678C1.758 3.502 2.694 2.566 3.87 1.87C5.082 1.162 6.396 0.807999 7.812 0.807999C9.228 0.807999 10.536 1.162 11.736 1.87C12.912 2.566 13.848 3.502 14.544 4.678C15.252 5.89 15.606 7.204 15.606 8.62C15.606 10.156 15.192 11.566 14.364 12.85C14.316 12.934 14.292 13.024 14.292 13.12C14.304 13.216 14.34 13.3 14.4 13.372ZM12.528 12.256C12.924 11.74 13.23 11.176 13.446 10.564C13.662 9.94 13.77 9.292 13.77 8.62C13.77 7.54 13.5 6.538 12.96 5.614C12.432 4.702 11.718 3.982 10.818 3.454C9.894 2.914 8.892 2.644 7.812 2.644C6.732 2.644 5.73 2.914 4.806 3.454C3.894 3.982 3.174 4.702 2.646 5.614C2.106 6.538 1.836 7.54 1.836 8.62C1.836 9.7 2.106 10.702 2.646 11.626C3.174 12.538 3.894 13.258 4.806 13.786C5.73 14.326 6.732 14.596 7.812 14.596C8.532 14.596 9.222 14.476 9.882 14.236C10.542 13.984 11.136 13.63 11.664 13.174C11.988 12.898 12.276 12.592 12.528 12.256Z" fill="#1C5C05"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
            
<?php
        // Reset the global $the_post as this query will have stomped on it
   

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('bastun_widget_search', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_search']) )
            delete_option('widget_search');

        return $instance;
    }

    

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

      
<?php
    }
}

class bastun_widget_menu extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_menu', 'description' => esc_html__( "Mega Menu Item", 'bastun') );
        parent::__construct('menu', esc_html__('Menu Item', 'bastun'), $widget_ops);
        $this->alt_option_name = 'widget_menu';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('bastun_widget_menu', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Title', 'bastun' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $button_1 = ( ! empty( $instance['button_1'] ) ) ? $instance['button_1'] : esc_html__( 'Button 1', 'bastun' );
        $button_1 = apply_filters( 'widget_button_1', $button_1, $instance, $this->id_base );

        $link_button_1 = ( ! empty( $instance['link_button_1'] ) ) ? $instance['link_button_1'] : esc_html__( 'Link Button 1', 'bastun' );
        $link_button_1 = apply_filters( 'widget_link_button_1', $link_button_1, $instance, $this->id_base );

        $button_2 = ( ! empty( $instance['button_2'] ) ) ? $instance['button_2'] : esc_html__( 'Button 2', 'bastun' );
        $button_2 = apply_filters( 'widget_button_2', $button_2, $instance, $this->id_base );

        $link_button_2 = ( ! empty( $instance['link_button_2'] ) ) ? $instance['link_button_2'] : esc_html__( 'Link Button 2', 'bastun' );
        $link_button_2 = apply_filters( 'widget_link_button_2', $link_button_2, $instance, $this->id_base );

        $image_upload = ( ! empty( $instance['image_upload'] ) ) ? $instance['image_upload'] : esc_html__( 'Image', 'bastun' );
        $image_upload = apply_filters( 'widget_image_upload', $image_upload, $instance, $this->id_base );

        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <div class=" headerarea__mega__menu__single__wrap">
            <div class="headerarea__mega__menu__thumb">
                
                <a target="_blank" href="<?php echo ( $instance['link_button_1'] ); ?>">
                    <img src="<?php echo esc_url( $image_upload ); ?>" alt="Mega Menu">
                </a>
                <?php if ('' != $button_1): ?>
                <a target="_blank" href="<?php echo ( $instance['link_button_1'] ); ?>">
                    <span class="headerarea__mega__menu__thumb__title"><?php echo ( $instance['button_1'] ); ?></span>
                </a>
                <?php endif ?>
                <?php if ('' != $button_2): ?>
                <a target="_blank" href="<?php echo ( $instance['link_button_2'] ); ?>">
                    <span class="headerarea__mega__menu__thumb__title title__onepage"><?php echo ( $instance['button_2'] ); ?></span>
                </a>
                <?php endif ?>
            </div>
        </div>

        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
   

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('bastun_widget_menu', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['button_1'] = strip_tags($new_instance['button_1']);
        $instance['button_2'] = strip_tags($new_instance['button_2']);
        $instance['link_button_1'] = strip_tags($new_instance['link_button_1']);
        $instance['link_button_2'] = strip_tags($new_instance['link_button_2']);
        $instance['image_upload'] = strip_tags($new_instance['image_upload']);

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_menu']) )
            delete_option('widget_menu');

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $button_1     = isset( $instance['button_1'] ) ? esc_attr( $instance['button_1'] ) : '';
        $link_button_1     = isset( $instance['link_button_1'] ) ? esc_attr( $instance['link_button_1'] ) : '';
        $button_2     = isset( $instance['button_2'] ) ? esc_attr( $instance['button_2'] ) : '';
        $link_button_2     = isset( $instance['link_button_2'] ) ? esc_attr( $instance['link_button_2'] ) : '';
        $image_upload     = isset( $instance['image_upload'] ) ? esc_attr( $instance['image_upload'] ) : '';
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'button_1' )); ?>"><?php esc_html_e( 'Button 1:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_1' )); ?>" type="text" value="<?php echo esc_attr($button_1); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'link_button_1' )); ?>"><?php esc_html_e( 'Link Button 1:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_button_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_button_1' )); ?>" type="text" value="<?php echo esc_attr($link_button_1); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'button_2' )); ?>"><?php esc_html_e( 'Button 2:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_2' )); ?>" type="text" value="<?php echo esc_attr($button_2); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'link_button_2' )); ?>"><?php esc_html_e( 'Link Button 2:', 'bastun' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_button_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_button_2' )); ?>" type="text" value="<?php echo esc_attr($link_button_2); ?>" /></p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'image_upload' ) ); ?>"><?php esc_html_e( 'URL Image:', 'bastun' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image_upload' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image_upload' )); ?>" rows="3"><?php echo esc_attr($image_upload); ?></textarea>
        </p>

      
<?php
    }
}




function bastun_register_custom_widgets() {
    register_widget( 'bastun_widget_search' );
    register_widget( 'bastun_widget_newss' );
    register_widget( 'bastun_widget_menu' );
}
add_action( 'widgets_init', 'bastun_register_custom_widgets' );    