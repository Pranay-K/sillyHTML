<?php
//GLOBAL VARIABLES
define('READABLE','TRUE');
define('SCRIPT_POS','HEAD');
define('BOOTSTRAP','TRUE');
define('BOOTSTRAP_CSS','');
define('BOOTSTRAP_SCRIPT','');
define('SPACE_COUNT',0);
$space_count = 0;


require('classes/element.php');// Should always be included
require('classes/html.php');// is necessary if building HTML context too
require('classes/lists.php');// temporary classs, if want to use quick listings