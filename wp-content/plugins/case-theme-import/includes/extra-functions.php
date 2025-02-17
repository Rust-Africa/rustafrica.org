<?php
/**
 * @Template: extra-functions.php
 * @since: 1.0.0
 * @author: Case-Themes
 * @descriptions:
 * @create: 27-Nov-17
 */
if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ! function_exists( 'ct_ie_export_demo_info' ) ) {
	function ct_ie_export_demo_info( $file, $demo_info = array() ) {
		if ( ! empty( $demo_info ) ) {
			global $wp_filesystem;
			$file_contents = json_encode( $demo_info );
			$wp_filesystem->put_contents( $file, $file_contents, FS_CHMOD_FILE );
		}
	}
}

if ( ! function_exists( 'ct_ie_export_elementor_data' ) ) {
	function ct_ie_export_elementor_data( $file, $elemetor_data = array() ) {
		if ( ! empty( $elemetor_data ) ) {
			global $wp_filesystem;
			$file_contents = json_encode( $elemetor_data );
			$wp_filesystem->put_contents( $file, $file_contents, FS_CHMOD_FILE );
		}
	}
}

if ( ! function_exists( 'ct_ie_import_elementor_data' ) ) {
	function ct_ie_import_elementor_data( $file ) {
		if ( file_exists( $file ) ) {
		    $file_contents = json_decode( file_get_contents( $file ), true, 99999 );
		    foreach ( $file_contents as $post_id => $elementor_data ) {
		        global $wpdb;
		        $table_name = $wpdb->prefix . "postmeta";
		        $result = $wpdb->update($table_name, [ 'meta_value' => $elementor_data ], [ 'post_id' => $post_id, 'meta_key' => '_elementor_data' ]);
		    }
		}
	}
}

if ( ! function_exists( 'ct_ie_extra_options_export' ) ) {
	/**
	 * @function theme_core_ie_extra_options_export
	 *
	 * @param $file
	 * @param array $options
	 */
	function ct_ie_extra_options_export( $file, $options = array() ) {
		if ( ! empty( $options ) ) {
			global $wp_filesystem;
			$file_contents = array();

			foreach ( $options as $option_name ) {
				$file_contents[ $option_name ] = get_option( $option_name );
			}

			if ( $file_contents !== false ) {
				$file_contents = json_encode( $file_contents );
				$wp_filesystem->put_contents( $file, $file_contents, FS_CHMOD_FILE );
			}
		}
	}
}

if ( ! function_exists( 'ct_ie_extra_options_import' ) ) {
	/**
	 * @function theme_core_ie_extra_options_import
	 *
	 * @param $file
	 * @param array $options
	 */
	function ct_ie_extra_options_import( $file ) {
		global $import_result;
		if ( file_exists( $file ) ) {
			$file_contents = json_decode( file_get_contents( $file ), true );
			foreach ( $file_contents as $option_name => $option_values ) {
				update_option( $option_name, $option_values );
				$import_result[] = 'Import values to option key "' . $option_name . '" successfully!';
			}
		}
	}
}


/**
 * check and create folder.
 *
 * @param $folder_name
 *
 * @return string folder dir
 */
function ct_ie_process_demo_folder( $folder_name ) {

	if ( ! is_dir( ct_ie()->theme_dir . $folder_name ) ) {
		wp_mkdir_p( ct_ie()->theme_dir . $folder_name );
	}

	return trailingslashit( ct_ie()->theme_dir . $folder_name );
}

function ct_ie_replace_site_url( $contents, $folder_dir ) {
	$file_demo_info = $folder_dir . 'demo-info.json';
	if ( file_exists( $file_demo_info ) ) {
		$info_demo = json_decode( file_get_contents( $file_demo_info ), true );
	}
	return str_replace( str_replace( "\"", '', json_encode( $info_demo['old_domain'] ) ), str_replace( "\"", '', json_encode( site_url() . '/' ) ), $contents );
}

if(!function_exists('ct_import_truncate_tables')){
	function ct_import_truncate_tables(){
		$tables = apply_filters('ct_import_truncate_tables', [
			'posts',
			'postmeta',
			'terms',
			'termmeta',
			'term_relationships',
			'term_taxonomy',
		]);

		global $wpdb;

		foreach ($tables as $table) {
			$table_name = $wpdb->prefix . $table;
			$wpdb->query("TRUNCATE TABLE {$table_name}");
		}
	}
}