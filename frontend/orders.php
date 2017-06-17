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
													<h4 class="panel-title"><i class="im-stack"></i> Your Orders Details</h4><br>
													<table class="table table-bordered">
														<thead>
															<tr>
																<th class="per5">
																	#
																</th>
																<th class="per20">Date</th>
																<th class="per20">Ship To</th>
																<th class="per15">Order Total</th>
																<th class="per25">Delivery Type</th>
																<th class="per15">Action</th>
															</tr>
														</thead>
														<tbody>
													<?php
															$i = 0;
															//echo "select * from order_master where userid = $id";die;
															$res = selectAllRecords('order_master where user_id = '.$_SESSION['user_id']);
															while($arr = recFetch($res))
															{
													?>
																<tr>
																	<td>
																		<?php echo $user_id + $i++;	?>
																	</td>
																	<td><?php echo give_datetime_short($arr['datetime']); ?></td>
																	<td><?php echo $arr['user_name']; ?></td>
																	<td><?php echo $arr['price'] * $arr['unit']; ?></td>
																	<td><?php echo $arr['delivery_type']; ?></td>
																	<td><a href="#">View</a> | <a href="#">Reorder</a></td>
																</tr>
													<?php
															}
														?>

														</tbody>
														</table>
													
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
		//alert("hello");
		
		var USERNAME = $('#txtEmail').val();    
		
		//alert(USERNAME);
		 
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
</script>