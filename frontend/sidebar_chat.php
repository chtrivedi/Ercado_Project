
<style>
#style-1::-webkit-scrollbar
{
	width: 5px;
	
}

</style>


<div class="sidebar-inner" >
	<!-- Start .sidebar-panel -->
	<div class="sidebar-panel mt0 mb30">
		<!-- Start sidebar-panel-content -->
		<div class="sidebar-panel-content fullwidth pt0" style="padding-bottom: 63px;">
			
			<!-- Start chat-box -->
			<div class="chat-box chatbox-show " >
				
				<ul class="chat-messages pre-scrollable" id="style-1">
					<li>
						<div class="avatar">
							<img src="assets/img/ercado_logo.png" alt=""></div>
						<div class="message">
							<p class="chat-name"><span class="chat-time"></span></p>
							<p class="chat-txt">Hi <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "Guest";}; ?> , How are you?</p>
						</div>
					</li>
                    <li>
						<div class="avatar">
							<img src="assets/img/ercado_logo.png" alt=""></div>
						<div class="message">
							<p class="chat-name"><span class="chat-time"></span></p>
							<p class="chat-txt">I am Sarthi; search bot to help with your quest. Just type what you are looking for and I'll find it for you.</p>
						</div>
					</li>
				
                    
                    <?php
						$ssn_userid=$_SESSION['user_id'];
						if($ssn_userid==''){$ssn_userid="1001";}
						$get_chat=mysql_query("select * from chat where user_id='$ssn_userid'");
						while(@$arr=mysql_fetch_array($get_chat))
						{
							if($arr['owner']=="user")
							{
						?>
                        <li class="chat-me">
                            <div class="avatar">
                                <img src="<?php if(isset($_SESSION['user_name'])){echo $user_img;}else{echo "assets/img/avatars/guest.jpg";} ?>" alt="@<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "Guest";}; ?>"></div>
                            <div class="message">
                                <p class="chat-name"><span class="chat-time"></span></p>
                                <p class="chat-txt"><?php echo $arr['message']; ?> </p>
                            </div>
                        </li>
                        
					<?php 	}
							if($arr['owner']=="admin"){?>
						
						<li>
                            <div class="avatar">
                                <img src="assets/img/ercado_logo.png" alt=""></div>
                            <div class="message">
                                <p class="chat-name"><span class="chat-time"></span></p>
                                <p class="chat-txt"><?php echo $arr['message']; ?> </p>
                            </div>
                        </li>
						<?php	}
						}
					
					?>
                    
                    
				</ul>
              <center>
               
                <input type="radio"  value="ar"  name="topicgroup" id="topicgroup">&nbsp;Articles
                <input type="radio"  value="pr"  name="topicgroup" id="topicgroup">&nbsp;Products&nbsp;
				  <a href="cart.php" class="btn btn-primary" id="cartbtn">Cart</a>
               
              </center>
                <div class="chat-write" style="position:absolute;bottom: -63px;width: 316px;right: -7px;">
					<form id="chat_msg" action="#" class="form-horizontal" role="form">
                    
						<div class="form-group">
							<textarea name="sendMsg1" id="sendMsg12" class="form-control elastic" rows="1" placeholder="Type our query. Press enter to send."></textarea>
							<a role="button" class="btn" id="attach_photo_btn">
								<i class="im-image2 s20"></i></a>
							<input type="file" name="attach_photo" id="attach_photo" class="unstyled">

						</div>
							<!-- End .form-group  -->
					</form>
				</div>
                
                <script>
						$(document).ready(function(){
							$("textarea").keypress(function(e){

							var l=$("#sendMsg12").length;
							var rsinner = $('.chat-box .chat-messages');
							//alert("hello");

							if (e.which == 13 && ! e.shiftKey) {
								$("#LoadingImage").show(100);
								 e.preventDefault();
								 $.ajax({
								type: 'post',
								url: 'chat_data.php',
								data: $('#chat_msg').serialize(),
								success: function (data) {

								}

								 });
								 //$('#preloader-icon').hide();
								var msg=$('#sendMsg12').val();

								$('.chat-box .chat-messages').append('<li class="chat-me"><div class="avatar"><img src="<?php if(isset($_SESSION['user_name'])){echo $user_img;}else{echo "assets/img/avatars/guest.jpg";} ?>" alt="@<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "Guest";}; ?>"></div><div class="message"><p class="chat-name"><?php //echo $_SESSION['user_name']; ?><span class="chat-time"> now </span></p><p class="chat-txt">'+ msg +'</p></div></li>');
								


								$('#sendMsg12').val('').trigger('autosize.resize');
								rsinner.animate({ scrollTop: rsinner[0].scrollHeight }, 1000);
								$(function() {
								  var scrl    = $('#scroll');
								  var height = scrl[0].scrollHeight;
								  scrl.scrollTop(height);
								});
								var url="index.php";										
								var content=$("#feed");
								$('#feed').load(url + ' #feed');

								}
							});
						});
					</script>
               
              <script>
				
			  </script>
               
			</div>
	<!-- End .sidebar-panel -->
	</div>
</div>    
    
</div>







