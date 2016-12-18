<?php
/** 
 * user model
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Models;

// deny indirect access
defined('WATCH_DOG') or die();

class UsersModel extends Model(){
	// name of current table
	private $tablename = 'users';

	// list of all fields in table
	private $fields = [
		'id', 
		'name',
		'public_id',
		'email',
	];

}
?>