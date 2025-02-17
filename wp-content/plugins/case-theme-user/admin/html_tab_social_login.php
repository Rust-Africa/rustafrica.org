<?php
/**
 * Generate fields in General tab.
 *
 * @author 		Jax Porter
 * @version     1.0.0
 */

?>
<table class="form-table editcomment" >
   <tbody>
        <tr>
            <td>
                <h3>
                <img  src="<?php echo userpress()->acess_url.'images/facebook.png' ?>" title="Google" alt="Google">
                    Facebook
                </h3>
                <a href="https://developers.facebook.com/">Where do I get this info?</a>
            </td>
             <?php
                $this->option_text(array(
                    'id'=>'user_press_face_api_key',
                    'title'=> esc_html__('Facebook API ID', 'ct-user-form'),
                    'default' => '',
                    'placeholder' => 'Example: qBQQF5Cmantse0ptg413Mw'
                ));

                 $this->option_switch(array(
                    'id'=>'user_press_status_face',
                    'title'=> esc_html__('Status login google ', 'ct-user-form'),
                    'default' => '1'
                ));
                ?>
        </tr>
  </tbody>
</table>

<table class="form-table google" >
   <tbody>
    
            <tr class="ct-user-form-option-google">
                <td>
                    <h3>
                            <label class="wp-neworks-label">
                                <img  src="<?php echo userpress()->acess_url.'images/google.png' ?>" title="Google" alt="Google">
                            Google
                            </label>
                    </h3>
                    <a href="https://console.cloud.google.com">Where do I get this info?</a>
                </td>
                     <?php 
                        $this->option_text(array(
                            'id'=>'user_press_google_api_key',
                            'title'=> esc_html__('Google Client ID', 'ct-user-form'),
                            'default' => '',
                            'placeholder' => 'qBQQF5Cmantse0ptg413Mw'
                        ));
                        ?>
               
                        <?php
                         $this->option_switch(array(
                            'id'=>'user_press_status_google',
                            'title'=> esc_html__('Status login google', 'ct-user-form'),
                            'default' => '1'
                        ));
                        ?>
             </tr>
      </tbody>
</table>