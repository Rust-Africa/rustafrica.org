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
        <div class="setting">
             <tr>
                 <div class="setting">
                     <?php 
                     	$this->option_layout(array(
                                'id'=>'user_press_layout',
                                'title' => '',
                                'default' => 'default'
                     	));
                        ?>
                 </div>
             </tr> 
        </div>
    </tbody>
</table>
