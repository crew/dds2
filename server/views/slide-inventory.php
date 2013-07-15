<?php include 'header.php'?>
<div class='container'>
  <div class="row">
    <div class="span4">
      <h1>Welcome Back </h1>
    </div>
  </div>
  <div>
    <?php
    $user = new User($_COOKIE['auth']);
    $decks = $user->user_decks;
    foreach($decks as $deck){
    echo "<h1>";
      echo '<a href="assign-slide/'.$deck->get_uuid().'">'.$deck->get_name().'</a>';
      echo "</h1>";
    }
    ?> 
  </div>
</div>


<?php include 'footer.php'?>
