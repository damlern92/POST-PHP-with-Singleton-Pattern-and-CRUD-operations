<?php
// This file contains the database access information. 
// This file also establishes a connection to MariaDB, 
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASS', '');
DEFINE ('DB_NAME', 'singleton_crud');
DEFINE ('APP_DIR', 'c:/wamp64/www/virtual.a/singleton');

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    require_once APP_DIR . "/classes/" . $className . ".php";
}
