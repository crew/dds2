<?php include 'header.php' ?>
<div class='jumbotron'>
  <div class='container'>
    <h1>Add a new slide deck.</h1>
    <p>Go on, make this system actually useful.</p>
    </div>
</div>
<div class='container'>
  <div class='row'>
    <div class='col-sm-6 col-center text-center'>
      <p>Please upload a PDF in landscape containing all the slides for your deck.</p>
    </div>
  </div>
  <div class='row'>
    <div class='col-md-6 col-center'>
      <form role='form' action='/add-slide-deck' method='POST' enctype='multipart/form-data'>
        <div class='control-group col-center col-md-5 text-center'>
          <label for='name'>Name of slide deck</label>
          <input type='text' class='form-control' name='name' placeholder='Name'>
        </div>
        <div class='control-group col-center col-md-5 text-center' style='margin-top:20px;'>
          <input type='file' name='file'>
        </div>
        <button class='btn btn-primary col-center' style='display:block; margin-top:20px;'>Upload</button>
      </form>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
