<!DOCTYPE html>
<html>
  <head>
    <title>Digital Display System</title>
    <link rel="stylesheet" href='main.css' />
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
      $.get("files.json", function(data){
        window.files = data;
        window.i = 0;
        setInterval(5000, function(){
          $('body').css('background-image', 'url('+window.files[window.i]+')');
        });
      });
    </script>


  </head>
  <body></body>
</html>
