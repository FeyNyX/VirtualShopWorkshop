<?php
header('Content-Type: application/json');
require_once("api.php");
session_start();

if (!empty($_POST)) {
    if (isset($_POST['regName']) && isset($_POST['regSurname']) && isset($_POST['regAddress']) && isset($_POST['regEmail']) && isset($_POST['regPwd']) &&
        isset($_POST['regPwd2'])
    ) {
        $name = $_POST['regName'];
        $surname = $_POST['regSurname'];
        $address = $_POST['regAddress'];
        $email = $_POST['regEmail'];
        $pwd = $_POST['regPwd'];
        $pwd2 = $_POST['regPwd2'];
        $isDataCorrect = User::userCheckForCorrectData($name, $surname, $email, $address);
        if ($isDataCorrect == true && $pwd == $pwd2) {
            $user = User::register($name, $surname, $email, $pwd, $address);
            $userId = $user->getUserId();
            $arr = $user->getUsers($userId);
        }
        echo json_encode($arr);
    }
    if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];
        $user = User::login($email, $password);
        $userId = $user->getUserId();
        $_SESSION['userId'] = $userId;
    }
    if (isset($_POST['killUser']) && $_POST['killUser'] == true) {
        unset($_SESSION['userId']);
    }
}