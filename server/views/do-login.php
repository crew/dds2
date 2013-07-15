<?php
# Logs a user in using the Login.class.php in ../lib
# This page also checks if we are logged in. If so we just go to the /home page
$login = new Login();

$auth = ($login->authenticate_user($_POST['username'], $_POST['password'], true));

if($auth)
  header('Location:/home');
else
  header('Location:/login?fail');

?>
