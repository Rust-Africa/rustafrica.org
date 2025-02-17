<?php
/**
 * @Template: manual-import-template.php.
 * @since: 1.0.0
 * author: Case-Themes
 * @descriptions:
 * @create: 12/19/2018
 */
?>

<div class="ct-manual-import-layout ct-m-hidden" style="display: none">
    <div class="ct-contain">

        <div class="ct-loading" style="display: none">
            <span class="ct-pinner"><span class="fa fa-spinner fa-spin"></span></span>
        </div>
        <span class="dashicons dashicons-dismiss"></span>
        <div class="ct-contain-wrap">
            <div class="ct-tabs-head">
                <div class="tabs-demos ct-mi-active" data-id="select-demo">
                    <span><?php esc_html_e('Select Demo', CTI_TEXT_DOMAIN) ?></span>
                </div>
                <div class="tabs-demos"
                     data-id="attachments">
                    <span><?php esc_html_e('Download Attachment', CTI_TEXT_DOMAIN) ?></span>
                </div>
            </div>
            <div class="ct-tabs-content">
                <div class="tabs-contents ct-mi-demo-list" id="select-demo">
                    <?php
                    if (!empty($demo_list)):
                        foreach ($demo_list as $demo):
                            $file_demo_info = $path . $demo . '/demo-info.json';
                            $demo_installed = $current_demo_installed === $demo ? true : false;
                            if (file_exists($file_demo_info)):
                                $info_demo = json_decode(file_get_contents($file_demo_info), true);
                                $link = "#";
                                if (file_exists($path . $demo . '/options.json')) {
                                    $options = json_decode(file_get_contents($path . $demo . '/options.json'), true);
                                    $link = $options['attachment'];
                                }
                                ?>
                                <div class="ct-mi-demo-item">
                                    <div class="ct-mi-item-inner">
                                        <div class="ct-mi-image">
                                            <img src="<?php echo $url . $demo . '/screenshot.png' ?>" alt="">
                                            <div class="ct-mi-preview">
                                                <h4 class="ct-mi-demo-title"><?php echo esc_attr($info_demo['name']) ?></h4>
                                                <a class="ct-mi-select" href="#"
                                                   data-attachment="<?php echo esc_url($link) ?>" data-demo="<?php echo esc_attr($demo) ?>">
                                                    <span><?php esc_html_e('Select', CTI_TEXT_DOMAIN) ?></span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            <?php
                            endif;
                        endforeach;
                    else:
                        ?>
                        <div class="ct-ie-demo-empty">
                            <span class="dashicons dashicons-warning"></span>
                            <h4 class="ct-ie-notice-empty"><?php echo esc_html__('Demos data is empty') ?></h4>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="tabs-contents" id="attachments">
                    <div class="ct-mi-demo-item-selected">
                        <div class="ct-mi-item-inner">
                            <div class="ct-mi-image ct-mi-image-selected">
                                <img src="<?php echo ct_ie()->assets_url . '/ct-ie.jpg' ?>" alt="">
                                <div class="ct-mi-preview">
                                    <h4 class="ct-mi-demo-title-selected"></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="ct-mi-download-att">
                        <div class="ct-mi-dl-step step-1">
                            <h4><?php echo esc_html__('Step 1:', CTI_TEXT_DOMAIN) ?></h4>
                            <button id="ct-download-attachment-btn"
                                    data-attachment="#"><?php echo esc_html__('Download Attachments File', CTI_TEXT_DOMAIN) ?></button>
                        </div>
                        <div class="ct-mi-dl-step step-2">
                            <h4><?php echo esc_html__('Step 2:', CTI_TEXT_DOMAIN) ?></h4>
                            <p>Please <b>"<?php esc_html_e("Upload", CTI_TEXT_DOMAIN) ?>
                                    "</b> <?php esc_html_e("and", CTI_TEXT_DOMAIN) ?>
                                <b>"<?php esc_html_e("Unzip", CTI_TEXT_DOMAIN) ?>"</b> file
                                to <b><?php echo wp_upload_dir()['basedir'] ?>/</b></p>
                        </div>
                        <div class="ct-mi-dl-step step-3">
                            <input type="checkbox" id="ct-accept-unzip-done" value="ct-accept">
                            <label for="ct-accept-unzip-done"><?php esc_html_e("I uploaded and unzipped file", CTI_TEXT_DOMAIN) ?></label>
                        </div>
                        <div class="ct-mi-dl-step step-4">
                            <button><?php esc_html_e("Import Demo Data", CTI_TEXT_DOMAIN) ?></button>
                            <form method="post" style="display: none">
                                <input type="hidden" name="ct-ie-id" value="<?php echo esc_attr($demo) ?>">
                                <input type="hidden" name="action" value="ct-import">
                                <input type="hidden" name="manual_importing" value="true">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>