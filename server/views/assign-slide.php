<!--

  Each selected machine from the dropdown & the uuid of our slide is posted to
  do-assign-slide.php which then does the (actual) assignment.

-->

<?php include 'header.php'?>
<?php 
global $url;
$deck_uuid=$url[1];
?>



<div class='container'>
  <div class='span5'>
    <h1>Assign slides Yo</h1>
    <p>Choose a machine from the dropdown on the left and a set of slides from the dropdown on the right </p>
  </div>
  <div class='span9'>
    <form class='form-horizontal' name='machine_names' action='/do-assign-slide' method='POST'>
      <input type='hidden' name='uuid' value='<?=$deck_uuid?>'>
      <select name='machine_fqdn[]' multiple="multiple">
        <?php 
          $machines_array = Machine::all_machines();
          foreach ($machines_array as $machine){
            echo '<option>';
            echo $machine->get_name();
            echo '</option>';
          }
        ?>
      </select>
      <button class="btn">Add to Deck</button>
   </form>
  </div>
</div>


<?php include 'footer.php'?>
