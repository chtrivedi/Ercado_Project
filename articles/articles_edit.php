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

@$mode = $_REQUEST['mode'];
@$res=$_REQUEST['res'];
@$newsid=(int)$_REQUEST['newsid'];

$sql="select * from news where news_id=".$newsid;
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) <= 0)
{
	header("Location: news.php");
	exit();
}
else
	$editarr=mysql_fetch_array($res);
	
@$_SESSION['pageBreadcrumb'] = "Articles &raquo; Edit Article";
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
                                <form class="form-horizontal" role="form" action="add_articles_ops.php?newsid=<?php echo $newsid; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group mt10">
                                        <label class="col-md-3 control-label" for="datetimepicker1">Date</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="datetimepicker1" value="<?php echo give_date_short_mm($editarr['date_added']) ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Article Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Type Here..." value="<?php echo $editarr['title']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Short Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="sdescr" name="sdescr" rows="4"><?php echo $editarr['descr']?></textarea>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Publish?</label>
                                        <div class="col-md-9">
                                            <div class="switch switch-success round switch-inline">
                                                <input id="publish" name="publish" type="checkbox" <?php if($editarr['status'] == 1) { ?> checked="checked" <?php } ?>>
                                                <label for="publish"></label>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Home Page?</label>
                                        <div class="col-md-9">
                                            <div class="switch switch-success round switch-inline">
                                                <input id="ishome" name="ishome" type="checkbox" <?php if($editarr['ishome'] == 1) { ?> checked="checked" <?php } ?> >
                                                <label for="ishome"></label>
                                            </div>
                                        </div>
                                    </div>   
                                    
									<div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Text Content</label>
                                        <div class="col-lg-8">                                            
											<textarea name="pagetext" id="pagetext" rows="12"><?php echo $editarr['news_txt']?></textarea>
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Change Image</label>
                                        <div class="col-lg-8">
                                            <input type="file" id="upload" name="upload" class="form-control" placeholder="Uplaod..."><br>
											<?php
                                                    $filepath = $editarr['image_thumb_path'];
											?>
											<img src="<?php echo $filepath; ?>" height="150" border="0">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Title Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="titletag" name="titletag" rows="4"><?php echo $editarr['titletag']; ?></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Keyword Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="metakeyword" name="metakeyword" rows="4"><?php echo $editarr['keywordtag']; ?></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Description Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="metadescr" name="metadescr" rows="4"><?php echo $editarr['descrtag']; ?></textarea>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1">Alt Tag</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control textarea-grow" id="alttag" name="alttag" rows="4"><?php echo $editarr['alttag']; ?></textarea>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-lg-3 control-label" for="textArea1"></label>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-hover btn-system btn-block">Save</button>
                                        </div>
                                    </div>
									
									
                                    <input class="span6" id="process" name="process" type="hidden" value="edit" />
                                                                    
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