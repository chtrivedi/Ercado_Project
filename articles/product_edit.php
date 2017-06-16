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
@$_SESSION['pageBreadcrumb'] = "Edit Product";
@$id = $_REQUEST['prodid'];
@$mode=$_GET['mode'];
?>
<?php include("head.php"); ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
<body class="dashboard-page sb-l-o sb-r-c">
 <?php
 $getdata=mysql_query("select * from product where product_id='$id'") or die();
$resdata=mysql_fetch_array($getdata);
 ?>   

    <!-- Start: Main -->
    <div id="main">

        <?php include("header.php"); ?>

        <?php include("sidebar-main.php"); ?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <?php include("topbar.php"); ?>

            <!-- Begin: Content -->
            	<div id="content" class="animated fadeIn">
                <!-- <h3 class="text-center mb25 mt10 fw400">Nav Tabs</h3> -->
                <div class="row mt10">
                    
                    <div class="col-md-12">
                    <?php
								if($mode == "success")
								{
						?>			<div id="success" class="alert alert-success alert-dismissable" >
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Product added successfully. Click <a href="products.php" class="alert-link">Here</a> to View All.
								   </div>
                                   <script>
								   $('#success').delay(3000).fadeOut();
								   </script>
						<?php	}	?>
                        <?php
								if($mode == "updated")
								{
						?>			<div id="updated" class="alert alert-success alert-dismissable" >
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Product Updated successfully. Click <a href="products.php" class="alert-link">Here</a> to View All.
								   </div>
                                   <script>
								   $('#updated').delay(3000).fadeOut();
								   </script>
						<?php	}	?>
                        <?php for($i=1;$i<=4;$i++) {?>
                        <div id="success<?php echo $i; ?>" class="alert alert-success alert-dismissable" style="display:none">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check pr10"></i>
									<strong>Done!</strong> Product Updated successfully. Click <a href="products.php" class="alert-link">Here</a> to View All.
						</div>
                        <?php }?>
                        
                        <div class="tab-block mb25">
                            <ul class="nav nav-tabs tabs-border">
                                <li class="active">
                                    <a href="#tab8_1" data-toggle="tab">Product Information</a>
                                </li>
                                <li>
                                    <a href="#tab8_2" data-toggle="tab"> How to use</a>
                                </li>
                                <li>
                                    <a href="#tab8_3" data-toggle="tab"> Q & A</a>
                                </li>
                                 <li>
                                    <a href="#tab8_4" data-toggle="tab"> SEO</a>
                                </li>
                                
                            </ul>
                            
                            <div class="tab-content">
                                <div id="tab8_1" class="tab-pane active">
                                  		
                                
                                     <form id="form1" class="form-horizontal" role="form" action="product_ops.php?process=tab1" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Title</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="name" name="name" value="<?php echo $resdata['name']; ?>" class="form-control" placeholder="Type Here..." required>
                                                <input type="text" value="<?php echo $id; ?>" name="tab1_id" hidden>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">UPC</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="upc" name="upc" value="<?php echo $resdata['upc']; ?>" class="form-control" placeholder="Type Here..." >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Description</label>
                                            <div class="col-lg-8">
                                               
                                                <textarea class="form-control" name="descr" id="pagetext" rows="12"><?php echo $resdata['pro_descr']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Images</label>
                                            <div class="col-lg-4">
                                                <input type="file" name="img[]" class="form-control" placeholder="Uplaod..." multiple>
                                            </div>
                                            <div class="col-lg-4">
                                             <?php $i=0;
												$getimage=explode(',',$resdata['image_path']);
												foreach($getimage as $img)
												{
													if($getimage[$i]==''){ break; }
											 ?>
                                        	<img src="images/products/<?php echo $getimage[$i]; ?>" height="50px" width="50px">
                                            <?php 
											  $i++; } 
									        ?>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Price</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="price" name="price" value="<?php echo $resdata['price']; ?>" class="form-control" placeholder="Type Here..." >
                                            </div>
                                        </div>
                                          
                                        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1"></label>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-hover btn-system btn-block">Update</button>
                                            </div>
                                        </div>
                                        
                                        
                                        <input class="span6" id="process" name="process" type="hidden" value="new" />
                                                                        
                                    </form>
                                </div>
                                <div id="tab8_2" class="tab-pane">
                                <script>
								  $(function () {
							
									$("#form2").submit(function(e) {
										
									  e.preventDefault();
							
									  $.ajax({
										type: 'post',
										url: 'product_ops.php?process=tab2',
										data: $('#form2').serialize(),
										success: function (data) {
										  //alert('form was submitted');
										 $('#success2').show();
										 $('#success2').delay(3000).fadeOut();
										}
									  });
							
									});
							
								  });
								</script>
                              		<form id="form2" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Keywords</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="keywords" name="keywords" rows="4" ><?php echo $resdata['keywords']; ?></textarea>
                                                <input type="text" value="<?php echo $id; ?>" name="tab2_id" hidden>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Ingredients</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="ingredients" name="ingredients" rows="4" ><?php echo $resdata['ingredients']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">How to Use</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control " id="howtouse" name="howtouse" rows="4" ><?php echo $resdata['howtouse']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1"></label>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-hover btn-system btn-block">Update</button>
                                            </div>
                                        </div>
                                        
                                        
                                        <input class="span6" id="process" name="process" type="hidden" value="new" />
                                                                        
                                    </form>
                                </div>
                                <div id="tab8_3" class="tab-pane">
                                <script>
									$(function () {
									
									$("#form3").submit(function(e) {
										
									  e.preventDefault();
									
									  $.ajax({
										type: 'post',
										url: 'product_ops.php?process=tab3',
										data: $('#form3').serialize(),
										success: function (data) {
										   //$('.alert').html(data);
										   $('#success3').show();
										   $('#success3').delay(3000).fadeOut();
										}
									  });
									});
									});
									</script>
                                <form id="form3" class="form-horizontal" role="form"  method="post" enctype="multipart/form-data">
                             <?php   	$get_question=mysql_query("select q_id,q_value from questions where product_id='$id'");
										$i=0;
										$ans_value[]='';
										//echo $id;
										$get_question_count=mysql_query("select count(*) from questions where product_id='$id'");
										$res_count=mysql_fetch_array($get_question_count);
										$temp=$res_count[0];
										//echo $temp;
										if($temp>0)
										{
										while($resquestion=mysql_fetch_array($get_question))
										{
											$que[$i]=$resquestion['q_value'];
											
											$q=$resquestion['q_id'];
											//echo $q;
											
											$get_ans=mysql_query("select ans_value from answers where q_id='$q'");
											$resanswer=mysql_fetch_array($get_ans);
											$ans_value[$i]=$resanswer['ans_value'];
							?>
                            		 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question <?php echo $counter=$i+1; ?></label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que_old[]" rows="4" ><?php echo stripslashes($que[$i]); ?></textarea>
                                              <input type="text" value="<?php echo $id; ?>" name="tab3_id" hidden>
                                         </div>
                                         
                                        <div class="col-lg-1">
                                        <?php if($temp==$i+1) {?>
                                          <button style="border:none" type="button" onClick="addMore();" class="label label-warning label-sm pull-right lh20 lh-5 mt5 mr5 "><i class="fa fa-plus"></i></button>
                                          <?php } ?>
                                          </div>
										 </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer <?php echo $counter=$i+1; ?></label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control"  name="ans_old[]" rows="4" ><?php echo stripslashes($ans_value[$i]); ?></textarea>
                                        </div>
                                    </div>
                                   <?php $i++; }
								   }
								   else
								   {?>
                                   		<div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Question </label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                                 <input type="text" value="<?php echo $id; ?>" name="tab3_id" hidden>
                                            </div>
                                             <div class="col-lg-1">
                                            <button style="border:none" type="button" onClick="addMore();" class="label label-warning label-sm pull-right lh20 lh-5 mt5 mr5 "><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Answer </label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control"  name="ans[]" rows="4" ></textarea>
                                            </div>
                                        </div>
								   <?php }
								   ?> 
                                    <script>
										function addMore() {
											$("<DIV>").load("input.php", function() {
													$("#add_text").append($(this).html());
											});	
										}
									</script>
                                    <div id="add_text">
                                    </div>
                                    
                                  
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1"></label>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-hover btn-system btn-block">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div id="tab8_4" class="tab-pane">
                                <script>
								  $(function () {
							
									$("#form4").submit(function(e) {
										
									  e.preventDefault();
							
									  $.ajax({
										type: 'post',
										url: 'product_ops.php?process=tab4',
										data: $('#form4').serialize(),
										success: function (data) {
										  //alert('form was submitted');
										  $('#success4').show();
										  $('#success4').delay(3000).fadeOut();
										}
									  });
							
									});
							
								  });
								</script>
                                   <form id="form4" class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data">
                                     <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Title Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" id="titletag" name="titletag" rows="4" ><?php echo $resdata['titletag']; ?></textarea>
                                            <input type="text" value="<?php echo $id; ?>" name="tab4_id" hidden>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Keyword Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" id="metakeyword" name="metakeyword" rows="4" ><?php echo $resdata['keywordtag']; ?></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Description Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" id="metadescr" name="metadescr" rows="4" ><?php echo $resdata['descrtag']; ?></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Alt Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" id="alttag" name="alttag" rows="4" ><?php echo $resdata['alttag']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1"></label>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-hover btn-system btn-block">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
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