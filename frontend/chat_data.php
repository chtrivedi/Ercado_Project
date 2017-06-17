<?php
ob_start();
	session_start();
	header("Cache-control: private");
	require("includes/configure.php");
	
	//if(!isset($_SESSION['nschool']))
	//{
		//header("Location: index.php");
		//exit();
	//}
	//$process= $_GET['process'];
	//echo $process;

	$user= $_SESSION['user_name'];
	if($user==''){$user="Guest";}
	
		
	$user_id=$_SESSION['user_id'];
	if($user_id==''){$user_id="1001";}
	$message= $_POST['sendMsg1'];
	$date_time=date('Y-m-d H:m:s');
	
	$query=mysql_query("INSERT INTO `chat`(`user_id`,`user_name`,`message`,`msg_time`) VALUES ('$user_id','$user','$message','$date_time')");
	
	
?>