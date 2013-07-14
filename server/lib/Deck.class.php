<?php
# Represents the Deck table in SQL
class Deck {

  # Deck ID.
  private $id;
  # Deck Name.
  private $name;
  # Array of user ids that are allowed to modify this Deck
  private $user;
  # Array of group ids that are allowed to modify this Deck.
  private $group;

  # Find a deck from a deck id
  public static function find_deck_by_id($id) {
    $deck = new Deck();
    # Set the attributes from the deck table
    $result = mysqli_query("SELECT id,name FROM deck WHERE id = '$id'");
    $deck->build_from_deck_table($result);
    return $deck;
  }

  # Find a deck from its name
  public static function find_deck_by_name($name){
    $deck = new Deck();
    $result = mysqli_query("SELECT id,name FROM deck WHERE name LIKE '%$name%'");
    $deck->build_from_deck_table($result);
    return $deck;
  }

  # Takes a mysqli_query result from the `deck` table and builds this object
  public function build_from_deck_table($sql_result) {
    $row = mysqli_fetch_assoc($sql_result);
    $this->set_id($row['id']);
    $this->set_name($row['name']);
    $this->build_user();
    $this->build_group();
  }

  # Uses this object's id and builds the user variable
  public function build_user() {
    $result = mysqli_query("SELECT uid FROM deck_user WHERE did = '{$this->id}'");
    $row = mysqli_fetch_row($result);
    $this->user = $row;
  }

  # Uses this object's id and builds the group variable
  public function build_group() {
    $result = mysqli_query("SELECT gid FROM deck_user WHERE did = '{$this->id}'");
    $row = mysqli_fetch_row($result);
    $this->user = $row;
  }

  # Checks if the name exists in the deck table, implying it exists
  public function exists_by_name($name) {
    $result = mysqli_query("SELECT name FROM deck WHERE name = '$name'");
    if(mysqli_num_rows($result))
      return true;
    else
      return false;
  }

  # Checks if the id exists in the deck table, implying the deck exists
  public function exists_by_id($id) {
    $result = mysqli_query("SELECT id FROM deck WHERE id = '$id'");
    if(mysqli_num_rows($result))
      return true;
    else
      return false;
  }

  public function set_id($id) {
    $this->id = $id;
  }

  public function set_name($name) {
    $this->name = $name;
  }

  public function set_user($user) {
    $this->user = $user;
  }

  public function set_group($group) {
    $this->group= $group;
  }

}
