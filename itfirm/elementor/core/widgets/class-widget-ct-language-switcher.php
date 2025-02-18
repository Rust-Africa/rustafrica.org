<?php

class CT_CtLanguageSwitcher_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_language_switcher';
    protected $title = 'Case Language Switcher';
    protected $icon = 'eicon-editor-list-ul';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"current","label":"Current Item","type":"text","label_block":true},{"name":"current_item_typography","label":"Current Item Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-language-switcher1 .current--item"},{"name":"current_item_color","label":"Current Item Color","type":"color","selectors":{"{{WRAPPER}} .ct-language-switcher1 .current--item":"color: {{VALUE}};","{{WRAPPER}} .ct-language-switcher1 .current--item svg":"fill: {{VALUE}};"}},{"name":"icon_font_size","label":"Icon Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .ct-language-switcher1 .current--item svg":"height: {{SIZE}}{{UNIT}};"}},{"name":"menu_item","label":"Sub Item","type":"repeater","controls":[{"name":"text","label":"Text","type":"text","label_block":true},{"name":"link","label":"Link","type":"url","label_block":true}],"title_field":"{{{ text }}}"},{"name":"sub_item_typography","label":"Sub Item Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-language-switcher1 ul li a"},{"name":"sub_item_color","label":"Sub Item Color","type":"color","selectors":{"{{WRAPPER}} .ct-language-switcher1 ul li a":"color: {{VALUE}};"}},{"name":"dropdown_position","label":"Dropdown Position","type":"select","options":{"dr-left":"Left","dr-right":"Right"},"default":"dr-left"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}