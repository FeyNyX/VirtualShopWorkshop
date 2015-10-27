<?php
session_start();
require_once("index.php");

echo "Wylogowywanie...";

unset($_SESSION['userId']);
unset($_SESSION['user']);

header("location: /VirtualShopWorkshop/");