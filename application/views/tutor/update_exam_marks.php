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
              <li><a href="#">Update Exam Marks</a></li>
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
            <h4>Update Marks</h4>
			<p style="color:green;font-weight:bold; " ><?php echo $this->session->flashdata('message'); ?></p>
            </div>
        </div><hr />
        <div class="row" >
		<form method="post" action="<?php echo base_url(); ?>tutor_dashboard/update_exam_marks/<?php echo $this->uri->segment(3); ?>" >
          <div class="details col-md-6">
   
              
              <div class="form-group name">
                <label for="name">Marks / Total Marks</label>
                <input id="name" type="text" name="marks" value="" required class="form-control" placeholder="">
				<?php echo form_error('marks','<div class="error" >','</div>'); ?>
              </div>
             
            
                <input  type="hidden" name="ex_id" value="<?php echo $this->uri->segment(3); ?>" >
               <br />
               <button>Submit</button>
            
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
