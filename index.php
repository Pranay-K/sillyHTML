<?php

require('main.php');
$html = new HTML();
$html->title = 'Test RUN';

//CREATING A BUTTON
$button = new bButton('This is test button','primary,lg');
$button->addAttr('onclick', "alert('button clicked');");
//$button->codeView();
echo $button->build();

//CREATING A BUTTON GROUP
$bgroup = new bButtonGroup('Left,Middle,Right');
$bgroup->addElement($button);
//$bgroup->codeView();
echo $bgroup->build();

//CREATING A TOOLBAR
$btoolbar = new bToolbar(array($bgroup,$bgroup));
//$btoolbar->codeView();
echo $btoolbar->build();


$graph = new bGraphicon('minus');
echo $graph->build();

//CREATING A DROPDOWN
$dropdown = new bDrop('Dropdown',['way'=>'up','direction'=>'right','dType'=>'split'],'info');
$submenu = array(
    'Action' => '#',
    'Another Action' => '#',
    'Something' => '#',
    '|' => '...',
    'After Divider' => '#'
);
$dropdown->addSubmenu($submenu);
//$dropdown->codeView();
echo $dropdown->build();

//CREATING A INPUT TEXT
$input = new bInput('',['placeholder'=>'Test box','left-addon'=>$button,'right-addon'=>$dropdown]);
//$input->codeView();
echo $input->build();


//CREATING NAVS
$nav = new bNav(['Home'=>'#','Profile'=>'#','Messages'=>'#','Dropdown'=>['One'=>'#','Two'=>'#','Three'=>'']],'pills|justified');
//$nav->codeView();
echo $nav->build();

//CREATING BREADCRUMB
$br = new bBreadcrumb(['Home'=>'#','Library'=>'#','Data'=>'active']);
//$br->codeView();
echo $br->build();


//CREATING PAGINATION
$pag = new bPagination(6, 2, 'index.php/id=@',1,'lg');
//$pag->codeView();
echo $pag->build();


//xs,sm,md,lg
$grid = new bGrid('md-2,4,6|xs-4,5,3');
//$grid->codeView();


//CREATING NAVBAR
$navbar = new bNavbar(['Home'=>'#','Profile'=>'#','Messages'=>'#','Dropdown'=>['One'=>'#','Two'=>'#','Three'=>'']]);
$nav = new bNav(['Link'=>'#','Dropdown'=>['One'=>'#','Two'=>'#','Three'=>'']]);
$navbar->extendMenu($nav,'right');
//$navbar->codeView();
echo $navbar->build();


//CREATING PANEL
$panel = new bPanel($nav);
$panel->addHeader('Nav Output');
$panel->addClass('primary');
$panel->addFooter($button);
//$panel->codeView();
echo $panel->build();

//CREATING PROGRESS BAR
$pg = new bProgressBar(50,'success,striped,active');
$pg->addStack(12,'danger,active,striped');
//$pg->codeView();
echo $pg->build();


//CREATING ALERT
$alert = new bAlert('This is a sample alert box', 1,'danger');
$alert->codeView();
echo $alert->build();


$html->style = array('bootstrap.min.css','bootstrap-theme.min.css');
$html->script = array('jquery.min.js','bootstrap.min.js');
//$html->tree();
$html->render();


?>
<span class="glyphicon glyphicon-minus" ></span>