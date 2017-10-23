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
            <h3>Tutor Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Contact Admin</a></li>
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
            <?php include 'template/tutor_menu.php'?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="row">
			<div class="col-md-9 col-sm-9">
            <h4>Contact Admin</h4>
			
										<p style="color:green;font-weight:bold; " ><?php echo $this->session->flashdata('msg'); ?></p>
										<p style="color:red;font-weight:bold; " ><?php echo $this->session->flashdata('errormsg'); ?></p>
            </div>
        </div><hr />
        <div class="row" >
          <div class="details col-md-12 cntadmin" style="display:block;">
            <form method="post" action="<?php echo base_url(); ?>tutor_dashboard/contact_admin"  >
               <div class="form-group name">
                <label for="name">Question Type</label>
                <select class="form-control" name="question_type" required>
                	<option value="" >Feed Back</option>
                    <option value="Complaint" >Complaint</option>
                    <option value="A Request" >A Request</option>
                    <option value="Others" >Others</option>
                </select>
				<?php echo form_error('question_type','<div class="error" >','</div>'); ?>
              </div>
              <!--//form-group-->
              <div class="form-group name">
              <label for="name">Subject</label>
              	<input type="text" name="subject" value="<?php echo set_value('subject'); ?>" required class="form-control input-lg"/>
				<?php echo form_error('subject','<div class="error" >','</div>'); ?>
              </div>
              <div class="form-group name">
                <label for="name">Details</label>
                <textarea required name="message"  placeholder="Details" class="form-control" rows="4"><?php echo set_value('message'); ?></textarea>
				<?php echo form_error('message','<div class="error" >','</div>'); ?>
              </div>            
              <div class="form-group name"><br />
                <button type="submit" class="btn btn-primary">SEND</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'?>
