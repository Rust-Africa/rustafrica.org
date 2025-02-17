<?php

class CT_CtPaginationSingle_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_pagination_single';
    protected $title = 'Pagination Single';
    protected $icon = 'eicon-apps';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"archive_link","label":"Archive Link","type":"url","label_block":true}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}