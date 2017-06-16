<?php include("includes/configure.php"); 

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
                       
                        <div class="col-lg-3 col-md-3" id="col1" style="">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default" style="position:fixed">
                                <!-- Start .panel -->                                 
                                <div class="panel-body" >
                               
                                  
                                   
                                    <img src="<?php if(isset($_SESSION['user_name'])){echo $fbUserProfile['cover']['source'];}else{echo "assets/img/gallery/1.jpg";} ?>" style="height:163px;width:289px;" class="img-responsive">
                                    <?php //echo $fbUserProfile['cover']['source']; ?>
                                    <div class="chat-box chatbox-show avatar" style="text-align: center;margin-top: -43px;">
                                    	<img src="<?php if(isset($_SESSION['user_name'])){echo $user_img;}else{echo "assets/img/avatars/guest.jpg";} ?>" alt="@<?php echo $_SESSION['user_name']; ?>" style="border-radius:37px;height:73px;border: 3px solid white;" >
                                	     </div>
                                         
                                     <h3 style="text-align:center;margin-top:12px"><?php echo $user_fname.' '.$user_lname;?></h3>
                                     <hr>
                                     <center><h1 style="color:#888888">0</h1>
                                    
                                     <p>Coaching Sessions</p> </center>
                                </div>
                            </div>
                            <!-- End .panel -->
                        </div>
                        <!-- col-lg-4 end here -->
                        <div class="col-lg-6 col-md-6" id="col2">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->
                                <div class="panel-body" id="feed">
                                
                                <div id="LoadingImage" style="display:none;margin-top: 306px;z-index: 4;position: absolute;margin-left:234px;">
                                 
                                  
                                    <img src="assets/img/loading.gif" style="height: 69px;width: 74px;"/>
                                    
                                </div>
                                <script>
									$(document).ready(function(){

									var rsinner = $('.chat-box .chat-messages');
									rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);

									});

								</script>
								<?php
								$id=$_SESSION['user_id'];	
								echo $topic=$_SESSION['topic']; 
								if($id==''){$id="1001";}
								$count_prod=0;
								//echo $id;
								$get_chat=mysql_query("select message from chat where id=(select max(id) from chat where user_id='$id')");
								$arr_chat=mysql_fetch_array($get_chat);
								$str=multiexplode(array(",",".","|",":"," "),$arr_chat[0]);
								$count=0;
								if($topic=="articles")
								{
									echo "articles";
								foreach($str as $str1)
								{
									
									if(strlen($str1)>1)	
									{
									$art=mysql_query("select * from news where title LIKE '%$str1%' OR descr LIKE '%$str1%'");
									$count=$count+mysql_num_rows($art);

										while(@$arr=mysql_fetch_array($art))
										{?>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout" >

											<div class="panel panel-default plain" >
												<div class="panel-heading" style="cursor: auto">
													<a href="article.php?article=<?php echo $arr['news_id']; ?>" id="share"><h2 class="panel-title"><strong><?php echo $arr['title']; ?><?php //echo $temp; ?> </strong></h2></a>

												</div>
												<div class="panel-body">
													<?php 
													$imgpath =$arr['image_path'];								
													?>
													<img src="<?php echo $imgpath; ?>" class="img-responsive" alt="<?php echo $arr['title']; ?>">
												</div>
												<p><?php echo $arr['descr']; ?></p>

											</div>
										</div>	
										<?php
										}
									}
									
								}
								if($count==0)
								{
									$art=mysql_query("select * from news");
									
									//echo "panel 2";
									while(@$arr=mysql_fetch_array($art))
									{
										
									?>
											
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout">
											
											<div class="panel panel-default plain">
												<div class="panel-heading" style="">
													<a href="article.php?article=<?php echo $arr['news_id']; ?>" id="share2"><h2 class="panel-title"><strong><?php echo $arr['title']; ?> </strong></h2></a>
												</div>
												<div class="panel-body">
														<?php 
															$imgpath =$arr['image_path'];																	
														?>
														<img src="<?php echo $imgpath; ?>" class="img-responsive" alt="<?php echo $arr['title']; ?>">
												</div>
												<p><?php echo $arr['descr']; ?></p>
												
											</div>
										</div>
                                        
                                        
								   <?php
								   }
									
									
								}
								}
								if($topic=="products")
								{
									echo "products";
								foreach($str as $str1)
								{
								    if(strlen($str1)>1)	
									{
										
										$prod=mysql_query("select * from product where name LIKE '%$str1%'");
										$count_prod=$count_prod+mysql_num_rows($prod);
										while(@$arr_pro=mysql_fetch_array($prod))
										{
										 ?>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout" >
														
											<div class="panel panel-default plain" >
												
												<div class="panel-body">
													<div class="col-lg-6 col-md-6">
													
														<?php $image=explode(',',$arr_pro['image_path']); ?>
														<a href="product.php?product=<?php echo $arr_pro['product_id']; ?>" id="prod_info"><center><img src="images/products/<?php echo $image[0]; ?>" class="img-responsive" alt="" height="200px" width="200px">	
														<h2 class="panel-title"><strong> <?php echo $arr_pro['name']; ?> </strong></h2>
														<h3>Price : <?php echo $arr_pro['price']; ?> </h3><br></center>
														</a>
													 </div>
													 
												</div>
												<p></p>
												
											</div>
										</div>	
										 
										<?php
											
										}
									}
								 }
								}
								?>
								
							   

								 </div>
                              
                            </div>
                            <!-- End .panel -->
                        </div>
                        
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
           
        </div>
            
        <!-- End #content -->
        <?php include("footer.php"); ?>
		
    </body>
</html>