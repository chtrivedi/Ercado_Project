<?php
	
	include("includes/configure.php"); 
	//mysql_set_charset('utf8');
	//query for insert data into tables

	
	@$EMAIL_ID = $_POST['username'];
	@$PASSWORD = $_POST['passwd'];
	
	@$FNAME = $_POST['fname'];
	@$LNAME = $_POST['lname'];
	@$PHONE = $_POST['phone'];
	@$ACTION = $_POST['action'];
	@$ID = $_POST['uid'];
	
	if ($ACTION == "personal")
	{
		$query = "update users set first_name = '$FNAME', last_name = '$LNAME', phone = '$PHONE' where oauth_uid = '$ID'";
		$query_run = mysql_query($query);       
		 
		if ($query_run)
		{
			echo 'It is working';
		}
		else
		{
			echo 'It is not working';
		}
	}

	else
	{
		$query = "update users set pwd = '".md5($PASSWORD)."' where email = '$EMAIL_ID'";
		$query_run = mysql_query($query);       
		 
		if ($query_run)
		{
			echo 'It is working';
		}
		else
		{
			echo 'It is not working';
		}
	}
	
?>