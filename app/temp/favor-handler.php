<?php
/**
 * Created by PhpStorm.
 * User: Rafi
 * Date: 3/29/2015
 * Time: 3:33 PM
 */

include 'dbconnect.php';
include 'functions.php';

$categoryName = $_POST['category'];




$catID = $db->query("select id from category where name = '$categoryName'")->fetch(PDO::FETCH_ASSOC);
$categoryID = $catID['id'];

$favorName = $_POST['favor_name'];
$favorDescription = $_POST['description'];
$startLocation = $_POST['startlocation'];
$endLocation = $_POST['endlocation'];
$reward = $_POST['reward'];
$deadline = $_POST['deadline'];

$endTime = date('Y-m-d H:i:s', strtotime("+$deadline hours"));


$insert = "INSERT INTO favor (name, description, start_location, end_location, price, end_time, category_id)
values(:name, :description, :start_location, :end_location, :price, :end_time, :category_id);";
//$args = [$favorName, $favorDescription, $startLocation, $endLocation, $reward, $endTime];

$stmt = $db->prepare($insert);
if($stmt->execute(array(':name'=>$favorName, ':description'=>$favorDescription, ':start_location'=>$startLocation, ':end_location'=>$endLocation,
    ':price'=>$reward, ':end_time'=>$endTime, ':category_id'=>$categoryID))) {
//    echo "Success";

    $favorID = $db->lastInsertId();
    $userID = $_SESSION['loginid'];
    $db->query("INSERT INTO userfavorrel (user_id, favor_id) values($userID, $favorID)");

    header("Location: favorasked.php");
    exit;
}
else {
    echo 'Failed';
}



//var_dump(queryDB([$insert, $args]));
