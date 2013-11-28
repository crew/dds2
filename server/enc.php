#!/usr/bin/php
<?php
ini_set("log_errors", 1);
ini_set("error_log", 'error.log');
ini_set('display_errors', 0);

set_include_path(__DIR__);
require 'lib/lib.php';

$machine = Machine::find_machine($argv[1]);

$classes = array();
$classes['classes']['dds2-client']['slides'] = $machine->get_deck_uuids();

echo yaml_emit($classes);
exit(0);

?>
