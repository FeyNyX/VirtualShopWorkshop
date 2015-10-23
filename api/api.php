<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once(dirname(__FILE__) . '/../config/db.php');
require_once(dirname(__FILE__) . '/../src/Item.php');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB, DB_PORT);
if($conn->connect_error){
  $error = $conn->connect_error . '(' .$conn->connect_errno . ')';
  echo $error;
}else{
  $conn->set_charset('utf8');
}