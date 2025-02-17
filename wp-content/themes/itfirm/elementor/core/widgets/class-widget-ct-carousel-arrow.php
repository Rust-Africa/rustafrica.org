<?php

class CT_CtCarouselArrow_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_carousel_arrow';
    protected $title = 'Case Carousel Arrow';
    protected $icon = 'eicon-animation';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"content_alignment_section","label":"Content Alignment","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"arrow_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Case Left","icon":"eicon-text-align-left"},"center":{"title":"Case Center","icon":"eicon-text-align-center"},"flex-end":{"title":"Case Right","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .ct-nav-carousel":"justify-content: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}