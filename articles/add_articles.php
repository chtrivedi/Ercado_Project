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
@$_SESSION['pageBreadcrumb'] = "Add New Article";
@$mode = $_REQUEST['mode'];
?>
<?php include("head.php"); ?>
<body class="dashboard-page sb-l-o sb-r-c">
    

    <!-- Start: Main -->
    <div id="main">

        <?php include("header.php"); ?>

        <?php include("sidebar-main.php"); ?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <?php include("topbar.php"); ?>

            <!-- Begin: Content -->
            	<div id="content" class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
						<?php
								if($mode == "success")
								{
						?>			<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Article saved successfully. Click <a href="articles.php" class="alert-link">Here</a> to View All.
								   </div>
						<?php	}	?>
					 
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Standard Fields</span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="add_articles_ops.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group mt10">
                                        <label class="col-md-3 control-label" for="datetimepicker1">Date</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="datetimepicker1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Article Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Type Here...">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Short Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="sdescr" name="sdescr" rows="4"></textarea>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Publish?</label>
                                        <div class="col-md-9">
                                            <div class="switch switch-success round switch-inline">
                                                <input id="publish" name="publish" type="checkbox" checked="checked">
                                                <label for="publish"></label>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Home Page?</label>
                                        <div class="col-md-9">
                                            <div class="switch switch-success round switch-inline">
                                                <input id="ishome" name="ishome" type="checkbox" checked="checked">
                                                <label for="ishome"></label>
                                            </div>
                                        </div>
                                    </div>   
                                    
									<div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Text Content</label>
                                        <div class="col-lg-8">                                            
											<textarea name="pagetext" id="pagetext" rows="12"></textarea>
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Image Upload</label>
                                        <div class="col-lg-8">
                                            <input type="file" id="upload" name="upload" class="form-control" placeholder="Uplaod...">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Title Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="titletag" name="titletag" rows="4"></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Keyword Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="metakeyword" name="metakeyword" rows="4"></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Description Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="metadescr" name="metadescr" rows="4"></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Alt Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="alttag" name="alttag" rows="4"></textarea>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1"></label>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-hover btn-system btn-block">Save</button>
                                        </div>
                                    </div>
									
									
                                    <input class="span6" id="process" name="process" type="hidden" value="new" />
                                                                    
                                </form>
                            </div>
                        </div>                 

                    </div>

                    
                </div>

            </div>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

      

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->
<?php include("footer.php"); ?>