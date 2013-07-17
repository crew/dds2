<?php include('header.php'); ?>
<?php
# Grabs the group name and makes a group
$group_name = $_POST['name'];

Group::create_group($group_name);

header('Location:/my-groups');
?>
<?php include('footer.php'); ?>
