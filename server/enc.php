#!/usr/bin/php
<?php
require 'lib/lib.php';

$machine = Machine::find_machine($argv[1]);

$classes = array();
$classes['classes'];
$classes['classes']['dds-client']['slides'] = $machine->get_deck_uuids();

echo yaml_emit($classes);
