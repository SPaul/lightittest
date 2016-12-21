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
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?136"></script>
	<script type="text/javascript">
	  VK.init({apiId: 5779378});
	</script>
	<div id="vk_auth" class="center-block" style="margin-top: 100px"></div>
	<script type="text/javascript">
		VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: 'index.php?r=premiere/vklogin'});
	</script>

