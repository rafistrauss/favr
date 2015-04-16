<?php
include "header.php";
$id = $_SESSION['loginid'];
$result = getUser($id, $db);
$result_completed = total_completed($id, $db);
$result_total = total_posted($id, $db);
$in_progress = in_progress($id, $db);
$active_favors = active_favors($id, $db);
$your_doing = your_doing($id,$db);
?>
<body style="">
	<div class="white_box">
		<table style="font-weight: bold;" class="favors_table">
			<h1 style="text-align: left;">Currently Doing</h1>
			<tr>
				<th>Name</th>
				<th>End Time</th>
				<th>Points</th>
			</tr>
			<?php foreach ($your_doing as $favor){ 
				?>
			<tr>
				<td><?php echo $favor['name'] ?></td>
				<td><?php echo $favor['end_time'] ?></td>
				<td><?php echo $favor['price'] ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="white_box">
		<h1 style="text-align: center;">
			<span class="left">My Points</span> <span class="right"><?php
			echo $result['points'];
			?> </span> <span style="clear: both;" class="left padding_top">Favors
				Completed</span> <span class="right padding_top"><?php echo $result_completed[0]; ?>
			</span> <span style="clear: both;" class="left padding_top">Favors
				Posted</span> <span class="right padding_top"><?php echo $result_total[0]; ?>
			</span>

		</h1>
	</div>
	<div class="white_box">
		<table style="font-weight: bold;" class="favors_table">
			<h1 style="text-align: left;">In-Progress</h1>
			<tr>
				<th>Name</th>
				<th>End Time</th>
				<th>Points</th>
			</tr>
			<?php foreach ($in_progress as $favor){ 
				?>
			<tr>
				<td><?php echo $favor['name'] ?></td>
				<td><?php echo $favor['end_time'] ?></td>
				<td><?php echo $favor['price'] ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="white_box">
		<table style="font-weight: bold;" class="favors_table">
			<h1 style="text-align: left;">Active</h1>
			<tr>
				<th>Name</th>
				<th>End Time</th>
				<th>Points</th>
			</tr>
			<?php foreach ($active_favors as $favor){ 
				?>
			<tr>
				<td><?php echo $favor['name'] ?></td>
				<td><?php echo $favor['end_time'] ?></td>
				<td><?php echo $favor['price'] ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
