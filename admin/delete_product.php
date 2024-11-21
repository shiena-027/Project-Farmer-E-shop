<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM products WHERE p_id = '".$_GET['product_del']."'");
header("location:all_product.php");  

?>
