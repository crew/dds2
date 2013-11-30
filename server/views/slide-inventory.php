<?php include 'header.php'?>
<div class='jumbotron'>
  <div class='container'>
    <h1>Your slide decks.</h1>
    <p>Here, you can manage all your slide decks. Make something awesome for me.</p>
  </div>
</div>
<div class='container'>
<?php
    $user = new User($_COOKIE['auth']);
    $decks = $user->user_decks;
    $i = 0;
    foreach($decks as $d) {
      if($i % 4 == 0)
        echo "  <div class='row'>\n";
      echo <<<SLIDE
    <div class='col-sm-3 slidedeck'>
      <a href="/assign-slides/{$d->get_uuid()}/">
        <img src="slides/{$d->get_uuid()}/slide.jpg">
        <h3 class='text-center'>{$d->get_name()}</h3>
      </a>
    </div>\n
SLIDE;
      if($i % 4 == 3)
        echo "  </div>\n";
      $i++;
    }
?>
</div>
<?php include 'footer.php'?>
