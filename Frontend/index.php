<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"></style>
  <link rel="stylesheet" type="text/css" href="css/main.css"></style>
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> GOOGLE COPY -->
  <script src="javascript/jquery-1.10.1.min.js"></script><!-- LOCAL JQUERY COPY -->
</head>
<body>

  <div class="page-header"><h1>DDS Slide Chooser </h1></div>
  <div class="slides-window">
    <?php
      $dirarray = preg_grep("/^([^.])/", scandir("slides"));
      foreach($dirarray as &$value){
        $name = preg_replace("/[^A-Za-z0-9 ]/", ' ', $value);
        echo "<div class=\"slide-pane\" name=\"".$value."\">";
        echo "<div class=\"slide-name\">".$name."</div>";
        echo "<a href=\"#\"#>";
        echo "<img name=\"".$value."\" src=\"slides/".$value."/slide_01.jpg\" alt=\"".$name."\">";
        echo "</a>";
        echo "</div>";
    }
    ?>
  </div>
  <script src="javascript/imageGetter.js"></script>
</body>
