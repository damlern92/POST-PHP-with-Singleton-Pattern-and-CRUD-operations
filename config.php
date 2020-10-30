<?php
// This file contains the database access information. 
// This file also establishes a connection to MariaDB, 
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASS', '');
DEFINE ('DB_NAME', 'singleton_crud');


spl_autoload_register(function($className){
    require($_SERVER['DOCUMENT_ROOT'] ."/singleton-crud/_app/classes/{$className}.php");
});