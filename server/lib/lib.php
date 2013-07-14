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

  # $raw includes stuff like home?grieag which confuses the url router, so we are moving that problem.
  return remove_query_parameters($raw);
}

# Remove query parameters from our url. We don't need them in our routing.
function remove_query_parameters($url_array) {
  foreach($url_array as $key=>$val) {
    $exploded = explode('?', $val);
    $url_array[$key] = $exploded[0];
  }
  return $url_array;
}


#### Initial MySQL connection
$conn = mysqli_connect(DB_LOCATION, DB_USER, DB_PASS, DB_NAME) or die('Could not connect to MySQL database');
$pgconn = pg_pconnect('host='.PuppetDB_LOCATION.' user='.PuppetDB_USER.' password='.PuppetDB_PASS.' dbname='.PuppetDB_NAME);

?>

