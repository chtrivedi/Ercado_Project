<?php

ob_start();
session_start();
header("Cache-control: private");
require("includes/configure.php");
$delivery_type=$_POST['delivery'];
//$temp=$_POST['temp'];
$user_id=$_SESSION['user_id'];
$unit=$_POST['unit'];
$prod_id=$_POST['prod_id'];
$query=mysql_query("INSERT INTO `transection`(`user_id`, `product_id`, `unit`,`delivery_type`,`status`) VALUES ('$user_id','$prod_id','$unit','$delivery_type','cart added')");

?>
