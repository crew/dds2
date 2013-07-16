<!---

Checks cookie to get our user id (uid).
For each relevant deck, spits out a link to manage that deck.

-->
<?php include 'header.php'?>
<div class='container'>
  <div class='row'>
    <div class='span4'>
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
      $deck_machines = $deck->get_deck_machines();
      # if the machines array is empty, we dont do anything, this will throw error otherwise.
      if(!($deck_machines == array())){
        foreach($deck_machines as $machine){
         echo "<p>$machine</p>";
        }
      }
    }
    
    ?> 
  </div>
</div>


<?php include 'footer.php'?>
