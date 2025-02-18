<?php
/**
 * Helper functions for the theme
 *
 * @package Itfirm
 */

/* Create Demo Data */
add_filter('ct_ie_export_mode', 'itfirm_enable_export_mode');
function itfirm_enable_export_mode()
{
    return false;
}

/**
 * Get Post List 
*/
if(!function_exists('itfirm_list_post')){
    function itfirm_list_post($post_type = 'post', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type,'posts_per_page' => '-1'));
        foreach($posts as $post){
            $post_list[$post->ID] = $post->post_title;
        }
        return $post_list;
    }
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function itfirm_get_opt( $opt_id, $default = false ) {
	$opt_name = itfirm_get_opt_name();
	if ( empty( $opt_name ) ) {
		return $default;
	}

	global ${$opt_name};
	if ( ! isset( ${$opt_name} ) || ! isset( ${$opt_name}[ $opt_id ] ) ) {
		$options = get_option( $opt_name );
	} else {
		$options = ${$opt_name};
	}
	if ( ! isset( $options ) || ! isset( $options[ $opt_id ] ) || $options[ $opt_id ] === '' ) {
		return $default;
	}
	if ( is_array( $options[ $opt_id ] ) && is_array( $default ) ) {
		foreach ( $options[ $opt_id ] as $key => $value ) {
			if ( isset( $default[ $key ] ) && $value === '' ) {
				$options[ $opt_id ][ $key ] = $default[ $key ];
			}
		}
	}

	return $options[ $opt_id ];
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function itfirm_get_page_opt( $opt_id, $default = false ) {
	$page_opt_name = itfirm_get_page_opt_name();
	if ( empty( $page_opt_name ) ) {
		return $default;
	}
	$id = get_the_ID();
	if ( ! is_archive() && is_home() ) {
		if ( ! is_front_page() ) {
			$page_for_posts = get_option( 'page_for_posts' );
			$id             = $page_for_posts;
		}
	}

	// Get page option for Shop Page
    if(class_exists('WooCommerce') && is_shop()){
        $id = get_option( 'woocommerce_shop_page_id' );
    }

	return $options = ! empty($id) ? get_post_meta( intval( $id ), $opt_id, true ) : $default;
}

/**
 *
 * Get post format values.
 *
 * @param $post_format_key
 * @param bool $default
 *
 * @return bool|mixed
 */
function itfirm_get_post_format_value( $post_format_key, $default = false ) {
	global $post;

	return $value = ! empty( $post->ID ) ? get_post_meta( $post->ID, $post_format_key, true ) : $default;
}


/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function itfirm_get_opt_name_default(){
	return apply_filters( 'itfirm_opt_name', 'ct_theme_options' );
}

function itfirm_get_opt_name() {
	if(isset($_POST['opt_name']) && !empty($_POST['opt_name'])){
		return $_POST['opt_name'];
	}
	$opt_name = itfirm_get_opt_name_default();
	if(defined('ICL_LANGUAGE_CODE')){
		if(ICL_LANGUAGE_CODE != 'all' && !empty(ICL_LANGUAGE_CODE)){
			$opt_name = $opt_name.'_'.ICL_LANGUAGE_CODE;
		}
	}
	return $opt_name;
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function itfirm_get_page_opt_name() {
	return apply_filters( 'itfirm_page_opt_name', 'ct_page_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function itfirm_get_post_opt_name() {
	return apply_filters( 'itfirm_post_opt_name', 'itfirm_post_options' );
}

/**
 * Get page title and description.
 *
 * @return array Contains 'title'
 */
function itfirm_get_page_titles() {
	$title = '';
	$product_title = itfirm_get_opt( 'product_title', false );
	$post_title_position = itfirm_get_opt( 'post_title_position', 'ptitle' );
	$sg_post_title_text = itfirm_get_opt( 'sg_post_title_text' );
	$c_title = '';
	if(!empty($sg_post_title_text)) {
		$c_title = $sg_post_title_text;
	} else {
		$c_title = esc_html__( 'Blog Details', 'itfirm' );
	}
	// Default titles
	if ( ! is_archive() ) {
		// Posts page view
		if ( is_home() ) {
			// Only available if posts page is set.
			if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
				$title = get_post_meta( $page_for_posts, 'custom_title', true );
				if ( empty( $title ) ) {
					$title = get_the_title( $page_for_posts );
				}
			}
			if ( is_front_page() ) {
				$title = esc_html__( 'Blog', 'itfirm' );
			}
		} // Single page view
        elseif ( is_page() ) {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		} elseif ( is_404() ) {
			$title = esc_html__( '404', 'itfirm' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results', 'itfirm' );
		} elseif(is_singular('product') && $product_title == true) {
			$title = esc_html__( 'Shop', 'itfirm' );
		} elseif(is_singular('post') && $post_title_position == 'content') {
			$title = $c_title;
		} else {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		}
	} else {
		$title = get_the_archive_title();
		if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
			$title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
			if(!$title) {
				$title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
			}
		}
	}

	return array(
		'title' => $title,
	);
}

add_filter( 'get_the_archive_title', 'itfirm_archive_title_remove_label' );
function itfirm_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

if(!function_exists('itfirm_get_image_by_size')){
    function itfirm_get_image_by_size( $params = array() ) {
        $params = array_merge( array(
            'post_id' => null,
            'attach_id' => null,
            'thumb_size' => 'thumbnail',
            'class' => '',
        ), $params );

        if ( ! $params['thumb_size'] ) {
            $params['thumb_size'] = 'thumbnail';
        }

        if ( ! $params['attach_id'] && ! $params['post_id'] ) {
            return false;
        }

        $post_id = $params['post_id'];

        $attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
        $attach_id = apply_filters( 'vc_object_id', $attach_id );
        $thumb_size = $params['thumb_size'];
        $thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

        global $_wp_additional_image_sizes;
        $thumbnail = '';

        $sizes = array(
            'thumbnail',
            'thumb',
            'medium',
            'large',
            'full',
        );
        if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {
            $attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );
            $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );
        } elseif ( $attach_id ) {
            if ( is_string( $thumb_size ) ) {
                preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    $count = count( $thumb_matches[0] );
                    if ( $count > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( 1 === $count ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = false;
                    }
                }
            }
            if ( is_array( $thumb_size ) ) {
                // Resize image to custom size
                $p_img = ct_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
                $alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
                $attachment = get_post( $attach_id );
                if ( ! empty( $attachment ) ) {
                    $title = trim( wp_strip_all_tags( $attachment->post_title ) );

                    if ( empty( $alt ) ) {
                        $alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
                    }
                    if ( empty( $alt ) ) {
                        $alt = $title;
                    }
                    if ( $p_img ) {

                        $attributes = ct_stringify_attributes( array(
                            'class' => $thumb_class,
                            'src' => $p_img['url'],
                            'width' => $p_img['width'],
                            'height' => $p_img['height'],
                            'alt' => $alt,
                            'title' => $title,
                        ) );

                        $thumbnail = '<img ' . $attributes . ' />';
                        $thumbnail_url = $p_img['url'];
                    }
                }
            }
        }

        $p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );

        return apply_filters( 'vc_wpb_getimagesize', array(
            'thumbnail' => $thumbnail,
            'thumbnail_url' => $thumbnail_url,
            'p_img_large' => $p_img_large,
        ), $attach_id, $params );
    }
}

/**
 * Generates an excerpt from the post content with custom length.
 * Default length is 55 words, same as default the_excerpt()
 *
 * The excerpt words amount will be 55 words and if the amount is greater than
 * that, then the string '&hellip;' will be appended to the excerpt. If the string
 * is less than 55 words, then the content will be returned as it is.
 *
 * @param int $length Optional. Custom excerpt length, default to 55.
 * @param int|WP_Post $post Optional. You will need to provide post id or post object if used outside loops.
 *
 * @return string           The excerpt with custom length.
 */
function itfirm_get_the_excerpt( $length = 55, $post = null ) {
	$post = get_post( $post );

	if ( empty( $post ) || 0 >= $length ) {
		return '';
	}

	if ( post_password_required( $post ) ) {
		return esc_html__( 'Post password required.', 'itfirm' );
	}

	$content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
	$content = str_replace( ']]>', ']]&gt;', $content );

	$excerpt_more = apply_filters( 'itfirm_excerpt_more', '&hellip;' );
	$excerpt      = wp_trim_words( $content, $length, $excerpt_more );

	return $excerpt;
}


/**
 * Check if provided color string is valid color.
 * Only supports 'transparent', HEX, RGB, RGBA.
 *
 * @param  string $color
 *
 * @return boolean
 */
function itfirm_is_valid_color( $color ) {
	$color = preg_replace( "/\s+/m", '', $color );

	if ( $color === 'transparent' ) {
		return true;
	}

	if ( '' == $color ) {
		return false;
	}

	// Hex format
	if ( preg_match( "/(?:^#[a-fA-F0-9]{6}$)|(?:^#[a-fA-F0-9]{3}$)/", $color ) ) {
		return true;
	}

	// rgb or rgba format
	if ( preg_match( "/(?:^rgba\(\d+\,\d+\,\d+\,(?:\d*(?:\.\d+)?)\)$)|(?:^rgb\(\d+\,\d+\,\d+\)$)/", $color ) ) {
		preg_match_all( "/\d+\.*\d*/", $color, $matches );
		if ( empty( $matches ) || empty( $matches[0] ) ) {
			return false;
		}

		$red   = empty( $matches[0][0] ) ? $matches[0][0] : 0;
		$green = empty( $matches[0][1] ) ? $matches[0][1] : 0;
		$blue  = empty( $matches[0][2] ) ? $matches[0][2] : 0;
		$alpha = empty( $matches[0][3] ) ? $matches[0][3] : 1;

		if ( $red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255 || $alpha < 0 || $alpha > 1.0 ) {
			return false;
		}
	} else {
		return false;
	}

	return true;
}

/**
 * Minify css
 *
 * @param  string $css
 *
 * @return string
 */
function itfirm_css_minifier( $css ) {
	// Normalize whitespace
	$css = preg_replace( '/\s+/', ' ', $css );
	// Remove spaces before and after comment
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
	// Remove comment blocks, everything between /* and */, unless
	// preserved with /*! ... */ or /** ... */
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
	// Remove ; before }
	$css = preg_replace( '/;(?=\s*})/', '', $css );
	// Remove space after , : ; { } */ >
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
	// Remove space before , ; { } ( ) >
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
	// Strips leading 0 on decimal values (converts 0.5px into .5px)
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	// Strips units if value is 0 (converts 0px to 0)
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	// Converts all zeros value into short-hand
	$css = preg_replace( '/0 0 0 0/', '0', $css );
	// Shortern 6-character hex color codes to 3-character where possible
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );
}

/**
 * Header Tracking Code to wp_head hook.
 */
function itfirm_header_code() {
	$site_header_code = itfirm_get_opt( 'site_header_code' );
	if ( $site_header_code !== '' ) {
		print wp_kses( $site_header_code, wp_kses_allowed_html() );
	}
}

add_action( 'wp_head', 'itfirm_header_code' );

/**
 * Footer Tracking Code to wp_footer hook.
 */
function itfirm_footer_code() {
	$site_footer_code = itfirm_get_opt( 'site_footer_code' );
	if ( $site_footer_code !== '' ) {
		print wp_kses( $site_footer_code, wp_kses_allowed_html() );
	}
}

add_action( 'wp_footer', 'itfirm_footer_code' );

/**
 * Custom Comment List
 */
function itfirm_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner">
		        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 90); ?>
		        <div class="comment-content">
		            <h4 class="comment-title">
		            	<?php printf( '%s', get_comment_author_link() ); ?>
		            </h4>
		            <div class="comment-meta">
		            	<span class="comment-date">
	                        <?php echo get_comment_date().' - '.get_comment_time(); ?>
	                    </span>
		            </div>
		            <div class="comment-text"><?php comment_text(); ?></div>
		            <div class="comment-reply">
						<?php comment_reply_link( array_merge( $args, array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ); ?>
		            </div>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

function itfirm_comment_reply_text( $link ) {
$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'itfirm').'', $link );
return $link;
}
add_filter( 'comment_reply_link', 'itfirm_comment_reply_text' );

/**
 * Save custom theme meta
 */
function itfirm_save_meta_boxes( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_subtitle'] ) ) {
		update_post_meta( $post_id, 'post_subtitle', $_POST['post_subtitle'] );
	}
}

add_action( 'save_post', 'itfirm_save_meta_boxes' );


add_filter( 'ct_extra_post_types', 'itfirm_add_posttype' );
function itfirm_add_posttype( $postypes ) {
	$portfolio_slug = itfirm_get_opt( 'portfolio_slug', 'portfolio' );
	$portfolio_name = itfirm_get_opt( 'portfolio_name', esc_html__('Portfolio', 'itfirm') );
	$postypes['portfolio'] = array(
		'status' => true,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$service_slug = itfirm_get_opt( 'service_slug', 'service' );
	$service_name = itfirm_get_opt( 'service_name', esc_html__('Services', 'itfirm') );
	$postypes['service'] = array(
		'status'     => true,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'menu_icon'          => 'dashicons-hammer',
			'supports'           => array(
				'title',
				'thumbnail',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'             => array(
                'slug'       => $service_slug
 		 	),
		),
		'labels'     => array()
	);

	$postypes['footer'] = array(
		'status'     => true,
		'item_name'  => esc_html__( 'Footer Builder', 'itfirm' ),
		'items_name' => esc_html__( 'Footer Builder', 'itfirm' ),
		'args'       => array(
			'menu_icon'          => 'dashicons-editor-insertmore',
			'supports'           => array(
				'title',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
		),
		'labels'     => array()
	);

	$postypes['header'] = array(
		'status'     => true,
		'item_name'  => esc_html__( 'Header Builder', 'itfirm' ),
		'items_name' => esc_html__( 'Header Builder', 'itfirm' ),
		'args'       => array(
			'menu_icon'          => 'dashicons-editor-insertmore',
			'supports'           => array(
				'title',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
		),
		'labels'     => array()
	);

	return $postypes;
}

add_filter( 'ct_extra_taxonomies', 'itfirm_add_tax' );
function itfirm_add_tax( $taxonomies ) {

	$portfolio_category_slug = itfirm_get_opt( 'portfolio_category_slug', 'portfolio-category' );
	$portfolio_category_name = itfirm_get_opt( 'portfolio_category_name', esc_html__('Portfolio Categories', 'itfirm') );
	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => $portfolio_category_name,
		'taxonomies' => $portfolio_category_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_category_slug
 		 	),
		),
		'labels'     => array()
	);

	$service_category_slug = itfirm_get_opt( 'service_category_slug', 'service-category' );
	$service_category_name = itfirm_get_opt( 'service_category_name', esc_html__('Service Categories', 'itfirm') );
	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy' => $service_category_name,
		'taxitomy'   => $service_category_name,
		'taxonomies' => $service_category_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_category_slug
 		 	),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

add_filter( 'ct_enable_megamenu', 'itfirm_enable_megamenu' );
function itfirm_enable_megamenu() {
	return true;
}
add_filter( 'ct_enable_onepage', 'itfirm_enable_onepage' );
function itfirm_enable_onepage() {
	return true;
}

/* Add default pagram Carousel */
function itfirm_get_param_carousel( $atts ) {
	$default  = array(
		'col_xs'           => '1',
		'col_sm'           => '2',
		'col_md'           => '3',
		'col_lg'           => '4',
		'col_xl'           => '4',
		'col_xxl'           => '4',
		'margin'           => '30',
		'loop'             => 'false',
		'autoplay'         => 'false',
		'autoplay_timeout' => '5000',
		'smart_speed'      => '250',
		'center'           => 'false',
		'stage_padding'    => '0',
		'arrows'           => 'false',
		'bullets'          => 'false',
	);
	$new_data = array_merge( $default, $atts );
	extract( $new_data );
	$carousel      = array(
		'data-item-xs' => $col_xs,
		'data-item-sm' => $col_sm,
		'data-item-md' => $col_md,
		'data-item-lg' => $col_lg,
		'data-item-xl' => $col_xl,
		'data-item-xxl' => $col_xxl,

		'data-margin'          => $margin,
		'data-loop'            => $loop,
		'data-autoplay'        => $autoplay,
		'data-autoplaytimeout' => $autoplay_timeout,
		'data-smartspeed'      => $smart_speed,
		'data-center'          => $center,
		'data-arrows'          => $arrows,
		'data-bullets'         => $bullets,
		'data-stagepadding'    => $stage_padding,
		'data-rtl'             => is_rtl() ? 'true' : 'false',
	);
	$carousel_data = '';
	foreach ( $carousel as $key => $value ) {
		if ( isset( $value ) ) {
			$carousel_data .= $key . '=' . $value . ' ';
		}
	}
	$new_data['carousel_data'] = $carousel_data;

	return $new_data;
}

/* Show/hide Case Carousel */
add_filter( 'enable_ct_carousel', 'itfirm_enable_ct_carousel' );
function itfirm_enable_ct_carousel() {
	return false;
}

/*
 * Set post views count using post meta
 */
function itfirm_set_post_views( $postID ) {
	$countKey = 'post_views_count';
	$count    = get_post_meta( $postID, $countKey, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $countKey );
		add_post_meta( $postID, $countKey, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $countKey, $count );
	}
}
/* Dashboard Theme */
add_filter('ct_documentation_link',function(){
     return 'http://casethemes.net/docs/itfirm/';
});
add_filter('ct_video_tutorial_link',function(){
     return 'https://www.youtube.com/watch?v=HfvUbzsO2vA';
});

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'itfirm-elementor-custom-editor', get_template_directory_uri() . '/assets/css/elementor-custom-editor.css', array(), '1.0.0' );
} );

if(class_exists( 'Case_Theme_Core' )){
	if(!function_exists( 'itfirm_add_icons_to_ct_iconpicker_field' )){
		add_filter( 'redux_ct_iconpicker_field/get_icons', 'itfirm_add_icons_to_ct_iconpicker_field' );
		function itfirm_add_icons_to_ct_iconpicker_field($icons){
			$custom_icons = [
				'Flaticon' => array(
                    array('flaticon-telephone-call' => 'flaticon-telephone-call'),
                    array('flaticon-inbox' => 'flaticon-inbox'),
                    array('flaticon-map' => 'flaticon-map'),
                    array('flaticon-cyber-security' => 'flaticon-cyber-security'),
                    array('flaticon-quotes' => 'flaticon-quotes'),
                    array('flaticon-right-arrow' => 'flaticon-right-arrow'),
                    array('flaticon-marketing' => 'flaticon-marketing'),
                    array('flaticon-digital-marketing' => 'flaticon-digital-marketing'),
                    array('flaticon-shield' => 'flaticon-shield'),
                    array('flaticon-database' => 'flaticon-database'),
                    array('flaticon-voip' => 'flaticon-voip'),
                    array('flaticon-data-network' => 'flaticon-data-network'),
                    array('flaticon-play-button' => 'flaticon-play-button'),
                    array('flaticon-cloud' => 'flaticon-cloud'),
                    array('flaticon-compliant' => 'flaticon-compliant'),
                    array('flaticon-compliance' => 'flaticon-compliance'),
                    array('flaticon-shield-1' => 'flaticon-shield-1'),
                    array('flaticon-webpage' => 'flaticon-webpage'),
                    array('flaticon-location' => 'flaticon-location'),
                    array('flaticon-email' => 'flaticon-email'),
                    array('flaticon-call' => 'flaticon-call'),
                    array('flaticon-cloud-computing' => 'flaticon-cloud-computing'),
                    array('flaticon-global-distribution' => 'flaticon-global-distribution'),
                    array('flaticon-file-upload' => 'flaticon-file-upload'),
                    array('flaticon-transfer-data' => 'flaticon-transfer-data'),
                    array('flaticon-cloud-network' => 'flaticon-cloud-network'),
                    array('flaticon-web-settings' => 'flaticon-web-settings'),
                    array('flaticon-advertising' => 'flaticon-advertising'),
                    array('flaticon-address' => 'flaticon-address'),
                    array('flaticon-24-hours-support' => 'flaticon-24-hours-support'),
                    array('flaticon-email-1' => 'flaticon-email-1'),
                    array('flaticon-low-price' => 'flaticon-low-price'),
                    array('flaticon-privacy' => 'flaticon-privacy'),
                    array('flaticon-crown' => 'flaticon-crown'),
                    array('flaticon-best-seller' => 'flaticon-best-seller'),
                    array('flaticon-security' => 'flaticon-security'),
                    array('flaticon-award' => 'flaticon-award'),
                    array('flaticon-shield-2' => 'flaticon-shield-2'),
                    array('flaticon-crown-1' => 'flaticon-crown-1'),
                    array('flaticon-approved' => 'flaticon-approved'),
                    array('flaticon-expert' => 'flaticon-expert'),
                    array('flaticon-success' => 'flaticon-success'),
                    array('flaticon-team' => 'flaticon-team'),
                    array('flaticon-support' => 'flaticon-support'),
                ),
			];
			$icons = array_merge($custom_icons, $icons);
			return $icons;
		}
	}

	if(!function_exists("itfirm_add_icons_to_megamenu")){
		add_filter("ct_mega_menu/get_icons", "itfirm_add_icons_to_megamenu");
		function itfirm_add_icons_to_megamenu($icons){
			$custom_icons = [
				'Flaticon' => array(
                    array('flaticon-telephone-call' => 'flaticon-telephone-call'),
                    array('flaticon-inbox' => 'flaticon-inbox'),
                    array('flaticon-map' => 'flaticon-map'),
                    array('flaticon-cyber-security' => 'flaticon-cyber-security'),
                    array('flaticon-quotes' => 'flaticon-quotes'),
                    array('flaticon-right-arrow' => 'flaticon-right-arrow'),
                    array('flaticon-marketing' => 'flaticon-marketing'),
                    array('flaticon-digital-marketing' => 'flaticon-digital-marketing'),
                    array('flaticon-shield' => 'flaticon-shield'),
                    array('flaticon-database' => 'flaticon-database'),
                    array('flaticon-voip' => 'flaticon-voip'),
                    array('flaticon-data-network' => 'flaticon-data-network'),
                    array('flaticon-play-button' => 'flaticon-play-button'),
                    array('flaticon-cloud' => 'flaticon-cloud'),
                    array('flaticon-compliant' => 'flaticon-compliant'),
                    array('flaticon-compliance' => 'flaticon-compliance'),
                    array('flaticon-shield-1' => 'flaticon-shield-1'),
                    array('flaticon-webpage' => 'flaticon-webpage'),
                    array('flaticon-location' => 'flaticon-location'),
                    array('flaticon-email' => 'flaticon-email'),
                    array('flaticon-call' => 'flaticon-call'),
                    array('flaticon-cloud-computing' => 'flaticon-cloud-computing'),
                    array('flaticon-global-distribution' => 'flaticon-global-distribution'),
                    array('flaticon-file-upload' => 'flaticon-file-upload'),
                    array('flaticon-transfer-data' => 'flaticon-transfer-data'),
                    array('flaticon-cloud-network' => 'flaticon-cloud-network'),
                    array('flaticon-web-settings' => 'flaticon-web-settings'),
                    array('flaticon-advertising' => 'flaticon-advertising'),
                    array('flaticon-address' => 'flaticon-address'),
                    array('flaticon-24-hours-support' => 'flaticon-24-hours-support'),
                    array('flaticon-email-1' => 'flaticon-email-1'),
                    array('flaticon-low-price' => 'flaticon-low-price'),
                    array('flaticon-privacy' => 'flaticon-privacy'),
                    array('flaticon-crown' => 'flaticon-crown'),
                    array('flaticon-best-seller' => 'flaticon-best-seller'),
                    array('flaticon-security' => 'flaticon-security'),
                    array('flaticon-award' => 'flaticon-award'),
                    array('flaticon-shield-2' => 'flaticon-shield-2'),
                    array('flaticon-crown-1' => 'flaticon-crown-1'),
                    array('flaticon-approved' => 'flaticon-approved'),
                    array('flaticon-expert' => 'flaticon-expert'),
                    array('flaticon-success' => 'flaticon-success'),
                    array('flaticon-team' => 'flaticon-team'),
                    array('flaticon-support' => 'flaticon-support'),
                ),
			];
			$icons = array_merge($custom_icons, $icons);
			return $icons;
		}
	}
}

if(!function_exists('ct_get_term_of_slick_filter')){
    function ct_get_term_of_slick_filter($post_id, $tax = array())
    {
        $term_list = array();
        foreach ($tax as $taxo) {
            $term_of_post = wp_get_post_terms($post_id, $taxo);
            foreach ($term_of_post as $term) {
                $term_list[] = 'ct-slick-filter-'.$term->slug;
            }
        }

        return implode(' ', $term_list);
    }
}

/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

add_action( 'ct-ie-import-finish', 'itfirm_update_el_default_kit_option' );
function itfirm_update_el_default_kit_option(){
	$kit_id = itfirm_get_id_by_slug('default-kit', 'elementor_library'); 
	if(!empty($kit_id))
		update_option( 'elementor_active_kit', $kit_id, 'yes' );
}

/**
 * RGB Color
 */
function itfirm_hex_rgb($color) {
 
    $default = '0,0,0';
 
    //Return default if no color provided
    if(empty($color))
        return $default; 
 
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    $output = implode(",",$rgb);

    //Return rgb(a) color string
    return $output;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'itfirm_add_editor_preview_style' );
function itfirm_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', itfirm_editor_preview_inline_styles() );
}
function itfirm_editor_preview_inline_styles(){
    $theme_colors = itfirm_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}

/* Search Result  */
function itfirm_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'itfirm_custom_post_types_in_search_results' );