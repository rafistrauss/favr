<?php

function show_userbox()
{   // retrieve the session information
	$email = $_SESSION['email'];
	$uid = $_SESSION['loginid'];
	// display the user box
	$link = "home.php";
	header("Location: $link");
}
function getUser($id, $db){
	$query = "SELECT * from user where id = '$id'";
	$result = $db->query($query);
	$result = $result->fetch(PDO::FETCH_ASSOC);
	return $result;
}

function total_completed($id, $db){
$query = "select count(*) from favor f join userfavorrel u
on f.id = u.favor_id where f.completed_by_user = '$id';";
$result_completed = $db->query($query);
$result_completed = $result_completed->fetch(PDO::FETCH_NUM);
return $result_completed;
}

function total_posted($id, $db){
	$query = "select count(*) from favor f join userfavorrel u
		on f.id = u.favor_id where u.user_id = '$id'";
	$result_total = $db->query($query);
	$result_total = $result_total->fetch(PDO::FETCH_NUM);
	return $result_total;
}
function in_progress($id, $db){
	$query = "select f.name, f.end_time, f.price from favor f join userfavorrel u
on f.id = u.favor_id where in_progress = 1 and u.user_id = '$id';";
	$result_total = $db->query($query);
	$result_total = $result_total->fetchAll(PDO::FETCH_ASSOC);
	return $result_total;
}

?>