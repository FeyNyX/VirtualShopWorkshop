<?php
$router->map('GET', '/rejestracja', 'register.php', 'rejestracja');
$router->map('GET', '/logowanie', 'login.php', 'logowanie ');
$router->map('GET', '/glowna', 'main.php', 'glowna ');
/*
 * /produkt/[i:id] daje nam ladne podstronki np. www.virtualshop/produkt/1846
 * $router->map('GET', '/produkt/[i:id]', 'register.php');
 */
