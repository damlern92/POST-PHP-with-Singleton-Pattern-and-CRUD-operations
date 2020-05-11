<?php

class Database{

public $host = DB_HOST;
public $user = DB_USER;
public $pass = DB_PASS;
public $dbname = DB_NAME;

public $link;
public $error;
private static $_instance = null;

public function __construct(){
	// Connection to database:
	$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		// Error:
	if(!$this->link){
		$this->error = "Greska u konekciji".$this->link->connect_error;
		return FALSE;
	}
} // END of __construct

// This return one instance of database:
public static function getInstance(){
	if(is_null(self::$_instance)){
		self::$_instance = new Database;
	}
	return self::$_instance;
} // END of getInstance() method


// CRUD METHODS:============================
//Select - read
public function select($query){
	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	if($result->num_rows > 0){
		return $result;
	}else{
		return FALSE;
	}
}// end of select read

// insert
public function insert($query){
	$insert = $this->link->query($query) or die($this->link->error.__LINE__	);
	if($insert){
		return $insert;
	}else{
		return FALSE;
	}
}// end of insert

// update
public function update($query){
	$update = $this->link->query($query) or die($this->link->error.__LINE__	);
	if($update){
		return $update;
	}else{
		return FALSE;
	}
}// end of update

// Delete
public function delete($query){
	$delete = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete){
		return $delete;
	}else{
		return FALSE;
	}
}//end of delete

}// END of DATABASE class
