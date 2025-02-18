<?php

class CT_CtSingleMenu_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_single_menu';
    protected $title = 'Case Single Menu';
    protected $icon = 'eicon-nav-menu';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Layout","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"menu","label":"Select Menu","type":"select","options":{"":"Default","main-menu":"Main Menu","menu-community":"Menu Community","menu-landing":"Menu Landing","menu-onepage-1":"Menu Onepage 1","menu-onepage-2":"Menu Onepage 2","menu-onepage-3":"Menu Onepage 3","menu-onepage-4":"Menu Onepage 4","menu-onepage-5":"Menu Onepage 5","menu-onepage-6":"Menu Onepage 6","menu-quick-links":"Menu Quick Links","menu-services":"Menu Services","menu-services-footer":"Menu Services Footer"}},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"flex-start":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"flex-end":{"title":"Right","icon":"fa fa-align-right"}},"selectors":{"{{WRAPPER}} .ct-single-menu":"justify-content: {{VALUE}};"}},{"name":"color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .ct-single-menu li a":"color: {{VALUE}};"}},{"name":"color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .ct-single-menu li a:hover":"color: {{VALUE}};","{{WRAPPER}} .ct-single-menu li a:before":"background-color: {{VALUE}};"}},{"name":"menu_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-single-menu li a"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}