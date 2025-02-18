<?php

class CT_CtPortfolioDetails_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_portfolio_details';
    protected $title = 'Case Portdolio Details';
    protected $icon = 'eicon-library-upload';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"layout","label":"Layout","type":"select","options":{"1":"Layout 1","2":"Layout 2"},"default":"1"},{"name":"wg_title","label":"Widget Title","type":"text","condition":{"layout":"1"}},{"name":"portfolio_content","label":"Content","type":"repeater","controls":[{"name":"label","label":"Label","type":"text","label_block":true},{"name":"content","label":"Content","type":"text"}],"title_field":"{{{ label }}}"},{"name":"value_label","label":"Value Label","type":"text","condition":{"layout":"1"}},{"name":"value_text","label":"Value Text","type":"text","condition":{"layout":"1"}},{"name":"social","label":"Social Share","type":"select","options":{"show":"Show","hide":"Hide"},"default":"show","condition":{"layout":"2"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}