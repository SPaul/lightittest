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
	public function getActions();

	/**
	 * render assigned to action view
	 * 
	 * @param string $view - neme of view to render
	 * @param array $data - some data fo rendering
	 * @return string - rendered data
	 */
	public function render($view, array $data);

	/**
	 * redirects to requested url
	 * 
	 * @param array | string $url - address for redirection. Can be local [controller/action] or absolute
	 * @return instance of redirect class
	 */
	public function redirect($url, $absolute = false);
}
?>