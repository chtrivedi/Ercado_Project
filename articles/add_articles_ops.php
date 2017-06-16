<?php
	ob_start();
	session_start();
	header("Cache-control: private");
	require("includes/configure.php");
	
	if(!isset($_SESSION['nschool']))
	{
		header("Location: index.php");
		exit();
	}
	
	@$pagetext = $_POST['pagetext'];
	@$name = $_REQUEST['name'];
	@$sdescr = $_REQUEST['sdescr'];
	
	//@$pagetitle = $_REQUEST['pagetitle'];
	@$titletag = $_REQUEST['titletag'];
	@$metakeyword = $_REQUEST['metakeyword'];
	@$metadescr = $_REQUEST['metadescr'];
	@$alttag = $_REQUEST['alttag'];
	
	@$publish = $_REQUEST['publish'];
	@$ishome = $_REQUEST['ishome'];
	//@$issidebar = $_REQUEST['issidebar'];
	
	//@$editors = $_REQUEST['editors'];
	
	if($publish == "on")	$publish = 1;	else	$publish = 0;
	if($ishome == "on")	$ishome = 1;	else	$ishome = 0;
	//if($issidebar == "on")	$issidebar = 1;	else	$issidebar = 0;
	
	@$dt_add = $_REQUEST['datetimepicker1'];
	@$newsid=(int)$_REQUEST['newsid'];
	@$process=$_REQUEST['process'];
	$dt_add = insert_date($dt_add);
	//$dt_modi = insert_date(date('m/d/Y'));
	//echo $dt_add; die;
	//echo "chintan : ".$_FILES['upload']['name'];die;
	
	if(isset($process) && $process == "new")
	{
		$resmax = mysql_query("select max(news_id) from news") or die(mysql_error());
		$arrmax = mysql_fetch_array($resmax);
		$imgid = $arrmax[0] + 1;
		
		$image = $_FILES["upload"]["name"];
		$uploadedfile = $_FILES['upload']['tmp_name'];
		
		$filename = stripslashes($_FILES['upload']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		echo "EXT = ".$extension ;
		
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
		{
			echo ' Unknown Image extension ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['upload']['tmp_name']);
		
			if ($size > MAX_SIZE*1024)
			{
				 echo "You have exceeded the size limit";
				 $errors=1;
			}
			 
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['upload']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['upload']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
				$src = imagecreatefromgif($uploadedfile);
			}
		
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=$width;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			
			$newheight1=150;
			$newwidth1=($width/$height)*$newheight1;
			$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
				
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
			imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, $width,$height);

			$filename = "images/articles/blog_".$imgid.".".$extension;
			$filename1 = "images/articles/blog_thumb_".$imgid.".".$extension;
			
			imagejpeg($tmp,$filename,100);
			imagejpeg($tmp1,$filename1,100);
			
			imagedestroy($src);
			imagedestroy($tmp);
			imagedestroy($tmp1);
		}
				
		$sql = "insert into news values ('','$name', '$sdescr', '$pagetext', '$dt_add', $publish, $ishome, '$filename', '$filename1', '$titletag', '$metakeyword', '$metadescr', '$alttag')";
		//echo $sql;die;
		$res = mysql_query($sql) or die(mysql_error());
		header("Location: add_articles.php?mode=success");
		exit();
	}
	
	if(isset($process) && $process=="edit")
	{
		$tmp_res1 = mysql_query("select * from news where news_id = ".$newsid) or mysql_error();
		$arrr = mysql_fetch_array($tmp_res1);
		$imgid = $arrr['news_id'];

		if($_FILES['upload']['name'] == "")
		{
			$filename = $arrr['image_path'];
			$filename1 = $arrr['image_thumb_path'];
		}
		else
		{
			$image =$_FILES["upload"]["name"];
			$uploadedfile = $_FILES['upload']['tmp_name'];
			
			$filename = stripslashes($_FILES['upload']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			$size=filesize($_FILES['upload']['tmp_name']);
		
			if ($size > MAX_SIZE*1024)
			{
				 echo "You have exceeded the size limit";
				 $errors=1;
			}
			 
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['upload']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['upload']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
				$src = imagecreatefromgif($uploadedfile);
			}
		
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=$width;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			
			$newheight1=150;
			$newwidth1=($width/$height)*$newheight1;
			$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
				
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
			imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, $width,$height);
			
			$filename = "images/articles/blog_".$imgid.".".$extension;
			$filename1 = "images/articles/blog_thumb_".$imgid.".".$extension;
			
			imagejpeg($tmp,$filename,100);
			imagejpeg($tmp1,$filename1,100);
			
			imagedestroy($src);
			imagedestroy($tmp);
			imagedestroy($tmp1);
		}

		$sql = "update news set title='$name', descr='$sdescr', news_txt='$pagetext', date_added='$dt_add', status = $publish, ishome = $ishome, image_path='$filename', image_thumb_path='$filename1', titletag = '$titletag', keywordtag = '$metakeyword', descrtag = '$metadescr', alttag = '$alttag' where news_id=".$newsid;
		//echo $sql; die;
		$res=mysql_query($sql) or die(mysql_error());
		
		header("Location: articles_edit.php?mode=success&newsid=".$newsid);
		exit();
	}
	
	if(isset($process) && $process=="delete")
	{
		if($newsid == "0")
		{
			$sql = "delete from news";
		}
		else
		{			
			$sql = "delete from news where news_id = $newsid";
		}
		//echo $sql; die;
		$res = mysql_query($sql) or die(mysql_error());
		header("Location: articles.php?mode=deleted");
		exit();
	}
?>