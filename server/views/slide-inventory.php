<?php include 'header.php'?>
<div class='container'>
  <div class='row'>
    <div class='span4'>
      <h1>Your Slides</h1>
    </div>
  </div>
  <div>
    <?php
      $user = new User($_COOKIE['auth']);
      $decks = $user->user_decks;
      foreach($decks as $d) { ?>
        <div class='span3'>
          <a href="/assign-slides/<?=$d->get_uuid()?>/"><img src="slides/<?=$d->get_uuid()?>/slide.jpg">
          <h3 class='text-center'><?=$d->get_name()?></h3></a>
        </div>
     <? } ?>
  </div>
</div>
<?php include 'footer.php'?>
