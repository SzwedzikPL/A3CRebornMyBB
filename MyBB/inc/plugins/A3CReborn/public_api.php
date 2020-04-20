<?php
/**
 * Public api for external apps (e.g., Community Launcher)
 */

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

echo json_encode(array(
  'response' => true
));

?>
