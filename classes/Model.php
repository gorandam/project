<?php

abstract class Model {
	protected $pdo;
	protected $stmt;
	
	public function __construct() {
		//Create new PDO instance
		try {
			$this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=" .DB_NAME, DB_USER, DB_PASS);
		} catch(PDOException $e) {
			$this->error = 'Error conecting to the database'. $e->getMessage();
			echo $e->getMessage();
			exit();
	
	    }
	}
	//Method for create prepared statement
	public function query($query) {
		$this->stmt = $this->pdo->prepare($query);// create prepared statement and return pdo statement object and save it in the stmt variable
	}
	//Method for bind values
	public function bind($param, $value, $type = null) { //method to send value to prepared statement
		if (is_null($type)) {
			switch(true){
				case is_int($value): //We set how bind value goes to the database
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOLL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);	
	}
	
	public function execute(){ // method to execute query with supplied value
		return $this->stmt->execute();
	}
	
	public function resultSet(){ // method to fetch rows from result set
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
		
}