<?php

# Login Class for DDS2
# Uses LDAP for authentication
class Login {

  # User's full name
  public $user_name;
  # User's id number (from LDAP)
  public $user_id;

  # Given a username and password, this function will return either true
  #   or false if the given user and pass is a valid login.
  # If $cookie is set to true, this function will also save a cookie
  public function authenticate_user($user, $pass, $cookie = false) {
    $ldapconn = new LDAP();
    if($uid = $ldapconn->bind_user($user, $pass)) {
      if($cookie) $this->save_user_cookie($uid);
      return true;
    }
    return false;
  }

  # Sets a cookie with value of their user_id which comes from LDAP
  public function save_user_cookie($id) {
    # Set a cookie for 30 days with the user id
    setcookie('auth', $id, time()+60*60*24*30);
  }

  # Check the cookie to see if a user is logged in
  # Returns true or false
  public static function is_user_logged_in() {
    return isset($_COOKIE['auth']);
  }

  # Loads the auth cookie and sets the user and id class parameter
  # Returns true on success, false on failure
  public function load_cookie() {
    if($this->is_user_logged_in()){
      $this->user_id = $_COOKIE['auth'];
      $this->user_name = $this->get_name_from_id($this->user_id);
      return true;
    } else {
      return false;
    }
  }

  # Returns user's full name from LDAP
  public function get_name_from_id($id){
    $ldapconn = new LDAP();
    return $ldapconn->get_name_from_id($id);
  }

  # Logs out any user; kills cookie & brings to /login?logout
  public static function logout() {
    setcookie("auth", "", time()-3600);
  }
}

?>
