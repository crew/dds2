<!DOCTYPE html>
<html>
  <head>
    <title>Digital Display System</title>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
        window.i = 0;
        function updateSlides(){
          $.getJSON('files.php', function(data){
            window.files = data;
          });
        }
        function changeSlides() {
          $('body').css('background-image', 'url("'+window.files[window.i%window.files.length]+'")');
          window.i = window.i + 1;
        }

        updateSlides();
        setInterval(function(){
          updateSlides();
          changeSlides();
        }, 10000);

    </script>
    <style>
      html, body {
        height: 100%;
        width: 100%;
      }

      body {
        background: url('http://i.imgur.com/XLRcy.jpg') no-repeat top center;
        background-size: contain;
      }
    </style>
  </head>
  <body></body>
</html>
