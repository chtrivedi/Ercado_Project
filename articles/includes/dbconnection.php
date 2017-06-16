<?php
	
	$conn = mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
	if(!$conn) 
	{
		saveIntoErrorLog("dbconnection.php", "Database Connection", "mysql_connect()");
	}

	$selectDB = mysql_select_db(DB_DATABASE, $conn);
	if(!$selectDB) 
	{
		saveIntoErrorLog("dbconnection.php", "Database Selection", "mysql_select_db()");
	}
	
	/**	* Use this method to log the database errors.	*/				 
	function saveIntoErrorLog($fileName="", $methodName="", $sqlQuery="", $exception="")
	{
		$errorCode = mysql_errno();
		$errorText = mysql_error();

		$errorMessage = "File: ".$fileName.", Method/Function: ".$methodName.", Query: ".$sqlQuery.", Error: ".$errorCode."-".$errorText;
		
		if($exception != "")
			$errorMessage.= " Exception : ".$exception ;

		// timestamp for the error entry
		$errorMessage = "[".date("j-M-Y H:i:s (T)")."] ".$errorMessage."\r\n";

		// save to the error log
		error_log($errorMessage, 3, ERROR_LOG."ErrorLog".date("j-M-Y").".log");
	} 
?>