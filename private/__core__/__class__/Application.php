<?php
/**
 * general container for all operations
 *
 * this class describes all workflow, from analizing user's request
 * to rendering result
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components;

// deny indirect access
defined('WATCH_DOG') or die();

use System\Components\Router;
use System\Components\Exceptions\ControllerNotFoundException;
use System\Components\Exceptions\ActionNotFoundException;
use System\Components\Redirect;

class Application{
	/**
	 * configuration of application
	 */
	public $configuration;

	/**
	 * controller class name, requested by user
	 */
	private $controller;

	/**
	 * current action name
	 */
	private $action;

	/**
	 * true if request is using ajax
	 */
	private $is_ajax = false;

	/**
	 * controller data
	 */
	private $data;

	/**
	 * constructor of the main application class
	 *
	 * @param $config - configuration object
	 */
	public function __construct(Configuration $config){
		$this->configuration = $config->getRules();
		$this->analyzeRequest();
	}

	/**
	 * analyze user request and get controller and its arguments
	 */
	public function analyzeRequest(){
		$router = new Router($this);
		$this->controller = $router->getController();
		$this->action = $router->getAction();
		$this->is_ajax = $router->isAjax();
	}

	/**
	 * current application configuration
	 *
	 * @return array 
	 */
	public function getConfig(){
		return $this->configuration;
	}

	/**
	 * run configured application. Execute requested controller method
	 *
	 * @throws ControllerNotFoundException
	 * @throws ActionNotFoundException
	 */
	public function run(){
		$controllerPath = CONTROLLERS_DIR.$this->controller.'.php';
		if(!file_exists($controllerPath)){
			throw new ControllerNotFoundException('No such controller.');
		}

		require_once $controllerPath;

		$c = "System\Components\Controllers\\{$this->controller}";
		$controller = new $c();

		$action = $this->action;
		if(!method_exists($controller, $action)){
			throw new ActionNotFoundException('No such action in current controller.');
		}

		if(!in_array($this->action, $controller->getActions())){
			throw new ActionNotFoundException('No such action in current controller.');
		}

		$controller->setViewsDir($this->controller);
		$this->data = $controller->$action();

		if($this->data instanceof Redirect){
			$url = $this->data->getRedirectLocation();
			header($url);
			exit;
		}

		if($this->is_ajax){
			echo $this->data;
			exit;
		}

		$this->render();
	}

	/**
	 * render all content with template
	 *
	 * @throws LayoutNotFoundException
	 */
	public function render(){
		$layoutPath = LAYOUTS_DIR.$this->configuration['layout'].'.php';
		if(!file_exists($layoutPath)){
			throw new LayoutNotFoundException('No such layout.');
		}

		$content = $this->data;
		require_once $layoutPath;
	}
}
?>