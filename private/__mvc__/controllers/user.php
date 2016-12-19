<?php
/**
 * user controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

//use System\Components\Controllers\Controller;

// deny indirect access
defined('WATCH_DOG') or die();

class user{
	public function __construct(){
		
	}

	public function index(){
		echo 'I am index, blah-blah-blah...';
	}
}
?>