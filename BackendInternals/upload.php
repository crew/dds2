<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"></style>
  <link rel="stylesheet" type="text/css" href="css/main.css"></style>
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> GOOGLE COPY  probs better-->
  <script src="javascript/jquery-1.10.1.min.js"></script><!-- LOCAL JQUERY COPY For developing w/o internet-->
</head>
<?php

$allowedExts = array("pdf"); // the allowed file types 
$extension = end(explode(".", $_FILES["file"]["name"])); // getting file types out of our file
if ((($_FILES["file"]["type"] == "application/pdf"))
  && in_array($extension, $allowedExts))
{
  if ($_FILES["file"]["error"] > 0)
  {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; // as long as no errors continue
  }
  else
  {
    echo "<h3>Upload Successful </h3>";
    echo "Upload: " . $_FILES["file"]["name"] . "<br>"; // filename
    echo "Type: " . $_FILES["file"]["type"] . "<br>"; // what kind of file
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>"; // how big
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>"; // where it was at 

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
      echo $_FILES["file"]["name"] . " already exists. "; // error if is same file
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"]; // else say we stored it 
    }
  }
}
else
{
  echo "Invalid file"; // else error out
}
?>

