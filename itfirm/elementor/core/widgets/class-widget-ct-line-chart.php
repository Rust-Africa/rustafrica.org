<?php

class CT_CtLineChart_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_line_chart';
    protected $title = 'Line Chart';
    protected $icon = 'fa fa-chart-line';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_line_chart","label":"Piecharts","tab":"content","controls":[{"name":"x_ax","label":"X-axis values","type":"text","label_block":true,"default":"2020;2019;2018;2017;2016;2015"},{"name":"values","label":"Values","type":"repeater","default":[{"title":"Business","y_ax":"5000;7500;4000;14000;9000;24000"},{"title":"Finance","y_ax":"12500;11000;22000;17000;27000;26500"},{"title":"Consulting","y_ax":"16000;19000;28000;24000;32000;36500"}],"controls":[{"name":"title","label":"Title","type":"text","label_block":true},{"name":"y_ax","label":"Y-axis values","type":"text","label_block":true},{"name":"border_color","label":"Border Color","type":"color"},{"name":"bg_color","label":"Background Color","type":"color"}],"title_field":"{{{ title }}}"},{"name":"title_color","label":"Title Color","type":"color"},{"name":"values_color","label":"Values Color","type":"color"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'chart-js','ct-linecharts-widget-js' );
}