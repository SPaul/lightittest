<?php
/**
 * premiere controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

include MODELS_DIR.'Users.php';

use System\Components\Controllers\Controller;
use System\Components\Models\Users;

// deny indirect access
defined('WATCH_DOG') or die();

class premiere extends Controller{
	public function __construct(){
		$this->actions = ['index', 'vklogin'];
	}

	/**
	 * default action
	 */
	public function index(){
		$u = new Users();
		$u->create([
			'id' => 1,
			'name' => 'Ivan',
			'public_id' => 4,
			'email' => 'ivan@mail.ru',
		]);
		$u->save();
	}

	public function vklogin(){
		echo 'I am vklogin, blah-blah-blah...';	
	}
}
?>