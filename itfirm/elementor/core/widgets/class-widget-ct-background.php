<?php

class CT_CtBackground_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_background';
    protected $title = 'Case Background';
    protected $icon = 'eicon-image';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"image","label":"Background Image","type":"media"},{"name":"color","label":"Background Color","type":"color"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}