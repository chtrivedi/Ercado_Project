<?php 
?>
 <div id="preloader">
  <div id="preloader-logo"> <img src="assets/img/preloader-logo.png" alt="Logo"> </div>
  <div id="preloader-icon"> <i class="im-spinner icon-spin"></i> </div>
</div>
<!-- Start #header -->
<div id="header">
  <div class="container-fluid">
    <div class="navbar">
      <div class="navbar-header">
			<!-- Show navigation toggle on phones -->
			<button id="showNav" class="navbar-toggle" type="button"> 
				<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span> <span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
			</button>
			<!-- Show logo for large screens and laptops -->
			<a class="navbar-brand visible-lg visible-md" href="index.php"> <img src="assets/img/logo.png" alt="Jump start"> </a>
			<!-- Show logo for small screens -->
			<a class="navbar-brand hidden-lg hidden-md hidden-xs" href="index.php"> <img src="assets/img/logo-sm.png" alt="Jump start"> </a>
		</div>
         
      <nav id="top-nav" class="navbar-no-collapse" role="navigation">
		
        <ul class="nav navbar-nav pull-right">
          <li class="hidden-lg hidden-md">
            <!-- close button for search form in small screens -->
            <button type="button" class="close closeSearchForm" aria-hidden="true">&times;</button>
            <!-- show search button in small screens -->
            <a class="resSearchBtn hidden-lg hidden-md" href="#"><i class="im-search3"></i></a> </li>
          
          
          <li class="dropdown"> 
		  	<a href="#" data-toggle="dropdown"> 
				<img class="avatar" src="<?php if(isset($_SESSION['user_name'])){echo $user_img;}else{echo "assets/img/avatars/guest.jpg";} ?>" width="36" height="36" alt=""> 
					<span class="avatar-name"><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "Welcome Guest";}; ?></span> <span class="caret ml5"></span> 
			</a>
            <ul class="dropdown-menu right" role="menu">
              <li><a href="#"><i class="im-user"></i> Profile</a> </li>
              <li><a href="#"><i class="im-cog2"></i> Settings</a> </li>
              <li><a href="logout.php"><i class="im-switch"></i> Logout</a> </li>
            </ul>
          </li>
          <li><?php if(!isset($_SESSION['user_id'])){ ?><a href="<?php echo $loginURL; ?>"><img src="images/fblogin-btn.png"></a><?php } ?>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- End #header -->
