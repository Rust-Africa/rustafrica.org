<?php
/**
 * @since: 1.0.0
 * @author: Case-Themes
 * @create: 16-Nov-17
 */
?>
<div class="ct-export-demos">
    <h3><?php echo esc_html__('Export', CTI_TEXT_DOMAIN) ?></h3>
    <form method="post" class="ct-export-contents">
        <div class="ct-export-name">
            <input required='' type="text" id="ct-ie-id" name="ct-ie-id" placeholder='<?php echo esc_html__('Name', CTI_TEXT_DOMAIN) ?>'>
        </div>
        <div class="ct-export-link">
            <input required='' type="text" id="ct-ie-link" name="ct-ie-link" placeholder='<?php echo esc_html__('Demo Link', CTI_TEXT_DOMAIN) ?>'>
        </div>
        <div class="ct-export-options">
            <h4><?php echo esc_html__('Select data:', CTI_TEXT_DOMAIN) ?></h4>
            <div class="ct-export-list-opt">
                <div class="ct-checkbox-wrap">
                    <div class="ct-checkbox">
                        <input id="ct-ie-data-media" name="ct-ie-data-type[]" type="checkbox" value="attachment" checked="checked">
                        <span></span>
                        <label for="ct-ie-data-media"><?php esc_html_e('Media', CTI_TEXT_DOMAIN); ?></label>
                    </div>
                </div>
                <div class="ct-checkbox-wrap">
                    <div class="ct-checkbox">
                        <input id="ct-ie-data-widget" name="ct-ie-data-type[]" type="checkbox" value="widgets"
                               checked="checked">
                        <span></span>
                        <label for="ct-ie-data-widget"><?php esc_html_e('Widgets', CTI_TEXT_DOMAIN); ?></label>
                    </div>
                </div>
                <div class="ct-checkbox-wrap">
                    <div class="ct-checkbox">
                        <input id="ct-ie-data-setting" name="ct-ie-data-type[]" type="checkbox" value="options"
                               checked="checked">
                        <span></span>
                        <label for="ct-ie-data-setting"><?php esc_html_e('WP Settings', CTI_TEXT_DOMAIN); ?></label>
                    </div>
                </div>
                <?php if (class_exists('ReduxFramework')): ?>
                    <div class="ct-checkbox-wrap">
                        <div class="ct-checkbox">
                            <input id="ct-ie-data-option" name="ct-ie-data-type[]" type="checkbox" value="settings"
                                   checked="checked">
                            <span></span>
                            <label for="ct-ie-data-option"><?php esc_html_e('Theme Options', CTI_TEXT_DOMAIN); ?></label>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (function_exists('cptui_get_post_type_data')): ?>
                    <div class="ct-checkbox-wrap">
                        <div class="ct-checkbox">
                            <input id="ct-ie-data-posttype" name="ct-ie-data-type[]" type="checkbox" value="ctp_ui"
                                   checked="checked">
                            <span></span>
                            <label for="ct-ie-data-posttype"><?php esc_html_e('Post Type', CTI_TEXT_DOMAIN); ?></label>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="ct-checkbox-wrap">
                    <div class="ct-checkbox">
                        <input id="ct-ie-data-content" name="ct-ie-data-type[]" type="checkbox" value="content"
                               checked="checked">
                        <span></span>
                        <label for="ct-ie-data-content"><?php esc_html_e('Content', CTI_TEXT_DOMAIN); ?></label>
                    </div>
                </div>
                <?php if (class_exists('RevSlider')): ?>
                    <div class="ct-checkbox-wrap">
                        <div class="ct-checkbox">
                            <input id="ct-ie-data-rev" name="ct-ie-data-type[]" type="checkbox" value="revslider"
                                   checked="checked">
                            <span></span>
                            <label for="ct-ie-data-rev"><?php esc_html_e('Slider Revolution', CTI_TEXT_DOMAIN); ?></label>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ct-export-btn">
            <input type="hidden" name="action" value="ct-export">
            <button type="submit"
                    class="button button-primary create-demo"><?php esc_html_e('Create Demo', CTI_TEXT_DOMAIN); ?></button>
            <button type="submit" class="button button-primary download-demo" name="ct-ie-download"
                    value="swa"><?php esc_html_e('Download All Demos', CTI_TEXT_DOMAIN); ?></button>
        </div>
    </form>
</div>
