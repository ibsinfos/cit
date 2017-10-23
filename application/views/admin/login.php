<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>admin-template/plugins/images/favicon.png">
<title>Chicago Institute of Technology Admin</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>admin-template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>admin-template/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>admin-template/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>admin-template/css/colors/blue.css" id="theme"  rel="stylesheet">
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
<section id="wrapper" class="login-register">
  <div class="login-box">
  <div class="white-box">
<form method="post" class="form-horizontal form-material" id="loginform" action="<?php echo base_url(); ?>admin/login/validate_credentials"  >
	  <a href="javascript:void(0)" class="text-center db"><img src="<?php echo base_url(); ?>admin-template/plugins/images/logo.png" alt="Home"><br></a>
	    <br />
        <h3 class="box-title m-b-20">ADMIN Login </h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" name="user_name"  type="text" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password">
          </div>
        </div>
<?php 
if(isset($message_error) && $message_error){
          echo '<div class="alert alert-danger alert-dismissable">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>OOps!</strong>   Invalid Username and Password ';
          echo '</div>';             
      }
?>
       
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
       
      </form>
      <form class="form-horizontal" id="recoverform" action="index.html">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>admin-template/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>admin-template/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>admin-template/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>admin-template/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
