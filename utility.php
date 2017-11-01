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


?>