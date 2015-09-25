<?php

require('main.php');
$html = new HTML();
$html->title = 'Test RUN';

$button = new bButton('This is test button','primary');
$button->addAttr('onclick', "alert('button clicked');");
$button->codeView();
echo $button->build();


$bgroup = new bButtonGroup('Left,Middle,Right');
$bgroup->addElement($button);
$bgroup->codeView();
echo $bgroup->build();

$btoolbar = new bToolbar(array($bgroup,$bgroup));
$btoolbar->codeView();
echo $btoolbar->build();



$html->style = array('bootstrap.min.css','bootstrap-theme.min.css');
$html->script = array('bootstrap.min.js');
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
