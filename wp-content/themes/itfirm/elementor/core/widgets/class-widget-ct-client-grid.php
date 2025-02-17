<?php

class CT_CtClientGrid_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_client_grid';
    protected $title = 'Case Client Grid';
    protected $icon = 'eicon-person';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"clients","label":"Clients","type":"repeater","controls":[{"name":"client_name","label":"Client Name","type":"text","label_block":true},{"name":"client_link","label":"Client URL","type":"url","label_block":true},{"name":"client_logo","label":"Client Logo","type":"media","label_block":true},{"name":"client_logo_hover","label":"Client Logo Hover","type":"media","label_block":true}],"title_field":"{{{ client_name }}}"},{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1","style2":"Style 2"}}]},{"name":"grid_section","label":"Grid","tab":"content","controls":[{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"2","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"4","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"4","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'imagesloaded','isotope','ct-post-masonry-widget-js','ct-post-grid-widget-js' );
}