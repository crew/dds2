<?php

include 'lib/lib.php';

$url = explode_url($_SERVER['REQUEST_URI']);

if(count($url) < 1)
  header('Location:/home');

if(!Login::is_user_logged_in() && $url[0] != 'login' && $url[0] != 'do-login')
  header('Location:/login');

# Switch for url routing
switch($url[0]) {
  case 'login':          include 'views/login.php';                 break;
  case 'do-login':       include 'views/do-login.php';              break;
  case 'slide-inventory':      include 'views/slide-inventory.php'; break;
  case 'do-upload':         include 'views/do-upload.php';          break;
  case 'assign-slide':      include 'views/assign-slide.php';       break;
  case 'do-assign-slide':      include 'views/do-assign-slide.php'; break;
  case 'add-slide-deck': include 'views/add-slide-deck.php';        break;
  case 'do-logout':      include 'views/do-logout.php';             break;
  case 'my-groups':      include 'views/my-groups.php';             break;
  case 'do-create-group':      include 'views/do-create-group.php';             break;

default: include 'views/home.php';
}






?>
