<?php
/**
 * base controller class controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

use System\Components\Controllers\iController;
use System\Components\Redirect;

// deny indirect access
defined('WATCH_DOG') or die();

class Controller implements iController{
	/** 
	 * store all avaliaable actions for this controller
	 */
	protected $actions;

	/**
	 * name of directory which contain views files, default value is controller name
	 */
	protected $viewsDir;

	/** 
	 * @return array - protected property actions
	 */
	public function getActions(){
		return $this->actions;
	}

	/**
	 * redirect to requested URL
	 *
	 * @return configured object of System\Components\Redirect class
	 */
	public function redirect($url, $absolute = false){
		//convert url to fuul path
		$location = $absolute ? $url : 'http://'.HOME_URL.'/index.php?r='.$url[0];
		return new Redirect($location);
	}

	/**
	 * render selected view file with assigned data
	 *
	 * @param string $view - name of view file
	 * @param array $data - assigned data from the nodel or controller
	 * @return string rendered data in html format
	 */
	public function render($view, $data = []){
		$viewPath = VIEWS_DIR.$this->viewsDir.DIRECTORY_SEPARATOR.$view.'.php';
		if(!file_exists($viewPath)){
			throw new ViewNotFoundException('No such view.');
		}

		ob_start();
		require_once $viewPath;
		return $v = ob_get_clean();
	}

	/**
	 * set the directory name which contain views files for the controller
	 * 
	 * @param string $dirname
	 */
	public function setViewsDir($dirname){
		$this->viewsDir = $dirname;
	}
}
?>