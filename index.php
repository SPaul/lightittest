<?php
/**
 * index.php
 * 
 * Entry point to lightit.test. Allows user to login
 * via one of social networks API. This time I will try to
 * login by vk.com. Uses MVC pattern.
 * 
 * @author Paul Strelkovsky, spaul@ukr.net 
 * @version 1.0.0
 */
/**
 * lets set up flag to deny indirect access to the included files
 */
define('WATCH_DOG', true);

session_start();

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOME_URL', $_SERVER['HTTP_HOST']);
define('MODELS_DIR', ROOT.'/private/__mvc__/models/');
define('CONTROLLERS_DIR', ROOT.'/private/__mvc__/controllers/');
define('VIEWS_DIR', ROOT.'/private/__mvc__/views/');
define('LAYOUTS_DIR', ROOT.'/private/__layout__/');

/**
 * let's get all we need to run our super mega app
 */
require_once 'private/loader.php';

$app = new System\Components\Application(new System\Components\Configuration());
$app->run();
?>