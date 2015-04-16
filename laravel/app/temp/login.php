<?php

require_once('dbconnect.php');
require_once("functions.php");
session_start();


if (!isset($_SESSION['loginid']) || !isset($_SESSION['email']))
{
	// user is not logged in.
	if (isset($_POST['cmdlogin']))
	{
		$email = strip_tags($_POST['email']);
		$p = md5(strip_tags($_POST['password']));
		$query = "SELECT * FROM user WHERE email = '$email' AND password = '$p' LIMIT 1;";
		$result = $db->query($query);
		if ($result->rowCount() != 1)
		{
			// invalid login information
			echo "Wrong username or password!";
			//show the loginform again.
			include "loginform.php";
		} else {
			// Login was successfull
			$row = $result->fetch(PDO::FETCH_ASSOC);
			// Save the user ID for use later
			$_SESSION['loginid'] = $row['id'];
			show_userbox();
		}
	} else {
		// User is not logged in and has not pressed the login button
		// so we show him the loginform
		include "loginform.php";
	}

} else {

	// The user is already loggedin, so we show the userbox.
	show_userbox();
}
?>