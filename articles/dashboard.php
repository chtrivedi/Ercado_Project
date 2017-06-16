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
@$_SESSION['pageBreadcrumb'] = "Dashboard";

?>
<?php include("head.php"); ?>
<body class="dashboard-page sb-l-o sb-r-c">
    <?php //include("theme-options.php"); ?>

    <!-- Start: Main -->
    <div id="main">

        <?php include("header.php"); ?>

        <?php include("sidebar-main.php"); ?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <?php //include("topbar-dropdown.php"); ?>

            <?php include("topbar.php"); ?>

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">

                <!-- Dashboard Tiles -->
                <div class="row mb10">
                    
                    
                    
                    
                </div>

                <!-- Admin-panels -->
                <div class="admin-panels fade-onload sb-l-o-full">

                    <!-- full width widgets -->
                    <div class="row">

                        <!-- Three panes -->
                        
                        <!-- end: .col-md-12.admin-grid -->

                    </div>
                    <!-- end: .row -->

                    <!-- partial width widgets -->
                    
                    <!-- end: .row -->

                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

       <?php //include("sidebar-right.php"); ?>

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->
<?php include("footer.php"); ?>