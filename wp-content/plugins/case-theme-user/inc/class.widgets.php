<?php
if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
/**
 * Add Case Theme User Widget.
 *
 * @name Case Theme User_shortcodes
 * @since 1.0.0
 */
if (! class_exists ( 'Case_Theme_User_Widget' )) {
	class Case_Theme_User_Widget extends WP_Widget {
		function __construct() {
			parent::__construct ( 'userpress_widget', __ ( 'Case Theme User', 'ct-user-form' ), array (
					'description' => __ ( 'Multiple user press forms.', 'ct-user-form' ) 
			) );
		}
		
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args
		 *        	Widget arguments.
		 * @param array $instance
		 *        	Saved values from database.
		 */
		public function widget($args, $instance) {
                    
			extract($args, EXTR_SKIP);
                        $title  = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
                        $type   = empty($instance['type']) ? '' : $instance['type'];
                        $layout = empty($instance['layout']) ? '' : $instance['layout'];
                        $logged = empty($instance['logged']) ? '' : $instance['logged'];
                         
			echo $args ['before_widget'];
			if (! empty ( $instance ['title'] )) {
                            echo $args ['before_title'] . apply_filters ( 'widget_title', $instance ['title'] ) . $args ['after_title'];
			}
                        
                        if (! empty ( $instance ['type'] )) {
                            echo $args ['before_title'] . apply_filters ( 'widget_title', $instance ['type'] ) . $args ['after_title'];
			}
			
			echo do_shortcode('[ct-user-form-login login_options="Default"]');
			echo $args ['after_widget'];
		}
		
		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance
		 * Previously saved values from database.
		 */
		public function form($instance) {
                        
                        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
                        $title = $instance['title'];
                        $type = $instance['type'];  
                       	$layout = $instance['layout'];	
                        $logged = $instance['logged'];
                        ?>
                         <p>
                            <?php _e('Title'); ?>:
                                 <input class="widefat" id="<?php echo $this->get_field_id( 'text' )?>" type="text" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr( $title ); ?>">
                         </p>
                          
                         <!-- Select Form -->
                          <p> 
                         <?php _e('Form'); ?>
                        <select class='widefat' type="text" name ="<?php echo $this->get_field_name('type'); ?>">
                             <option <?php echo ($type =='Login')?'selected':''; ?>  value="login"> <?php _e('Login'); ?></option>
                             <option <?php echo ($type =='logout')?'selected':''; ?>   value="logout"><?php _e('Logout'); ?></option>
                             <option <?php echo ($type =='register')?'selected':''; ?>  value="register"><?php _e('Register'); ?></option>
                             <option <?php echo ($type =='recover')? 'selected':''; ?>   value="recover"><?php _e('Recover password '); ?></option>
                        </select>
                          </p>
                          
                           <!-- Select Layout -->
                           <p> 
                         <?php _e('Layout'); ?>
                        <select class='widefat' type="text" name ="<?php echo $this->get_field_name('layout'); ?>">
                             <option <?php echo ($layout =='default')?'selected':''; ?>  value="default"> <?php _e('Default'); ?></option>
                             <option <?php echo ($layout =='popup')?'selected':''; ?>   value="popup"><?php _e('Popup'); ?></option>
                             <option <?php echo ($layout =='dropdown')?'selected':''; ?>  value="dropdown"><?php _e('Dropdown'); ?></option>
                        </select>
                          </p>
                          
                           <!-- Select Logged -->
                           <p> 
                         <?php _e('Logged'); ?>
                        <select class='widefat' type="text" name ="<?php echo $this->get_field_name('logged'); ?>">
                             <option <?php echo ($logged =='null')?'selected':''; ?>  value="null"> <?php _e('Null'); ?></option>
                             <option <?php echo ($logged =='text')?'selected':''; ?>   value="text"><?php _e('Text'); ?></option>
                             <option <?php echo ($logged =='profile')?'selected':''; ?>  value="profile"><?php _e('Profile'); ?></option>
                        </select>
                          </p>
                        
	<?php
		}
		
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance
		 *        	Values just sent to be saved.
		 * @param array $old_instance
		 *        	Previously saved values from database.
		 *        	
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
                        $instance['title']  = $new_instance['title'];
                        $instance['type']   = $new_instance['type'];
                        $instance['layout'] = $new_instance['layout'];
                        $instance['logged'] = $new_instance['logged'];
                        
                        return $instance;
		}   
	}
}