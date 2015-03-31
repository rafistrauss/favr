<?php
include "header.php";

$result = getUser($_SESSION['loginid'], $db);

?>
<div id="background_main">
	<div class="outer_box"
		style="height: 222px; margin-top: 50px; position: relative">
		<h1 style="margin-bottom: 0px;">
			Welcome,
			<?php echo $result['first_name'];?>!
		</h1>
		<h5 style="text-align: center;">
			You have
			<?php echo $result['points']; ?>
			points
		</h5>
		<a href="newfavor.php"><button id="register_button" tabindex=""
				accesskey="l" name="register_button" value="Login">New Favor</button>
		</a> <a href="my_favors.php">
			<button id="login_button" tabindex="" accesskey="l"
				name="login_button" value="Login">My Favors</button>
		</a> <a href="account.php">
			<button id="login_button" tabindex="" accesskey="l"
				name="login_button" value="Login">My Account</button>
		</a>

	</div>
</div>
