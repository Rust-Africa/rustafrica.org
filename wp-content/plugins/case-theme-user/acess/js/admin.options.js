jQuery(document).ready(function($) {
	"use strict";
	
	/**
	 * media option.
	 * @author CaseThemes Team
	 */
	
	var media_element;
	
	// new frame;
	var user_press_media_frame = wp.media.frames.tgm_media_frame = wp.media({
		className : 'media-frame ct-user-form-media-frame',
		frame : 'select',
		multiple : false,
		title : 'Select Background Image',
		library : {
			type : 'image'
		},
		button : {
			text : 'SELECT'
		}
	});

	// Bind to our click event in order to open up the new media experience.
	$(document.body).on('click', '.ct-user-form-option-media button', function(e) {
		
		media_element = $(this);
		
		user_press_media_frame.open();
	});

	user_press_media_frame.on('select', function(){
        // Grab our attachment selection and construct a JSON representation of the model.
        var media_attachment = user_press_media_frame.state().get('selection').first().toJSON();
        // Send the attachment URL to our custom input field via jQuery.
        if(media_attachment.id != undefined){
        	media_element.parent().find('input').val(media_attachment.url);
        }
    });
    
    
     $('.demo').each( function() {
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                        if( typeof console === 'object' ) {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });

            });
            
            
            $.minicolors = {
              defaults: {
              animationSpeed: 50,
              animationEasing: 'swing',
              change: null,
              changeDelay: 0,
              control: 'hue',
              dataUris: true,
              defaultValue: '',
              format: 'hex',
              hide: null,
              hideSpeed: 100,
              inline: false,
              keywords: '',
              letterCase: 'lowercase',
              opacity: false,
              position: 'bottom left',
              show: null,
              showSpeed: 100,
              theme: 'default'
          }
      };

     /**
      * images option
      * @author CaseThemes Team
      */
      $('.ct-user-form-option-layout').on('click', 'ul li', function () {
    	  "use strict";
    	  
    	  $(this).parent().find('li').removeClass('selected');
    	  
    	  $(this).addClass('selected');
    	  
    	  $(this).parents('.ct-user-form-option-layout').find('input').val($(this).data('value'));
	  });
          
          
      /**
      * switch option
      * @author CaseThemes Team
      */
	  $(".ct-user-form-option-switch").on('click', 'td div, td label', function() {
		  "use strict";
		  
		  var _checkbox = $(this).parents('tr').find('input[type="checkbox"]');
		  var _value = $(this).parents('tr').find('input[type="hidden"]');
		  
  		  if(_checkbox.is(':checked')){
  			 _value.val(1);
  		  } else {
  			 _value.val(0);
  		  }
	  });
});