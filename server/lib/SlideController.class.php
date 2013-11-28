<?php

class SlideController extends Controller {

  public function __construct() {
    if($_SERVER['URL'][0] == 'add-slide-deck' && $this->is_post())
      $this->add_slide_deck();
    else if($_SERVER['URL'][0] == 'assign-slides' && $this->is_post()) {
      $this->assign_slides();
      header('Location:/assign-slides/'.$_POST['uuid'].'?success');
    }
  }

  private function assign_slides() {
    # Grabs our uuid from assigned slide, and for each posted machine, assigns that slide.
    $deck = Deck::find_deck_by_uuid($_POST['uuid']);

    # This will create the definitive list of machines hosting this slide deck.
    $deck->remove_associated_machines();
    if(count($_POST['machine_fqdn']) > 0) {
      foreach($_POST['machine_fqdn'] as $machine) {
        $deck->assign_machine($machine);
      }
    }
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
    else if($_SERVER['URL'][0] == 'assign-slides')
      include 'views/assign-slide.php';
  }

}
