<?php

/**

 * Plugin Name: WP Maximum Execution Time Exceeded

 * Plugin URI: http://johnniejodelljr.com/wp-aximum-execution-time-exceeded/

 * Description: Increase the maximum execution time to 5 minutes. 

 * Version: 1.0.3

 * Author: Johnnie J. O'Dell Jr.

 * Author URI: http://johnniejodelljr.com/

 * License: GPL2

 */

 /*  Copyright 2014  Johnnie J. O'Dell Jr.  (email : johnnie@johnniejodelljr.com)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License, version 2, as 

    published by the Free Software Foundation.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
function wpmete_on_activation_wc(){

	$wpmetetxt = "
	# WP Maximum Execution Time Exceeded
	<IfModule mod_php5.c>
		php_value max_execution_time 300
	</IfModule>";

	$htaccess = get_home_path().'.htaccess';
	$contents = @file_get_contents($htaccess);
	if(!strpos($htaccess,$wpmetetxt))
	file_put_contents($htaccess,$contents.$wpmetetxt);
}



/* On deactivation delete code (dc) from htaccess file */

function wpmete_on_deactivation_dc(){

	$wpmetetxt = "
	# WP Maximum Execution Time Exceeded
	<IfModule mod_php5.c>
		php_value max_execution_time 300
	</IfModule>";

	$htaccess = get_home_path().'.htaccess';
	$contents = @file_get_contents($htaccess);
	file_put_contents($htaccess,str_replace($wpmetetxt,'',$contents));
	
}


register_activation_hook(   __FILE__, 'wpmete_on_activation_wc' );

register_deactivation_hook( __FILE__, 'wpmete_on_deactivation_dc' );





?>