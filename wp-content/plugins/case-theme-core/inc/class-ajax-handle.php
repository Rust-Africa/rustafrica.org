<?php

if (!defined('ABSPATH')) {
    die();
}
if (!class_exists('CT_Ajax_Handle')) {
    class CT_Ajax_Handle {
        public function __construct() {
            add_action('wp_ajax_ct_auto_generate', array($this, 'ct_auto_generate'));
        }

        function ct_auto_generate(){
            try {
                $result = [
                    'stt' => true,
                    'msg' => __('Generate Successfully!', CT_TEXT_DOMAIN),
                    'data' => strtoupper(substr(md5(uniqid(mt_rand(), true) . ':' . microtime(true)), 5, 11)),
                ];
                wp_send_json($result);
            } catch (Exception $e) {
                $result = [
                    'stt' => false,
                    'msg' => $e->getMessage(),
                    'data' => '',
                ];
                wp_send_json($result);
            }
            die();
        }
    }
    new CT_Ajax_Handle();
}