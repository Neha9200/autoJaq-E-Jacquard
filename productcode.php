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
<button type="submit" name="back" class="btn btn-secondary" value="Back"><a id="back" href="productadd.php">Back</a></button> 
<?php
session_start();
require_once 'Database.php';
// header("Refresh:0 , url=productadd.php");

//CALLING STORED PROCEDURE TO INSERT RECORD
if (isset($_POST['submit'])) {
    $Pname = isset($_POST['Pname']) ? $_POST['Pname'] : '';
    $opqty = isset($_POST['opqty']) ? $_POST['opqty'] : 0;
    $cost = isset($_POST['cost']) ? $_POST['cost'] : 0;
    $mrp = isset($_POST['mrp']) ? $_POST['mrp'] : 0;
    $curqty = isset($_POST['curqty']) ? $_POST['curqty'] : 0;
    $unit = isset($_POST['unit']) ? $_POST['unit'] : '';
    $gst_tax = isset($_POST['gst_tax']) ? $_POST['gst_tax'] : 0;

if($Pname == '')
{
?>
    <h5 class="alert alert-danger center" style="width:300px;">
    <?php echo "Product details not entered. "; 
    exit();
    ?></h5>
<?php
} 
$sql = "CALL insert_pdt_records('".$Pname."', ".$opqty.", ".$cost.", ".$mrp.", ".$curqty.", '" .$unit. "', ".$gst_tax.")";
try{
    $success = $conn->query($sql);
    if($success){
        echo"<script>alert('Inserted succesfully')</script>";      
    }
    else{
        echo"<script>alert('Data not inserted')</script>";
        }
    }

catch(PDOException $e)
    {
        echo $e->getMessage();
    }
} ?>
<!-- ---- -->

<?php
if (isset($_POST['view'])) {
  $Pname = $_POST["Pname"];
  $_SESSION["Pname"] = $Pname;
  if ($conn) {
    if($Pname==''){
        $sql = "SELECT * FROM product ";
    }
    else {
       $sql = "SELECT * FROM product where pdt_name='$Pname'";
    }
    $result = mysqli_query($conn, $sql);
?>

<div class="product-info">
    <h1 style="text-align: center"> Product Details </h1>
    <br>
    <br>
    <?php if (mysqli_num_rows($result) == 0) { ?>
      <h5 class="alert alert-danger center" style="width:300px;">
        <?php echo "PRODUCT NOT FOUND "; ?></h5>
    <?php } ?>

<div class="container">
<table class="table  center table-sm" style="width: 800px;">
  <thead class="thead-light">
    <tr>
      <th scope="col">Pdt_ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Op Qty</th>
      <th scope="col">Cl Qty</th>
      <th scope="col">Unit</th>
      <th scope="col">Cost</th>
      <th scope="col">MRP</th>
      <th scope="col">GST</th>
    </tr>
  </thead>
  <tbody>      

<?php 
while ($row = mysqli_fetch_assoc($result)) {
  $pdt_id = $row["pdt_id"];
  $pdt_name = $row["pdt_name"];
  $opqty = $row["opqty"]; 
  $curqty = $row["curqty"];
  $unit = $row["unit"];
  $cost = $row['cost'];
  $mrp = $row['mrp'];
  $gst_tax = $row['gst_tax'];
?>

  <tr>
  <td> <?php echo ($pdt_id); ?></td>
  <td> <?php echo ($pdt_name); ?></td>
  <td> <?php echo ($opqty); ?></td>
  <td> <?php echo ($curqty); ?></td>
  <td> <?php echo ($unit); ?></td>
  <td> <?php echo ($cost); ?></td>
  <td> <?php echo ($mrp); ?></td>
  <td> <?php echo ($gst_tax); ?></td>
</tr>

  <?php
    }
  }
}
  ?>
  
  </tbody>
</table>
</div>

<!-- ----- -->
<?php
if (isset($_POST['status'])) {
  $Pname = $_POST["Pname"];
  $_SESSION["Pname"] = $Pname;
  if ($conn) {
    $sql = "SELECT * FROM stock_pos where pdt_name='$Pname'";
    $result = mysqli_query($conn, $sql);
?>

<div class="product-info">
    <h1 style="text-align: center"> Product Stock Report </h1>
    <br>
    <br>
    <?php if (mysqli_num_rows($result) == 0) { ?>
      <h5 class="alert alert-danger center" style="width:300px;">
        <?php echo "PRODUCT NOT FOUND "; ?></h5>
    <?php } ?>

<div class="container">
<table class="table  center table-sm" style="width: 800px;">
  <thead class="thead-light">
    <tr>
        <th scope="col">Pdt Id</th>
        <th scope="col">Product Name</th>
        <th scope="col">Cur Qty</th>
    </tr>
  </thead>
  <tbody>      

<?php 
while ($row = mysqli_fetch_assoc($result)) {
  $pdt_id = $row["pdt_id"];
  $pdt_name = $row["pdt_name"]; 
  $curqty = $row["curqty"];
?>

  <tr>
  <td> <?php echo ($pdt_id); ?></td>
  <td> <?php echo ($pdt_name); ?></td>
  <td> <?php echo ($curqty); ?></td>

</tr>

  <?php
    }
  }
}
  ?>
  
  </tbody>
</table>
</div>

<?php
mysqli_close($conn);
?>