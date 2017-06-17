<!DOCTYPE html>
<html lang="en">
    <?php include("head.php"); ?>
    <body class="ovh">
         <?php include("header.php"); ?>
       
         <?php include("sidebar.php"); ?>          
        <!-- Start #content -->
        <div id="content">
            <div class="content-wrapper">
                <div class="content-inner">
                    <div class="row">
						<div class="col-lg-8 col-md-8 sortable-layout">
                            <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 sortable-layout">
                            <?php include("sidebar_right.php"); ?>
                        </div>
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