<?php include("includes/configure.php"); 

$news_id=$_GET['article'];

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
                       
                        
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-9 col-md-9 img-responsive" id="col2">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->
                                
                                <div class="panel-body" id="feed">
                                
                                <div id="LoadingImage" style="display:none;margin-top: 306px;z-index: 4;position: absolute;margin-left:234px;">
                                  
                                    <img src="assets/img/loading.gif" style="height: 69px;width: 74px;"/>
                                    
                                </div>
                                
								<?php
									$get_article=mysql_query("select * from news where news_id='$news_id'");

									$arr=mysql_fetch_array($get_article);
										
											
										?>
										<a href="http://www.nirvaanatechnologies.com/ercado/index.php">Back</a>
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout">

												<div class="panel panel-default plain" >
													<div class="panel-heading" style="cursor: auto">
														<h2 class="panel-title"><strong><?php echo $arr['title']; ?></strong></h2>
												</div>
													<div class="panel-body">
															<?php 
																$imgpath =$arr['image_path'];							
															?>
															<center><img src="<?php echo $imgpath; ?>" class="img-responsive" alt="<?php echo $arr['title']; ?>"></center>
													</div>
													<p><?php echo $arr['descr']; ?></p>

												</div>
											</div>	
									 </div>
                                
                            </div>
                            
                            <!-- End .panel -->
                        </div>
                        <script>
							$(document).ready(function(){

								//alert("abcd");
								//alert("share 1 click");
							var rsinner = $('.chat-box .chat-messages');
							rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);
								var title=$('.panel-title').text();
								$('.chat-box .chat-messages').append('<li><div class="avatar"><img src="assets/img/ercado_logo.png" alt=""></div><div class="message"><p class="chat-name"><span class="chat-time"> now </span></p><p class="chat-txt">You are viewing, '+ title +'</p>      <p><a href="#"><img src="assets/img/facebook_share_icon.png" height="50px" width="49px"></a><a href="#"><img src="assets/img/twitter_share_icon.png" height="50px" width="49px"></a><a href="#"><img src="assets/img/google-plus.png" height="50px" width="49px"></a><a href="#"><img src="assets/img/pinterest_share_icon.png" height="50px" width="49px"></a></p></div></li>');


						});

						</script>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-3 col-md-3">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default" style="position:fixed;background-color: #e6e6e6;">
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