<?php include 'header.php' ?>
    <title>Add Product details</title>
    <style type="text/css">
            a:link, a:visited, #view, #back {
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }
            a:hover, a:active, #view, #back {
                background-color: auto;
            }

            body{background-color:hsla(120,60%,70%,0.3);}
    </style> 
</head>
<body>
    <div class="container">
    <h2 style="text-align:center;">Add a product</h2>
        <form action="productcode.php" method="post">
            <div class="form-group row"> 
                <label for="Pname" class="col-sm-2 col-form-label-md"><strong>Product Name</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-group" id="Pname" name="Pname" value="<?php echo isset($Pname) ? $Pname : ''; ?>">
                     <!-- required > -->
                </div>
            </div>
            <div class="form-group row">
                <label for="opqty" class="col-sm-2 col-form-label-md"><strong>Opening Quantity</strong></label>
                <div class="col-sm-10">
                    <input type="number" class="form-group" id="opqty" name="opqty" min="0" value="<?php echo isset($opqty) ? $opqty : '0'; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cost" class="col-sm-2 col-form-label-md"><strong>Cost</strong></label>
                <div class="col-sm-10">
                    <input type="number" class="form-group" id="cost" name="cost" min="0" value="<?php echo isset($cost) ? $cost : '0'; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mrp" class="col-sm-2 col-form-label-md"><strong>MRP</strong></label>
                <div class="col-sm-10">
                    <input type="number" class="form-group" id="mrp" name="mrp" min="0" value="<?php echo isset($mrp) ? $mrp : '0'; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="curqty" class="col-sm-2 col-form-label-md"><strong>Current Quantity</strong></label>
                <div class="col-sm-10">
                    <input type="number" class="form-group" id="curqty" name="curqty" min="0" value="<?php echo isset($curqty) ? $curqty : '0'; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit" class="col-sm-2 col-form-label-md"><strong>Unit</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-group" id="unit" name="unit" value="<?php echo isset($unit) ? $unit : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gst_tax" class="col-sm-2 col-form-label-md"><strong>GST Tax %</strong></label>
                <div class="col-sm-10">
                    <input type="number" class="form-group" id="gst_tax" name="gst_tax" min="0" value="<?php echo isset($gst_tax) ? $gst_tax : '18'; ?>">
                </div>
            </div>
            <div class="column">
                <input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit">
                <input type="submit" id="view" name="view" class="btn btn-info" value="Report">
                <input type="submit" id="status" name="status" class="btn btn-warning" value="Status">
                <button type="submit" name="back" class="btn btn-secondary" value="Back"><a id="back" href="Home.php">Back</a></button>
            </div>
        </form>
    </div>
<?php include 'footer.php' ?>