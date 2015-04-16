<?php 
include "dbconnect.php";
include 'functions.php';

if(empty($_POST['first_name'])){
	echo "<p>No first name was entered.</p>";
	die();
}
if(empty($_POST['last_name'])){
	echo "<p>No last name was entered.</p>";
	die();
}
if(empty($_POST['email'])){
	echo "<p>No email was entered.</p>";
	die();
}
if(empty($_POST['password'])){
	echo "<p>No password was entered.</p>";
	die();
}
if(empty($_POST['confirm_password'])){
	echo "<p>No confirm password was entered.</p>";
	die();
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$points = 25;
if (!preg_match(
		"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
		$email))
{
	echo "<p>Email is not a valid format.</p>";
	die();
}

if($password != $confirm_password){
	echo "<p>Passwords do not match.</p>";
	die();
}

if(isset($_POST['confirm_password_update'])){
	$query = "update user set first_name = '$first_name', last_name = '$last_name',
	password = md5('$password'), email = '$email'";
}
else{
	$query = "insert into user (points, first_name, last_name, password, email)
	values ('$points', '$first_name', '$last_name', md5('$password'), '$email');";
}

$result = $db->query($query);
header('Location: home.php');
?>