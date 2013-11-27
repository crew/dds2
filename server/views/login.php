<?php include('header.php'); ?>
<div class='container'>
  <div class='span5'>
    <h1>Sign in, please</h1>
    <p>To access the Digital Display System, please login using your CCIS credentials. If you need assistance, contact crew@ccs.neu.edu.</p>
  </div>
  <div class='span6 login-span'>
    <? if($this->attempted_login) { ?>
      <div class='alert'>
        <strong>Error!</strong> Your username or password was incorrect.
      </div>
    <? } ?>
    <form class='form-horizontal' action='/login' method='POST'>
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
