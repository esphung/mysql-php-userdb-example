<?php
/*<!-- 
author: 	eric phung
date:		Wed Nov  1 13:04:03 2017
project:	plug app backend database
purpose:	Node class def and node controller subclass for backend api
 -->*/
class Node {
	// member variables
	var $id_num;
	var $username;
	var $imageUrl;

	public function __construct() {}
	public function destruct(){}
}

class NodeController extends Node {
	public function __construct() {
		parent::__construct();
	}
}

// unit test
function NodeUnitTest(){
	$node = new Node;
	$node->id_num 	= 1234567890;
	$node->username = "fbar199(!@#$%^&*'÷≥≤µ˜∫√≈ß∫";
	$node->imageUrl = "https://www.ayeimage.com/";
	var_dump($node);
}

?>