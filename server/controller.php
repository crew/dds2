<?php

include 'lib/lib.php';

$_SERVER['URL'] = explode_url($_SERVER['REQUEST_URI']);

if(count($_SERVER['URL']) < 1)
  header('Location:/home');

if(!Login::is_user_logged_in() && $_SERVER['URL'][0] != 'login' )
  header('Location:/login');

# Better routing
# Keys are urls, values are of controller Class
$map = array(
  'login'           => 'LoginController',
  'slide-inventory' => 'SlideController',
  'upload'          => 'Upload',
  'assign-slide'    => 'SlideController',
  'add-slide-deck'  => 'SlideController',
  'logout'          => 'LoginController',
  'home'            => 'HomeController'
);

if(array_key_exists($_SERVER['URL'][0], $map)) {
  $controller = new $map[$_SERVER['URL'][0]];
  $controller->render();
}


## Switch for url routing
#switch($url[0]) {
#  case 'login':          include 'views/login.php';                 break;
#  case 'do-login':       include 'views/do-login.php';              break;
#  case 'slide-inventory':      include 'views/slide-inventory.php'; break;
#  case 'do-upload':         include 'views/do-upload.php';          break;
#  case 'assign-slide':      include 'views/assign-slide.php';       break;
#  case 'do-assign-slide':      include 'views/do-assign-slide.php'; break;
#  case 'add-slide-deck': include 'views/add-slide-deck.php';        break;
#  case 'do-logout':      include 'views/do-logout.php';             break;
#  case 'my-groups':      include 'views/my-groups.php';             break;
#  case 'do-create-group':      include 'views/do-create-group.php';             break;
#
#default: include 'views/home.php';
#}






?>
