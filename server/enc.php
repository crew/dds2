#!/usr/bin/php
<?php
set_include_path('/home/hyfi/dds2/server');
require 'lib/lib.php';

$machine = Machine::find_machine($argv[1]);

$classes = array();
$classes['classes']['dds-client']['slides'] = $machine->get_deck_uuids();

echo yaml_emit($classes);
exit(0);

?>
