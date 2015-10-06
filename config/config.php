<?php

/**
 * --------------------------------------------
 * RENDER COMPRESSED HTML
 * --------------------------------------------
 * Default : FALSE
 * FALSE : Renders HTML in readable friendly format, not compressed.
 * TRUE : Renders HTML compressed, is difficult to read.
 */
define('COMPRESSED','FALSE');
/**
 * --------------------------------------------
 * SCRIPT POSITION IN RENDERED HTML
 * --------------------------------------------
 * Default : HEAD
 * HEAD is used to render script tags in the <HEAD></HEAD> section of the rendered HTML
 * FOOT can be used to add script at the footer near <BODY> tag of HTML
 * FOOT to be considered for better javascript performance
 */
define('SCRIPT_POS','HEAD');
/**
 * -------------------------------------------
 * ASSET LOCATIONS
 * -------------------------------------------
 * Asset location are used to define the location of css,js and images folder in the system.
 * Very handy for quick excess of the path of assets, can be incremented depending upon needs.
 */
define('CSS','assets/css/');
define('JS','assets/js/');
define('IMG','assets/images/');
/**
 * -------------------------------------------
 * QUICK PLUGINS
 * -------------------------------------------
 * Handy to be used in =include command, to quickly access all the required libraries of plugin
 * eg. =include(jquery){} will simply include all the jquery files to the system automatically.
 */
$jquery = ['assets/js/jquery.min.js'];
$bootstrap = ['assets/css/bootstrap.min.css','assets/css/bootstrap-theme.min.css','assets/css/bootstrap.min.js'];
/**
 * -------------------------------------------
 * BASIC CLASSES INCLUDES
 * -------------------------------------------
 */
define('CLASS','classes');