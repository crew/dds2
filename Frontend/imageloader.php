<?php
/* Jonathan Goodwin
 * PHP Image Loader for DDS
 * 6/14/2013
 */

$slidedeck =$_POST["deck"]; // slidedeck name as given by the index page
$slidedeck = "Crew_U";
$slidedir = "slides/".$slidedeck; // directory in which slides are located (Site/slides/slidedeckname/*)

$dirarray = preg_grep("/^([^.])/", scandir($slidedir)); //array of all the slides, without the folders "." and ".."
$imagelocationarray = array(); // temporary array
$i = 0; // counter
$settingsArray = array(); // settings array variable

foreach($dirarray as $value){
  if(isSettingsFile($value)){
    // do settings things
    $settings = file_get_contents($slidedir."/".$value);
    $settingsArray= json_decode($settings); // get our data into array
  }else{
  $slidepath = $slidedir."/".$value; // Create path for slide
  array_push($imagelocationarray, $slidepath); // put them in our temporary array
  $i = $i+1; // incrememnt our counter
  }
}

$returnedDataArray = array("settings" => $settingsArray,"images" => $imagelocationarray );
// var_dump($returnedDataArray);
echo json_encode($returnedDataArray);
function isSettingsFile($filename){
  return $filename == "settings.json";
}
?>
