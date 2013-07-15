<?php
# Represents a user in sql
class User {
  # User Id
  public $uid;
  # User Decks
  public $user_decks;
  # user_groups
  public $user_groups;

  # Constructs our user, makes sure we have our data in our variables
  public function __construct($uid){  
    $this->find_user_decks($uid);
    $this->find_user_groups($uid); 
  }

  # Fetches our user's decks from MYSQL using our user id
  # User id (if logged in) is in our cookie
  private function find_user_decks ($uid){
    global $conn; 
    $this->user_decks = array();
    # Get the user's decks from table
    $query = "SELECT did FROM deck_user WHERE uid = '$uid'";
    $result = mysqli_query($conn, $query);
    
    # gets each deckid, converts to deck obj & puts it in our decks array 
    while($row= mysqli_fetch_array($result)){
      $deckobj =  Deck::find_deck_by_id($row['did']); 
      $this->user_decks[] = $deckobj;
    }
  }
  
  #  Fetches our user's groups, put them in our group array
  private function find_user_groups($uid){
    global $conn;
    $query = "SELECT gid FROM group_member WHERE uid ='$uid'";
    $result = mysqli_query($conn, $query);
    while($row= mysqli_fetch_array($result)){
      $group =  Deck::find_deck_by_id($row['gid']); 
      $this->user_groups[] = $group;
    }
  }
}
?> 
