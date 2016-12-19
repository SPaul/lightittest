<?php
/**
 * base controller class controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

use System\Components\Controllers\iController;

// deny indirect access
defined('WATCH_DOG') or die();

class Controller implements iController{
	/** 
	 * store all avaliaable actions for this controller
	 */
	protected $actions;

	/** 
	 * @return array - private property actions
	 */
	public function getActions(){
		return $this->actions;
	}

	/**
	 * redirect to requested URL
	 */
	public function redirect($url, $absolute = false){
		return 'instance of redirct class';
	}


	public function render($view, array $data){

	}
}
?>