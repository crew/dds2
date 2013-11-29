<?php
include 'header.php';
$deck_uuid = $_SERVER['URL'][1];

$machines_array = Machine::all_machines();
?>
<div class='jumbotron'>
  <div class='container'>
    <h1>Assign this slide deck to a screen.</h1>
    <p>Please select which machines you want this slide deck to be on. If you don't want this slide deck on any machine, do not select anything and press "Save."</p>
  </div>
</div>
<div class='container'>
  <div class='row'>
    <div class='col-lg-3 text-center' style='float:none; margin: 0 auto;'>
      <form role='form' method='POST' action='/assign-slides'>
        <input type='hidden' name='uuid' value="<?=$deck_uuid?>" />
        <div class='form-group'>
          <label for='machines[]'>Machines</label>
          <select class='form-control' multiple name='machine_fqdn[]'>
<?          foreach($machines_array as $machine) {
              if(in_array($deck_uuid, $machine->get_deck_uuids()))
                echo '<option selected>';
              else
                echo '<option>';
              echo $machine->get_name();
              echo '</option>';
            }
?>
          </select>
        </div>
        <div class='form-group'>
          <button class='btn btn-primary'>Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
