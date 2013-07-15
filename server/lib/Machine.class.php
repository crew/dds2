<?php
# Represents machines
class Machine {
  private $name;
  private $deck = array();

  # Find a Machine by name
  public static function find_machine($name) {
    global $pgconn;

    $machine = new Machine();

    $result = pg_query($pgconn, "SELECT * FROM certnames WHERE name = '$name'");
    $row = pg_fetch_assoc($result);

    $machine->set_name($row['name']);
    $machine->build_decks();

    return $machine;
  }

  # Uses this machine's name and figures out all the associated decks.
  public function build_decks(){
    global $conn;
    $query = "SELECT * FROM machine_deck_assignment WHERE machine_fqdn ='{$this->name}'";
    $result = mysqli_query($conn, $query);
   while($row = mysqli_fetch_array($result)){
      # $row['uuid'] yo.
      $this->deck[] = $row['uuid'];
    }
  }

  # Returns all machines
  public static function all_machines() {
    global $pgconn;
    $machines = array();
    $result = pg_query($pgconn, "SELECT * FROM certnames");
    while($row = pg_fetch_array($result)){
      $machines[] = Machine::find_machine($row['name']);
    }
    return $machines;
  }

  public function get_name() {
    return $this->name;
  }
 
  public function set_name($name){
    $this->name = $name;
  }
  
  public function get_deck_uuids() {
    return $this->deck;
  }
 
}
?>
