<?php 
    session_start();
    $session_admin  =  @$_SESSION['session_admin'];
	include_once("../lib/all_files.php");
	$con->check_session($session_admin,"index.php");
	
	
	
	$admin_info = $con->all_fetch("top_admin",array('admin_email'=>$session_admin));
	foreach($admin_info as $admin){
		$admin_id        = $admin->id;
		$admin_uniqid_id = $admin->admin_uniqid_id;
		$admin_name      = $admin->admin_name;
		
		$admin_gst_state      = $admin->gst_state;
		$admin_gst_number    = $admin->gst_number;
	}  
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Hanuman</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="logo.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap-wysihtml5 css -->
      <link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
	  <link href="assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
 <link rel="stylesheet" type="text/css" href="assets/invoice.css" media="all" />
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style ========================-->
	  <link rel="stylesheet" type="text/css" href="assets/plugins/datatable/data-tabel-bs.css" media="all" /> 
     <link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
      <!--<div id="preloader">
         <div id="status"></div>
      </div>-->
	  
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="welcome.php" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.php">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                            
                           <li><a href="logout.php">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
       
         
<?php 
	//sidebar 
	include_once('sidebar.php'); 
?>

