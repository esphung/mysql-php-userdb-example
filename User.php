<?php
/*<!-- 
author: 	eric phung
date:		Wed Nov  1 13:04:03 2017
project:	plug app backend database
purpose:	User class def and user controller subclass for backend api
 -->*/
class User {
	// member variables
	var $user_id;// int 10
	var $group_id;// int 10
	var $user_login;// varchar 100
	var $user_email;// varchar 255
	var $user_fname;// varchar 255
	var $user_lname;// varchar 255
	var $user_phone;// int 10
	var $user_image_url;// varchar 255

	public function __construct() {}
	public function destruct(){}

	public function set_object_vars($object, array $vars) {
		//var_dump($vars);
		$has = get_object_vars($object);
	foreach ($has as $user_id => $oldValue) {
		$object->$user_id = isset($vars[$user_id]) ? $vars[$user_id] : NULL;
	}
}// end set obj vars

}// end class def

class UserController extends User {
	public function __construct() {
		parent::__construct();
	}
}


// unit test
function UserUnitTest(){
	$user = new User;
	//$user->user_id 	= 1234567890;
	//$user->user_login = "fbar199(!@#$%^&*'÷≥≤µ˜∫√≈ß∫";
	//$user->imageUrl = "https://www.ayeimage.com/";


	var_dump($user);
}
//UserUnitTest();
?>