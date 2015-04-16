<?php
session_start();
//require_once('functions.php');
?>
<!DOCTYPE html>
<html>

<head>
    <META NAME="author" CONTENT="Avi, Persin, avip2@msn.com">
    <link rel="stylesheet" href="styles/forms.css">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700'
          rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="scripts/function.js"></script>
</head>
<?php if(isset($_SESSION['loginid'])) {
?>
<div style="float: right; color: #222; margin-right: 2%; padding: 1%;">
    <a href="logout.php">Logout</a>
</div>
<?php
}
?>
<div style="width:15%;padding:1%">
    <img style="width:100%" src="images/logo2.jpg">
</div>

@yield('content')