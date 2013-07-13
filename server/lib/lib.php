<?php

include 'config.php';

# Autoload classes from the lib folder.
function __autoload($class_name){
  include "lib/$class_name.class.php";
}

# Takes a REQUEST_URI and returns an array split by forward slash
function explode_url($url) {
  $raw = explode('/', $url);
  array_shift($raw);
  return $raw;
}



?>

