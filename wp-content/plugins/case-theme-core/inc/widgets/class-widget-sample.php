<?php

class CT_Sample_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'sample';
    protected $title = 'Widget Sample';
    protected $icon = 'fa fa-file-o';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Template","type":"select","default":"1","options":{"1":"Layout 1","2":"Layout 2","3":"Layout 3","4":"Layout 4"}}]},{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"title","label":"Title","type":"text","placeholder":"Enter your title"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}