
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up Form</title>
<link href='http://fonts.googleapis.com/css?family=Nunito:400,300'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include "header.php"; ?>
	<div class="outer_box">
		<form name="login-form" id="login-form" method="post"
			action="<?php echo $_SERVER['PHP_SELF'] ; ?>">
			<h1>Log In</h1>
			<fieldset>
				<label title="Username">Email: <input tabindex="1" accesskey="u"
					name="email" type="email" id="email" />
				</label> <label title="Password">Password: <input tabindex="2"
					accesskey="p" name="password" type="password" maxlength="15"
					id="password" />
				</label>
			</fieldset>
			<label title="Submit">
				<button tabindex="3" accesskey="l" type="submit" name="cmdlogin"
					value="Login">Login</button>
			</label>
		</form>
	</div>
</body>

