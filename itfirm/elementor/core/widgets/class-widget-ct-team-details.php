<?php

class CT_CtTeamDetails_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_team_details';
    protected $title = 'Case Team Details';
    protected $icon = 'eicon-user-circle-o';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_icon","label":"Icons","tab":"content","controls":[{"name":"icons","label":"Social","type":"repeater","controls":[{"name":"ct_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"icon_link","label":"Icon Link","type":"url","label_block":true}]},{"name":"image","label":"Image","type":"media"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}