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
	protected $dbc;

	/**
	 * specified to model table in database
	 */
	protected $tablename;

	/**
	 * list of all fields in table
	 */
	protected $fields;

	/**
	 * list of validation rules for table fields
	 */
	protected $validationRules;

	/**
	 * id of last added record to table
	 */
	public $lastInsertId;

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

	/**
	 * create new entity and fill its fields
	 *
	 * @param array $data - fields data of new entity
	 */
	public function create(array $data){
		foreach($data as $key => $value){
			if(isset($this->fields[$key])){
				$this->fields[$key] = $value;
			}
		}
	}

	/**
	 * build query and execute it
	 *
	 * @return bool result of executing
	 */
	public function save(){
		$q = "INSERT INTO {$this->tablename}(";
		$v = 'VALUES(';

		$total = count($this->fields);
		$i = 0;
		foreach($this->fields as $field => $value){
			$i++;
			$sign = $i < $total ? ', ' : ') ';
			$q .= $field.$sign;

			$v .= "'{$value}'".$sign;
		}
		$q .= $v.';';

		if(!$this->dbc->exec($q)){
			$this->lastInsertId = $this->dbc->lastInsertId();
			return true;
		}

		return false;
	}
}
?>