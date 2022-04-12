<?php

$host = "localhost";
$user = "root";
$database = "test";
$password = "";

$conn = mysqli_connect($host,$user,$password,$database) or die("Connection Failed!");
error_reporting(0);
?>