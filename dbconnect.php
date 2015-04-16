<?php
/**
 * Created by PhpStorm.
 * User: Rafi
 * Date: 3/29/2015
 * Time: 1:08 AM
 */

#/*
 error_reporting(1);
 $hostname = 'db570858525.db.1and1.com';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
 $dbname   = 'db570858525';       // Your database name.
 $username = 'dbo570858525';             // Your database username.
 $password = 'hack4all';                 // Your database password. If your database has no password, leave it empty.
#*/

/*
error_reporting(1);
$hostname = 'localhost';
$dbname = 'hack';
$username = 'root';
$password = '';

#*/





$db = new PDO("mysql:dbname=$dbname;host=$hostname", "$username", "$password");

session_start();