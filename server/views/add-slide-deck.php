<?php include 'header.php' ?>
<div class='container'>
  <div class='span6'>
    <h1>Add a new slide deck</h1>
    <p>Upload a PDF to create a slide deck. Digital Display will take each page of your PDF and convert them into a slide deck. All you have to do is take your presentation and upload it to the cloud~~~.</p>
  </div>
  <div class='span5'>
    <form class='form-horizontal' action='/do-upload' method='POST' enctype='multipart/form-data'>
      <div class='control-group'>
        <label class='control-label' for='name'>Name</label>
        <div class='controls'>
          <input type='text' name='name'  id='name' placeholder='Name of slidedeck'>
        </div>
      </div>
      <div class='control-group'>
        <label class='control-label' for='upload'>Upload PDF</label>
        <div class='controls'>
          <input type='file' id='file' name='file' placeholder='Upload PDF'>
        </div>
      </div>
      <div class='control-group'>
        <div class='controls'>
          <button type='submit' class='btn'>Create</button>
        </div>
      </div>

    </form>
  </div>

</div>
<?php include 'footer.php' ?>
