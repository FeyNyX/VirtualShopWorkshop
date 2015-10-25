<?php
header('Content-Type: application/json');
require_once("api.php");
session_start();

if (!empty($_POST)) {
    if ($_POST['regName'] && $_POST['regSurname'] && $_POST['regAddress'] && $_POST['regEmail'] && $_POST['regPwd'] &&
        $_POST['regPwd2']
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
    }
    if ($_POST['loginEmail'] && $_POST['loginPassword']) {
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];
        $user = User::login($email, $password);
        $userId = $user->getUserId();
        $_SESSION['userId'] = $userId;
    }
    if ($_POST['killUser'] == true) {
        unset($_SESSION['userId']);
    }
}

echo json_encode($arr);
