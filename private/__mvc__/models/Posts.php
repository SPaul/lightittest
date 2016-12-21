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

class Posts extends Model{
	// name of current table
	protected $tablename = 'posts';

	// list of all fields in table
	protected $fields = [
		'content' => '',
	];

}
?>