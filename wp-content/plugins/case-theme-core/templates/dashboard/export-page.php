<?php
/**
 * @since: 1.0.0
 * @author: CaseThemes
 * @create: 29-October-2019
 */
?>
<div class="ct-export-demos">
    <h2><?php echo esc_html__('Export', CT_TEXT_DOMAIN) ?></h2>
    <form method="post" class="ct-export-contents">
        <div class="ct-export-name">
            <label for="ct-ie-id">
                <h4><?php echo esc_html__('Demo Name (*) Enter demo slug (EXP : demo1, demo_1, demo-1...)', CT_TEXT_DOMAIN) ?></h4>
            </label>
            <input type="text" id="ct-ie-id" name="ct-ie-id" placeholder="demo-slug">
        </div>
        <div class="ct-export-link">
            <label for="ct-ie-link">
                <h4><?php echo esc_html__('Link Demo Preview (*)', CT_TEXT_DOMAIN) ?></h4>
            </label>
            <input type="text" id="ct-ie-link" name="ct-ie-link" placeholder="https://casethemes.net/">
        </div>
        <div class="ct-export-options">
            <h4><?php echo esc_html__('Select data (*):', CT_TEXT_DOMAIN) ?></h4>
            <div class="ct-export-list-opt">

                <input name="ct-ie-data-type[]" type="checkbox" value="attachment" checked="checked">
                <label><?php esc_html_e('Media', CT_TEXT_DOMAIN); ?></label>

                <input name="ct-ie-data-type[]" type="checkbox" value="widgets" checked="checked">
                <label><?php esc_html_e('Widgets', CT_TEXT_DOMAIN); ?></label>

                <input name="ct-ie-data-type[]" type="checkbox" value="options" checked="checked">
                <label><?php esc_html_e('WP Settings', CT_TEXT_DOMAIN); ?></label>

                <?php if (class_exists('ReduxFramework')): ?>

                    <input name="ct-ie-data-type[]" type="checkbox" value="settings" checked="checked">
                    <label><?php esc_html_e('Theme Options', CT_TEXT_DOMAIN); ?></label>

                <?php endif; ?>

                <?php if (function_exists('cptui_get_post_type_data')): ?>

                    <input name="ct-ie-data-type[]" type="checkbox" value="ctp_ui" checked="checked">
                    <label><?php esc_html_e('Post Type', CT_TEXT_DOMAIN); ?></label>

                <?php endif; ?>

                <input name="ct-ie-data-type[]" type="checkbox" value="content" checked="checked">
                <label><?php esc_html_e('Content', CT_TEXT_DOMAIN); ?></label>

                <?php if (class_exists('RevSlider')): ?>

                    <input name="ct-ie-data-type[]" type="checkbox" value="revslider" checked="checked">
                    <label><?php esc_html_e('Slider Revolution', CT_TEXT_DOMAIN); ?></label>

                <?php endif; ?>
            </div>
        </div>
        <div class="ct-export-btn">
            <input type="hidden" name="action" value="abcore_export">
            <button type="submit" class="button button-primary create-demo"><?php esc_html_e('Create Demo', CT_TEXT_DOMAIN); ?></button>
            <button type="button" class="button button-primary download-demo"><?php esc_html_e('Download All Demos', CT_TEXT_DOMAIN); ?></button>
        </div>
    </form>
</div>
