<?php
/**
 * premiere controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Controllers;

include MODELS_DIR.'Posts.php';

use System\Components\Controllers\Controller;
use System\Components\Models\Posts;

// deny indirect access
defined('WATCH_DOG') or die();

class premiere extends Controller{
	private $auth = false;

	public function __construct(){
		$this->actions = ['index', 'vklogin', 'logout', 'wall', 'createpost'];

		$this->auth = isset($_SESSION['user']) ? true : false;
	}

	/**
	 * default action
	 */
	public function index(){
		return !$this->auth ? $this->render('index') : $this->redirect(['premiere/wall']);
	}

	/**
	 * callback action for login via vk.com
	 * receive user's data
	 */
	public function vklogin(){
		$user = [
			'uid' => $_GET['uid'],
			'firstName' => $_GET['first_name'],
			'lastName' => $_GET['last_name'],
			'photo' => $_GET['photo'],
		];

		$_SESSION['user'] = $user;

		return $this->redirect(['premiere/index']);
	}

	/**
	 * clear session assigned to user, logging out
	 */
	public function logout(){
		unset($_SESSION['user']);
		return $this->redirect(['premiere/index']);
	}

	/**
	 * show all posts with comments
	 */
	public function wall(){
		return $this->render('wall');
	}

	/**
	 * create new post
	 */
	public function createpost(){
		$model = new Posts();
		$model->create(['content' => $_POST['content']]);
		if($model->save()){
			return $model->lastInsertId;
		}
	}
}
?>