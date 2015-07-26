<?php

define('DB_TYPE', 'mysqli');
define('DB_HOST', 'localhost');
define('DB_NAME', 'massaging');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8');
define('TABLE_PREFIX', 'wb_');

define('WB_URL', 'http://www.massaging.ch');
define('ADMIN_DIRECTORY', 'admin');// no leading/trailing slash or backslash!! A simple directory name only!!

require_once(dirname(__FILE__).'/framework/initialize.php');
// end of file -------------

