<?php
/**
 * Created by PhpStorm.
 * User: Rafi
 * Date: 3/29/2015
 * Time: 8:02 AM
 */

include "functions.php";

$type = $_POST['resourceType'];

switch ($type) {
    case 'FAVOR':
        if(isset($_REQUEST['categoryName'])) {
            getFavorsByField($_REQUEST['categoryName'], true);
            break;
        }
        else {
            getFavors();
            break;

        }
    case 'CATEGORY':
        getCategories();
        break;
    default:
        break;
}