<?php

class CT_CtHiddenSidebar_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_hidden_sidebar';
    protected $title = 'Case Hidden Sidebar';
    protected $icon = 'eicon-sidebar';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"flex-start":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"flex-end":{"title":"Right","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .ct-hidden-sidebar-icon":"justify-content: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}