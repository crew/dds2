<?php
# Represents a user in sql
class User {
  # User Id
  public $uid;
  # User Decks
  public $user_decks;
  # user_groups
  public $user_groups;

  public function __construct($uid){  
    $this->find_user_decks($uid);
    $this->find_user_groups($uid); 
  }

  private function find_user_decks ($uid){
    global $conn;
    $this->user_decks = array();
    # Get the user's decks from table
    $query = "SELECT did FROM deck_user WHERE uid = '$uid'";
    $result = mysqli_query($conn, $query);

    while($row= mysqli_fetch_array($result)){
      # gets each did, converts to deck obj & returns
      $deckobj =  Deck::find_deck_by_id($row['did']); 
      $this->user_decks[] = $deckobj;
    }
  }
  
  private function find_user_groups($uid){
    global $conn;
    $query = "SELECT gid FROM group_member WHERE uid ='$uid'";
    $result = mysqli_query($conn, $query);
  }
}
?> 
