<?php
include 'header.php';
$deck_uuid = $_SERVER['URL'][1];
?>
<div class='container'>
  <div class='span5'>
    <? if(isset($_GET['success'])) { ?>
    <div class='alert alert-success'>
      <strong>Success!</strong> Your slides are being pushed to the machines within a minute.
    </div>
    <? } ?>
    <h1>Assign slides</h1>
    <p>Choose a machine from the dropdown on the left and a set of slides from the dropdown on the right </p>
  </div>
  <div class='span12'>
    <form class='form-horizontal' name='machine_names' action='/assign-slides' method='POST'>
      <input type='hidden' name='uuid' value='<?=$deck_uuid?>'>
      <select name='machine_fqdn[]' multiple="multiple">
        <?php
          $machines_array = Machine::all_machines();
          foreach ($machines_array as $machine){
            if(in_array($deck_uuid, $machine->get_deck_uuids()))
              echo '<option selected>';
            else
              echo '<option>';
            echo $machine->get_name();
            echo '</option>';
          }
        ?>
      </select>
      <p><button class="btn">Set machines</button></p>
   </form>
  </div>
</div>
<?php include 'footer.php'?>
