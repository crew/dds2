<!--

Show's you the groups you are in and the slide decks associated with those groups, and the machines associated with those slides.

-->

<?php include('header.php'); ?>
<div class='container'>

  <div class='row'>
    <div class='span4'>
      <h1>Welcome Back </h1>
    </div>
  </div>
  <div>
    <form class='form-horizontal' action='/do-create-group' method='POST' enctype='multipart/form-data'>
      <div class='control-group'>
        <label class='control-label' for='name'>Name</label>
        <div class='controls'>
          <input type='text' name='name'  id='name' placeholder='Name of group'>
        </div>
      </div>
      <div class='control-group'>
        <div class='controls'>
          <button type='submit' class='btn'>Create</button>
        </div>
      </div>

    </form>
  </div>
  <div>
<?php
$user = new User($_COOKIE['auth']);
# no groups means we just skip this part
if(!is_null($user->user_groups)){
  #for each group output group name,
  foreach($user->user_groups as $group){
    $decks = $group->group_decks;
    $group_name = $group->group_name;
    echo "<h1>$group_name</h1>";
    # for each deck, provide link, and list machines
    foreach($decks as $deck){
      echo "<h3>";
      echo '<a href="assign-slide/'.$deck->get_uuid().'">'.$deck->get_name().'</a>';

      echo "</h3>";
      $deck_machines = $deck->get_deck_machines();
      # if the machines array is empty, we dont do anything, this will throw error otherwise.
      if(!($deck_machines == array())){
        foreach($deck_machines as $machine){
          echo "<p>$machine</p>";
        }
      }
    }  
  }
}else{
  echo "<h1>You dont have friends? :'(</h1>";
}
?>
  </div>
</div>
  <?php include('footer.php'); ?>
