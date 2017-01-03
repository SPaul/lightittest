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
	public $branch = '';

	/** 
	 * build tree of comments for posts
	 *
	 * @param int $pid - parent id
	 * @param array $c - list of all comments
	 * @param array $t - Instance of System\Components\Tree class
	 */
	public function buildTree($pid, $c, Tree &$t){
		foreach($c as $comment => $fields){
			if(($pid == $fields['parent_id']) && ($fields['parent_type'] == 'comment')){
				$t->data[$pid][] = $fields['id'];

				$t->branch .= '<blockquote>'.'<p>'.$fields['content'].'</p><p class="text-right" style="color: #ccc; font-size: 14px">'.$fields['created'].'</p>';

				if(isset($_SESSION['user']))
					$t->branch .= '<div class="col-sm-1 pull-right" style="width: 20px"><span class="glyphicon glyphicon-comment btn-comment" data-postid="'.$fields['id'].'" data-parent="comment" style="cursor: pointer; color: #ccc; font-size: 14px" title="Write comment" data-toggle="modal" data-target="#postCommentModal"></span></div>';
				  	
				$t->buildTree($fields['id'], $c, $t);
				$t->branch .= '</blockquote>';
			}
		}
	}
}
?>