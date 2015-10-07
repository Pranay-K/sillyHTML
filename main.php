<?php
require_once('config/config.php');

/**
 * ------------------------------------------------
 * INCLUDE CLASSES
 * ------------------------------------------------
 * This includes all the classes stated in the class folder.
 * Recommended not to touch the class folder.
 * Element.php is a base class and is always required and include seperately
 */
$CLASSES = array_diff(scandir(CLASS_ADDRESS),array('..','.','element.php'));
require_once('classes/element.php'); // Should always be included
foreach($CLASSES as $class)
    require_once(CLASS_ADDRESS.'/'.$class);

/**
 * --------------------------------------------------
 * INCLUDE ADDONS
 * --------------------------------------------------
 * Addon classes are the manually made addons for quick html codes.
 * Addons are taken from the addon folder, given the config section.
 * The addon folder is 'addons' which can be changed to anyother in config section.
 */
$ADDONS = array_diff(scandir(ADDONS),array('..','.'));
foreach($ADDONS as $class)
    require_once(ADDONS.'/'.$class);