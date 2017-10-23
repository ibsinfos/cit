<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(!empty($page_title)) echo $page_title;else echo 'CHICAGO INSTITUTE'; ?></title>
<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/css/iconmoon.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<!-- Full Calender CSS -->
	<link href="<?php echo base_url(); ?>css/fullcalendar.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="<?php echo base_url(); ?>css/owl.carousel.css" rel="stylesheet">
	<!-- Pretty Photo CSS -->
	<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet">
	<!-- Bx-Slider StyleSheet CSS -->
	<link href="<?php echo base_url(); ?>css/jquery.bxslider.css" rel="stylesheet"> 
	<!-- Font Awesome StyleSheet CSS -->
	<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>svg/style.css" rel="stylesheet">
	<!-- Widget CSS -->
	<link href="<?php echo base_url(); ?>css/widget.css" rel="stylesheet">
	<!-- Typography CSS -->
	<link href="<?php echo base_url(); ?>css/typography.css" rel="stylesheet">
	<!-- Shortcodes CSS -->
	<link href="<?php echo base_url(); ?>css/shortcodes.css" rel="stylesheet">
	<!-- Custom Main StyleSheet CSS -->
	<link href="<?php echo base_url(); ?>css/mainstyle.css" rel="stylesheet">
	<!-- Color CSS -->
	<link href="<?php echo base_url(); ?>css/color.css" rel="stylesheet">
	<!-- Responsive CSS -->
	<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">
	<!-- SELECT MENU -->
	<link href="<?php echo base_url(); ?>css/selectric.css" rel="stylesheet">
	<!-- SIDE MENU -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.sidr.dark.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	
<!--<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.css" rdel="stylesheet">-->
<link href="<?php echo base_url(); ?>assets/css/chosen.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/jquery.mobile-menu.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>cs-smartstudy-plugin.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/color.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/widget.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/backTop.css" rel="stylesheet" type="text/css" />
 <!-- Revolution slider -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/settings.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-settings.css"/>
<!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="<?php echo base_url(); ?>assets/scripts/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/modernizr.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/bootstrap.min.js"></script>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	<!-- Side Menu Start -->
	<div id="overlay"></div>
    <div id="mobile-menu">
        <ul>
            <li>
                <div class="mm-search">
                    <form id="search" name="search" method="post" action="<?php echo base_url(); ?>courses/search_all" >
                        <div class="input-group">
                            <input type="text" class="form-control simple" placeholder="Search ..." name="hcourse_title" id="srch-term">
					   <div class="input-group-btn">
                                <button class="btn btn-default" name="course_search_btn_mn" value="1"  type="submit"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="active"><a href="<?php echo base_url(); ?>aboutus">About Us</a></li>
            <li><a href="<?php echo base_url(); ?>courses/oncampus">On Campus</a>
            	<ul>
                   <?php $msql=$this->db->query("SELECT courses.course_id,courses.course_name,course_batches.batch_id  FROM courses,course_batches,cb_type 
								WHERE 
								courses.course_id=course_batches.cb_course_id 
                                AND
	course_batches.batch_id=cb_type.cbtype_batch_id AND
                                cb_type.cbtype_name='oncampus'  GROUP BY courses.course_id");
								$rec_menu=$msql->result();
								foreach($rec_menu as $mrow):
								?>
								<li><a href="<?php echo base_url(); ?>courses/oncampus_course/<?php echo $mrow->course_id; ?>"><?php echo $mrow->course_name; ?></a></li>
								<?php endforeach; ?>
                </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>courses/online">Online</a>
            	<ul>
                   <?php $msql=$this->db->query("SELECT courses.course_id,courses.course_name,course_batches.batch_id  FROM courses,course_batches,cb_type 
								WHERE 
								courses.course_id=course_batches.cb_course_id 
                                AND
	course_batches.batch_id=cb_type.cbtype_batch_id AND
                                cb_type.cbtype_name='online'  GROUP BY courses.course_id");
							$rec_menu=$msql->result();
							foreach($rec_menu as $mrow):
							?>
							<li><a href="<?php echo base_url(); ?>courses/online_course/<?php echo $mrow->course_id; ?>"><?php echo $mrow->course_name; ?></a></li>
							<?php endforeach; ?>
                </ul>
            </li>
             <li><a href="<?php echo base_url(); ?>corporate_training">Corporate Training</a></li>
            <li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
            <li><a href="<?php echo base_url(); ?>live_projects">Live Projects</a></li>
            <li><a href="<?php echo base_url(); ?>internship">Internship</a></li>                             
            <li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
            
            <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>	
        </ul>
    </div>
	<!-- Side Menu End -->
	<!-- Header Start -->
	<header id="header" class=""> 
		<div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ul class="top-nav nav-left">
                            <li><i class="icon-phone3"></i> <a href="#"><?php echo $res_setting->mobile; ?></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    	<div class="cs-user">
                            <ul>	
<?php
$url_dash=$this->session->userdata('usr_usertype')=='student' ? 'Student_dashboard':'Tutor_dashboard' ;
$url_usr=base_url().''.$url_dash;
$url_log1=base_url().''.$url_dash.'/logout';
?>							
                                <li><a  href="<?php echo $url_usr; ?>" ><i class="icon-user2"></i>My Account</a></li>
								<li><a  href="<?php echo $url_log1; ?>" ><i class="icon-user2"></i>Logout</a></li>
                                <li>
                                    <div class="cs-user-login">
                                        <div class="cs-media">
                                            <figure><i class="icon-globe"></i></figure>
                                        </div>
                                        <a href="#">
										<?php										
										if(!$this->session->userdata('cit_country'))
										{
											echo 'Countries';
										}else{
											echo $this->session->userdata('cit_country');
										}
										?>
										</a>
                                        <ul>
										<?php
											$res_country=$this->User_model->get_countries();
											$cntr=1;
											foreach($res_country as $row_country){
										?>
										   <form method="post" action="<?php echo base_url(); ?>home/country" name="myform_country" id="myform_country<?php echo $cntr; ?>" >
										   <input type="hidden" name="drpcountry_url" value="<?php echo current_url(); ?>" />
										   <input type="hidden" name="drpcountry_name" value="<?php echo $row_country->country_name; ?>" />
										   <input type="hidden" name="drpcountry_id" value="<?php echo $row_country->country_id; ?>" />
                                            <li><a href="javascript:document.getElementById('myform_country<?php echo $cntr; ?>').submit();"><img src="<?php echo base_url(); ?>images/country/<?php echo $row_country->country_image; ?>" alt=""> <?php echo $row_country->country_name; ?></a></li>
											</form> 
										<?php	$cntr++;
												} ?>
                                            
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="cs-modal">
                            <div class="modal fade" id="cs-signup" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Create Account</h4>
                                            <div class="cs-login-form">
                                                <form>
                                            <div class="input-holder">
                                                <label for="cs-username">
                                                    <strong>USERNAME</strong>
                                                    <i class="icon-add-user"></i>
                                                    <input type="text" class="" id="cs-username" placeholder="Type desired username">
                                                </label>
                                            </div>
                                            <div class="input-holder">
                                                <label for="cs-email">
                                                    <strong>Email</strong>
                                                    <i class="icon-envelope"></i>
                                                    <input type="email" class="" id="cs-email" placeholder="Type desired Email">
                                                </label>
                                            </div>
                                            <div class="input-holder">
                                                <label for="cs-email">
                                                    <strong>Phone</strong>
                                                    <i class="icon-phone"></i>
                                                    <input type="Phone" class="" placeholder="Phone/ Mobile Number">
                                                </label>
                                            </div>
                                            <div class="input-holder">
                                                <label for="cs-login-password">
                                                    <strong>Password</strong>
                                                    <i class="icon-lock"></i>
                                                    <input type="password" id="cs-login-password" placeholder="******">
                                                </label>
                                            </div>
                                            <div class="input-holder">
                                                <label for="cs-confirm-password">
                                                    <strong>confirm password</strong>
                                                    <i class="icon-lock"></i>
                                                    <input type="password" id="cs-confirm-password" placeholder="******">
                                                </label>
                                            </div>
                                            
                                            <div class="input-holder">
                                                <input class="cs-color csborder-color" type="submit" value="Create Account">
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a data-dismiss="modal" data-target="#cs-login" data-toggle="modal" href="javascript:;" aria-hidden="true">Already have account</a>
                                            <div class="cs-separator"><span>or</span></div>
                                            <div class="cs-user-social">
                                                <em>Signin with your Social Networks</em>
                                                <ul>
                                                    <li><a href="#" data-original-title="facebook"><i class="icon-facebook-f"></i>facebook</a></li>
                                                    <li><a href="#" data-original-title="twitter"><i class="icon-twitter4"></i>twitter</a></li>
                                                    <li><a href="#" data-original-title="google-plus"><i class="icon-google4"></i>google</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="cs-login" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>User Sign in</h4>
                                            <div class="cs-login-form">
                                                <form>
                                                    <div class="input-holder">
                                                        <label for="cs-username-1">
                                                            <strong>USERNAME</strong>
                                                            <i class="icon-add-user"></i>
                                                            <input type="text" class="" id="cs-username-1" placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <label for="cs-login-password-1">
                                                            <strong>Password</strong>
                                                            <i class="icon-lock"></i>
                                                            <input type="password" id="cs-login-password-1" placeholder="******">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <a class="btn-forgot-pass" data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" href="javascript:;" aria-hidden="true"><i class=" icon-question-circle"></i> Forgot password?</a>                                                    </div>
                                                    <div class="input-holder">
                                                        <input class="cs-color csborder-color" type="submit" value="SIGN IN">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="cs-separator"><span>or</span></div>
                                            <div class="cs-user-social">
                                                <em>Signin with your Social Networks</em>
                                                <ul>
                                                    <li><a href="#" data-original-title="facebook"><i class="icon-facebook-f"></i>facebook</a></li>
                                                    <li><a href="#" data-original-title="twitter"><i class="icon-twitter4"></i>twitter</a></li>
                                                    <li><a href="#" data-original-title="google-plus"><i class="icon-google4"></i>google</a></li>
                                                </ul>
                                            </div>
                                            <div class="cs-user-signup">
                                                <i class="icon-add-user"></i>
                                                <strong>Not a Member yet? </strong>
                                                <a class="cs-color" data-dismiss="modal" data-target="#cs-signup" data-toggle="modal" href="javascript:;" aria-hidden="true">Signup Now</a>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="user-forgot-pass" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Password Recovery</h4>
                                            <div class="cs-login-form">
                                                <form>
                                                    <div class="input-holder">
                                                        <label for="cs-email-1">
                                                            <strong>Email</strong>
                                                            <i class="icon-envelope"></i>
                                                            <input type="email" class="" id="cs-email-1" placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <input class="cs-color csborder-color" type="submit" value="Send">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="cs-user-signup">
                                                <i class="icon-add-user"></i>
                                                <strong>Not a Member yet? </strong>
                                                <a href="javascript:;" data-toggle="modal" data-target="#cs-signup" data-dismiss="modal" class="cs-color" aria-hidden="true">Signup Now</a>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <ul class="top-nav nav-right">
                            <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
                            <li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
                            <!--<li><a href="faqs.php">Faqs</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="cs-logo cs-logo-dark">
                            <div class="cs-media">
                                <figure><a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></a></figure>
                            </div>
                        </div>
                        <div class="cs-logo cs-logo-light">
                            <div class="cs-media">
                                <figure><a href="<?php echo base_url(); ?>/home"><img src="<?php echo base_url(); ?>assets/images/cs-logo-light.png" alt="" /></a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
                        <div class="cs-main-nav pull-right">
                            <nav class="main-navigation">
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>courses/oncampus">On Campus <i class="fa fa-angle-down"></i></a>
                                    	<ul>
                              <?php $msql=$this->db->query("SELECT courses.course_id,courses.course_name,course_batches.batch_id  FROM courses,course_batches,cb_type 
								WHERE 
								courses.course_id=course_batches.cb_course_id 
                                AND
	course_batches.batch_id=cb_type.cbtype_batch_id AND
                                cb_type.cbtype_name='oncampus'  GROUP BY courses.course_id");
								$rec_menu=$msql->result();
								foreach($rec_menu as $mrow):
								?>
								<li><a href="<?php echo base_url(); ?>courses/oncampus_course/<?php echo $mrow->course_id; ?>"><?php echo $mrow->course_name; ?></a></li>
								<?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>courses/online">Online <i class="fa fa-angle-down"></i></a>
                                    	<ul>
                       <?php $msql=$this->db->query("SELECT courses.course_id,courses.course_name,course_batches.batch_id  FROM courses,course_batches,cb_type 
								WHERE 
								courses.course_id=course_batches.cb_course_id 
                                AND
	course_batches.batch_id=cb_type.cbtype_batch_id AND
                                cb_type.cbtype_name='online'  GROUP BY courses.course_id");
								$rec_menu=$msql->result();
								foreach($rec_menu as $mrow):
								?>
								<li><a href="<?php echo base_url(); ?>courses/online_course/<?php echo $mrow->course_id; ?>"><?php echo $mrow->course_name; ?></a></li>
								<?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>corporate_training">Corporate Training</a></li>
                                    <li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
                                    <li><a href="<?php echo base_url(); ?>live_projects">Live Projects</a></li>
                                    <li><a href="<?php echo base_url(); ?>internship">Internship</a></li>                                    
                                    <!--<li class="menu-item-has-children"><a href="#">Courses</a>
                                        <span>Online Education</span>
                                        <ul>
                                            <li><a href="courses-grid.html">Courses grid view</a></li>
                                            <li><a href="courses-simple.html">Courses Simple view</a></li>
                                            <li><a href="courses-listing.html">Courses list view</a></li>
                                            <li><a href="cs-courses-detail.html">Courses Detail</a></li>
                                        </ul>
                                    </li>-->
                                   
                                    <li class="cs-search-area">
                                        <div class="cs-menu-slide">
                                            <div class="mm-toggle">
                                                <i class="icon-align-justify"></i>                                            </div>            
                                        </div>
                                        <div class="search-area">
                                            <a href="#"><i class="icon-search2"></i></a>
                                            <form method="post" action="<?php echo base_url(); ?>courses/search_all">
                                                <div class="input-holder">
                                                    <i class="icon-search2"></i>
                                                    <input type="text" name="hcourse_title" placeholder="Enter any keyword">
                                                    <label class="cs-bgcolor">
                                                        <i class="icon-search5"></i>
                                                        <input type="submit" name="course_search_btn_mn" value="search">
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            <!--<div class="cs-search-area hidden-md hidden-lg">
                                <div class="cs-menu-slide">
                                    <div class="mm-toggle">
                                        <i class="icon-align-justify"></i>                                    </div>            
                                </div>
                                <div class="search-area">
                                    <a href="#"><i class="icon-search2"></i></a>
                                    <form>
                                        <div class="input-holder">
                                            <i class="icon-search2"></i>
                                            <input type="text" placeholder="Enter any keyword">
                                            <label class="cs-bgcolor">
                                                <i class="icon-search5"></i>
                                                <input type="submit" value="search">
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
			</div>
		</div>
  </header>
	<!-- Header End --> 