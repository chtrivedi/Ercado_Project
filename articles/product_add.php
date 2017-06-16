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
@$_SESSION['pageBreadcrumb'] = "Add New Product";
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
                <!-- <h3 class="text-center mb25 mt10 fw400">Nav Tabs</h3> -->
                <div class="row mt10">
                    
                    <div class="col-md-12">
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
                            <form  class="form-horizontal" method="post" action="product_ops.php?process=add" role="form"  enctype="multipart/form-data">

                            <div class="tab-content">
                            
                               	<div id="tab8_1" class="tab-pane active">
                               	    
                                    
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Title</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Type Here..." required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">UPC</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="upc" name="upc" class="form-control" placeholder="Type Here..." >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label" >Description</label>
                                            <div class="col-lg-8" >
                                                
                                                <textarea class="form-control" name="descr" id="pagetext"  rows="12" ></textarea>
                                               
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Images</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="upload" name="img[]" class="form-control" placeholder="Uplaod..." multiple>
                                            </div>
                                        </div>
                                        
                                         
                                        
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-3 control-label">Product Price</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="price" name="price" class="form-control" placeholder="Type Here..." >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class=" control-label"></label>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <button type="submit"  class="btn btn-hover btn-system btn-block">Save</button>
                                            </div>
                                            <div class="col-lg-4"></div>
                                		</div>
                                         
                                       <input class="span6" id="process" name="process" type="hidden" value="new" />
                                </div>
                            	<div id="tab8_2" class="tab-pane">
                              		
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Keywords</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="keywords" name="keywords" rows="4" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">Ingredients</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="ingredients" name="ingredients" rows="4" ></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="textArea1">How to Use</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="howtouse" name="howtouse" rows="4" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" control-label"></label>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <button type="submit"  class="btn btn-hover btn-system btn-block">Save</button>
                                            </div>
                                            <div class="col-lg-4"></div>
                                		</div>
                                         <input class="span6" id="process" name="process" type="hidden" value="new" />
                                                                        
                                  
                              	</div>
                                <div id="tab8_3" class="tab-pane">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question 1</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer 1</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control"  name="ans[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question 2</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer 2</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control"  name="ans[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question 3</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer 3</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control"  name="ans[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question 4</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer 4</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control "  name="ans[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Question 5</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control textarea-grow"  name="que[]" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Answer 5</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control"  name="ans[]" rows="4" ></textarea>
                                        </div>
                                        <div class="col-lg-1">
                                          <button type="button" onClick="addMore();" class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5"><i class="fa fa-plus"></i></button>
                                          </div>
                                    </div>
                                    
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
                                            <label class=" control-label"></label>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <button type="submit"  class="btn btn-hover btn-system btn-block">Save</button>
                                            </div>
                                            <div class="col-lg-4"></div>
                                		</div>
                                   
                                </div>
                                <div id="tab8_4" class="tab-pane">
                                  
                                     <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Title Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control " id="titletag" name="titletag" rows="4" ></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Keyword Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control " id="metakeyword" name="metakeyword" rows="4" ></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Description Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control " id="metadescr" name="metadescr" rows="4" ></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Alt Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control " id="alttag" name="alttag" rows="4" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label class=" control-label"></label>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <button type="submit"  class="btn btn-hover btn-system btn-block">Save</button>
                                            </div>
                                            <div class="col-lg-4"></div>
                                		</div>
                                    
                                 
                                </div>
                                
                            </div>
                            
                        </form>
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