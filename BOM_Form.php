<?php
session_start();
require_once "Database.php";
?>
<title>BOM Master</title>
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
            body{background-color:hsla(0, 100%, 80%, 0.3);}

            #bpname {
              padding-left: auto;
              margin-top: 21px;
              margin-left: 100px;
              width: 300px;
            }

            #rmname {
              padding-left: auto;
              margin-top: 21px;
              margin-left: 100px;
              width: 300px;
            }

            #qty {
              padding-left: auto;
              margin-top: 21px;
              margin-left: 100px;
              width: 300px;
            }
  </style>
</head>
<body>
  <div class="container">
    <h1 id="main" style="text-align:center;">Bill of Materials</h1>
    <hr>
    <form action="BOM_Code.php" method="post">
    <div class="form-group row">
          <label for="bpname" class="col-sm-2 col-form-label"><strong>Product Name </strong></label>
          <div class="col-sm-10">
            <input type="text" placeholder="Enter Name" class= "form-control" name="bpname" id="bpname" required>
          </div>
    </div>
    <div class="form-group row">
        <label for="rmname" class="col-sm-2 col-form-label"><strong>Raw Material Name </strong></label>
        <div class="col-sm-10">
          <input type="text" placeholder="Raw Material Name" class= "form-control" name="rmname" id="rmname" >
        </div>
    </div>
    <div class="form-group row">
          <label for="qty" class="col-sm-2 col-form-label"><strong>Quantity</strong></label>
          <div class="col-sm-10">
            <input type="text" placeholder="Qty" class= "form-control" name="qty" id="qty" >
          </div>
    </div>
  </div>
    <div class="container">
      <div class="column">
          <input type="submit" id="btn2" name="add" class=" btn btn-md btn-success" value="Add">
          <input type="submit" id="btn3" name="view" class=" btn btn-md btn-warning " value="View">
          <input type="submit" id="btn3" name="delete" class=" btn btn-md btn-danger" value="Delete">
          <button type="submit" id="back" name="back" class=" btn btn-md btn-info"><a href="home.php">Back</a></button>
      </div>
    </div>
</form>

<?php include 'footer.php' ?>