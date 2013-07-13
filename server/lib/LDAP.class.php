<?php
# LDAP class for ldap things
class LDAP {

  private $ldap_server = LDAP_SERVER;
  private $ldap_binddn = LDAP_BIND_DN;
  private $connection;

  # Create a connection to the LDAP server.
  # Set $this->connection.
  # Returns $this->connection.
  private function connect() {
    $this->connect = ldap_connect($ldap_server) or die('Could not connect to LDAP Server');
    return $this->connection;
  }

  # Private method for binding to the ldap server
  # Returns true on sucessful bind, false otherwise
  private function bind($conn, $user, $pass) {
    if($bind = ldap_bind($conn, $user, $pass))
      return true;
    else
      return false;
  }

  # Return user id on successful bind, false otherwise
  public function bind_user($user, $pass) {
    $user_dn = "uid=$user,$ldap_binddn";
    if($this->bind($user_dn, $pass)){
      $entries = $this->people_search($user_dn);
      return $entries[0]['uidNumber'];
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
    $search = ldap_search($this->connection, $this->ldap_binddn, $filter);
    $entries = ldap_get_entries($this->connection, $search);
    if($entries['count'] > 0)
      return $entries;
    else
      return false;
  }

}
