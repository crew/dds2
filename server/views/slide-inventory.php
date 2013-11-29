<?php include 'header.php'?>
<div class='container'>
  <div class='row'>
    <div class='span12'>
      <h1>Your Slide Decks</h1>
    </div>
  </div>
  <div class="row">
    <?php
      $user = new User($_COOKIE['auth']);
      $decks = $user->user_decks;
      $i = 1;
      foreach($decks as $d) { ?>
        <div class='span3 slide'>
          <a href="/assign-slides/<?=$d->get_uuid()?>/"><img src="slides/<?=$d->get_uuid()?>/slide.jpg">
          <h3 class='text-center'><?=$d->get_name()?></h3></a>
        </div>
      <? } ?>
  </div>
</div>
<?php include 'footer.php'?>
