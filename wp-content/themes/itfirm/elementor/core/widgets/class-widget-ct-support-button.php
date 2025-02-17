<?php

class CT_CtSupportButton_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_support_button';
    protected $title = 'Case Support Button';
    protected $icon = 'eicon-dual-button';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"btn_text","label":"Button Text","type":"text","label_block":true},{"name":"btn_link","label":"Button Link","type":"url"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-elementor-js','ct-inline-css-js' );
}