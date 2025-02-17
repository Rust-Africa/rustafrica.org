<?php
/**
 * @Template: clear-folder.php
 * @since: 1.0.0
 * @author: Case-Themes
 * @descriptions:
 * @create: 23-Nov-17
 */
function ct_ie_clear_tmp(){

    $upload_dir = wp_upload_dir();

    ct_ie_delete_directory($upload_dir['basedir'] . '/ct-attachment-tmp');
    ct_ie_delete_directory($upload_dir['basedir'] . '/ct-ie-demo');
}

function ct_ie_delete_directory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir) || is_link($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!ct_ie_delete_directory($dir . "/" . $item, false)) {
            chmod($dir . "/" . $item, 0777);
            if (!ct_ie_delete_directory($dir . "/" . $item, false)) return false;
        };
    }
    return rmdir($dir);
}
function ct_ie_import_finish($demo_id, $demo_path){
    global $wp_filesystem, $import_result;
    global $table_prefix, $wpdb;

    update_option('ct_ie_demo_installed',$demo_id);
    $file_info = $demo_path. 'demo-info.json';
     
    if (file_exists($file_info)){ 
        $info_demo = json_decode(file_get_contents($file_info), true);   
        if(!empty($info_demo['old_domain'])){
              
            // replace elementor meta url
            $from = $info_demo['old_domain'];
            $to = get_site_url();
            $rows_affected = $wpdb->query(
            "UPDATE {$wpdb->postmeta} " .
            "SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
            "WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
        }
    }

    //Clear elementor cache.
    delete_metadata( 'post', null, '_elementor_css', '', true );
    delete_option( '_elementor_global_css' );
    delete_option( 'elementor-custom-breakpoints-files' );
    delete_option( '_elementor_assets_data' );
    $import_result[] = 'done all';

    $file = ct_ie()->plugin_dir.'assets/log.txt';
    $file_contents = implode(PHP_EOL,$import_result);
    $wp_filesystem->put_contents($file, $file_contents, FS_CHMOD_FILE);
}