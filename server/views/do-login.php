<?php

$login = new Login();

$auth = ($login->authenticate_user($_POST['username'], $_POST['password'], true));

if($auth)
  header('Location:/home');
else
  header('Location:/login?fail');

?>
