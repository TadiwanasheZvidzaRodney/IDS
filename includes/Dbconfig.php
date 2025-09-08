<?php

$dbhost = 'localhost:8889';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'nutrinoz';

$con = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Could not connect: ' . mysql_error());
$selectDb  = mysqli_select_db($con, $dbname) or die ('Could not connect to database: ' . mysql_error());

?>