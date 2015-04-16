<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up Form</title>
<link href='http://fonts.googleapis.com/css?family=Nunito:400,300'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include "header.php";
	?>
	<form name="register-form" id="register-form" method="post"
		action="register-handler.php">
		<h1>Sign Up</h1>
		<fieldset>
			<label for="name">First Name:</label> <input type="text"
				id="firstname" name="first_name"> <label for="name">Last Name:</label>
			<input type="text" id="lastname" name="last_name"> <label for="mail">Email:</label>
			<input type="email" id="email" name="email"> <label for="password">Password:</label>
			<input type="password" id="password" name="password"> <label
				for="confirm_password">Confirm Password:</label> <input
				type="password" id="confirm_password" name="confirm_password">
		</fieldset>
		<button type="submit">Sign Up</button>
	</form>
</body>
