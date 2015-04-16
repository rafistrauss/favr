<?php
;
include "header.php";
require_once('dbconnect.php');
require_once("functions.php");

$id = $_SESSION['loginid'];
$query = "SELECT * from user where id = '$id'";
$result = $db->query($query);
$result = $result->fetch(PDO::FETCH_ASSOC);
?>
<form name="register-form" id="register-form" method="post"
	action="register-handler.php">
	<h1>Account Settings</h1>
	<fieldset>
		<label for="name">First Name:</label> <input
			value="<?php echo $result['first_name'] ?>" type="text"
			id="firstname" name="first_name"> <label for="name">Last Name:</label>
		<input type="text" id="lastname" name="last_name"
			value="<?php echo $result['last_name'] ?>"> <label for="mail">Email:</label>
		<input value="<?php echo $result['email'] ?>" type="email" id="email"
			name="email"> <label for="password">Password:</label> <input
			type="password" id="password" name="password"
			value="<?php echo $result['password'] ?>"> <label
			for="confirm_password">Confirm Password:</label> <input
			type="password" id="confirm_password" name="confirm_password"
			value="">
			
			<input style = "display:none;"
			type="password" id="confirm_password" name="confirm_password_update"
			value="update">
	</fieldset>
	<button type="submit">Save</button>
</form>
