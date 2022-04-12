<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['uid']);
header("location:login.php");

?>