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
              <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
              <li><a href="#">Ask A Question</a></li>
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
            <?php include 'template/stdash_menu.php'; ?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 dashcontentpad">
      <div class="row">
			<div class="col-md-9 col-sm-9">
            <h4>Ask A Question</h4>
            </div>
            <div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <a class="hvr-wobble-vertical btn btn-primary btn-md pull-right" href="<?php echo base_url(); ?>student_dashboard/group_discussion_view1/<?php echo $this->session->userdata('gd_course_id'); ?>/<?php echo $this->session->userdata('gd_batch_id'); ?>" style="border-radius:0px;"><i class="fa fa-angle-left"></i> Back</a>
        </div>
            </div>
        </div>
        <hr style="margin-top:0px;"/>
            <div class="blog_pg_form">
			<?php if($form_submit==1){ echo "<p style='color:green; font-weight:bold; ' >Your Question Posted Successfully</p>"; } ?>
			<?php if($form_submit==0){ ?>
                <form method="post" action="<?php echo base_url(); ?>Student_dashboard/gd_question_post" >
                    <div class="row">                                       
                        <div class="col-md-12 col-sm-12" style="display:block;">
                         <p><strong>Question Title</strong></p>
                            <input type="text" placeholder="Name" required name="qs_title" id="qs_title" >
                        </div>                                           
                        <div class="col-md-12 col-sm-12" style="display:block;">
                         <p><strong>Question Details</strong></p>
                            <textarea name="qs_des" placeholder="Type Here"></textarea>
                        </div>
                    </div>
                    <button type="submit">Post Question</button>
                </form>
			<?php } ?>
            </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
