<?php

require('main.php');
$html = new HTML();
$html->title = 'Test RUN';

//CREATING A BUTTON
$button = new bButton('This is test button','primary');
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
$navbar->codeView();
echo $navbar->build();



$html->style = array('bootstrap.min.css','bootstrap-theme.min.css');
$html->script = array('jquery.min.js','bootstrap.min.js');
$html->render();

/*$html = new HTML();
$html->title = 'Test RUN';

$div = new Element('div');
$div->addAttr('id','scupltDiv');
$div->addAttr('readonly','readonly');
$div->addHTML('This is test div');

$bold = new Element('b');
$bold->addHTML('This portion is written in bold');
$div->addElement($bold);

$span = new Element("span");
$span->addAttr('style','color:white;background-color:red');
$span->addHTML('This is a span for testing');
$bold->addElement($span);



//Creating a looping elements
$array = array(
    '0' => 'Pranay',
    '1' => 'Master',
    '2' => 'Raghav'
);

$ul = new Lists('ul',$array);
$ul->addAttr('class', 'nameList');
$ul->addChildAttr('class', 'listElement');
$ul->addChildAttr('onclick', 'alert(this.value);');
$div->addElement($ul);

//Creating div with multiple attributes at one time
$instaDiv = new Element();
$instaAttr = array(
    'id' => 'instaDiv',
    'class' => 'instaClass',
    'style' => 'color:blue;background-color:#ccc;border:1px solid black;height:30px;'
);
$instaDiv->attributes = $instaAttr;
$instaDiv->addHTML('This div is to illustrate how to Create div with multiple attributes at one time ');
$div->addElement($instaDiv);

$input = new Element('input');
$attr = array(
    'type' => 'text',
    'value' => 'Tesing'
);
$input->attributes = $attr;
$div->addElement($input);

$body = new Element('body');
$body->addElement($div);
//$div->codeView();
$html->addElement($body);
$meta = array(
    'tiwtter:site' => 'symfony'
);
$html->meta = $meta;
//echo $div->build();
//$div->codeView();

//$div->tree();
//$html->tree();
$html->style = array('bootstrap.min.css','bootstrap-theme.min.css');
$html->script = array('bootstrap.min.js');
$html->render();
 * */
?>
<span class="glyphicon glyphicon-minus" ></span>