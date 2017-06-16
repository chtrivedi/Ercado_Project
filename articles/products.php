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
@$_SESSION['pageBreadcrumb'] = "View All Products";
@$mode = $_REQUEST['mode'];

?>
<?php include("head.php"); ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
						?>			<div id="delete" class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Product removed successfully. 
								   </div>
                                   <script>
								   $('#delete').delay(3000).fadeOut();
								   </script>
						<?php	}	?>
                        <?php
								if($mode == "updated")
								{
						?>			<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Product Updated successfully. 
								   </div>
						<?php	}	?>
						
                            <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>View All Products</div>
                                </div>
                                <div class="panel-body pn">
                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Name</th>
                                                <th>UPC</th>
                                                <th>Description</th>                                               
                                                <th>Price</th>
												<th>Image</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$sql="select * from product order by product_id";
												$result=mysql_query($sql) or die(mysql_error());
												$no_of_rows=mysql_num_rows($result);
												
											
												
												
												if($no_of_rows > 0)
												{
													
													$i=1;
													while($arrres = mysql_fetch_array($result))
													{
													$pid=$arrres['product_id'];
										?>
                                               		<tr class="odd gradeA">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $arrres['name']; ?></td>
                                                    <td><?php echo $arrres['upc']; ?></td>
                                                    <td><?php echo $arrres['pro_descr']; ?></td>
                                                    
                                                    <td><?php echo $arrres['price']; ?></td>         
													          <?php
															  		$img=explode(',',$arrres['image_thumb_path']);
															  ?>                                         
                                                    <td><img src="images/products/<?php echo $img[0]; ?>" height="55" border="0"></td>
                                                    <td>
														<div class="btn-group">
															<a href="product_edit.php?prodid=<?php echo $arrres['product_id']; ?>" title="Edit" class="tip">
															<button type="button" class="btn btn-system"><i class="fa fa-edit"></i></button></a>
														</div>
														<div class="btn-group">
															<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $arrres['product_id']; ?>"><i class="fa fa-remove"></i></button>
                                                            
                                              		 	<div class="modal fade" id="myModal<?php echo $arrres['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Product Delete</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        Are you sure you want to delete this product?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <a href="product_ops.php?process=delete&prodid=<?php echo $pid; ?>" title="Remove" class="tip"><button type="button" class="btn btn-system">Delete product</button></a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
														</div>													                                                        
                                                    </td>
                                                </tr>
                                                
                                        <?php		}
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