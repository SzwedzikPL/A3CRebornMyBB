<?php
/**
 * External api
 */

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

echo json_encode(array(
  'response' => true
)); 
 
?>