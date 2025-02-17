<?php
/**
 * @Template: settings.php
 * @since: 1.0.0
 * @author: Case-Themes
 * @descriptions:
 * @create: 20-Nov-17
 */
if (!defined('ABSPATH')) {
    die();
}
/**
 * Export theme options
 *
 * @param $file
 */
function ct_ie_setting_export($file)
{
    global $wp_filesystem;

    $option_name = ct_ie_setting_get_opt_name($file);

    $file_contents = get_option($option_name);

    if (!$file_contents)
        return;

    $file_contents = json_encode($file_contents);

    $wp_filesystem->put_contents($file, $file_contents, FS_CHMOD_FILE); // Save it
}

function ct_ie_setting_import($folder)
{
    // File exists?
    $file = $folder. 'settings.json';
    $file_info = $folder. 'demo-info.json';

    if (file_exists($file)) {
        // Get file contents and decode
        $data = file_get_contents($file);

        if (file_exists($file_info)){ 
            $info_demo = json_decode(file_get_contents($file_info), true);   
            if(!empty($info_demo['old_domain'])){
                $data = str_replace( str_replace( "\"", '', json_encode( $info_demo['old_domain'] ) ), str_replace( "\"", '', json_encode( site_url() ) ), $data ); 
            }
        }

        $data = json_decode($data, true);

        $data = ct_ie_replace_theme_options($data);

        $option_name = ct_ie_setting_get_opt_name($file);

        update_option($option_name, $data);

        global $import_result;
        $import_result[] = 'Import theme options "'.$option_name.'" successfully!';
    }
}

function ct_ie_setting_get_opt_name($file)
{

    global $wp_filesystem;

    /**
     * Add WP_Filesystem Class
     *
     */
    if (!class_exists('WP_Filesystem')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        WP_Filesystem();
    }

    $opt_name = apply_filters('ct_ie_options_name', 'ct_theme_options');

    if (! file_exists($file)){
        return $opt_name;
    }

    $options = file_get_contents($file);

    $options = json_decode($options, true);

    return !empty($options['opt-name']) ? $options['opt-name'] : $opt_name;
}

function ct_ie_replace_theme_options($options)
{

    $_replaces = apply_filters('ct_ie_replace_theme_options', array());

    foreach ($_replaces as $pattern => $_replace) {
        if (isset($options[$pattern])) {
            $options[$pattern] = $_replace;
        }
    }

    return $options;
}