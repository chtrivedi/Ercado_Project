<!-- Start #right-sidebar -->
<aside id="right-sidebar" class="">
	<!-- Start .sidebar-inner -->
	<div class="sidebar-inner">
		<!-- Start .sidebar-panel -->
		<div class="sidebar-panel mt0">
			<!-- Start sidebar-panel-content -->
			<div class="sidebar-panel-content fullwidth pt0">
				<!-- Start chat-user-list -->
				<div class="chat-user-list">
					<form class="form-horizontal chat-search" role="form">
						<div class="form-group">
							<input type="text" class="form-control input-sm" placeholder="Search for user...">
							<button type="submit"><i class="im-search3 s16"></i></button>
						</div>
						<!-- End .form-group  -->
					</form>
					<ul class="chat-ui bsAccordion">
						<li>
							<a href="#" class="chat-ui-heading">Favorites <span class="users-count">(3)</span></a>
							<ul class="in">
								<li>
									<a href="#" class="chat-name">
										<span class="chat-notification">8</span>
										<img class="chat-avatar" src="assets/img/avatars/2.jpg" alt="@chadengle">Chad Engle
										<span class="status online"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-mobile2"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<span class="chat-notification">2</span>
										<img class="chat-avatar" src="assets/img/avatars/3.jpg" alt="@jason">Jason Moore
										<span class="status busy"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-tablet"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/11.jpg" alt="@jenny">Jenny Lee
										<span class="status offline"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-screen4"></i></span></a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="chat-ui-heading">Online <span class="users-count">(4)</span></a>
							<ul class="in">
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/3.jpg" alt="@chadengle">Annete Swartz
										<span class="status online"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-mobile2"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/5.jpg" alt="@tod">Todd Simpson
										<span class="status online"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-mobile2"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/6.jpg" alt="@danny">Danny Jonsons
										<span class="status online"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-screen4"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/7.jpg" alt="@steve">Steeve Sidwell
										<span class="status online"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-tablet"></i></span></a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="chat-ui-heading">Offline <span class="users-count">(3)</span></a>
							<ul class="in">
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/8.jpg" alt="@jenna">Jenna Jamson
										<span class="status offline"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-screen4"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/9.jpg" alt="@selena">Selena Gomez
										<span class="status offline"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-mobile2"></i></span></a></li>
								<li>
									<a href="#" class="chat-name">
										<img class="chat-avatar" src="assets/img/avatars/10.jpg" alt="@mickey">Mickey Blue
										<span class="status offline"><i class="im-circle-small"></i></span>
										<span class="device"><i class="im-mobile2"></i></span></a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- End chat-user-list -->
				<!-- Start chat-box -->
				<div class="chat-box">
					<h5>
						<span class="device"><i class="im-screen4"></i></span>
						<span class="status online"><i class="im-circle-small"></i></span> Chad Engle</h5>
					<a id="close-user-chat" class="close" aria-hidden="true">&times;</a>
					<ul class="chat-messages">
						<li>
							<div class="avatar">
								<img src="assets/img/avatars/3.jpg" alt="@chadengle"></div>
							<div class="message">
								<p class="chat-name">Chad Engle <span class="chat-time">15 sec ago</span></p>
								<p class="chat-txt">Hello Sugge check out the last order.</p>
							</div>
						</li>
						<li class="chat-me">
							<div class="avatar">
								<img src="assets/img/avatars/1.jpg" alt="@jonhdoe"></div>
							<div class="message">
								<p class="chat-name">Jonh Doe <span class="chat-time">10 sec ago</span></p>
								<p class="chat-txt">Ok i will check it out.</p>
							</div>
						</li>
						<li>
							<div class="avatar">
								<img src="assets/img/avatars/3.jpg" alt="@chadengle"></div>
							<div class="message">
								<p class="chat-name">Chad Engle <span class="chat-time">now</span></p>
								<p class="chat-txt">Okay, thank you very much.</p>
							</div>
						</li>
					</ul>
                    <script>
						$(document).ready(function(){
								$("textarea").keypress(function(e){
									//alert("hello");
									if (e.which == 13 && ! e.shiftKey) {
										//alert("hello");
										 e.preventDefault();
										 $.ajax({
										type: 'post',
										url: 'chat_data.php',
										data: $('#chat_msg').serialize(),
										success: function (data) {
										 
										 //$('#message').val("");
										 //$('#chat_content').load("chat_message.php");
										
										}
										 });
										var msg=$('#sendMsg12').val();
										$('#sendMsg12').val('').trigger('autosize.resize');;
										$('.chat-box .chat-messages').append('<li class="chat-me"><div class="avatar"><img src="assets/img/avatars/1.jpg" alt="@jonhdoe"></div><div class="message"><p class="chat-name">Jonh Doe <span class="chat-time"> now </span></p><p class="chat-txt">'+ msg +'</p></div></li>');
									}
								});
							});
					</script>
					<div class="chat-write">
						<form id="chat_msg" action="#" class="form-horizontal" role="form">
							<div class="form-group">
								<textarea name="sendMsg1" id="sendMsg12" class="form-control elastic" rows="1"></textarea>
								<a role="button" class="btn" id="attach_photo_btn">
									<i class="im-image2 s20"></i></a>
								<input type="file" name="attach_photo" id="attach_photo" class="unstyled">
                                
							</div>
							<!-- End .form-group  -->
						</form>
                        
					</div>
                    
				</div>
				<!-- End chat-box -->
			</div>
			<!-- End sidebar-panel-content -->
		</div>
		<!-- End .sidebar-panel -->
	</div>
</aside>
<!-- End .sidebar-inner -->
</aside>
<!-- Start #right-sidebar -->