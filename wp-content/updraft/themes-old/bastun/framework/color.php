<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));

if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
global $bastun_redux_demo; 
$b=$bastun_redux_demo['main-color-1'];
$rgba = hex2rgb($b);  
?>
:root {
  --primaryColor: <?php echo esc_attr($bastun_redux_demo['main-color-1']); ?>;
  --secondaryColor: <?php echo esc_attr($bastun_redux_demo['main-color-2']); ?>;
  --gradientColor: linear-gradient(90deg, <?php echo esc_attr($bastun_redux_demo['main-color-3']); ?> 0%, <?php echo esc_attr($bastun_redux_demo['main-color-4']); ?> 47.92%, <?php echo esc_attr($bastun_redux_demo['main-color-5']); ?> 100%);
}