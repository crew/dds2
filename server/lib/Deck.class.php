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


}
