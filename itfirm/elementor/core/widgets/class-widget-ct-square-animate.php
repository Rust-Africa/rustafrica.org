<?php

class CT_CtSquareAnimate_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_square_animate';
    protected $title = 'Case Square Animate';
    protected $icon = 'eicon-integration';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"square_color","label":"Square Color","type":"color"},{"name":"line_color","label":"Line Color","type":"color"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-elementor-js','ct-inline-css-js' );
}