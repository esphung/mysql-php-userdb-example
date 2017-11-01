<?php

/*<!-- 
author: 	eric phung
date:		Wed Nov  1 13:04:03 2017
project:	plug app backend database
purpose:	class def for session class and controller
 -->*/

// included php files
include 'Node.php';
include 'Table.php';
include 'utility.php';

class Session {

	// member vars
	var $table;
	var $node;

	// db credentials
	var $db_username = "testadmin";
	var $db_name = "test";
	var $db_password = "password";
	var $db_servername = "localhost";

	public function __construct() {
	}
	public function destruct(){
	}
}// end base class def

class SessionController extends Session {
	public function __construct() {
		parent::__construct();
	}

	public function insert($table,$node) {
		$name = $table->tableName;
		$columns = $table->tableColumns;
		$values = get_object_vars($node);

		// make sql query statement
		$query = "INSERT INTO ". $name . "( ".id_num.", ".username.", ".imageUrl." ) ".
		"VALUES ( ".
		$node->id_num.", '".
		$node->username."','".
		$node->imageUrl."' );".
		"\n";

		return $query;
	}

	public function find($table,$node){
		// find by id_num
		$key = $node->id_num;

		$query = "SELECT * FROM ".$table->tableName." WHERE ".id_num." = ".$key.";\n";
		return $query;
	}

	public function remove($table,$node){
		// delete by id_num
		$query = "DELETE FROM ".$table->tableName." WHERE ".id_num." = ".$node->id_num.";\n";
		return $query;
	}
	/**
	 * @param type Table
	 */
	public function setTable($table){
	    $this->table = $table;
	    //return $this;
	}
	/**
	 * @return type Table
	 */
	public function getTable(){
	    return $this->table;
	}

	// open connection to server
	public function connect(){
		// Create connection
		$conn = new mysqli($this->db_servername, $this->db_username, $this->db_password);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully\n";
	}

	// kill connection to server
	public function disconnect(){
		die("Connection closed.".$this->connection."\n");
	}

	public function toJSON($node){
		$json = json_encode($node);
		return ($json);
	}



}// end controller subclass def


// Unit Test
function SessionUnitTest(){
	$controller 						= new SessionController;
	$controller->connect();
	
	$controller->table 					= new Table;
	$controller->table->tableName 		= test_input("test");
	$controller->table->tableColumns 	= ["id_num","username","imageUrl"];

	$controller->node = new Node;
	$controller->node->id_num 			= test_input(1234567890);
	$controller->node->username 		= test_input("fbar100");
	$controller->node->imageUrl 		= test_input("http://faceflickr.com");

	echo $controller->insert($controller->table, $controller->node);

	echo $controller->find($controller->table, $controller->node);

	echo $controller->remove($controller->table, $controller->node);

	echo $controller->toJSON($controller->node);
	var_dump($controller);
	$controller->disconnect();

}// end unit test def


//echo json_encode($outp);
//SessionUnitTest();

?>