<?php

class CT_CtWpml_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_wpml';
    protected $title = 'Case WPML Switcher';
    protected $icon = 'eicon-sync';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"settings_section","label":"Settings","tab":"content","controls":[{"name":"wg_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"flex-start":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"flex-end":{"title":"Right","icon":"fa fa-align-right"}},"selectors":{"{{WRAPPER}} .site-header-lang .wpml-ls-statics-shortcode_actions.wpml-ls-legacy-dropdown .wpml-ls-item, {{WRAPPER}} .site-header-lang .wpml-ls-statics-shortcode_actions.wpml-ls-legacy-dropdown-click .wpml-ls-item":"justify-content: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}