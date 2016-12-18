<?php
/**
 * base model class. Provide basic model functions
 */

namespace System\Components\Models;

use System\Components\Models\iModel;
use System\Components\Configuration;

// deny indirect access
defined('WATCH_DOG') or die();

class Model implements iModel{
	/**
	 * PDO connection object
	 */
	private $dbc;

	/**
	 * specified to model table in database
	 */
	private $tablename;

	/**
	 * list of all fields in table
	 */
	private $fields;

	/**
	 * list of validation rules for table fields
	 */
	private $validationRules;

	/**
	 * constructor of the class. Provides connection to db
	 * and configuring all interactions with it
	 *
	 * @throws PDOExeption if can't connect to db
	 */
	public function __construct(){
		$Configuration = new Configuration();
		$c = $Configuration->get('database');

		$s = "{$c['driver']}:host={$c['host']}; dbname={$c['name']}; charset={$c['charset']}";
		try{
			$this->dbc = new \PDO($s, $c['user'], $c['password']);
		}
		catch(\PDOException $e){
			echo 'Error: Can\'t connect to db.';
		}
	}

	/**
	 * @return array - fields of binded table
	 */
	public function getFields(){
		return $this->fields;
	}

	/**
	 * sets a validation rules
	 * 
	 * @param array $rules - list of rules for validation
	 */
	public function setRules($rules){
		$this->validationRules = $rules;
	}

	/**
	 * validate fields using rules
	 */
	public function validate(){

	}
}
?>