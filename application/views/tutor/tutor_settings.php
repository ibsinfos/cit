<?php include 'template/dash_header.php'; ?>
<link href="<?php echo base_url(); ?>css/sidemenu.css" type="text/css" rel="stylesheet"/>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Tutor Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Settings</a></li>
            </ul>
          </div>
        </div>
        <!--KF INR BANNER DES Wrap End-->
      </div>
    </div>
  </div>
</div>
<!--Banner Wrap End-->
<!--Content Wrap Start-->
<div class="kf_content_wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="side-menu">
          <!-- Main Menu -->
          <div class="side-menu-container">
            <?php include 'template/tutor_menu.php'; ?>
	
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
	  <style>
	  .error{color:red;}
	  </style>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="row">
			<div class="col-md-9 col-sm-9">
            <h4>Settings</h4>
			<p style="color:green;font-weight:bold; " ><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        </div><hr />
        <div class="row" >
		<form method="post" action="<?php echo base_url(); ?>tutor_dashboard/settings" >
          <div class="details col-md-6">
            
              <div class="form-group name">
                <label for="name">User Name</label>
                <input id="name" type="text" name="username" value="<?php echo $rec->tutor_username; ?>" class="form-control" readonly placeholder="">
              </div> 
			  
			  <div class="form-group name">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="tutor_name" value="<?php echo $rec->tutor_name; ?>" class="form-control" placeholder="" >
				<?php echo form_error('tutor_name','<div class="error" >','</div>'); ?>
              </div>
			  
              <!--//form-group-->
              <div class="form-group name">
                <label for="name">Mobile</label>
                <input id="name" type="text" name="mobile" value="<?php echo $rec->tutor_mobile; ?>" required class="form-control" placeholder="">
				<?php echo form_error('mobile','<div class="error" >','</div>'); ?>
              </div>
              <!--//form-group-->
              <!--<div class="form-group name">
                <label for="name">Re-Type Password</label>
                <input id="name" class="form-control" placeholder="6549874560" type="text">
              </div>-->
              <div class="form-group name">
                <label for="name">Higher Education</label>
                <input id="name" type="text" name="education" value="<?php echo $rec->tutor_education; ?>" class="form-control" placeholder="Btech">
              </div>
              <!--//form-group-->
              <div class="form-group name">
                <label for = "name">Gender</label>
                <label class = "checkbox-inline">
                <input type = "radio" name="gender" value="M" id = "optionsRadios3" placeholder= "option1" <?php if($rec->tutor_gender=='M')echo 'checked'; ?>>
                Male </label>
                <label class = "checkbox-inline">
                <input type = "radio" name="gender" value="F" id = "optionsRadios4" <?php if($rec->tutor_gender=='F') echo 'checked'; ?> placeholder= "option2">
                Female </label>
              </div>
            
          </div>
          <div class="details col-md-6">
            
              <div class="form-group name">
                <label for="name">Email</label>
                <input id="name" type="text" name="email" value="<?php echo $rec->tutor_email; ?>" class="form-control" placeholder="">
				<?php echo form_error('email','<div class="error" >','</div>'); ?>
              </div>
              <!--//form-group-->
              <!--<div class="form-group name">
                <label for="name">Password</label>
                <input id="name" class="form-control" placeholder="6549874560" type="text">
              </div>-->
              <div class="form-group name">
                <label for="name">Date Of Birth</label>
                <input id="datepicker" type="text" name="dob" value="<?php echo $rec->tutor_dob; ?>" class="form-control" placeholder="02-06-1992">
              </div>
              <!--//form-group-->
              <div class="form-group name">
                <label for="name">City</label>
                <input id="name" type="text" name="city" value="<?php echo $rec->tutor_city; ?>" class="form-control" placeholder="Visakhapatnam">
              </div>
              <!--//form-group-->
              <div class="form-group name"><br />
                <button type="submit" class="btn btn-primary col-md-6">Update</button>
              </div>
			     <br />
              <!--//form-group-->
            
          </div>
		  </form>
        </div>
      </div>
    </div>
  </div>
  <!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'?>
