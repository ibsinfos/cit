<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="<?php echo base_url(); ?>admin-template/plugins/image/png" sizes="16x16" href="<?php echo base_url(); ?>admin-template/plugins/images/favicon.png">
    <title>Chicago Institute of Technology Administration</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>admin-template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- vector map CSS -->
    <link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/css-chart/css-chart.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>admin-template/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>admin-template/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>admin-template/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
			<a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                
				<div class="top-left-part"><a class="logo" href="<?php echo base_url(); ?>admin"  >
				<b>
				<img src="<?php echo base_url(); ?>admin-template/plugins/images/logo.png" height="60"  alt="home" />
				
				</b>
				<!--<span class="hidden-xs">ADMIN</span>--></a>
				</div>
				<!--- Header Search Bar  ------------------>

				
 <ul class="nav navbar-top-links navbar-right pull-right">
                    
					
					  <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <!--<img src="<?php echo base_url(); ?>admin-template/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">-->
						<b class="hidden-xs">SETTINGS</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
						   
						    <li><a href="<?php echo base_url(); ?>admin/changepassword/update/1" ><i class="fa fa-file"></i> Change Password</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/account_settings/update/1" ><i class="ti-settings"></i> Website Settings</a></li>
							<li><a href="<?php echo base_url(); ?>admin/backup"  ><i class="fa fa-download"></i> DB Backup</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/logout"  ><i class="fa fa-power-off"></i> Logout</a></li>
                            
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
					
					</ul>
				
				
            </div>
			<!--<ul class="nav navbar-top-links navbar-right pull-right">
			
			   
			
			</ul>-->
           
        </nav>
 
      