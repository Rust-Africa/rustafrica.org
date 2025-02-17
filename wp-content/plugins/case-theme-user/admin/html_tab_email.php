<?php
/**
 * Generate fields in General tab.
 *
 * @author 		Jax Porter
 * @version     1.0.0
 */

?>

<table class="form-table email" >
   <tbody>
            <tr>
                    <?php
                        $this->option_text(array(
                            'id'=>'user_press_subject_email',
                            'title' => 'Subject email',
                            'default' => '',
                            'placeholder' => 'Case Theme User',
                            'description' => ' Title email '
                             ));
                    ?>
            </tr>
             <tr>
                  <?php
                        $this->option_text(array(
                            'id'=>'user_press_email_send',
                            'title' => 'Email send',
                            'default' => '',
                            'placeholder' => 'example@gmail.com',
                            'description' => 'Ships used email'
                             ));
                    ?>
             </tr>    

    </tbody>
</table>

<div class="item_rep">
    <ul>
        <li>
            {USERNAME} <samp class="description">Replacing the user name registration</samp>
        </li>
        
        <li>
            {BLOGNAME} <samp class="description">lternative to getting the title registered mail</samp>
        </li>
        
        <li>
           {ADMIN_EMAIL} <samp class="description">Substitute for email sent email when using registered</samp>
        </li>
        
    </ul>
    
</div>

                   <?php
                        $content = '<p>Hello {USERNAME}</p> '
                                . '<p>congratulations you are a full member of the family {BLOGNAME} ,</p>'
                                . '<p> wish you a happy day oline . If you need help or have questions , </p>'
                                . '<p>please contact {ADMIN_EMAIL} for help soonest </p>';
                        
                        $editor_id = 'ct-user-form-conten-email';
                        wp_editor( $content, $editor_id, $settings = array() );
                      ?>  
