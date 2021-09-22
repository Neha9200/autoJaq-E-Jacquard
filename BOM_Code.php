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

<button type="submit" name="back" class="btn btn-secondary" value="Back"><a id="back" href="BOM_Form.php">Back</a></button> 

<?php
session_start();
include  "Database.php";
?>

<?php
if(isset($_POST['add']))
{
  $bpname = $_POST['bpname'];
  $rmname = $_POST['rmname'];
  $qty = $_POST['qty'];

  $sql = "INSERT INTO bom (bom_pid, rmpid, bom_qty, unit) 
      VALUES(
      (select pdt_id from product where pdt_name ='$bpname') ,
      (select pdt_id from product where pdt_name ='$rmname') ,
      '$qty',
      (select unit from product where pdt_name ='$rmname') 
      )";
  $insert = mysqli_query($conn, $sql);   

  if(!$insert)
  {
      echo mysqli_error($conn);
      exit();
  }
  else
  {
  ?>

  <div class="product-info">
    <h5 class="alert alert-success center" style="width:370px;">
    <?php echo "Data added succesfully! "; 
    exit();
    ?></h5>
  </div>

  <?php
  }
}
elseif (isset($_POST['delete']))
{
  $bpname = $_POST['bpname'];
  $rmname = $_POST['rmname'];
  $sql = "delete from bom where bom_pid = (select pdt_id from product where pdt_name ='$bpname')
    and rmpid= (select pdt_id from product where pdt_name ='$rmname')";
  $result = mysqli_query($conn, $sql);
  if(!$result)
  {
      echo mysqli_error($conn);
      exit();
  }
  else
  { 
  ?>
  <h5 class="alert alert-danger center" style="width:270px;">
  <?php echo "Deleted successfully! "; 
  exit();
  ?></h5>

  <?php
  }
}

elseif (isset($_POST['view']))
{
  $bpname = $_POST["bpname"];
  if ($conn) {
    $sql = "CALL view_bom_records('".$bpname."')";
    $result = mysqli_query($conn, $sql);
  }
  ?>

  <div class="product-info">
    <?php if (mysqli_num_rows($result) == 0) { ?>
    <h5 class="alert alert-danger center" style="width:270px;">
    <?php echo "BOM NOT FOUND "; 
    exit();
    ?></h5>
  </div>
  <?php } ?>
  <h1 style="text-align: center"> Bill of Materials </h1>
  <h4 style="text-align: center"> Product Name: <?php echo $bpname ?> </h4>
  <div class="container">
    <table class="table  resposive center table-bordered table-inverse table-lg" style="width: 750px; margin: 25px; margin-left: 180px; ">
      <thead class="thead-light">
        <tr>
          <th scope="col">Pdt_ID</th>
          <th scope="col">Raw Material Name</th>
          <th scope="col">BOM Qty</th>
          <th scope="col">Unit</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      // // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        $pdt_id = $row["rmpid"];
        $pdt_name = $row["pdt_name"];
        $bomqty = $row["bom_qty"]; 
        $unit = $row["unit"];
        ?>
        <tr>
          <td> <?php echo ($pdt_id); ?></td>
          <td> <?php echo ($pdt_name); ?></td>
          <td> <?php echo ($bomqty); ?></td>
          <td> <?php echo ($unit); ?></td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
  </div>
<?php
}
?>

<?php mysqli_close($conn); ?>