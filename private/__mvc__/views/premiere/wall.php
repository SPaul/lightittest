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
	<?php endif; ?>

</div>

<script type="text/javascript">
	$('#postBtn').on('click', function(){
		$.ajax({
		   type: "POST",
		   url: "index.php?r=premiere/createpost&aj",
		   data: {"content" : $('#postData').val()},
		   success: function(msg){
		     alert( "Data Saved: " + msg );
		   }
		});
	});
</script>