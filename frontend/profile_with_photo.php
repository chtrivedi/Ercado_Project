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
                       
                        <div class="col-lg-3 col-md-3">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->                                
                                <div class="panel-body">
                                    Profile
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-9 col-md-9">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->                                
                                <div class="panel-body">
                                    <div class="content-inner">
										<div class="row">
											<!-- Start .row -->
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sortable-layout">
												<!-- col-lg-4 start here -->
												<div class="panel panel-default plain">
													<!-- Start .panel -->
													<div class="white-bg">
														<h4 class="panel-title"><i class="im-user"></i> Update your information</h4>
													</div>
													<div class="panel-body mt15">
														<form class="form-vertical" role="form">
															<div class="form-group">
																<label class="control-label">Username</label>
																<input type="text" class="form-control" value="SuggeElson" disabled>
																<a href="#" class="help-block color-red">Request new ?</a> 
															</div>
															<div class="form-group">
																<label class="control-label">Full name</label>
																<input type="text" class="form-control" value="Jonh Doe">
															</div>
															<div class="form-group">
																<label class="control-label">Email</label>
																<input type="email" class="form-control" value="suggeelson@suggeelson.com">
															</div>
															<div class="form-group">
																<label class="control-label">New password</label>
																<input type="password" class="form-control">
															</div>
															<div class="form-group">
																<label class="control-label">Repeat password</label>
																<input type="password" class="form-control">
															</div>
															<div class="form-group">
																<label class="control-label">More info</label>
																<textarea class="form-control" rows="3"></textarea>
															</div>
															<!-- End .form-group  -->
															<div class="form-group mb15">
																<button class="btn btn-primary">Change</button>
															</div>
															<!-- End .form-group  -->
														</form>
													</div>
												</div>
												<!-- End .panel -->
											</div>
											<!-- col-lg-6 end here -->
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sortable-layout">
												<!-- col-lg-4 start here -->
												<div class="panel panel-default plain">
													<!-- Start .panel -->
													<div class="panel-body pt20">
														<div class="profile-cover">
															<img class="img-responsive" src="assets/img/profile-cover.jpg" alt="Profile cover">
															<a href="#" id="change-cover" class="btn btn-white btn-alt btn-sm">
																<span class="color-white"><i class="im-image2"></i> change cover</span> 
															</a>
															<form class="change-cover">
																<input type="file">
															</form>
															<div class="profile">
																<img src="assets/img/avatars/128.jpg" alt="Jonh Doe">
																<a href="#" id="change-profile-image" class="btn btn-white btn-round btn-sm">
																	<i class="im-camera3"></i> 
																</a>
																<form class="change-profile-image">
																	<input type="file">
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- End .panel -->
											</div>
											<!-- col-lg-6 end here -->
										</div>
				                    <!-- End .row -->
               						 </div>
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