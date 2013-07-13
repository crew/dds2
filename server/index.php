<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"></style>
<link rel="stylesheet" type="text/css" href="css/main.css"></style>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
<script src="javascript/jquery-1.10.1.min.js"></script><!--LOCAL JQUERY COPY For developing w/o internet-->
</head>
<?php
if(count($_FILES)>0){
  $allowedExts = array("pdf"); // the allowed file types 
  $extension = end(explode(".", $_FILES["file"]["name"])); // getting file types out of our file
  if ((($_FILES["file"]["type"] == "application/pdf"))
    && in_array($extension, $allowedExts))
  {
    if ($_FILES["file"]["error"] > 0)
    {
      echo "<div class=\"alert alert-error\">";
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; // as long as no errors continue
    }
    else
    {
      echo "<div class=\"alert alert-success\">";
      echo "<h4>Upload Successful </h4>";
      echo "Upload: " . $_FILES["file"]["name"] . "<br>"; // filename
      // echo "Type: " . $_FILES["file"]["type"] . "<br>"; // what kind of file
      // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>"; // how big
      // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>"; // where it was at 

      if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo "<div style=\"width:350px;\"class=\"alert alert-error\">";
        echo $_FILES["file"]["tmp_name"] . " <b>already exists.<b>"; // error if is same file
        echo "</div>";
      }
      else
      {
        move_uploaded_file($_FILES["file"]["tmp_name"],
                           "upload/" . array_pop(explode("/", $_FILES["file"]["tmp_name"])));
        echo "Stored in: " . "upload/" . $_FILES["file"]["tmp_name"]; // else say we stored it 
        shell_exec("./convert.py")
        //TODO  Make note in db of the paring between names
      }
    }
  }
  else
  {
    echo "Invalid file"; // else error out
  }
}else{
  echo "";
}
?>
  </div>
    <div class="hero-unit header" style="width:75%"> Please upload your slides here </div>
    <div>
    <div class="add-slides">
    <form id="new_upload" method="POST" enctype="multipart/form-data" action="index.php">
    <label>Slide Deck Name: </label> <input style="font-size:20px; hieght:20px;"class="textfield" type="text" name="filename"><br>
    <label>Slide Deck PDF:  </label><input id="file" type="file" name="file"><br>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit"> to upload the file!
    </form>
    </div>
    <div class="my-slides">
    <img src="http://placekitten.com/g/200/300">
    <img src="http://placekitten.com/g/200/300">
    </div>
    </div>
    </body>
