<?php
session_start();
require_once("index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['pwd2'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwd2 = $_POST['pwd2'];

        if ($pwd == $pwd2) {
            $newUser = User::register($name, $surname, $email, $pwd, $address);
            header("location: /VirtualShopWorkshop/");
        } else {
            // if something went wrong, returns user to registation form
            header("location: /VirtualShopWorkshop/rejestracja");
        }
    } else {
        // if something went wrong, returns user to registation form
        header("location: /VirtualShopWorkshop/rejestracja");
    }
}