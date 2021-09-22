<?php
	session_start();
	$uname = $_SESSION['uname'];
?>

<!DOCTYPE html> 
<html> 
	
<head> 
	<title>Home Page</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript" async></script>
	<style type="text/css">
		 #acan{
			  color: #eb7734;
			  background-color: transparent;
			  text-decoration: none;
			}
		.button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #5e6160;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #727574;
        }

        #logout {
        	color: white;
        	text-align: center;
        	text-decoration: none;
        	display: inline-block;
        }

        a:hover, a:active,  #logout {
        	background-color: auto;
        }

        .pics {
        	/*width: 200px;*/
        	display: block;
        	margin-left: auto;
        	margin-right: auto;
        	width: 60%;
        }
	</style>
</head> 

<body id="home"> 
<div id="menu" class="container-fluid">
	<div id="landing-header" class="jumbotron jumbotron-fluid"  style="text-align:center; padding-bottom: 10px">
		<h6 style="text-align: left;">Logged in as : <?php echo $uname ?></h6>
		<img src=".\images\title.jpg" style="width: 25%;">
        <!-- <h5>Logged in as : <?php echo $uname ?></h5> -->

	<a name="" id="logout" class="button-logout btn-" href="logout.php" role="button">Log out</a>

 		<h1>Welcome to autoJaq!</h1>
 		<h4>Select your option</h4>
    </div>


    <div class="card-deck">
    <div class="card" style="width: 18rem;">
		  <a href="productadd.php"><img src=".\images\panel.jpg" class="card-img-top img-thumbnail pics" alt="..."></a>
		  <div class="card-body">
		    <h5 class="card-title" id="pdtt"><a href="productadd.php">Product</a></h5>
		    <p class="card-text">Create details of finished product and raw material.</p>
		    <!-- <a href="productadd.php" class="btn btn-primary">Product</a> -->
		  </div>
	</div>

	<div class="card" style="width: 18rem;">
		  <a href="bom_form.php"><img src=".\images\bom.jpg" class="card-img-top img-thumbnail pics" alt="..."></a>
		  <div class="card-body">
		    <h5 class="card-title"><a href="bom_form.php">BOM</a></h5>
		    <p class="card-text">Define raw materials and qty for required finished product .</p>
		  </div>
	</div>

	<div class="card" style="width: 18rem;">
		  <a href="jobissform.php"><img src=".\images\looms.jpg" class="card-img-top img-thumbnail pics" alt="..."></a>
		  <div class="card-body">
		    <h5 class="card-title"><a href="jobissform.php">Job Issue</a></h5>
		    <p class="card-text">Enter the product and qty to manufacture.</p>
		  </div>
	</div>

	<div class="card" style="width: 18rem;">
		  <a href="jobrecform.php"><img src=".\images\looms.jpg" class="card-img-top img-thumbnail pics" alt="..."></a>
		  <div class="card-body">
		    <h5 class="card-title"><a href="jobrecform.php">Job Receipt</a></h5>
		    <p class="card-text">Receive the finished product after manufacture.</p>
		  </div>
	</div>

	</div>
</div>

<?php include 'footer.php' ?>