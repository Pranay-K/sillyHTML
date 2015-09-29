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

require('classes/element.php'); // Should always be included
require('classes/html.php');   // is necessary if building HTML context too
require('classes/lists.php'); // temporary classs, if want to use quick listings

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

//ADDON CLASSES
require('addons/TextStyles.php');

//USER CLASSES