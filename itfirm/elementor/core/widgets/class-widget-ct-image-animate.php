<?php

class CT_CtImageAnimate_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_image_animate';
    protected $title = 'Image Animate';
    protected $icon = 'eicon-barcode';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Source Settings","tab":"content","controls":[{"name":"content_list","label":"Images","type":"repeater","default":[],"controls":[{"name":"image","label":"Image","type":"media"},{"name":"image_animate","label":"Animate","type":"select","options":{"shape-animate1":"Animate 1","shape-animate2":"Animate 2","shape-animate3":"Animate 3","shape-animate4":"Animate 4","wow bounceInLeft":"Bounce In Left","wow bounceInRight":"Bounce In Right","animate-none":"None"},"default":"shape-animate1"},{"name":"top_positioon","label":"Top Position (%)","type":"slider","size_units":["%"],"default":{"size":0},"range":{"%":{"min":0,"max":100}}},{"name":"right_positioon","label":"Right Position (%)","type":"slider","size_units":["%"],"default":{"size":0},"range":{"%":{"min":0,"max":100}}},{"name":"bottom_positioon","label":"Bottom Position (%)","type":"slider","size_units":["%"],"default":{"size":0},"range":{"%":{"min":0,"max":100}}},{"name":"left_positioon","label":"Left Position (%)","type":"slider","size_units":["%"],"default":{"size":0},"range":{"%":{"min":0,"max":100}}}]}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}