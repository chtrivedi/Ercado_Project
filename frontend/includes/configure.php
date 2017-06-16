<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'ercadoarticles');

/*define('DB_SERVER', 'mysql1415.ixwebhosting.com');
define('DB_SERVER_USERNAME', 'AAAlh83_ercado');
define('DB_SERVER_PASSWORD', 'Ercado_123');
define('DB_DATABASE', 'AAAlh83_ercado');*/

define ("MAX_SIZE","5000");

define('SITE_URL', 'http://www.ercado.com/');
define('SITE_NAME', 'Ercado');

// Set folder constant
define('ROOT_DIR',  'C:/xampp/htdocs/ercado/');

// Set admin folder constant
@define('ADMIN_EMAIL',"chintan@ercado.com");

define('INCLUDE_DIR', ROOT_DIR.'includes/');
define('PDF_DIR', ROOT_DIR.'pdf/');
define('ERROR_LOG', ROOT_DIR.'errorlog/');
define('DOC_PATH', ROOT_DIR.'documents/');

//Image paths
define("ADMIN_IMAGES","assets/img/");
define("ROOT_IMAGES","assets/img/");
define("GALLERY_IMAGES","assets/img/gallery/");
define("NEWS_IMAGES","assets/img/news/");
 
// Set paging constant
define("RECORD_PER_PAGE", 10);

set_time_limit(180);

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
	
		/*
* parse_youtube_url() PHP function
* Author: takien
* URL: http://takien.com
*
* @param string $url URL to be parsed, eg:
* http://youtu.be/zc0s358b3Ys,
* http://www.youtube.com/embed/zc0s358b3Ys
* http://www.youtube.com/watch?v=zc0s358b3Ys
* @param string $return what to return
* - embed, return embed code
* - thumb, return URL to thumbnail image
* - hqthumb, return URL to high quality thumbnail image.
* @param string $width width of embeded video, default 560
* @param string $height height of embeded video, default 349
* @param string $rel whether embeded video to show related video after play or not.
 
*/
 
function parse_youtube_url($url,$return='embed',$width='',$height='',$rel=0)
{
    $urls = parse_url($url);
   
    //url is http://youtu.be/xxxx
    if($urls['host'] == 'youtu.be'){
        $id = ltrim($urls['path'],'/');
    }
    //url is http://www.youtube.com/embed/xxxx
    else if(strpos($urls['path'],'embed') == 1){
        $id = end(explode('/',$urls['path']));
    }
     //url is xxxx only
    else if(strpos($url,'/')===false){
        $id = $url;
    }
    //http://www.youtube.com/watch?feature=player_embedded&v=m-t4pcO99gI
    //url is http://www.youtube.com/watch?v=xxxx
    else{
        parse_str($urls['query']);
        $id = $v;
        if(!empty($feature)){
            $id = end(explode('v=',$urls['query']));
        }
    }
    //return embed iframe
    if($return == 'embed'){
        return '<iframe width="'.($width?$width:560).'" height="'.($height?$height:349).'" src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'" frameborder="0" allowfullscreen></iframe>';
    }
    //return normal thumb
    else if($return == 'thumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
    }
    //return hqthumb
    else if($return == 'hqthumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
    }
    // else return id
    else{
        return $id;
    }
}

function youtubeID($url)
{
 	 $res = explode("v=",$url);
	 if(isset($res[1])) {
	 	$res1 = explode('&',$res[1]);
		if(isset($res1[1])){
			$res[1] = $res1[0];
		}
		$res1 = explode('#',$res[1]);
		if(isset($res1[1])){
			$res[1] = $res1[0];
		}
	 }
	 return substr($res[1],0,12);
  	 return false;
 }
 
 function give_date_short($raw_date) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

    $year = (int)substr($raw_date, 0, 4);
    $month = (int)substr($raw_date, 5, 2);
    $day = (int)substr($raw_date, 8, 2);
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
    $second = (int)substr($raw_date, 17, 2);
	//echo $day." - ".$month." - ".$year;die;
    return date('d/m/Y', mktime($hour, $minute, $second, $month, $day, $year));
  }
	
	function give_date_short_mm($raw_date) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

    $year = substr($raw_date, 0, 4);
    $month = (int)substr($raw_date, 5, 2);
    $day = (int)substr($raw_date, 8, 2);
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
    $second = (int)substr($raw_date, 17, 2);

     return date('m/d/Y', mktime($hour, $minute, $second, $month, $day, $year));
  }
  
  function give_datetime_short($raw_datetime) {
    if ( ($raw_datetime == '0000-00-00 00:00:00') || ($raw_datetime == '') ) return false;

    $year = (int)substr($raw_datetime, 0, 4);
    $month = (int)substr($raw_datetime, 5, 2);
    $day = (int)substr($raw_datetime, 8, 2);
    $hour = (int)substr($raw_datetime, 11, 2);
    $minute = (int)substr($raw_datetime, 14, 2);
    $second = (int)substr($raw_datetime, 17, 2);

    return strftime('%m/%d/%Y %H:%M:%S',mktime($hour, $minute, $second, $month, $day, $year));
  }

  function insert_date($date) {	//for format - mm/dd/yy
    if ( ($date == '0000-00-00 00:00:00') || ($date == '') ) return false;

	//echo $date;
	$tmp = explode("/",$date); // mm/dd/yy
	//print_r($tmp);
    
	//$year = substr($date, 4, 10);
	$year = (int)$tmp[2];
    //$month = (int)substr($date, 0, 2);
	$month = (int)$tmp[0];
    //$day = (int)substr($date, 2, 5);
	$day = (int)$tmp[1];
	
    $hour = (int)substr($date, 11, 2);
    $minute = (int)substr($date, 14, 2);
    $second = (int)substr($date, 17, 2);

    return date('Y-m-d H:i:s', mktime($hour, $minute, $second, $month, $day, $year));
  }
  
  function insert_date_ddmmyy($date) {	//for format - dd/mm/yy
    if ( ($date == '0000-00-00 00:00:00') || ($date == '') ) return false;

	//echo $date;
	$tmp = explode("/",$date); // dd/mm/yy
	//print_r($tmp);
    
	//$year = substr($date, 4, 10);
	$year = (int)$tmp[2];
    //$month = (int)substr($date, 0, 2);
	$month = (int)$tmp[1];
    //$day = (int)substr($date, 2, 5);
	$day = (int)$tmp[0];
	
    $hour = (int)substr($date, 11, 2);
    $minute = (int)substr($date, 14, 2);
    $second = (int)substr($date, 17, 2);

    return date('Y-m-d H:i:s', mktime($hour, $minute, $second, $month, $day, $year));
  }
  
  function getExtension($str) {

         $i = strrpos($str,".");
		 //echo $i;
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
function curPageURL() 
{
	$pageURL = 'http';
	/*if ($_SERVER["HTTPS"] == "on") 
	{
		$pageURL .= "s";
	}*/
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} 
	else 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function recordsCount($tblName)
{
	$sqlCnt = "select count(*) from $tblName";
	$resCnt = mysql_query($sqlCnt) or die(mysql_error());
	$arrCnt = mysql_fetch_array($resCnt);
	
	return $arrCnt[0];
}

function selectRecordsWhere($tblName, $whr)
{
	$sqlCnt = "SELECT * FROM $tblName WHERE $whr";
	//echo $sqlCnt; die;
	$resCnt = mysql_query($sqlCnt) or die(mysql_error());
	return $resCnt;
}

function selectAllRecords($tblName)
{
	$sqlCnt = "select * from $tblName";
	$resCnt = mysql_query($sqlCnt) or die(mysql_error());
	return $resCnt;
}
function totalNumRows($res)
{
	$numRows = mysql_num_rows($res);
	return $numRows;
}

function recFetch($res)
{
	$recfetch = mysql_fetch_array($res);
	return $recfetch;
}

function getKeywords($colname)
{
	$reskey = selectAllRecords("keywords where colname = '$colname'");
	$arrkey=mysql_fetch_array($reskey);
			
	@$pagetitle = $arrkey['titletag'];
	@$keywordtag = $arrkey['keywordtag'];
	@$descrtag = $arrkey['descrtag'];
	@$alttag = $arrkey['alttag'];
	
	define('PAGETITLE', $pagetitle);
	define('METAKEYWORDS', $keywordtag);
	define('METADESCR', $descrtag);
	define('ALTTAG', $alttag);
}

function findage($dob)
{
	$localtime = getdate();
	$today = $localtime['mday']."/".$localtime['mon']."/".$localtime['year'];
	$dob_a = explode("/", $dob);
	$today_a = explode("/", $today);
	$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
	$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
	$years = $today_y - $dob_y;
	$months = $today_m - $dob_m;
	if ($today_m.$today_d < $dob_m.$dob_d) 
	{
		$years--;
		$months = 12 + $today_m - $dob_m;
	}

	if ($today_d < $dob_d) 
	{
		$months--;
	}

	$firstMonths=array(1,3,5,7,8,10,12);
	$secondMonths=array(4,6,9,11);
	$thirdMonths=array(2);

	if($today_m - $dob_m == 1) 
	{
		if(in_array($dob_m, $firstMonths)) 
		{
			array_push($firstMonths, 0);
		}
		elseif(in_array($dob_m, $secondMonths)) 
		{
			array_push($secondMonths, 0);
		}elseif(in_array($dob_m, $thirdMonths)) 
		{
			array_push($thirdMonths, 0);
		}
	}
	echo "<br><strong> ( $years years $months months.)</strong>";
}


?>
