<?php

class LoginController extends Controller {

  public $attempted_login = false;

  public function __construct() {
    /* Perform Logout */
    if($_SERVER['URL'][0] == 'logout') {
      Login::logout();
      header('Location:/login?loggedout');
    }

    /* If this is POST, that must mean someone is trying to login. */
    else if($this->is_post()) {
      $login = new Login();
      $auth = ($login->authenticate_user($_POST['username'], $_POST['password'], true));

      if($auth) header('Location:/slide-inventory');
      else $this->attempted_login = true;
    }

    /* If the user is logged in, send them to /slide-inventory */
    else if(Login::is_user_logged_in()) {
      header('Location:/slide-inventory');
    }
  }

  public function render() {
    include 'views/login.php';
  }

}
