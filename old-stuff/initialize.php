<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Users'.DS.'ronyortiz'.DS.'Sites'.DS.'training-2016'.DS.'btb_php'.DS.'photo_gallery');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// Load config files first
require_once(LIB_PATH.DS."config.php");

// Load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");

// Load core objects
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");

// Load database related classes
require_once(LIB_PATH.DS."user.php");


