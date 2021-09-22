<?php
    $host = "localhost";
    $user = "nehamr";
    $password = "123456";
    $dbname = "autojaq2";
    $conn = new mysqli($host , $user, $password, $dbname);
    mysqli_query($conn , "SET character_set_result=utf8");
   if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    } 
?>

<!-- <?php

// $conn = mysqli_connect("localhost","root","","autojaq2");

// if(!$conn)
// {
    // die("Connection failed: " . mysqli_connect_error());
// }

?> -->