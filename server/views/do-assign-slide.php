<?php

# TODO: we need to refactor this
$deck = Deck::find_deck_by_uuid($_POST['uuid']);
echo $deck->get_uuid();
foreach($_POST['machine_fqdn'] as $machine){
  $deck->assign_machine($machine);
}

?>
