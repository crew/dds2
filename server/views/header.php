<!DOCTYPE html>
<!--
   Our header, included on every single dds page
-->
<html>
  <head>
    <title>Digital Display System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class='container'>
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Digital Display System</a>
       </div>
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
           <? if(Login::is_user_logged_in()) { ?>
           <li><a href="/add-slide-deck">Add Slide Deck</a></li>
           <li><a href="/slide-inventory">Slide Deck Inventory</a></li>
           <li><a href="/logout">Logout</a></li>
           <? } else { ?>
           <li><a href="/login">Login</a></li>
           <? } ?>
         </ul>
       </div>
     </div>
   </nav>
