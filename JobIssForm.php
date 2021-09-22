<?php
session_start();
require_once "Database.php";
?>
  <title>Job Issue Voucher</title>
  <?php include 'header.php' ?>
  <style type="text/css">
    a:link, a:visited, #back  {
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    a:hover, a:active, #back {
      background-color: auto;
    }
    body{background-color:hsla(280, 100%, 90%, 0.3);}
  </style>
<body>
  <div class="container">
    <h1 style="text-align:center;" id="main">Job Issue</h1>
    <hr>
    <form action="JobIss_Code.php" method="post">
      <div class="form-group row">
        <label for="issno" class="col-sm-2 col-form-label-md"><strong>Voucher No: </strong></label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter No" class= "form-group" name="issno" id="issno" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="jidate" class="col-sm-2 col-form-label-md"><strong>Issue Date: </strong></label>
        <div class="col-sm-10">
          <input type="date" value="<?php echo date('Y-m-d'); ?>" class= "form-group" name="jidate" id="jidate">
        </div> 
      </div> 
      <div class="form-group row">
        <label for="jvname" class="col-sm-2 col-form-label-md"><strong>Vendor Name: </strong></label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class= "form-group" name="jvname" id="jvname" >
        </div>
      </div>
      <div class="form-group row">
          <label for="Pname" class="col-sm-2 col-form-label-md"><strong>Product Name: </strong></label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name" class= "form-group" name="Pname" id="Pname">
        </div> 
      </div>
      <div class="form-group row">
          <label for="jiqty" class="col-sm-2 col-form-label-md"><strong>For Qty: </strong></label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Qty" class= "form-group" name="jiqty" id="jiqty">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="column">
        <input type="submit" id="btn2" name="issue" class=" btn btn-md btn-primary" value="Issue">
        <input type="submit" id="btn3" name="view" class=" btn btn-md btn-warning " value="View">
        <input type="submit" id="btn3" name="delete" class=" btn btn-md btn-danger" value="Delete">
        <button type="submit" id="back" name="back" class=" btn btn-md btn-info"><a href="home.php">Back</a></button>
      </div>
    </div>
</form>
<?php include 'footer.php' ?>