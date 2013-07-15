<!DOCTYPE html>
<html>
  <head>
    <title>Digital Display System</title>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
      $.getJSON("files.php", function(data){
        window.files = data;
        window.i = 0;
        setInterval(function(){
          $('body').css('background-image', 'url("'+window.files[window.i%window.files.length]+'")');
          window.i = window.i + 1;
        }, 5000);
      });
    </script>
    <style type="text/css">
      body {
        background:url('loading.gif') no-repeat top center;
        background-size:1920px 1080px;
      }


  </head>
  <body></body>
</html>
