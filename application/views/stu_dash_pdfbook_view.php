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
              <li><a href="<?php echo base_url(); ?>student_dashboard">Dashboard</a></li>
              <li><a href="#">eBooks</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<div class="row">
			<div class="col-md-9 col-sm-9">
            <h4><?php echo $ebooks->se_title; ?>

			</h4>
            </div>
            <div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <a class="hvr-wobble-vertical btn btn-primary btn-md pull-right" href="<?php echo base_url(); ?>student_dashboard/ebooks"><i class="fa fa-angle-left"></i> Back</a>
        </div>
            </div>
        </div>
            <object data="<?php echo base_url(); ?>images/ebooks/<?php echo $ebooks->se_pdf; ?>" type="application/pdf" width="100%">
   <!--<p><b>Example fallback content</b>: This browser does not support PDFs. Please download the PDF to view it: <a href="/pdf/sample-3pp.pdf">Download PDF</a>.-->
   </p>
</object>      		
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
