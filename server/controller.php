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
  'assign-slides'   => 'SlideController',
  'add-slide-deck'  => 'SlideController',
  'logout'          => 'LoginController',
  'home'            => 'HomeController'
);

if(array_key_exists($_SERVER['URL'][0], $map)) {
  $controller = new $map[$_SERVER['URL'][0]];
  $controller->render();
}

?>
