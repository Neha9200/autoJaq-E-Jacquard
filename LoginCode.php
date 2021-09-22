<?php
    if(trim($_POST['uname'])== null|| trim($_POST['psw']) == null){
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url =  login.php");
        exit();

    }
    else{
         require_once "database.php";
         $uname = mysqli_real_escape_string($conn,$_POST['uname']);
         $psw = mysqli_real_escape_string($conn,md5($_POST['psw']));

         $sql = "SELECT name,password FROM users WHERE name ='". $uname ."' and password = '".$psw."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query);

         if(!$result) {
             echo "<script>alert('Username or Password , Invalid.')</script>";
             header("Refresh:0 , url = login.php");
             exit();

         }
         else{
             session_start();
             $_SESSION['uname'] = $result['name'];
             header("Location: Home.php");
             session_write_close();
         }
    }
    mysqli_close($conn);
?>