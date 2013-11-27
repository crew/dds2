<?php

include 'lib/lib.php';

$_SERVER['URL'] = explode_url($_SERVER['REQUEST_URI']);

if($_SERVER['URL'][0] == '')
  header('Location:/slide-inventory');

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
);

if(array_key_exists($_SERVER['URL'][0], $map)) {
  $controller = new $map[$_SERVER['URL'][0]];
  $controller->render();
}

?>
