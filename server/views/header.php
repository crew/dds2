<!DOCTYPE html>
<!--
   Our header, included on every single dds page
-->
<html>
  <head>
    <title>Digital Display System</title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="/slide-inventory">Digital Display System</a>
        <ul class="nav">
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

