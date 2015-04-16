<?php 
include "header.php";
?>
<div id="background_main">

		<?php 

        $fieldName = "Printing";

		$favors = getFavorsByField($fieldName, false);
		

		
		foreach($favors as $favor) { ?>
				
	<div class="outer_box"
		style="height: 222px; margin-top: 50px; position: relative">
		<h1>Username of Requester: <?=$favor['first_name'] . " " . $favor['last_name'] ?> </h1> 
		<h2>Title of Favor: <?=$favor['name']?></h2>
		<h2>Description: <?=$favor['description']?></h2>
		<h2>Start Location: <?=$favor['start_location']?></h2>
		<h2>End Location: <?=$favor['end_location']?></h2>
		<h2>End Time: <?=$favor['end_time']?></h2>		
		
		<a href=".php">
			<button id="other_button" tabindex="" accesskey="l" name="post_button" value="other">Respond To Request</button>
		</a> 
		<?php } ?>
	
	</div>
	

</div>
