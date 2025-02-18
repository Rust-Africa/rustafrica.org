<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 *
 * @package Itfirm
 * @version 1.0
 */

class Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ct_recent_posts',
            esc_html__( '* Recent Posts', 'itfirm' ),
            array(
                'description' => esc_html__( 'Shows your most recent posts.', 'itfirm' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => '',
            'number'        => 4,
            'post_in'        => '',
            'layout'        => 'layout1',
        ) );

        $title = $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo wp_kses_post($args['before_widget']);

        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);

        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }
        $post_in = $instance['post_in'];
        $layout = $instance['layout'];
        $sticky = '';
        if($post_in == 'featured') {
            $sticky = get_option( 'sticky_posts' );
        }
        $r = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'  => $sticky,
        ) );

        if ( $r->have_posts() )
        {
            echo '<div class="posts-list '.esc_attr($layout).'">';

            while ( $r->have_posts() )
            {
                $r->the_post();
                global $post; ?>
                <div class="entry-brief">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'itfirm-thumbnail', false); ?>
                        <div class="entry-media image-effect-white">
                           <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" /></a>
                         </div>
                    <?php endif; ?>
                    <div class="entry-content">
                        <?php printf(
                            '<h4 class="entry-title"><a href="%1$s" title="%2$s">%3$s</a></h4>',
                            esc_url( get_permalink() ),
                            esc_attr( get_the_title() ),
                            get_the_title()
                        ); ?>
                        <div class="item-date">
                            <i class="caseicon-calendar-alt"></i>
                            <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </div>
            <?php }

            echo '</div>';
        }

        wp_reset_postdata();
        wp_reset_query();

        echo wp_kses_post($args['after_widget']);
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']         = sanitize_text_field( $new_instance['title'] );
        $instance['number']        = absint( $new_instance['number'] );
        $instance['post_in'] = strip_tags($new_instance['post_in']);
        $instance['layout'] = strip_tags($new_instance['layout']);
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'itfirm' ),
            'number'        => 4,
        ) );

        $title         = $instance['title'];
        $number        = absint( $instance['number'] );
        $post_in = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';
        $layout = isset($instance['layout']) ? esc_attr($instance['layout']) : '';

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'itfirm' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p><label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e( 'Post in', 'itfirm' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_in') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_in') ); ?>">
            <option value="recent"<?php if( $post_in == 'recent' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'itfirm'); ?></option>
            <option value="featured"<?php if( $post_in == 'featured' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Featured', 'itfirm'); ?></option>
         </select>
         </p>

        <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'itfirm' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
            <option value="recent"<?php if( $layout == 'default' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'itfirm'); ?></option>
         </select>
         </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'itfirm' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <?php
    }
}
add_action( 'widgets_init', 'itfirm_register_recent_widget' );
function itfirm_register_recent_widget(){
    if(function_exists('ct_register_wp_widget')){
        ct_register_wp_widget( 'Recent_Posts_Widget' );
    }
}