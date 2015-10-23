<?php
require_once("api/api.php");
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            background: #f5f8fa !important;
            font-family: 'Raleway', sans-serif !important;
        }
    </style>
    <title></title>
</head>
<body>
<?php
include('header.php');
?>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <br><br>
        <h2>Register:</h2>
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="surname" placeholder="Enter surname">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="address" class="form-control" id="address" placeholder="Enter address">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd2" placeholder="Repeat password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info btn-reg">Register</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
</body>
</html>
