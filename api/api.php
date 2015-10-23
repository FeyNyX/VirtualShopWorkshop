<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once(dirname(__FILE__) . '/../config/db.php');
require_once(dirname(__FILE__) . '/../src/Item.php');
require_once(dirname(__FILE__) . '/../src/User.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB, DB_PORT);
if ($conn->connect_error) {
  $error = $conn->connect_error . '(' . $conn->connect_errno . ')';
  echo $error;
} else {
  $conn->set_charset('utf8');
}
//tworzymy nowy obiekt AltoRouter
$router = new AltoRouter();
//z db.php bierzemy base_path, ktory jest naszym katalogiem glownym po ktorym bedziemy otrzymywac ladne slashe
$router->setBasePath(BASE_PATH);
include(dirname(__FILE__) . '/../routing.php');
$match = $router->match();

//uruchamia nam nasz router i automatycznie dodaje go do kazdej podstrony
if ($match) {
  require '../' . $match['target'];
}


