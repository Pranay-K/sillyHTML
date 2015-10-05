<?php
//GLOBAL VARIABLES
define('READABLE','TRUE');
define('SCRIPT_POS','HEAD');
define('CSS','assets/css/');
define('JS','assets/js/');
define('IMG','assets/images/');
//define('BOOTSTRAP','TRUE');
//define('BOOTSTRAP_CSS','');
//define('BOOTSTRAP_SCRIPT','');

//DEFINING PLUGINS
//define('JQUERY','jquery.min.js');
//define('BOOTSRAP',['bootstrap.min.css','bootstrap-theme.min.css','bootstrap.min.js']);
//define('ANGULARJS',[]);
//define('JQUERYUI',[]);
$jquery = ['jquery.min.js'];
$bootstrap = ['bootstrap.min.css','bootstrap-theme.min.css','bootstrap.min.js'];




require('classes/element.php'); // Should always be included
require('classes/html.php');   // is necessary if building HTML context too
require('classes/lists.php'); // temporary classs, if want to use quick listings

//ENGINE RELATED CLASSES
 require('classes/sillyEngine.php');

//BOOTSTRAP CLASSES
require('classes/bButton.php');
require('classes/bButtonGroup.php');
require('classes/bToolbar.php');
require('classes/bDrop.php');
require('classes/bGraphicon.php');
require('classes/bIcon.php');
require('classes/bList.php');
require('classes/bInput.php');
require('classes/bNav.php');
require('classes/bBreadcrumb.php');
require('classes/bPagination.php');
require('classes/bContainer.php');
require('classes/bGrid.php');
require('classes/bNavbar.php');
require('classes/bPanel.php');
require('classes/bProgressBar.php');
require('classes/bAlert.php');
require('classes/bTable.php');

//ADDON CLASSES
require('addons/TextStyles.php');

//USER CLASSES