<?php

class CT_CtNewsletter_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_newsletter';
    protected $title = 'Newsletter';
    protected $icon = 'eicon-mail';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Color Settings","tab":"style","controls":[{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .ct-newsletter1.style1 .tnp-field-button:after":"color: {{VALUE}};"}},{"name":"button_bg_color","label":"Button Background Color","type":"color","selectors":{"{{WRAPPER}} .ct-newsletter1.style1 .tnp-field-button:before":"background-color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}