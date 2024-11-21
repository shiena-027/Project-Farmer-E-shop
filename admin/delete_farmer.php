<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM farmer WHERE f_id = '".$_GET['f_del']."'");
header("location:all_farmer.php");  

?>
