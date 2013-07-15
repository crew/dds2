<!--

  Does a post to do-login with all the login info,
  Now will check if you are logged in, and move you.
-->

<?php include('header.php'); ?>

<?php
  # if user is logged in, move away form /home  
  if(Login::is_user_logged_in()){
      header('Location:/home');
  }

?>
<div class='container'>
  <div class='span5'>
    <h1>Sign in, please</h1>
    <p>To access the Digital Display System, please login using your CCIS credentials. If you need assistance, contact crew@ccs.neu.edu.</p>
  </div>
  <div class='span6 login-span'>
    <form class='form-horizontal' action='/do-login' method='POST'>
      <div class='control-group'>
        <label class='control-label' for='username'>Username</label>
        <div class='controls'>
          <input type='text' name='username'  id='username' placeholder='Username'>
        </div>
      </div>
      <div class='control-group'>
        <label class='control-label' for='password'>Password</label>
        <div class='controls'>
          <input type='password' id='password' name='password' placeholder='Password'>
        </div>
      </div>
      <div class='control-group'>
        <div class='controls'>
          <button type='submit' class='btn'>Sign in</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include('footer.php'); ?>
