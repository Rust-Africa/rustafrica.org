<?php

class CT_CtPixCircles_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_pix_circles';
    protected $title = 'Case Pix Circles';
    protected $icon = 'eicon-dot-circle-o';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Pix Circles List","tab":"content","controls":[{"name":"pix_circles","label":"Team List","type":"repeater","controls":[{"name":"image","label":"Image","type":"media"},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"link","label":"Link","type":"url"}],"title_field":"{{{ title }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}