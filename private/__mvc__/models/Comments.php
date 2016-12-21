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

class Comments extends Model{
	// name of current table
	protected $tablename = 'comments';

	// list of all fields in table
	protected $fields = [
		'content' => '',
		'parent_id' => '',
	];

}
?>