<?php

class CT_CtIconCart_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_icon_cart';
    protected $title = 'Case Cart Sidebar';
    protected $icon = 'eicon-cart-medium';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"icon_text_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .ct-sidebar-cart1":"color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-inline-css-js' );
}