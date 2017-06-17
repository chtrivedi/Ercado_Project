<?php include("includes/configure.php"); ?>
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
                            <div class="panel panel-default" style="position:fixed">
                                <!-- Start .panel -->                                
                                <div class="panel-body">
                                    Profile
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-6 col-md-6">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->
                                
                                <div class="panel-body">
									<?php
											$res = selectAllRecords('news');
											while($arr = recFetch($res))
											{
									?>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout">
													<div class="panel panel-default plain panelMove panelRefresh">
														<div class="panel-heading">
															<h2 class="panel-title"><strong><?php echo $arr['title']; ?> </strong></h2>
														</div>
														<div class="panel-body">
																<?php 
																	$imgpath = "admin/" . $arr['image_path'];																	
																?>
																<img src="<?php echo $imgpath; ?>" alt="" width="612" height="300" >
														</div>
														<p><?php echo $arr['descr']; ?></p>
													</div>
												</div>	
									<?php
											}
									?>
									
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-3 col-md-3">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->
                                
                                <div class="panel-body">
                                   <?php include("sidebar_chat.php"); ?>
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-4 end here -->
                        
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .content-inner -->
            </div>
            <!-- End .content-wrapper -->
            <div class="clearfix"></div>
        </div>
            
        <!-- End #content -->
        <?php include("footer.php"); ?>
		
    </body>
</html>