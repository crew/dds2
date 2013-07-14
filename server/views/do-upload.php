<?php

# This can only be a PDF right now.
if($_FILES['file']['type'] != 'application/pdf')
  header('Location:/add-new-slides?fail');

$uuid = uniqid();
move_uploaded_file($_FILES['file']['tmp_name'], 'queue/'.$uuid.'.pdf');

$convert = new Convert("queue/$uuid.pdf", "slides/$uuid");
$deck = new Deck();
$deck->set_name($_POST['name']);
$deck->set_uuid($uuid);
echo $_COOKIE['auth'];
$deck->set_user(array($_COOKIE['auth']));
$deck->save();
header('Location:/home?success');




?>
