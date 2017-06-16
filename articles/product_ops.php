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
	$process= $_GET['process'];
	//echo $process;
function img_upload($i)
{
	
	$imgid='';
	 	if($_GET['process']=='tab1')
		{
			$imgid=$_REQUEST['tab1_id'];
		}
		if($_GET['process']=='add')
		{
			$res_id=mysql_query("select max(product_id) from product");
			$arr=mysql_fetch_array($res_id);
			$imgid= $arr[0]+1;
		}
		//echo $_FILES['pro_img']['name'][1];
		
		
		$image = $_FILES['img']['name'][$i];
		//echo $image;
		$uploadedfile = $_FILES['img']['tmp_name'][$i];
		
		$filename = stripslashes($_FILES['img']['name'][$i]);
		$extension = getExtension($image);
		$extension = strtolower($extension);
		//echo "EXT = ".$extension ;
		
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") && ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF")) 
		{
			//echo 'Unknown Image extension ';
			$errors=1;
		}
		else
		{
			$size=filesize($uploadedfile);
		
			if ($size > MAX_SIZE*1024)
			{
				 //echo "You have exceeded the size limit";
				 $errors=1;
			}
			 
			if($extension=="jpg" || $extension=="jpeg" || $extension=="JPG" || $extension=="JPEG")
			{
				$uploadedfile = $uploadedfile;
				$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png" || $extension=="PNG")
			{
				$uploadedfile = $uploadedfile;
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

			$filename = "product_".$imgid."_".$i.".".$extension;
			$filename1 = "thumb_product_".$imgid."_".$i.".".$extension;
			
			imagejpeg($tmp,'images/products/'.$filename,100);
			imagejpeg($tmp1,'images/products/'.$filename1,100);
			
			imagedestroy($src);
			imagedestroy($tmp);
			imagedestroy($tmp1);
			return $filename;
			
		}
		
}
function question_add($pro_id,$pro_que)
{
	$date_time=date('Y-m-d H:m:s');
	$pro_que=addslashes($pro_que);
	$add_question=mysql_query("INSERT INTO `questions`(`product_id`,`q_value`,`q_date`) VALUES ('$pro_id','$pro_que','$date_time')") or die(mysql_error());
	
}
function answer_add($que_id,$prod_id,$ans_val)
{
	$date_time=date('Y-m-d H:m:s');
	$ans_val=addslashes($ans_val);
	$add_question=mysql_query("INSERT INTO `answers`(`q_id`,`product_id`, `ans_value`,`ans_date`) VALUES ('$que_id','$prod_id','$ans_val','$date_time')");

}
function question_update($q_id,$pro_que)
{
	//echo $q_id;
	//echo $pro_que;
	$date_time=date('Y-m-d H:m:s');
	$pro_que=addslashes($pro_que);
	$up_question=mysql_query("UPDATE `questions` SET `q_value`='$pro_que',`q_date`='$date_time' WHERE `q_id`='$q_id'");
	
}
function answer_update($q_id,$ans_val)
{
	$date_time=date('Y-m-d H:m:s');
	$ans_val=addslashes($ans_val);
	$up_answer=mysql_query("UPDATE `answers` SET `ans_value`='$ans_val',`ans_date`='$date_time' WHERE `q_id`='$q_id'");
}
	
	@$pro_name = $_REQUEST['name'];
	@$pro_upc=$_REQUEST['upc'];
	@$pro_descr= $_POST['descr'];
	@$pro_price=$_REQUEST['price'];
	@$keywords=$_REQUEST['keywords'];
	@$ingredients=$_REQUEST['ingredients'];
	@$howtouse=$_REQUEST['howtouse'];
	
	@$question[]=$_REQUEST['que'];
	@$answer[]=$_REQUEST['ans'];
	@$titletag = $_REQUEST['titletag'];
	@$metakeyword = $_REQUEST['metakeyword'];
	@$metadescr = $_REQUEST['metadescr'];
	@$alttag = $_REQUEST['alttag'];
	
	
	
	$queCount = count($_POST["que"]);
	$ansCount = count($_POST["ans"]);
	//echo $itemCount;
	//echo $pro_descr;
	
	if($process=="add")
	{
		@$pro_image1 = $_FILES['img']['name'];
		@$image=implode($pro_image1);
			if($image!='')
			{
				$i=0;
				$image_path='';
				$image_thumb_path='';
				foreach($pro_image1 as $img)
				{
					$s=img_upload($i);
					$image_path=$image_path.$s.',';
					$image_thumb_path=$image_thumb_path.'thumb_'.$s.',';
					$i++;
				}
			}
		//echo $image_path;
		//echo $image_thumb_path;
		//echo $pro_descr;
		?>
     
        <?php
		$add_product="INSERT INTO `product`(`name`, `upc`, `pro_descr`, `keywords`, `ingredients`, `howtouse`, `image_path`, `image_thumb_path`, `price`, `titletag`, `keywordtag`, `descrtag`, `alttag`) VALUES ('$pro_name','$pro_upc','$pro_descr','$keywords','$ingredients','$howtouse','$image_path','$image_thumb_path','$pro_price','$titletag','$metakeyword','$metadescr','$alttag')";
		
		$res = mysql_query($add_product) or die(mysql_error());
		
		
		
		$get_latest_pro_id=mysql_query("select max(product_id) from product");
		$arr1=mysql_fetch_array($get_latest_pro_id);
		
		$pro_id=$arr1[0];
		for($i=0;$i<=$queCount;$i++)
		{
			$q_value=$_POST["que"][$i];
			//echo $q_value;
			$q_value=addslashes($q_value);
			if($q_value!='')
			{
				$date_time=date('Y-m-d H:m:s');
				$insque=mysql_query("insert into questions(product_id,q_value,q_date) values('$pro_id','$q_value','$date_time')");
				$get_question=mysql_query("select max(q_id) from questions where product_id='$pro_id'");
				$resquestion=mysql_fetch_array($get_question);
				$ans_value=$_POST["ans"][$i];
				$ans_value=addslashes($ans_value);
				$q=$resquestion[0];
				$get_ans=mysql_query("insert into answers(product_id,q_id,ans_value,ans_date) values('$pro_id','$q','$ans_value','$date_time')");
			}
			
		}
		//echo 'hhhhhh'.$pro_id;
		//exit();
		header("Location:product_edit.php?prodid=$pro_id&mode=success");
	}
	if($process=="tab1")
	{
		$pro_image1=$_FILES['img']['name'];
		$pro_id=$_REQUEST['tab1_id'];
		
		@$image=implode($pro_image1);
			if($image!='')
			{
				$i=0;
				$image_path='';
				$image_thumb_path='';
				foreach($pro_image1 as $img)
				{ $s=img_upload($i);
					$image_path=$image_path.$s.',';
					$image_thumb_path=$image_thumb_path.'thumb_'.$s.',';
					$i++;
				}
			}
		
		//echo 'image path--->>'.$image_path;
		$query=mysql_query("update product set name='$pro_name',upc='$pro_upc',price='$pro_price', pro_descr='$pro_descr' where product_id='$pro_id'");
		if($image_path!='')
		{
		$query_image=mysql_query("update product set image_path='$image_path', image_thumb_path='$image_thumb_path' where product_id='$pro_id'");
		}
		header("location:product_edit.php?prodid=$pro_id&mode=updated");
		
	}
	if($process=="tab2")
	{
		//echo $process;
		$pro_id=$_REQUEST['tab2_id'];
		//echo $pro_id;
		$query="UPDATE `product` SET `keywords`='$keywords',`ingredients`='$ingredients',`howtouse`='$howtouse' WHERE `product_id`='$pro_id'";
		$res=mysql_query($query) or die(mysql_error());
		
		//header("Location:product_edit1.php?prodid=$pro_id");
	}
	if($process=="tab3")
	{
		$prod_id=$_REQUEST['tab3_id'];
		//echo $prod_id;
		$old_que_count=count($_POST['que_old']);
		$old_ans_count=count($_POST['ans_old']);
		
		$get_qid=mysql_query("select q_id from questions where product_id='$prod_id'");
		$i=0;
		$q[]='';
		while($resqid=mysql_fetch_array($get_qid))
		{ 
			$q[$i]=$resqid['q_id'];
			//echo 'que id--->'.$q[$i].'<br>';
			$i++;
		}
			//Old Product Update Code
		for($i=0;$i<$old_que_count;$i++)
		{
			$que_value = $_POST['que_old'][$i];
			$ans_value = $_POST['ans_old'][$i];
			//echo 'que id--->'.$q[$i].'<br>';
			question_update($q[$i],$que_value);
			answer_update($q[$i],$ans_value);
		}
		//New Product Add Code
		for($i=0;$i<$queCount;$i++)
		{
			
			$q_value=$_POST["que"][$i];
			$a_value=$_POST["ans"][$i];
			
			if($q_value!='')
			{
				//echo $prod_id;
				question_add($prod_id,$q_value);
				$get_qid=mysql_query("select max(q_id) from questions");
				$arr=mysql_fetch_array($get_qid);
				//echo $arr[0];
				answer_add($arr[0],$prod_id,$a_value);
			}
			
		}
	}
	if($process=="tab4")
	{
		$pro_id=$_REQUEST['tab4_id'];
		$query="UPDATE `product` SET `titletag`='$titletag',`keywordtag`='$metakeyword',`descrtag`='$metadescr',`alttag`='$alttag' WHERE `product_id`='$pro_id'";
		$res=mysql_query($query) or die(mysql_error());
	}
	
	
	
	if($process=="update")
	{
			
			$id=$_REQUEST['edit_id'];
			
			$query="UPDATE `product` SET `name`='$pro_name',`upc`='$pro_upc',`pro_descr`='$pro_descr',`keywords`='$keywords',`ingredients`='$ingredients',`howtouse`='$howtouse',`price`='$pro_price',`titletag`='$titletag',`keywordtag`='$metakeyword',`descrtag`='$metadescr',`alttag`='$alttag' WHERE `product_id`='$id'";
			$res=mysql_query($query) or die(mysql_error());
			
			$get_qid=mysql_query("select q_id from questions where product_id='$id'");
			$i=0;
			$q[]='';
			while($resqid=mysql_fetch_array($get_qid))
			{ 
				$q[$i]=$resqid['q_id'];
				//echo $q[$i];
				$i++;
			}
			//Questions Update
			if($pro_q1!='')	{question_update($q[0],$pro_q1);}
			if($pro_q2!='')	{question_update($q[1],$pro_q2);}
			if($pro_q1!='')	{question_update($q[2],$pro_q3);}
			if($pro_q1!='')	{question_update($q[3],$pro_q4);}
			if($pro_q1!='')	{question_update($q[4],$pro_q5);}
			//Answer Update
			if($pro_a1!='')	{answer_update($q[0],$pro_a1);}
			if($pro_a2!='')	{answer_update($q[1],$pro_a2);}
			if($pro_a3!='')	{answer_update($q[2],$pro_a3);}
			if($pro_a4!='')	{answer_update($q[3],$pro_a4);}
			if($pro_a5!='')	{answer_update($q[4],$pro_a5);}
			
			//Image Update
			$image=implode($pro_image1);
			if($image!='')
			{
				$i=0;
				$image_path='';
				$image_thumb_path='';
				foreach($pro_image1 as $img)
				{
					$s=img_upload($i);
					$image_path=$image_path.$s.',';
					$image_thumb_path=$image_thumb_path.'thumb_'.$s.',';
					$i++;
				}
				//echo $image_path;
				//echo $image_thumb_path;
				$up_image=mysql_query("UPDATE `product` SET `image_path`='$image_path',`image_thumb_path`='$image_thumb_path' WHERE `product_id`='$id'");
				
			}
			
			header("Location:products.php?mode=updated");
			exit();
									
	}
	
	if(isset($process) && $process=="delete")
	{
		$productid=$_GET['prodid'];
		//echo $productid;	
		$sql = "delete from product where product_id = $productid";
		$delete_que="delete from questions where product_id = $productid";
		$delete_ans="delete from answers where product_id = $productid";
		
		
		$res = mysql_query($sql) or die(mysql_error());
		$res = mysql_query($delete_que) or die(mysql_error());
		$res=mysql_query($delete_ans) or die(mysql_error());
		header("Location: products.php?mode=deleted");
		exit();
	}
	
	
	
	
?>