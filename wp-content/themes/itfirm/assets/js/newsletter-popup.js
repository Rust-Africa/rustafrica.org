jQuery(document).ready(function(){  
  jQuery('.ct-newsletter-close').click(function(){
    jQuery('#ct-newsletter-popup').fadeOut();
  });
  
  var visits = jQuery.cookie('visits') || 0;
  visits++;
  
  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
    
  if ( jQuery.cookie('visits') > 1 ) {
    jQuery('#ct-newsletter-popup').hide();
  } else {
    var pageHeight = jQuery(document).height();
    setTimeout(function(){
      jQuery('#ct-newsletter-popup').fadeIn();
    }, 5000);
  }

  if (jQuery.cookie('noShowWelcome')) { jQuery('#ct-newsletter-popup').hide(); }
}); 