<?php

	// Define core paths as absolute paths to make sure that require_once works as expected
	
	// DIRECTORY_SEPARATOR is a PHP pre-defined constant

	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);	

	defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Users'.DS.'ronyortiz'.DS.'Sites'.DS.'training-2016'.DS.'btbphp');

	defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

	// config file 
	require_once(LIB_PATH.DS."config.php");

	// basic functions 
	require_once(LIB_PATH.DS."functions.php");

	// core objects
	require_once(LIB_PATH.DS."session.php");
	require_once(LIB_PATH.DS."database.php");
	require_once(LIB_PATH.DS."database_object.php");

	// database related classes
	require_once(LIB_PATH.DS."user.php");
	

?>