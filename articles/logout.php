<?php
	session_start();
	ob_start();
	header("Cache-control: private");
	
	if(!isset($_SESSION['nschool']))
	{
		header("Location: index.php");
		exit();
	}

	unset($_SESSION['nschool']);
	unset($_SESSION['nlogin']);
	
	session_destroy();
	header("Location: index.php");
	exit();
?>