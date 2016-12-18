<?php
/**
 * interface of controller
 * 
 * describes basic controller functional
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

// deny indirect access
defined('WATCH_DOG') or die();

interface iController{
	/**
	 * action name which must be executed
	 */
	//public $action = 'index';

	/**
	 * current action params
	 */
	//public $actionParams = [];

	/**
	 * @return array - list of all actions and its arguments
	 */
	public function actions();

	/**
	 * run selected action
	 * 
	 * @param string $actionName - name of function to be executed
	 * @param array $args - required parameters defined in actions function
	 * @return string 
	 */
	public function run($actionName = 'index', array $args);
}
?>