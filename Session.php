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
include 'Utility.php';

class Session {

	// member vars
	var $table;
	var $user;

	// db credentials
	var $db_username = "user_admin";
	var $db_name = "plug_db";
	var $db_password = "password";
	var $db_servername = "localhost";

	public function __construct() {}
	public function destruct(){}
}// end base class def

class Controller extends Session {
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
		    echo "New record created successfully\n";
		} else {
		    echo "Error: " . $sql . "\n" . $conn->error;
		}

		$conn->close();

		return $sql;
	}// end insert method

	public function find($table,$user){
		// find by id_num
		$key = $user->user_id;

		$sql = "SELECT * FROM ".$table->table_name." WHERE ".user_id." = ".$key.";\n";

		// Create connection
		$conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "Record found!","\n";
			// make new object
			$obj = new User;
		    while($row = $result->fetch_assoc()) {
		        $obj = $row;
		    }
		} else {
		    echo "Record not found!\n";
		    // return current user object?
		    return;
		}
		$conn->close();
		return $obj;
	}

	public function remove($table,$user){
		// delete by id_num

		$sql = "DELETE FROM ".$table->table_name." WHERE ".user_id." = ".$user->user_id.";\n";

		// Create connection
		$conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully\n";
		} else {
		    echo "Error deleting record: " . $conn->error;
		}


		return $sql;
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
}// end controller subclass def



// Unit Test
function SessionUnitTest(){
	$controller = new Controller;
	$table = new Table;
	$table->table_name 		= "user_table";
	
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

	$user->set_object_vars($user,$vars);
	$controller->insert($table, $user);
	$controller->find($table, $user);
	$controller->remove($table, $user);
	

}// end unit test def


//echo json_encode($outp);
SessionUnitTest();

?>