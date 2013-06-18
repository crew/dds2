<?php
/* Jonathan Goodwin
 * PHP Image Loader for DDS
 * 6/14/2013
 */

$slidedeck =$_POST["deck"]; // slidedeck name as given by the index page
$slidedeck = "Crew_U";
$slidedir = "slides/".$slidedeck; // directory in which slides are located (Site/slides/slidedeckname/*)

$dirarray = preg_grep("/^([^.])/", scandir($slidedir)); //array of all the slides, without the folders "." and ".."
$outputarray = array(); // temporary array
$i = 0; // counter
$settings = ""; // settings variable
foreach($dirarray as $value){
  if(isSettingsFile($value)){
    // do settings things
    $settings = file_get_contents($slidedir."/".$value);

  }else{
  $slidepath = $slidedir."/".$value; // Create path for slide
  array_push($outputarray, $slidepath); // put them in our temporary array
  $i = $i+1; // incrememnt our counter
  }
}
echo json_encode("{"."\"settings\":".$settings.", \"images\":".json_encode($outputarray)."}"); // output the array, hand it back to the index page for later use

function isSettingsFile($filename){
  return $filename == "settings.json";
}
?>
