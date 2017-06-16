<?php include("includes/configure.php"); 

$product_id=$_GET['product'];

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
                    <div class="row" id="row">
                        <!-- col-lg-4 end here -->
                        <div id="main">
                        <div class="col-lg-9 col-md-9 img-responsive" id="col2">
                            <!-- col-lg-4 start here -->
                            <div class="panel panel-default">
                                <!-- Start .panel -->
                                <div class="panel-body" id="feed">
                                
                                <div id="LoadingImage" style="display:none;margin-top: 306px;z-index: 4;position: absolute;margin-left:234px;">
                                  
                                    <img src="assets/img/loading.gif" style="height: 69px;width: 74px;"/>
                                    
                                </div>
                                
                                
								<?php
									$get_article=mysql_query("select * from product where product_id='$product_id'");

									$arr=mysql_fetch_array($get_article);
									?>
									<a href="http://www.nirvaanatechnologies.com/ercado/index.php" >Back</a>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sortable-layout">

										<div class="panel panel-default plain" >
											<div class="panel-heading" style="cursor: auto">
												<h2 class=""><strong><?php echo $arr['name']; ?></strong></h2>
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-lg-1 col-md-1">
													<?php $shareimg=0;
														$image=explode(',',$arr['image_path']);
														foreach($image as $img){
														if($img!='') {

														?>
														<a href="#" id="img<?php echo $shareimg; ?>"><img src="images/products/<?php echo $img; ?>" class="img-responsive img-thumbnail" height="50px" width="50px" alt="<?php echo $arr['title']; ?>"></a><br>

												<script>
													$('#img<?php echo $shareimg; ?>').click(function(){
														//alert("hello");
														var url="images/products/<?php echo $img; ?>";
														$('#preimage').attr("src",url);
														

													})
												</script>
													<?php $shareimg++;
														} 
													}	?>
													</div>
													<div class="col-lg-6 col-md-6">
														<?php $image=explode(',',$arr['image_path']); ?>
														<img src="images/products/<?php echo $image[0]; ?>" id="preimage" class="img-responsive" name="image_main" alt="<?php echo $arr['title']; ?>">
													</div>
													<div class="col-lg-4 col-md-4" style="border: 1px thin solid #232323">
													<form name="cartform" id="cartform" >
														<div class="row">
														<div class="panel panel-body" style="border: 1px solid burlywood;margin-bottom: 0px;">
															<input type="radio" name="delivery" id="radio-choice-1" tabindex="2" value="2-days"><label for="radio-choice-1">            &nbsp;$7<span>00</span><em>   2-day delivery</em></label><br>

															<input type="radio" name="delivery" id="radio-choice-2" tabindex="3" value="0-days"><label for="radio-choice-2">            &nbsp;$9<span>00</span><em>    same-day delivery</em></label>
															<input  type="text" value="<?php echo $product_id; ?>" name="prod_id" hidden>
															</div>
														</div>
														<div class="row" style="height: 59px;">
															<div class="panel panel-body" style="background-color:antiquewhite;border: 1px solid burlywood;">
													Quantity 	<select name="unit" class="select2-drop-auto-width" style="margin-top: 20px">
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>	
																</select>
																<a href="#" id="addcart"><button type="button" class="btn btn-brown">Add to Cart</button></a>
															</div>
														</div>
														</form>
														<script>
														$('#addcart').click(function(){
														$.ajax({
															type: 'post',
															url: 'checkout_process.php',
															data: $('#cartform').serialize(),
															success: function (data) {
																var rsinner = $('.chat-box .chat-messages');
																rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);
																$('.chat-box .chat-messages').append('<li><div class="avatar"><img src="assets/img/ercado_logo.png" alt=""></div><div class="message"><p class="chat-name"><span class="chat-time"> now </span></p><p class="chat-txt">	Item is added to the cart, Set topic "cart" to finalize the order.</p></div></li>');
															}

														});

														});
														</script>
														<br>
														<div class="row">
															<h4>Every order on ercado qualifies,</h4>
															<ul>
																<li><strong>Free delivery</strong></li>
																<li><strong>Free returns* and Pickups</strong></li>
																<li><strong>No minimum orders</strong></li>
															</ul>
														</div>
													</div>
													
													
												</div>
												<div class="row">
													<h4>Description</h4>
													<p><?php echo $arr['pro_descr']; ?></p>
													<h4>Ingredients</h4>
													<p><?php echo $arr['ingredients']; ?></p>
												</div>
											</div>

										</div>
										
									</div>	
								 </div>
                                
                            </div>
                            
                            <!-- End .panel -->
                        </div>
                        </div>
                        <script>
							$(document).ready(function(){

									
							var rsinner = $('.chat-box .chat-messages');
							rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);
								var title=$('.panel-heading').text();
								$('.chat-box .chat-messages').append('<li><div class="avatar"><img src="assets/img/ercado_logo.png" alt=""></div><div class="message"><p class="chat-name"><span class="chat-time"> now </span></p><p class="chat-txt">You are now viewing, '+ title +'</p></div></li>');
								$('.chat-box .chat-messages').append('<li><div class="avatar"><img src="assets/img/ercado_logo.png" alt=""></div><div class="message"><p class="chat-name"><span class="chat-time"> now </span></p><p class="chat-txt">Topic is now set to current page . You can change the topic to get more result.</p></div></li>');


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