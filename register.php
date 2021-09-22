<title>Register</title>
<link rel = "stylesheet" type = "text/css" href = "styles.css" />
<?php include 'header.php' ?>
<style type="text/css">
    .container {
            text-align: center;
            padding: 30px;
    }
</style>
<body>
<form action="signup.php" method="post">
  <div class="container">
    <h1 id="head">Register</h1>
    <p id="head">Please fill in this form to create an account.</p>
    <hr>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label"><b>Name</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-sm" placeholder="Enter Name" name="name" id="name" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-sm" placeholder="Enter Email" name="email" id="email" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
      <div class="col-sm-10">
        <input type="password" class="form-control input-sm" placeholder="Enter Password" name="password" id="password" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="cfpassword" class="col-sm-2 col-form-label"><b>Confirm Password</b></label>
      <div class="col-sm-10">
        <input type="password" class="form-control input-sm" placeholder="Repeat Password" name="cfpassword" id="cfpassword" required>
      </div>
    </div>
    <button type="submit" id="regbtn" class="btn btn-sm btn-primary rounded-pill"> <a class="reg" id="linkreg" href="signup.php">Register</a></button>
  </div>

  <div class="container-fluid" style="text-align:center;">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
<?php include 'footer.php' ?>