<?php
/**
 * loader.php
 * 
 * load basic resources needed for correct app working
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

// deny indirect access
defined('WATCH_DOG') or die();

/**
 * lets load interfaces
 */
require_once 'private/__core__/__interface__/iModel.php';
require_once 'private/__core__/__interface__/iController.php';

require_once 'private/__core__/__class__/ActionNotFoundException.php';
require_once 'private/__core__/__class__/ControllerNotFoundException.php';
// require_once 'private/__core__/__class__/ViewNotFoundException.php';
// require_once 'private/__core__/__class__/LayoutNotFoundException.php';
require_once 'private/__core__/__class__/Configuration.php';
require_once 'private/__core__/__class__/Redirect.php';
require_once 'private/__core__/__class__/Controller.php';
require_once 'private/__core__/__class__/Model.php';
require_once 'private/__core__/__class__/Router.php';
require_once 'private/__core__/__class__/Application.php';
?>