<?php
/*<!-- 
author: 	eric phung
date:		Wed Nov  1 13:04:03 2017
project:	plug app backend database
purpose:	talbe class def and controller def for plug backend api
 -->*/
class Table {
	// member variables
	var $tableName;
	var $tableColumns;// List<String>
	public function __construct() {
	}
}

class TableController extends Table {
	public function __construct() {
		parent::__construct();
	}
}


// unit test
function TableUnitTest(){
	$table = new TableController();
	$table->tableName = "FOOTABLE";
	$table->tableColumns = ["1",1,0,[]," ",null];
	var_dump($table);
}

?>