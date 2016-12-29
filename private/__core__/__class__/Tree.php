<?php
/**
 * premiere controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Helpers;

// deny indirect access
defined('WATCH_DOG') or die();

class Tree{

	public $data = [];

	/** 
	 * build tree of comments for posts
	 *
	 * @param int $pid - parent id
	 * @param array $c - list of all comments
	 * @param array $t - Instance of System\Components\Tree class
	 * @return array | null
	 */
	public function buildTree($pid, $c, Tree $t){
		foreach($c as $comment => $fields){
			if(($pid == $fields['parent_id']) && ($fields['parent_type'] == 'comment')){
				$this->data[$pid][] = $fields['id'];
				$t->buildTree($fields['id'], $c, $this);
			}
		}
	}
}
?>