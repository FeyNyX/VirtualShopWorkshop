<?php
$router->map('GET', '/rejestracja', 'register.php');
$router->map('GET', '/', 'main.php');
$router->map('POST', '/', 'main.php');
$router->map('POST', '/checkLogin', 'checkLogin.php');
$router->map('POST', '/logout', 'logout.php');


/*
 * /produkt/[i:id] daje nam ladne podstronki np. www.virtualshop/produkt/1846
 * $router->map('GET', '/produkt/[i:id]', 'register.php');
 */
