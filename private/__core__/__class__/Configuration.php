<?php
/**
 * general application configuration
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components;

// deny indirect access
defined('WATCH_DOG') or die();

class Configuration{
	
	/**
	 * @return array - basic application configuration
	 */
	public function getRules(){
		return [
			'name' => 'Light it test exercise',
			'language' => 'ru',
			'layout' => 'default',
			'database' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'user' => 'root',
				'password' => '',
				'name' => 'lightit_te_db',
				'charset' => 'utf8',
			],
			'router' => [
				'defaultController' => 'premiere',
				'defaultAction' => 'index',
			],
		];
	}

	public function get($key){
		return isset($this->getRules()[$key]) ? $this->getRules()[$key] : false;
	}
}
?>