<?php

$login = new Login();
if($login->authenticate_user($_POST['username'], $_POST['password'], true))
  header('Location:/home');
else
  header('Location:/login?fail');

?>
