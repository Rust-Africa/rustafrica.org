<?php

class CT_CtNavigationMenu_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_navigation_menu';
    protected $title = 'Case Navigation';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"menu","label":"Select Menu","type":"select","options":{"main-menu":"Main Menu","main-menu-left":"Main Menu Left","main-menu-right":"Main Menu Right","menu-footer":"Menu Footer","menu-information":"Menu Information","menu-landing-page":"Menu Landing Page","menu-product-categories":"Menu Product Categories","menu-product-categories-footer":"Menu Product Categories Footer","menu-secondary":"Menu Secondary","menu-services":"Menu Services","menu-shop-info":"Menu Shop Info","menu-top-bar":"Menu Top Bar","menu-top-bar-2":"Menu Top Bar 2"}},{"name":"style","label":"Style","type":"select","options":{"default":"Default","style1":"Style 1 (Light)","style2":"Style 2 (Dark)","style3":"Style 3 (Main Menu)","style4":"Style 4 (Light)"},"default":"default"},{"name":"link_color","label":"Link Color","type":"color","selectors":{"{{WRAPPER}} .ct-navigation-menu1.style1 a":"color: {{VALUE}};","{{WRAPPER}} .ct-navigation-menu1.style1 a span::before":"background-color: {{VALUE}};"},"condition":{"style":["style1"]}},{"name":"link_color_hover","label":"Link Color Hover","type":"color","selectors":{"{{WRAPPER}} .ct-navigation-menu1.style1 a:hover":"color: {{VALUE}};","{{WRAPPER}} .ct-navigation-menu1.style1 a:hover span::before":"background-color: {{VALUE}};"},"condition":{"style":["style1"]}},{"name":"link_typography","label":"Link Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-navigation-menu1 li a"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}