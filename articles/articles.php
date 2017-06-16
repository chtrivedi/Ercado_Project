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
@$_SESSION['pageBreadcrumb'] = "View All Articles";
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
								if($mode == "deleted")
								{
						?>			<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Article removed successfully. 
								   </div>
						<?php	}	?>
						
                            <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>View All Articles</div>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Date</th>
                                                <th>Title</th>
                                                <th>Short Descr</th>                                               
                                                <th>Published?</th>
												<th>Is Home?</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$sql="select * from news order by news_id";
												$result=mysql_query($sql) or die(mysql_error());
												$no_of_rows=mysql_num_rows($result);
												
												if($no_of_rows > 0)
												{
													$total_ids="0";	
													$i=1;
													while($arrres = mysql_fetch_array($result))
													{
														$total_ids=$total_ids.",".$arrres['news_id'];
										?>
                                                <tr class="odd gradeA">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo give_date_short($arrres['date_added']) ?></td>
                                                    <td><?php echo $arrres['title']; ?></td>
                                                    <td><?php echo $arrres['descr']; ?></td>
                                                    
                                                    <td class="center"><?php echo $arrres['status']; ?></td>         
													<td class="center"><?php echo $arrres['ishome']; ?></td>                                                   
                                                    <td><img src="<?php echo $arrres['image_thumb_path']; ?>" height="55" border="0"></td>
                                                    <td>
														<div class="btn-group">
															<a href="articles_edit.php?newsid=<?php echo $arrres['news_id']; ?>" title="Edit" class="tip">
															<button type="button" class="btn btn-system"><i class="fa fa-edit"></i></button></a>
														</div>
														
														<div class="btn-group">
															 <a href="add_articles_ops.php?process=delete&newsid=<?php echo $arrres['news_id']; ?>" title="Remove" class="tip">
															<button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
														</div>													                                                        
                                                    </td>
                                                </tr>
                                        <?php	
													}
												}
										?>
											
											
                                        </tbody>
                                    </table>
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