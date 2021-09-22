<?php
session_start();
require_once "Database.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));
$sql = "SELECT email FROM users WHERE email ='" . $email . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($result) {
	echo "<script>alert('Username exists!')</script>";
	header("Refresh:0 , url = register.php");
	exit();
} else {
	    if ($_POST['name'] != null && $_POST['email'] != null && $_POST['password'] != null  && $_POST['cfpassword'] != null && $_POST['cfpassword'] == $_POST['password']) {
	    	$sql = "INSERT INTO users (name,email,password) VALUES ('" . trim($_POST['name']) . "','" . trim($_POST['email']) . "','" . trim(md5($_POST['password'])) ."')";
	    	if($conn-> query($sql)) {
	    		echo "<script>alert('Registration is complete!')</script>";
	    		header("Refresh:0 , url = login.php");
				exit();
			} else {
				echo"<script>alert('User not created!!')</script>";
				header("Refresh:0 , url = register.php");
				exit();
			}
		} else {
			echo "<script>alert('Invalid username or password')</script>";
			header("Refresh:0 , url = register.php");
			exit();
		}
		mysql_close($conn);
}
?>