<?php

class CT_ScrollToSection_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'scroll_to_section';
    protected $title = 'Asri Scroll To Section';
    protected $icon = 'eicon-scroll';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"pxl_id","label":"ID","type":"text","label_block":true,"description":"For example: #about"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}