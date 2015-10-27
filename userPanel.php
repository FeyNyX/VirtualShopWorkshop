<?php
session_start();
require_once("index.php");
header('Content-type: text/html; charset=utf-8');
?>

    <!DOCTYPE html>
    <html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body {
                background: #f5f8fa !important;
                font-family: 'Raleway', sans-serif !important;
            }
        </style>
        <title>VirtualShop - User Panel</title>
    </head>
    <body>
<?php
include('header.php');
echo "<br><br><br>";

if ($match['params']['userId'] == $_SESSION['userId']) {
    $userId = $match['params']['userId'];
    $myUser = $_SESSION['user'];
    $userName = $myUser->getUserName();
    echo "Panel of user: " . $userId . " ($userName)";
} else {
    echo "<h1>( ͡° ͜ʖ ͡°)</h1>";
}