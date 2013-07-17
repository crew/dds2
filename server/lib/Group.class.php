<?php
# Represents a Group in sql
class Group{
  # User Id
  public $gid;
  # Group Decks
  public $group_decks;
  # Group Members
  public $group_members;
  # Group Name
  public $group_name;

  # Constructs our Group, makes sure we have our data in our variables
  public function __construct($gid){  
    $this->find_group_decks($gid);
    $this->find_group_members($gid); 
    $this->find_group_name($gid);
  }
  
  # Creates a group
  public static function create_group($name){
    global $conn;
    $create_query = "INSERT INTO group_name (name) VALUES ('$name')";
    $id_query = "SELECT id FROM group_name WHERE name LIKE '%$name%'";
    mysqli_query($conn, $create_query);
    $gid = mysqli_fetch_assoc(mysqli_query($conn,$id_query));
    return new Group($gid);

  }

  # Fetches our user's decks from MYSQL using our user id
  # User id (if logged in) is in our cookie
  private function find_group_decks ($gid){
    global $conn; 
    $this->group_decks= array();
    # Get the user's decks from table
    $query = "SELECT did FROM deck_group WHERE gid = '$gid'";
    $result = mysqli_query($conn, $query);
    
    # gets each deckid, converts to deck obj & puts it in our decks array 
    while($row= mysqli_fetch_array($result)){
      $deckobj =  Deck::find_deck_by_id($row['did']); 
      $this->user_decks[] = $deckobj;
    }
  }
  
  #  Fetches our user's groups, put them in our group array
  private function find_group_members($gid){
    global $conn;
    $query = "SELECT uid FROM group_member WHERE gid ='$gid'";
    $result = mysqli_query($conn, $query);
    while($row= mysqli_fetch_array($result)){
      $this->user_groups[] = $row['uid'];
    }
  }

  # Fetches group name
  private function find_group_name ($gid){
    global $conn; 
    # Get the user's decks from table
    $query = "SELECT name FROM group_name WHERE id = '$gid'";
    $result = mysqli_query($conn, $query);
    $this->group_name = mysqli_fetch_assoc($result);
  }
 
}
?> 
