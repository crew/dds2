<?php

# This can only be a PDF right now.
if($_FILES['file']['type'] != 'application/pdf')
  header('Location:/add-new-slides?fail');

$uuid = uniqiq();
move_uploaded_file($_FILES['file']['tmp_name'], 'queue/'.$uuid.'.pdf');

Convert::convert("queue/$uuid.pdf", "slides/$uuid");
$deck = new Deck();
$deck->set_name($_POST['name']);
$deck->set_uuid($uuid);
$deck->set_user(new Array($_COOKIE['auth']));
$deck->save();

}



?>
