<?php

// This file initialize everything for us
// take care about our required file
// we think that why load every class in our page
// which may be decreased efficiency but in this case 
// php is very fast to load the class


// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPERATOR is a PHP pre-defined constant
// (\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Define the SITE_ROOT that means the file path of the project
// Defines File system absolute path not the web server path

// defined('SITE_ROOT') ? null : define('SITE_ROOT','D:'.DS.'xampp'.DS.'htdocs'.DS.'PhPCodeStorage'.DS.'photo_gallery');
defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'.DS.'xampp'.DS.'htdocs'.DS.'PhPCodeStorage'.DS.'photo_gallery');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');


// load config file first
require_once(LIB_PATH.DS."config.php");

// load basic functins next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");

// load core objects
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");
require_once(LIB_PATH.DS."pagination.php");

// load database-related classes
require_once(LIB_PATH.DS."user.php"); 
require_once(LIB_PATH.DS."photograph.php"); 
require_once(LIB_PATH.DS."comment.php"); 

?>