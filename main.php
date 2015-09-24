<?php
//GLOBAL VARIABLES
define('READABLE','TRUE');
define('SCRIPT_POS','HEAD');
define('CSS','assets/css/');
define('JS','assets/js/');
define('IMG','assets/images/');
define('BOOTSTRAP','TRUE');
define('BOOTSTRAP_CSS','');
define('BOOTSTRAP_SCRIPT','');

require('classes/element.php');// Should always be included
require('classes/html.php');// is necessary if building HTML context too
require('classes/lists.php');// temporary classs, if want to use quick listings