<?php
/**
 * User: Rafi
 * Date: 3/29/2015
 * Time: 1:04 AM
 */

include 'dbconnect.php';

function queryDB($args) {
	global $db;

	$query = $args[0];
	$arguments = $args[1];

	$stmt = $db->prepare($query);

	$count = 1;
	foreach($arguments as $value) {
		$stmt->bindValue($count, $value);
		$count++;
	}



	$stmt->execute();
	var_dump($stmt);

	return $stmt->fetch(PDO::FETCH_ASSOC);


}


function insertStuff($description, $category, $start_location, $end_location, $price) {



	$queryStmt = "INSERT INTO favor (description, category_id, start_location, end_location, price)
			values(:description, :category_id, :start_location, :end_location, :price)";

	$args = [$description, $category, $start_location, $end_location, $price];
	$insert = queryDB([$queryStmt, $args ] );

	if($insert) {
		echo json_encode($insert);
	}
	else {
		echo noResults();
	}

}

function getCategories() {
	$categories =  queryDB(["SELECT * FROM category", null]);
	if($categories) {
		echo json_encode($categories);
	}
	else {
		echo noResults();

	}
}

function getFavor() {
	$favors = queryDB(["SELECT * FROM favor WHERE start_time > now() and end_time < now()"], null);
	if($favors) {
		echo json_encode($favors);
	}
	else {
		echo noResults();

	}
}

function noResults() {
	return json_encode(['message' => "empty"]);
}

function pp($content) {
	echo "<pre>" . print_r($content) . "</pre><br />";
}

function show_userbox()
{
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
	if($result_total){
		$result_total = $result_total->fetchAll(PDO::FETCH_ASSOC);
		return $result_total;
	}
	else{
		return;
	}
}
function active_favors($id, $db){
	$query = "select f.name, f.end_time, f.price from favor f join userfavorrel u
	on f.id = u.favor_id where f.in_progress = 0 and f.completed_by_user is null and
	f.end_time > now() and u.user_id = '$id';";
	$result_total = $db->query($query);
	if($result_total){
		$result_total = $result_total->fetchAll(PDO::FETCH_ASSOC);
		return $result_total;
	}
	else{
		return;
	}
}
function your_doing($id, $db){
	$query = "select f.name, f.end_time, f.price from favor f join userfavorrel u on
	f.id = u.favor_id
	where f.in_progress = 1 and f.completed_by_user is null and
	f.end_time > now() and u.doer_id = '$id';";
	$result_total = $db->query($query);
	if($result_total){
		$result_total = $result_total->fetchAll(PDO::FETCH_ASSOC);
		return $result_total;
	}
	else{
		return;
	}
}