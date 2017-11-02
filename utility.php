<?php
/**
 * 
 * @authors:      eric phung
 * @date:         2017-07-23 01:17:11
 * @purpose:      global utility functions
 */

// sanitize values
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
} // end test_input() function def

function set_object_vars($object, array $vars) {
	var_dump($vars);

	$has = get_object_vars($object);
	foreach ($has as $user_id => $oldValue) {
		$object->$user_id = isset($vars[$user_id]) ? $vars[$user_id] : NULL;
	}
	var_dump($object);

}// end set obj vars


?>