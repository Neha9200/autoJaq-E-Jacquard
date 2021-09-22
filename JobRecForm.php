<?php
session_start();
require_once "Database.php";
?>
<title>Job Receipt Voucher</title>
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
<form action="JobRec_Code.php" method="post">
  <div class="container">
    <h1 id="main">Job Receipt</h1>
    <hr>
    <div class="form-inline">
        <div class="form-group mb-2">
          <label for="recno"><strong>Job Issue No: </strong></label>
          <input type="text"  class= "form-control" name="recno" id="recno" required="" >
        </div>
    </div>
    </div>
    <div class="container">
      <div class="column">
          <input type="submit" id="btn2" name="submit" class=" btn btn-md btn-primary" value="Submit">
          <input type="submit" id="btn3" name="view" class=" btn btn-md btn-warning " value="View">
          <input type="submit" id="btn3" name="delete" class=" btn btn-md btn-danger" value="Delete">
          <button type="submit" id="back" name="back" class=" btn btn-md btn-info"><a href="home.php">Back</a></button>
      </div>
    </div>
</form>
<?php
mysqli_close($conn);
?>
<?php include 'footer.php' ?>