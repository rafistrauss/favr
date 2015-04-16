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

insertStuff('Tnis is a test description', 1, 'Nowhere', 'somewhere', 5);