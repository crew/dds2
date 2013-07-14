<?php

include 'lib/lib.php';

$url = explode_url($_SERVER['REQUEST_URI']);

if(count($url) < 1)
  header('Location:/home');

if(!Login::is_user_logged_in() && $url[0] != 'login' && $url[0] != 'do-login')
  header('Location:/login');

# Switch for url routing
switch($url[0]) {
  case 'login':      include 'views/login.php';      break;
  case 'do-login':   include 'views/do-login.php';   break;
  case 'add-slide-deck': include 'views/add-slide-deck.php'; break;
  default: include 'views/home.php';
}






?>
