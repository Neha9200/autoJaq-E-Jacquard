<?php
session_start();
require_once "Database.php";
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style type="text/css">
  .center {
    margin-left: auto;
    margin-right: auto;
  }
  a:link, a:visited, #back {
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }
  a:hover, a:active,  #back {
    background-color: auto;
  }
</style>

<button type="submit" name="back" class="btn btn-secondary" value="Back"><a id="back" href="JobRecForm.php">Back</a></button> 


<?php
  
  if(isset($_POST['submit']))
    {
      $recno = $_POST['recno'];
      if ($conn) {
        $sql = "SELECT issid, iss_date, vend_name, iss_pid,
          (select pdt_name from product p, iss_master i where pdt_id = iss_pid and issid ='$recno') pdt_name, 
        (select unit from product p, iss_master i where pdt_id = iss_pid and issid ='$recno') unit,
        for_qty from iss_master where issid = $recno";
        // echo $sql;
        // exit();
        $result = mysqli_query($conn, $sql);
      }
?>

<?php
  if(!$result) {
?>
    <h5 class="alert alert-danger center" style="width:270px;">
    <?php echo "VOUCHER NOT FOUND "; 
    exit();
    ?></h5>
  <?php } ?>

  <div class="product-info">
    <?php if (mysqli_num_rows($result) == 0) { ?>
      <h5 class="alert alert-danger center" style="width:270px;">
        <?php echo "VOUCHER NOT FOUND "; 
        exit();
      ?></h5>
    <?php } ?>
  </div>
  
<?php
  $row = mysqli_fetch_assoc($result);
  $vend_name = $row["vend_name"];
  $iss_pid = $row["iss_pid"];
  $pdt_name = $row["pdt_name"];
  $for_qty = $row["for_qty"];
  $unit = $row["unit"];
?>

<?php
  $sql= "INSERT INTO job_rec (recid, rec_date, vend_name, rec_pid, rec_qty) 
  VALUES( $recno, '" . date('Y-m-d') . "', '$vend_name', $iss_pid, $for_qty)";
  $insert = mysqli_query($conn, $sql);

  if(!$insert) {
?>
    <div class="product-info">
      <h5 class="alert alert-danger center" style="width:270px;">
      <?php echo mysqli_error($conn); 
      // exit();
      ?></h5>
    </div>

<?php
  }
  else
    { ?>
<div class="container">
  <h1 style="text-align:center;" id="main">Job Receipt</h1>
  <br>
  <br>
  <table class="table  resposive center table-bordered table-inverse table-lg" style="width: 800px; margin: 25px; margin-left: 120px; ">
    <thead class="thead-light">
      <tr>
        <th scope="row">V No</th>
        <th scope="row">Receipt Date</th>
        <th scope="row">Vendor Name</th>
        <th scope="row">Product Name</th>
        <th scope="row">Recd Qty</th>
        <th scope="row">Unit</th>
      </tr>
    </thead>
    <tbody>      
    <tr>
      <td> <?php echo ($recno); ?></td>
      <td> <?php echo (date('d-m-Y')); ?></td>
      <td> <?php echo ($vend_name)  ; ?></td>
      <td> <?php echo ($pdt_name); ?></td>
      <td> <?php echo ($for_qty); ?></td>
      <td> <?php echo ($unit); ?></td>
    </tr>
    </tbody>
  </table>
</div>
      <div class="product-info">
        <h5 class="alert alert-success center" style="width:270px;">
        <?php
        echo "Product Received...";
        exit();
        ?> </h5>
      </div>
<?php
    }

    }
  ?>
  

  <!-- TO VIEW THE JOB RECEIPT Voucher -->
<?php
  if(isset($_POST['view']))
  {
    $recno = $_POST['recno'];
    // header("Refresh = 0 , url=JobIss_Code.php");

    if ($conn) {
      $sql = "SELECT recid, rec_date, vend_name, rec_pid, 
              (select pdt_name from product p, job_rec i where pdt_id = rec_pid and recid ='$recno') pdt_name ,
              (select unit from product p, job_rec i where pdt_id = rec_pid and recid ='$recno') unit ,
              rec_qty from job_rec where recid ='$recno'";
      $result = mysqli_query($conn, $sql);
    }
?>

<div class="product-info">
    <?php if (mysqli_num_rows($result) == 0) { ?>
      <h5 class="alert alert-danger center" style="width:270px;">
        <?php echo "VOUCHER NOT FOUND "; 
        exit();
        ?></h5>
<?php } ?>

<?php
      $row = mysqli_fetch_assoc($result);
      $recdate = $row["rec_date"];
      $jvname = $row["vend_name"];
      $pdt_name = $row["pdt_name"];
      $forqty = $row["rec_qty"];
      $unit = $row["unit"];
?>

<div class="container">
  <h1 style="text-align:center;" id="main">Job Receipt</h1>
  <br>
  <br>
  <table class="table  resposive center table-bordered table-inverse table-lg" style="width: 800px; margin: 25px; margin-left: 120px; ">
    <thead class="thead-light">
      <tr>
        <th scope="row">V No</th>
        <th scope="row">Receipt Date</th>
        <th scope="row">Vendor Name</th>
        <th scope="row">Product Name</th>
        <th scope="row">Recd Qty</th>
        <th scope="row">Unit</th>
      </tr>
    </thead>
    <tbody>      
    <tr>
      <td> <?php echo ($recno); ?></td>
      <td> <?php echo ($recdate); ?></td>
      <td> <?php echo ($jvname)  ; ?></td>
      <td> <?php echo ($pdt_name); ?></td>
      <td> <?php echo ($forqty); ?></td>
      <td> <?php echo ($unit); ?></td>
    </tr>
    </tbody>
  </table>
</div>


<?php } ?>  

<?php
  if (isset($_POST['delete']))
    {
      $recno = $_POST['recno'];
      $insert = mysqli_query($conn, "delete from job_rec where recid ='$recno'");
      if(!$insert) {
        ?>
        <div class="product-info">
          <h5 class="alert alert-danger center" style="width:270px;">
            <?php echo "VOUCHER NOT FOUND "; 
              exit();
            ?></h5>
        <?php }
      else
        {
      ?>
          <div class="product-info">
            <h5 class="alert alert-danger center" style="width:390px;">
            <?php echo "Voucher No  " . $recno . " -- Deleted succesfully. "; 
            exit();
            ?></h5>
            </div>
      <?php
        }
    }    
?>

<?php
mysqli_close($conn);
?>

<?php
include 'footer.php'
?>