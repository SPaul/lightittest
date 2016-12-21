<?php
/** 
 * user model
 * 
 * @author Paul Strelkovsky, spaul@ukr.net
 * @version 1.0.0
 */

// deny indirect access
defined('WATCH_DOG') or die();
?>
<div class="col-md-6 col-md-offset-3">
	<?php if(isset($_SESSION['user'])):?>
		<img src="<?= $_SESSION['user']['photo']?>" class="img-circle center-block">
		<h4 style="text-align: center"><?= $_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName'] ?></h4>

		<div class="btn-group btn-group-justified" role="group">
		  <div class="btn-group" role="group">
		    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#postForm" aria-expanded="false" aria-controls="postForm"><span class="glyphicon glyphicon-pencil"></span> Add post</button>
		  </div>
		  <div class="btn-group" role="group">
		    <a href="index.php?r=premiere/logout" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Log out</a>
		  </div>
		</div>

	
		<div class="collapse" id="postForm" style="margin-top: 20px">
	  		<div class="panel panel-default">
	  			<div class="panel-body">
	    			<textarea name="postData" id="postData" style="width: 100%; min-height: 100px; border: none; border-bottom: 1px solid #CCC" placeholder="Post description here" required></textarea>

	    			<button class="btn btn-default pull-right" style="margin-top: 20px" type="button" id="postBtn">Publish</button>
	    		</div>
	  		</div>
		</div>
	<?php else: ?>
		<div class="btn-group btn-group-justified" role="group" style="margin-top: 100px">
		  <div class="btn-group" role="group">
		    <a href="index.php?r=premiere/index" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Log in</a>
		  </div>
		</div>

		<div class="alert alert-danger" style="margin-top: 20px">You need logi to send posts or comment!</div>
	<?php endif; ?>
	<div class="posts-container" style="margin-top: 20px">
	<?php foreach($data['posts'] as $post):?>
		<div class="well">
			<p><?= $post['content']?></p>
			<?php if(isset($_SESSION['user'])):?>
				<div class="col-sm-1 pull-right" style="width: 20px">
					<span class="glyphicon glyphicon-comment btn-comment" data-postid="<?= $post['id']?>" style="cursor: pointer; color: #ccc;" title="Write comment" data-toggle="modal" data-target="#postCommentModal"></span>
				</div>
			<?php endif; ?>
		</div>

		<?php foreach($data['comments'] as $comment):?>
			<?php if($comment['parent_id'] == $post['id']):?>
				<blockquote>
				  <p><?= $comment['content']?></p>
				  <p class="text-right" style="color: #ccc; font-size: 14px"><?= $comment['created']?></p>
				</blockquote>
			<?php endif;?>
		<?php endforeach;?>
	<?php endforeach;?>
	</div>
</div>


<div class="modal fade" id="postCommentModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Write a comment</h4>
      </div>
      <div class="modal-body">
        <textarea class="form-control" name="postComment" id="postComment" placeholder="type your comment here"></textarea>
        <input type="hidden" name="postId" id="postId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="postCommentSave">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$('#postBtn').on('click', function(){
		$.ajax({
		   type: "POST",
		   url: "index.php?r=premiere/createpost&aj",
		   data: {"content" : $('#postData').val()},
		   success: function(msg){
		     location.reload();
		   }
		});
	});

	$('#postCommentSave').on('click', function(e){
		$.ajax({
		   type: "POST",
		   url: "index.php?r=premiere/createpostcomment&aj",
		   data: {
		   		"content" : $('#postComment').val(),
		   		"id" : $('#postId').val()
		   },
		   success: function(msg){
		     location.reload();
		     //console.log(msg);
		   }
		});
	});

	$('.btn-comment').on('click', function(e){
		$('#postId').val(e.currentTarget.getAttribute('data-postid'));
	});
</script>