<?php

class CT_CtAngle_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_angle';
    protected $title = 'Case Angle Row';
    protected $icon = 'eicon-filter';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"angle_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .ct-angle svg, {{WRAPPER}} .ct-angle .ct-angle-square":"fill: {{VALUE}};background-color: {{VALUE}};"}},{"name":"angle_height","label":"Height","type":"slider","size_units":["px"],"default":{"size":90},"range":{"px":{"min":0,"max":1000}},"selectors":{"{{WRAPPER}} .ct-angle svg":"height: {{SIZE}}{{UNIT}};;"}},{"name":"responsive","label":"Responsive","type":"select","options":{"lg":"Default","md":"Hide Tablet","sm":"Hide Mobile"},"default":"lg"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}