<?php
// Include FB config file
require_once 'fbConfig.php';

// Remove access token from session
unset($_SESSION['facebook_access_token']);

// Remove user data from session
unset($_SESSION['userData']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
// Redirect to the homepage
header("Location:index.php");
?>