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

<button type="submit" name="back" class="btn btn-secondary" value="Back"><a id="back" href="JobIssForm.php">Back</a></button> 


<?php
if(isset($_POST['issue'])) 
{
  $issno = $_POST['issno'];
  $Pname = $_POST['Pname'];
  $forqty= $_POST['jiqty'];
  $jvname = $_POST['jvname'];
  $jidate = $_POST['jidate'];

  if ($conn) {
    $sql = "SELECT b.rmpid, p.pdt_name, b.bom_qty, b.unit from product p, bom b 
    where b.bom_pid =(select pdt_id from product where pdt_name ='$Pname') and b.rmpid=p.pdt_id";
    $result = mysqli_query($conn, $sql);
  }
  ?>

  <div class="product-info">
    <?php if (mysqli_num_rows($result) == 0) { ?>
    <h5 class="alert alert-danger center" style="width:270px;">
    <?php echo "PRODUCT NOT FOUND "; 
    exit();
    ?></h5>
    <?php } ?>
  </div>

  <?php
  $sql= "INSERT INTO iss_master (issid, iss_date, vend_name, iss_pid, for_qty) 
    VALUES( $issno, '$jidate', '$jvname', 
    (select pdt_id from product where pdt_name ='$Pname') ,
    $forqty )";
  $insert = mysqli_query($conn, $sql);

  if(!$insert) {
    echo mysqli_error($conn);
    exit();
  }
  ?>
  <h1 style="text-align: center"> Job Issue Voucher </h1>
  <h5> Voucher No: <?php echo $issno ?>  </h5>
  <h5> Date: <?php echo ($jidate) ?> "                                                 Vendor Name:" <?php echo ($jvname)?></h5>
  <h5> Product Name: <?php echo ($Pname) ?>                                     For Qty : <?php echo ($forqty)?></h5>

  <div class="container">
    <table class="table  resposive center table-bordered table-inverse table-lg" style="width: 800px; margin: 25px; margin-left: 100px; ">
      <thead class="thead-light">
        <tr>
          <th scope="col">Pdt_ID</th>
          <th scope="col">Raw Material Name</th>
          <th scope="col">Issue Qty</th>
          <th scope="col">Unit</th>
        </tr>
      </thead>
      <tbody>      

        <?php 
        // // output data of each row
        while ($row = mysqli_fetch_assoc($result)) 
        {
          $pdt_id = $row["rmpid"];
          $rm_name = $row["pdt_name"];
          $issqty = $row["bom_qty"] * $forqty ; 
          $unit = $row["unit"];

          $insert = mysqli_query($conn, "INSERT INTO iss_det (issid, bom_pid, rmpid, rm_qty, unit) 
            VALUES ( $issno,
            (select pdt_id from product where pdt_name ='$Pname') ,
            (select pdt_id from product where pdt_name ='$rm_name') ,
            '$issqty',
            (select unit from product where pdt_name ='$rm_name') )");
          
          if(!$insert) {
            echo mysqli_error($conn);
            exit();
          }
          ?>

          <tr>
            <td> <?php echo ($pdt_id); ?></td>
            <td> <?php echo ($rm_name); ?></td>
            <td> <?php echo ($issqty)  ; ?></td>
            <td> <?php echo ($unit); ?></td>
          </tr>

        <?php
        }

        {
          echo"<script>alert('Records added succesfully!')</script>";
          exit();
        }
        ?>
      </tbody>
    </table>
  </div>     
<?php
}
?>    


<?php
if (isset($_POST['delete']))
  {
    $issno = $_POST['issno'];
    $insert = mysqli_query($conn, "delete from iss_master where issid ='$issno'");
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
        echo"<script>alert('Records Deleted succesfully!')</script>";
        exit();
      }
  }    
  ?>

  <?php 
  // TO VIEW THE JOB ISSUE Voucher
  if(isset($_POST['view']))
  {
    $issno = $_POST['issno'];

    if ($conn) {
      $sql = "SELECT issid, iss_date, vend_name, 
              (select pdt_name from product p, iss_master i where pdt_id = iss_pid and issid ='$issno') 
      pdt_name, for_qty from iss_master where issid = $issno";
      $result = mysqli_query($conn, $sql);
?>
<?php
      if(!$result) {
?>
        <div class="product-info">
          <h5 class="alert alert-danger center" style="width:270px;">
          <?php echo "VOUCHER NOT FOUND "; 
          exit();
          ?></h5>
        </div>
<?php }
      $row = mysqli_fetch_assoc($result);
      if(is_null($row)) {
?>
        <div class="product-info">
          <h5 class="alert alert-danger center" style="width:270px;">
          <?php echo "VOUCHER NOT FOUND "; 
          exit();
          ?></h5>
        </div>
<?php
      }
      $jidate = $row["iss_date"];
      $jvname = $row["vend_name"];
      $Pname = $row["pdt_name"];
      $forqty = $row["for_qty"];
    
      if ($conn) {
        $sql = "SELECT i.rmpid, p.pdt_name, i.rm_qty, i.unit from product p, iss_det i where pdt_id = rmpid and issid ='$issno'";
        $result = mysqli_query($conn, $sql);
      }
    }
?>

    <div class="product-info">
      <?php if (mysqli_num_rows($result) == 0) { ?>
        <h5 class="alert alert-danger center" style="width:270px;">
        <?php echo "PRODUCT NOT FOUND "; 
        exit();
        ?></h5>
        <?php } ?>
    </div>
    <h1 style="text-align: center"> Job Issue Voucher </h1>
    <br>
    <br>

    <h5> Voucher No: <?php echo $issno ?>  </h5>
    <h5> Date: <?php echo ($jidate) ?> Vendor Name: <?php echo ($jvname)?></h5>
    <h5> Product Name: <?php echo ($Pname) ?>  For Qty : <?php echo ($forqty)?></h5>
    <br>

    <div class="container">
      <table class="table  resposive center table-bordered table-inverse table-lg" style="width: 800px; margin: 25px; margin-left: 100px; ">
        <thead class="thead-light">
          <tr>
            <th scope="col">Pdt ID</th>
            <th scope="col">Raw Material Name</th>
            <th scope="col">Issue Qty</th>
            <th scope="col">Unit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            // // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            $pdt_id = $row["rmpid"];
            $pdt_name = $row["pdt_name"];
            $rm_qty = $row["rm_qty"]; 
            $unit = $row["unit"];
            ?>
            <tr>
              <td> <?php echo ($pdt_id); ?></td>
              <td> <?php echo ($pdt_name); ?></td>
              <td> <?php echo ($rm_qty); ?></td>
              <td> <?php echo ($unit); ?></td>
            </tr> 
          <?php } ?>
        </tbody>
      </table>
    </div>    
  <?php
  }
  ?>
  

<?php
  mysqli_close($conn);
?>

<?php include 'footer.php' ?>