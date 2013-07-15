<?php
$dir = scandir('slides');
# Remove . and ..
array_shift($dir);
array_shift($dir);

header("Content-Type: application/json");

$files_raw = `find slides |grep jpg`;
$files = explode("\n", $files_raw);



echo json_encode($files);


?>
