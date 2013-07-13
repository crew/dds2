<?php

include 'lib/lib.php';

$url = explode_url($_SERVER['REQUEST_URI']);

if(count($url) < 1)
  header('Location:/home');

# Switch for url routing
switch($url[0]) {
  case 'home': include 'views/home.php'; break;
  case 'login': include 'views/login.php'; break;
}






?>
