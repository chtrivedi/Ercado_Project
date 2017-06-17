<?php include("includes/configure.php"); 

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
?>
<!DOCTYPE html>
<html lang="en">
   
    <?php 
	
	include("head.php"); ?>
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
                            <div class="panel panel-default">
                                <!-- Start .panel -->     
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout" >

								
									<div class="panel panel-default plain" >                            
										<div class="panel-body" >
										<?php 
											$user_id=$_SESSION['user_id'];
											$order=mysql_query("select * from transection where user_id='$user_id' and status='cart added'");
											$total_price=0;
											$shipping=0.0;
											$estimated_tax=0.0;
											$total_product=0;
											while($arr=mysql_fetch_array($order))
											{
												$prod_id=$arr['product_id'];
												$product=mysql_query("select price from product where product_id='$prod_id'");
												$prodarr=mysql_fetch_array($product);
												
												$total_price=$total_price+($prodarr[0]*$arr['unit']);
												$total_product++;
											}
										?>
											<a href="#" id="place_order" data-toggle="modal" data-target="#myModal"><img src="assets/img/placeorder.png" class="img-responsive mt10"></a>
											
											<center><p>By placing your order, you agree to privacy notice and condition of use.</p></center>
											<hr>
											<strong>Order Summery</strong>
											<div class="col-lg-9 col-md-9">
												Items
											</div>
											<div class="col-lg-3 col-md-3" style="text-align: right">
												<?php echo '$'.$total_price; ?>
											</div>
											<div class="col-lg-9 col-md-9">
												Shipping and handling
											</div>
											<div class="col-lg-3 col-md-3" style="text-align: right">
												<?php echo '$'.$shipping; ?>
											</div>
											<div class="col-lg-12 col-md-12" style="margin: 0px">
											<hr>
											</div>
											<div class="col-lg-9 col-md-9">
												Total Before Tax
											</div>
											<div class="col-lg-3 col-md-3" style="text-align: right">
												<?php echo '$'.($total_price+$shipping); ?>
											</div>
											<div class="col-lg-9 col-md-9">
												Estimated tax to be collected
											</div>
											<div class="col-lg-3 col-md-3" style="text-align: right">
												<?php echo '$'.$estimated_tax; ?>
											</div>
											<div class="col-lg-12 col-md-12">
											<hr>
											</div>
											<div class="col-lg-8 col-md-8" >
												<h3 style="margin-top: 0px;margin-bottom: 0px">Order Total</h3>
											</div>
											<div class="col-lg-4 col-md-4" style="text-align: left">
												<center><h3 style="margin-top: 0px;margin-bottom: 0px"><?php echo '$'.($total_price+$shipping+$estimated_tax); ?></h3></center>
											</div>

										</div>
									</div>
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
                               
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout" >

											<div class="panel panel-default plain" >
											
												<div class="panel-heading" style="cursor: auto">
													
													<p><strong><h4>Your Cart : <?php echo $total_product; ?> items</h4></strong></p>
												
												</div>
												
												<div class="row">
													<div class="col-lg-4 col-md-4">
														<strong><p>1. Shipping address</p></strong>
													</div>
													<div class="col-lg-6 col-md-6">
															<p><?php echo $user_fname.' '.$user_lname;?>
															1831 VASAR AVE
															MOUNTAIN VIEW CA 94043-4442</p>
													</div>
													<div class="col-lg-2 col-md-2">
															<a href="#">Change</a>
													</div>
												</div>
												<div class="row">
													<hr>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4">
														<strong><p>2. Payment Method</p></strong>
													</div>
													<div class="col-lg-6 col-md-6">
															<p><img src="assets/img/visa.png" height="12.5px" width="50px"><strong>Visa</strong> ending in 1627<br>
															Billing Address : same as Shipping Address.<br>
															Add promotion Code
															<input type="text"/>&nbsp;<button class="btn btn-default">Apply</button>
															</p>
															
													</div>
													<div class="col-lg-2 col-md-2">
															<a href="#">Change</a>
													</div>
												</div>
												<div class="row">
													<hr>
												</div>
												<div class="row">
													<div class="col-lg-12 col-md-12">
														<strong><p>3. Review items and shipping</p></strong>
													</div>
													<?php
													$order=mysql_query("select * from transection where user_id='$user_id' and status='cart added'");
													while($arr=mysql_fetch_array($order))
													{
														$prod_id=$arr['product_id'];
														$product=mysql_query("select * from product where product_id='$prod_id'");
														while($prodarr=mysql_fetch_array($product))
														{ 
															$img=explode(',',$prodarr['image_thumb_path']);
													?>
														<div class="row">
															<div class="col-lg-2 col-md-2">
																<img src="images/products/<?php echo $img[0]; ?>" style="height: 100px;width: 100px;">
															</div>
															<div class="col-lg-8 col-md-8">
																<p><strong><?php echo $prodarr['name']; ?></strong></p>
																<p></p>
																<p style="color: green"><strong><i><?php echo $arr['delivery_type']; ?></i></strong></p>
															</div>	
															<div class="col-lg-2 col-md-2">	
																<p><strong><h3><?php echo $prodarr['price']; ?></h3></strong></p>
																Qty
																<select>
																	<option <?php if($arr['unit']=="1"){echo "selected";} ?>>1</option>
																	<option <?php if($arr['unit']=="2"){echo "selected";} ?>>2</option>
																	<option <?php if($arr['unit']=="3"){echo "selected";} ?>>3</option>
																	<option <?php if($arr['unit']=="4"){echo "selected";} ?>>4</option>
																	<option <?php if($arr['unit']=="5"){echo "selected";} ?>>5</option>
																	<option <?php if($arr['unit']=="6"){echo "selected";} ?>>6</option>
																</select>
															</div>
													</div>
												   <?php }
														
													}
													?>
													
												</div>
												<div class="row">
													<hr>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4">
														<a href="#" id="place_order2" data-toggle="modal" data-target="#myModal"><img src="assets/img/placeorder.png" class="img-responsive mt10"></a>
													</div>
													<div class="col-lg-8 col-md-8" style="text-align: left">
														<p><h3 style="margin-top: 0px;margin-bottom: 0px">Order Total : <?php echo '$'.$total_price; ?></h3></p>
													</div>
												</div>
												
												

											</div>
										</div>	
									
								<script>
									$("#place_order").click(function(){
										<?php
										$order=mysql_query("select * from transection where user_id='$user_id' and status='cart added'");
										$mail="";
										$mail=mysql_query("select email from users where oauth_uid='$user_id'");
										$getmail=mysql_fetch_array($mail);
										while($arr=mysql_fetch_array($order))
										{
											$prod_id=$arr['product_id'];
											$product=mysql_query("select * from product where product_id='$prod_id'");
											while($prodarr=mysql_fetch_array($product))
											{
												$user_id=$_SESSION['user_id'];
												$user_name=$_SESSION['user_name'];
												$product_id=$prodarr['product_id'];
												$product_name=$prodarr['name'];
												$image_path=$prodarr['image_path'];
												$image_thumb_path=$prodarr['image_thumb_path'];
												$price=$prodarr['price'];
												$delivery_type=$arr['delivery_type'];
												$unit=$arr['unit'];
												$datetime=date('Y-m-d H:m:s');
												
												$set_order=mysql_query("INSERT INTO `order_master`(`user_id`, `user_name`, `product_id`, `product_name`, `image_path`, `image_thumb_path`, `price`, `delivery_type`, `unit`, `datetime`) VALUES ('$user_id','$user_name','$product_id','$product_name','$image_path','$image_thumb_path','$price','$delivery_type','$unit','$datetime')");
											}
										}
										
											$order_update=mysql_query("UPDATE `transection` SET `status`='Confirmed' WHERE `user_id`='$user_id'");
										mail($getmail[0],"Product Order Confirmation","Your Order has been confirmed. You will receive your product in 3-5 working days");
											
										?>
									});
									$("#place_order2").click(function(){
										<?php
										$order=mysql_query("select * from transection where user_id='$user_id' and status='cart added'");
										$mail=mysql_query("select email from users where oauth_uid='$user_id'");
										$getmail=mysql_fetch_array($mail);
										while($arr=mysql_fetch_array($order))
										{
											$prod_id=$arr['product_id'];
											$product=mysql_query("select * from product where product_id='$prod_id'");
											while($prodarr=mysql_fetch_array($product))
											{
												$user_id=$_SESSION['user_id'];
												$user_name=$_SESSION['user_name'];
												$product_id=$prodarr['product_id'];
												$product_name=$prodarr['name'];
												$image_path=$prodarr['image_path'];
												$image_thumb_path=$prodarr['image_thumb_path'];
												$price=$prodarr['price'];
												$delivery_type=$arr['delivery_type'];
												$unit=$arr['unit'];
												$datetime=date('Y-m-d H:m:s');
												
												$set_order=mysql_query("INSERT INTO `order_master`(`user_id`, `user_name`, `product_id`, `product_name`, `image_path`, `image_thumb_path`, `price`, `delivery_type`, `unit`, `datetime`) VALUES ('$user_id','$user_name','$product_id','$product_name','$image_path','$image_thumb_path','$price','$delivery_type','$unit','$datetime')");
											}
										}
										$order_update=mysql_query("UPDATE `transection` SET `status`='Confirmed' WHERE `user_id`='$user_id'");
										
										mail($getmail[0],"Product Order Confirmation","Your Order has been confirmed. You will receive your product in 3-5 working days");
										?>
									});
							$(document).ready(function(){

									
							var rsinner = $('.chat-box .chat-messages');
							rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);
								var title=$('.panel-heading').text();
								$('.chat-box .chat-messages').append('<li><div class="avatar"><img src="assets/img/ercado_logo.png" alt=""></div><div class="message"><p class="chat-name"><span class="chat-time"> now </span></p><p class="chat-txt">Topic is set to cart finalize and place the order</p></div></li>');
								
								
								<?php 
									$user= $_SESSION['user_name'];
									if($user==''){$user="Guest";}
									$user_id=$_SESSION['user_id'];
									if($user_id==''){$user_id="1001";}
									$message= "Topic is set to cart finalize and place the order";
									$date_time=date('Y-m-d H:m:s');
									$owner="admin";
									$query=mysql_query("INSERT INTO `chat`(`user_id`,`user_name`,`message`,`owner`,`msg_time`) VALUES ('$user_id','$user','$message','$owner','$date_time')");		
									
								
								?>

						});

						</script>
								
							   

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
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php $user_id=$_SESSION['user_id'];
		$orderid=mysql_query("select max(order_id) from order_master where user_id='$user_id'");
		$order_id_data=mysql_fetch_array($orderid);
		
		
		?>
      <div class="modal-body">
		<center>
    	<h1><p>Thank You</p></h1>
     	<p>Your Order No. is <?php echo $order_id_data[0];?></p>
     	<p>Please call anytime with any Questions or Conserns.</p> 
     	
     	</center>  
      </div>
      <div class="modal-footer">
        <center>
        <a href="index.php"><button type="button" class="btn btn-primary">Go to Home Page</button></a>
        </center>
      </div>
    </div>
  </div>
</div>
        </div>
            
        <!-- End #content -->
        <?php include("footer.php"); ?>
		
    </body>
</html>