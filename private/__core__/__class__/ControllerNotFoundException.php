<?php
/**
 * user controller
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Exceptions;

// deny indirect access
defined('WATCH_DOG') or die();

class ControllerNotFoundException extends \Exception{
	// ну а тут мы что-то свое химичим, пока не придумал что
}
?>