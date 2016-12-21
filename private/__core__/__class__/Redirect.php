<?php
/** 
 * user model
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components;

// deny indirect access
defined('WATCH_DOG') or die();

class Redirect{
	protected $url;

	public function __construct($url){
		$this->url = $url;
	}

	public function getRedirectLocation(){
		return "Location: {$this->url}";
	}
}