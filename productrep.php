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
  require_once 'Database.php';
  session_start();
?>
<?php
  // $Pname = $_POST["Pname"];
  // $_SESSION["Pname"] = $Pname;
  if ($conn) {
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
?>

<div class="product-info">
    <h1 style="text-align: center"> Product Details </h1>
    <br>
    <br>
    <?php if (mysqli_num_rows($result) == 0) { ?>
      <h5 class="alert alert-danger" style="width:700px;">
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
  ?>
  
  </tbody>
</table>
</div>

