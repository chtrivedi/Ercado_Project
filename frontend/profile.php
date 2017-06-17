<?php include("includes/configure.php"); 

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("head.php"); ?>
    <body class="ovh">
         <?php include("header.php"); ?>      
        <!-- Start #content -->
        <div id="content">
            <!-- Start .content-wrapper -->
            <div class="content-wrapper">
                
                <!-- Start .content-inner -->
                <div class="content-inner">
                    <!-- Start .row -->
                    <div class="row">
                       
                        <?php include("sidebar_profile.php"); ?>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-9 col-md-9">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->                                
                                <div class="panel-body">
                                    
										<div class="row">
											<!-- Start .row -->
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout">
												<!-- col-lg-4 start here -->
												<div class="panel-body">
													<h4 class="panel-title"><i class="im-user"></i> Account information</h4><br>
													<?php 
														$id=$_SESSION['user_id'];	
														if($id==''){$id="1001";}
														
														$res = selectAllRecords("users where oauth_uid = '$id'");
														$arr = recFetch($res);
													?>
													<form name="frm_account" method="post">
														<table class="table">														
															<tbody>
															<tr>
																<td><strong>Email / Username</strong></td>
																<td><input type="text" id="txtEmail" name="txtEmail" class="txtBox" value="<?php echo $user_email; ?>" readonly></td>
																<td></td>
															</tr>
															<tr>
																<td><strong>Password</strong></td>
																<td><input type="password" id="txtPass" name="txtPass" class="txtBox" value="......." readonly></td>
																<td>
																	<div id="change_details">
																		<a href="#" onClick="javascript: submitFrm();">Update</a>		
																			
																																
																	</div>
																</td>
															</tr>
															</tbody>
														</table>
													</form>
													
													<h4 class="panel-title"><i class="im-user"></i> Personal information</h4><br>
													<form name="frm_personal" method="post">
													<table class="table">														
														<tbody>
														<tr>
															<td><strong>First Name</strong></td>
															<td><input type="text" id="txtFname" name="txtFname" class="txtBox" value="<?php echo $arr['first_name']; ?>" readonly></td>
															<td></td>
														</tr>
														<tr>
															<td><strong>Last Name</strong></td>
															<td><input type="text" id="txtLname" name="txtLname" class="txtBox" value="<?php echo $arr['last_name']; ?>" readonly></td>
															<td></td>
														</tr>
														<tr>
															<td><strong>Phone</strong></td>
															<td><input type="text" id="txtPhone" name="txtPhone" class="txtBox" value="<?php echo $arr['phone']; ?>" readonly></td>
															<td></td>
														</tr>
														<tr>
															<td><strong></strong></td>
															<td colspan="2">
																<div id="change_personal">
																	<a href="#" onClick="javascript: submitPersonal();">Update</a>		
																</div>
															</td>
														</tr>
														</tbody>
													</table>
													</form>
												</div>
												<!-- End .panel -->
											</div>
											
										</div>
				                    <!-- End .row -->
               						 
            						<div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .content-inner -->
            </div>
            <!-- End .content-wrapper -->
           
        </div>
            
        <!-- End #content -->
        <?php include("footer.php"); ?>
		
    </body>
</html>
<script language="javascript" type="text/javascript">
	function submitFrm(txtBoxId)
	{
		$("#txtPass").removeAttr('readonly');
		$("#txtPass").addClass('txtBoxClicked');
		//$("#txtPass").attr("placeholder", "Enter Password");
		
		$("#change_details").html('<button type="button" id="btnPass" name="btnPass" class="btn btn-primary" onClick="javascript: ajaxUpdate();">SAVE</button>');
	}
	function ajaxUpdate()
	{
		var USERNAME = $('#txtEmail').val();    
		var PASSWD = $('#txtPass').val();
		
		var postData = '&username='+USERNAME+'&passwd='+PASSWD;
		
		$.ajax({
			url : "profile_edit.php",
			type: "POST",
			data : postData,
			success: function(data,status, xhr)
			{
				//if success then just output the text to the status div then clear the form inputs to prepare for new data
				$("#change_details").html('<a href="#" onClick="javascript: submitFrm("txtPass");">Update</a>&nbsp;&nbsp;&nbsp;<i class="im-checkmark3 alert-icon s24 ajax-data-success fade in"></i>');
				$("#txtEmail").addClass('txtBox');
				$("#txtPass").addClass('txtBox');
			}
		});
	}
	
	function submitPersonal()
	{
		//alert("hello");
		$("#txtFname").removeAttr('readonly');
		$("#txtFname").addClass('txtBoxClicked');
		
		$("#txtLname").removeAttr('readonly');
		$("#txtLname").addClass('txtBoxClicked');
		
		$("#txtPhone").removeAttr('readonly');
		$("#txtPhone").addClass('txtBoxClicked');
		
		$("#change_personal").html('<button type="button" id="btnPass" name="btnPass" class="btn btn-primary" onClick="javascript: ajaxUpdatePersonal();">SAVE</button>');
	}
	function ajaxUpdatePersonal()	
	{
		var FNAME = $('#txtFname').val();
		var LNAME = $('#txtLname').val();
		var PHONE = $('#txtPhone').val();
				
		var postData = '&fname='+FNAME+'&lname='+LNAME+'&phone='+PHONE+'&uid='+<?php echo $id; ?>+'&action=personal';
		
		$.ajax({
			url : "profile_edit.php",
			type: "POST",
			data : postData,
			success: function(data,status, xhr)
			{
				//if success then just output the text to the status div then clear the form inputs to prepare for new data
				$("#change_personal").html('<a href="#" onClick="javascript: submitPersonal();">Update</a>&nbsp;&nbsp;&nbsp;<i class="im-checkmark3 alert-icon s24 ajax-data-success fade in"></i>');
				$("#txtFname").addClass('txtBox');
				$("#txtLname").addClass('txtBox');
				$("#txtPhone").addClass('txtBox');
			}
		});
	}
	
	
</script>