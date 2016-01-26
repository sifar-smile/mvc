<?php
/**
 * An extremely simple naked PHP application
 *
 * @author OSS
 * @license http://opensource.org/licenses/MIT MIT License
 */

//Start the Session
session_start();

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR );

// set a constant that holds the project's "application" folder, like "/var/www/app".
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);

// set a constant that holds the project's "lib" folder, like "/var/www/lib".
define('LIB', ROOT . 'lib' . DIRECTORY_SEPARATOR);


// load application config (error reporting etc.)
require_once APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
require_once APP . 'helper/helper.php';

// load application class
require_once LIB . 'core/application.php';
require_once LIB . 'core/controller.php';
require_once LIB . 'core/model.php';

// start the application
$app = new Application();