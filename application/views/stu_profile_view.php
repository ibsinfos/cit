<?php include 'template/dash_header.php'?>
<link href="<?php echo base_url(); ?>css/sidemenu.css" type="text/css" rel="stylesheet"/>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Student Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>Student_dashboard">Dashboard</a></li>
              <li><a href="#">Profile</a></li>
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
            <?php include 'template/stdash_menu.php'?>
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
            <h4>Profile</h4>
			<p style="color:green;font-weight:bold; " ><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        </div><hr />
        <div class="row" >
		
		<?php if(validation_errors() || isset($error)) : ?>
				<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?php if(!empty($error)) print_r($error); ?>
				</div>
				<?php endif; ?>
		  <form method="post" action="<?php echo base_url(); ?>student_dashboard/profile" enctype="multipart/form-data" >
          <div class="details col-md-6">
            
              
          <div class="details col-md-6">
            
			<?php if(!empty($res_std->std_image)){ ?>
              <div class="form-group name">
                <label for="name">Student Image</label>
				
                <img src="<?php echo base_url(); ?>images/profile/<?php echo $res_std->std_image; ?>" width="120" height="120">
              </div>
			<?php } ?>
			 <p><b>(Only jpeg,jpg,gif,png files allowed,Max size:2MB)</b></p>
              <div class="form-group name">
                <label for="name">Upload Profile Pic </label>
                <input id="std_file" type="file" name="std_file" class="form-control" required >
              </div>
              <!--//form-group-->
             
              <!--//form-group-->
              <div class="form-group name"><br />
			   <input type="hidden" name="name" value="1" />
                <button type="submit" class="btn btn-primary col-md-6">Update</button>
              </div>
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
<?php include 'template/footer.php'; ?>
