<title>Login</title>
<link rel = "stylesheet" type = "text/css" href = "styles.css" />
<?php include 'header.php' ?>
<style type="text/css">
      a:link, a:visited, #acan {
          text-align: center;
          text-decoration: none;
          display: inline-block;
      }
      a:hover, a:active, #acan {
          background-color: auto;
      }
</style>
<body>
<form action="LoginCode.php" method="post">
  <div class="container" style="text-align: center;">
    <div class="imgcontainer">
      <img src="login_avatar.jpg" alt="Avatar" class="avatar">
    </div>  
    <div class="form-group row">
      <label for="uname" class="col-sm-5 col-form-label-lg"><strong>Username</strong></label>
        <input type="text" class="form-control" placeholder="Enter Username" id="uname" name="uname" required>
    </div>
    <div class="form-group row">
      <label for="psw" class="col-sm-5 col-form-label-lg"><b>Password </b></label>
      <input type="password" class="form-control" placeholder="Enter Password" id="psw" name="psw" required>
    </div>
    <button type="submit" id="log" class="btn btn-md btn-success">Login</button>
    <button type="button" id="can" class=" btn btn-md btn-danger cancelbtn"><a id="acan" href="login.php">Cancel</a></button>
    <br>
    <br>
    <p>Create your account? <a href="register.php">Sign up.</a></p>
  </div>
</form>
</body>
</html>