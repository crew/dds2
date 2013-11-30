<?php include('header.php'); ?>
<div class='jumbotron'>
  <div class='container'>
    <h1>Digital Display System</h1>
    <p>The best way to manage your slide decks on an infinite amount of screens.</p>
  </div>
</div>

<div class='container'>
  <div class='col-lg-12'>
    <? if($this->attempted_login) { ?>
      <div class='alert alert-danger'>
        <strong>Uh oh!</strong> Your username or password was incorrect.
      </div>
    <? } else if(isset($_GET['loggedout'])) { ?>
      <div class='alert alert-info'>
        You have been logged out!
      </div>
    <? } ?>
    <h1>Please sign in.</h1>
    <form class="form-inline" role="form" action="/login" method='POST'>
      <div class="form-group">
        <label class="sr-only" for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username"  placeholder="Username">
      </div>
      <div class="form-group">
        <label class="sr-only" for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  </div>
</div>
<?php include('footer.php'); ?>
