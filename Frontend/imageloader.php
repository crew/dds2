<?php
/* Jonathan Goodwin
 * PHP Image Loader for DDS
 * 6/14/2013
 */

$slidedeck =$_POST["deck"]; // slidedeck name as given by the index page
$slidedir = "slides/".$slidedeck; // directory in which slides are located (Site/slides/slidedeckname/*)

$dirarray = preg_grep("/^([^.])/", scandir($slidedir)); //array of all the slides, without the folders "." and ".."
$outputarray = array(); // temporary array
$i = 0; // counter
foreach($dirarray as $value){
  $slidepath = $slidedir."/".$value; // Create path for slide
  array_push($outputarray, $slidepath); // put them in our temporary array
  $i = $i+1; // incrememnt our counter
}
echo json_encode($outputarray); // output the array, hand it back to the index page for later use
?>
