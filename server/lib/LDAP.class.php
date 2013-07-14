<?php
# LDAP class for ldap things
class LDAP {

  private $ldap_server = LDAP_SERVER;
  private $ldap_port   = LDAP_PORT;
  private $ldap_binddn = LDAP_BIND_DN;
  private $connection;

  # Constructor to connect to LDAP server
  public function __construct() {
    $this->connect();
  }

  # Create a connection to the LDAP server.
  # Set $this->connection.
  # Returns $this->connection.
  private function connect() {
    $this->connection = ldap_connect($this->ldap_server, $this->ldap_port) or die('Could not connect to LDAP Server');

    ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_start_tls($this->connection);
    return $this->connection;
  }

  # Private method for binding to the ldap server
  # Returns true on sucessful bind, false otherwise
  private function bind($conn, $user, $pass) {
    $result = ldap_bind($conn, $user, $pass);
    return $result;
  }

  # Return user id on successful bind, false otherwise
  public function bind_user($user, $pass) {
    # Authenticate user
    $user_dn = "uid=$user,{$this->ldap_binddn}";
    $auth = ($this->bind($this->connection, $user_dn, $pass));

    # Return the uidNumber
    if($auth > 0) {
      $entries = $this->people_search("uid=$user");
      return $entries[0]['uidnumber'][0];
    } else {
      return false;
    }
  }

  # Returns the full name associated with the id given.
  public function get_name_from_id($id){
    $entries = $this->people_search("uidNumber=$id,{$this->ldap_binddn}");
    return $entries[0]['displayName'];
  }


  # Yeah, don't use this.
  # Basically does an ldap search for filters you provide.
  # Unless you like writing raw ldap filters, don't use this.
  private function people_search($filters) {
    $search = ldap_search($this->connection, $this->ldap_binddn, $filters);
    $entries = ldap_get_entries($this->connection, $search);

    if($entries['count'] > 0)
      return $entries;
    else
      return false;

  }

}
