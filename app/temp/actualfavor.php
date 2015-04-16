<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up Form</title>
<link href='http://fonts.googleapis.com/css?family=Nunito:400,300'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include "header.php";
	$favor = $_GET["favor"];
	?>
	<form name="favor-form" id="favor-form" method="post"
		action="favor-handler.php">
		
		<h1><?= $favor ?> Favor</h1>
		<fieldset>
			<label for="name">Name of Favor:</label> <input type="text" id="favorname" name="favor_name"> 
			<label for="name">Description:</label><input type="text" id="description" name="description">
			<label for="location">Start Location:</label><input type="text" id="startlocation" name="startlocation">
			<label for="location">End Location:</label>	<input type="text" id="endlocation" name="endlocation">
			<label for="reward">Reward:</label> <input type="number" id="reward" name="reward">
			<label for="deadline">Deadline:</label> <input type="number" id="deadline" name="deadline">
            <input type="hidden" name="category" value="<?=$favor ?>" />
		</fieldset>
		<button type="submit">Submit</button>
		<a href="postcategories.php">
			<input type="button" id="cancel_button" tabindex="" accesskey="l" name="post_button" value="Cancel"></button>
		</a> 
	</form>
</body>
