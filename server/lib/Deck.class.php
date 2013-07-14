<?php
# Represents the Deck table in SQL
class Deck {

  # Deck ID.
  private $id;
  # Deck Name.
  private $name;
  # Deck data (this should be a tar file containing the slides in the slides/ folder and a settings.json file).
  private $data;
  # Array of user ids that are allowed to modify this Deck
  private $user;
  # Array of group ids that are allowed to modify this Deck.
  private $group;

  # Find a deck from a deck id
  public static function find_deck_by_id($id) {
    $deck = new Deck();
    # Set the attributes from the deck table
    $result = mysqli_query("SELECT * FROM deck WHERE id = '$id'");
    $deck->build_from_deck_table($result);
    return $deck;
  }

  # Find a deck from its name
  public static function find_deck_by_name($name){
    $deck = new Deck();
    $result = mysqli_query("SELECT * FROM deck WHERE name LIKE '%$name%'");
    $deck->build_from_deck_table($result);
    return $deck;
  }

  # Takes a mysqli_query result from the `deck` table and builds this object
  public function build_from_deck_table($sql_result) {
    $row = mysqli_fetch_assoc($sql_result);
    $this->set_id($row['id']);
    $this->set_name($row['name']);
    $this->set_data($row['data']);
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

  public function set_data($data) {
    $this->data = $data;
  }

}
