<?php
/**
 * router class which allows work with parts of user's request
 *
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */


namespace System\Components;

// deny indirect access
defined('WATCH_DOG') or die();

class Router{
	/**
	 * router configuration describe how to interpret user request
	 */
	private $configuration;

	/**
	 * constructor of the Router class
	 */
	public function __construct(Application &$app){
		$this->configuration = [
			'controller' => preg_match('/[a-zA-Z0-9_]+/', explode('/', $_GET['r'])[0], $c) ? $c[0] : false,
			'action' => preg_match('/[a-zA-Z0-9_]+/', explode('/', $_GET['r'])[1], $a) ? $a[0] : false,
			'page' => $_GET['p'],
			'is_ajax' => isset($_GET['aj']),
			'defaults' => [
				'controller' => $app->getConfig()['router']['defaultController'],
				'action' => $app->getConfig()['router']['defaultAction'],
			],
		];
	}

	/**
	 * @return string - name of requested controller or default controller name
	 */
	public function getController(){
		return !$this->configuration['controller'] ? $this->configuration['defaults']['controller'] : $this->configuration['controller'];
	}

	/**
	 * @return string - name of requested action or default action name
	 */
	public function getAction(){
		return !$this->configuration['action'] ? $this->configuration['defaults']['action'] : $this->configuration['action'];
	}

	/**
	 * return current configuration of Router object
	 * 
	 * @return array
	 */
	public function getConfig(){
		return $this->configuration;
	}

	/**
	 * @return mixed - value by key in configuration array or false if key not exist
	 */
	public function getNode($key){
		return isset($this->configuration[$key]) ? $this->configuration[$key] : false;
	}

	/**
	 * check is request ajax or not
	 *
	 * @return bool - ajax status
	 */
	public function isAjax(){
		return $this->configuration['is_ajax'];
	}
}
?>