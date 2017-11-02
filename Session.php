<?php

/*<!-- 
author: 	eric phung
date:		Wed Nov  1 13:04:03 2017
project:	plug app backend database
purpose:	class def for session class and controller
 -->*/

// included php files
include 'User.php';
include 'Table.php';
include 'utility.php';

class Session {

	// member vars
	var $table;
	var $user;

	// db credentials
	var $db_username = "user_admin";
	var $db_name = "plug_db";
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

	public function insert($table,$user) {
		// make sql query statement
		$sql = "INSERT INTO ". $table->table_name . " (user_id, group_id, user_login, user_email, user_fname, user_lname, user_phone,user_image_url)  ".
		"VALUES ( ".
		$user->user_id.", '".
		$user->group_id."','".
		$user->user_login."','".
		$user->user_email."','".
		$user->user_fname."','".
		$user->user_lname."','".
		$user->user_phone."','".
		$user->user_image_url.


		"' );".
		"\n";

		// Create connection
		$conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "\n" . $conn->error;
		}

		$conn->close();

		return $sql;
	}// end insert method

	public function find($table,$user){
		// find by id_num
		$key = $user->id_num;

		$query = "SELECT * FROM ".$table->table_name." WHERE ".id_num." = ".$key.";\n";
		return $query;
	}

	public function remove($table,$user){
		// delete by id_num
		$query = "DELETE FROM ".$table->table_name." WHERE ".id_num." = ".$user->id_num.";\n";
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

	public function toJSON($user){
		$json = json_encode($user);
		return ($json);
	}

}// end controller subclass def


// Unit Test
function SessionUnitTest(){
	$controller = new SessionController;
	//$controller->connect();
	
	$table = new Table;
	$table->table_name 		= "user_table";
	$table->tableColumns 	= ["id_num","username","imageUrl"];
	
	$user = new User;
	$vars = array(
		"user_id" => 7,
		"group_id" => 3,
		"user_login" => "fbar1999",
		"user_email" => "fbar@yahoo.com",
		"user_fname" => "foo",
		"user_lname" => "bar",
		"user_phone" => 1890453678,
		"user_image_url" => "http://www.imgur.com/"
	);
	//var_dump($user);
	
	$user->set_object_vars($user,$vars);
	echo $controller->insert($table, $user);

	//echo $controller->find($controller->table, $user);

	//echo $controller->remove($controller->table, $user);

	//echo $controller->toJSON($controller->user);
	//var_dump($controller);
	//$controller->disconnect();

}// end unit test def


//echo json_encode($outp);
SessionUnitTest();

?>