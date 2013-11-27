<?php

class SlideController extends Controller {

  public function __construct() {
    if($_SERVER['URL'][0] == 'add-slide-deck' && $this->is_post())
      $this->add_slide_deck();
  }

  private function add_slide_deck() {
    # Generate a UUID and place the image there.
    $uuid = uniqid();
    move_uploaded_file($_FILES['file']['tmp_name'], 'queue/'.$uuid.'.pdf');

    # Convert the PDF/image to a JPEG
    $convert = new Convert("queue/$uuid.pdf", "slides/$uuid");

    # Create a new slide deck in the database
    $deck = new Deck();
    $deck->set_name($_POST['name']);
    $deck->set_uuid($uuid);
    $deck->set_user(array($_COOKIE['auth']));
    $deck->save();

    # Send them to the slide-inventory page when done.
    header('Location:/slide-inventory');
  }

  public function render() {
    if($_SERVER['URL'][0] == 'add-slide-deck')
      include 'views/add-slide-deck.php';
    else if($_SERVER['URL'][0] == 'slide-inventory')
      include 'views/slide-inventory.php';
  }

}
