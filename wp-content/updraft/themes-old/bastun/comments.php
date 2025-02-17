<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
<div class="blog__details__comment aos-init aos-animate" data-aos="fade-up">
    <div class="blog__details__comment__heading">
        <h5><?php comments_number( esc_html__(' 0 Comments', 'bastun'), esc_html__(' 1 Comment', 'bastun'), esc_html__('% Comments', 'bastun') ); ?></h5>
    </div>
    <div class="review-comments-area">
        <?php wp_list_comments('callback=bastun_theme_comment'); ?>
    </div>
</div>
<div class="ak-height-100 ak-height-lg-60"></div>
<div class="col-md-12"> 
<!-- START PAGINATION -->
<?php
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<div class="pagination_area">
     <nav>
          <ul class="pagination">
               <li> <?php paginate_comments_links( 
                    array(
                    'prev_text' => wp_specialchars_decode('<i class="fas fa-angle-left"></i>',ENT_QUOTES),
                    'next_text' => wp_specialchars_decode('<i class="fas fa-angle-right"></i>',ENT_QUOTES),
                    ));  ?>
                </li>
          </ul>
     </nav>
</div>                                       
<?php endif; ?>
<!-- END PAGINATION --> 
</div>
<?php endif; ?>     
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
        'id_form' => 'contact-form',        
        'class_form' => 'news-d-title mb-40',                         
        'title_reply'=> wp_specialchars_decode(esc_html__( 'Leave A Comment', 'bastun' ),ENT_QUOTES),
        'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' => '<div class="row">
                            <div class="col-xl-6">
                                <div class="blog__details__input">
                                    <input class="name primary-border2 w-100 pl-20" type="text" name="author" id="inputName" placeholder="'.esc_attr__('Enter your name*', 'bastun').'" required="'.esc_attr__('required', 'bastun').'" data-error="'.esc_attr__('Name is required.', 'bastun').'">
                                </div>
                            </div>
                         ',
            'email' => '<div class="col-xl-6">
                            <div class="blog__details__input">
                                <input class="email primary-border2 w-100 pl-20" type="email" name="email" id="inputEmail" placeholder="'.esc_attr__('Enter your mail*', 'bastun').'" required="'.esc_attr__('required', 'bastun').'" data-error="'.esc_attr__('Valid email is required.', 'bastun').'">
                            </div>
                        </div>
                        ',
            'phone' => '<div class="col-xl-6">
                            <div class="blog__details__input">
                                <input class="phone primary-border2 w-100 pl-20" type="text" name="phone" id="inputPhone" placeholder="'.esc_attr__('Enter your  number*', 'bastun').'" required="'.esc_attr__('required', 'bastun').'" data-error="'.esc_attr__('Valid email is required.', 'bastun').'">
                            </div>
                        </div>
                        ',
            'website' => '<div class="col-xl-6">
                            <div class="blog__details__input">
                                <input class="phone primary-border2 w-100 pl-20" type="text" name="website" id="inputPhone" placeholder="'.esc_attr__('Website*', 'bastun').'" required="'.esc_attr__('required', 'bastun').'" data-error="'.esc_attr__('Valid email is required.', 'bastun').'">
                            </div>
                        </div>
                        </div>
                        ',
            ) ),   
            'comment_field' => '<div class="row"><div class="col-xl-12">
                                    <div class="blog__details__input">
                                        <textarea class="massage primary-border2 w-100 pl-20 pt-18" name="comment" placeholder="'.esc_attr__('Write A Comment *', 'bastun').'" required="'.esc_attr__('required', 'bastun').'" data-error="'.esc_attr__('Please,leave us a message.', 'bastun').'"></textarea>
                                    </div>
                                </div></div>
                                ', 
                
            'label_submit' => esc_html__( 'Post A Comment', 'bastun' ),
            'submit_button' =>'<div class="blog__details__button"><button class="default__button %3$s" name="%1$s" id="submit %2$s" type="submit">'.esc_attr__(' %4$s', 'bastun').'</button></div>',
            'submit_field' => ''.esc_attr__('%1$s', 'bastun').' '.esc_attr__('%2$s', 'bastun').'',
            'comment_notes_before' => '',
            'comment_notes_after' => '',               
)
?>
<?php if ( comments_open() ) : ?>
<div class="blog__details__form aos-init aos-animate">
    <?php comment_form($comment_args); ?>
</div>
<?php endif; ?> 