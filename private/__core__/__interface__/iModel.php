<?php
/**
 * interface for model class
 * 
 * @author Paul Strlekovsky, spaul@ukr.net
 * @version 1.0.0
 */

namespace System\Components\Models;

// deny indirect access
defined('WATCH_DOG') or die();

interface iModel{
	/**
	 * @return array - list of table fields
	 */
	public function getFields();

	/**
	 * sets a validation rules
	 */
	public function setRules($rules);

	/**
	 * validate table fields using rules
	 */
	public function validate();
}
?>