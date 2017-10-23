<?php include 'template/dash_header.php';?>
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
              <li><a href="<?php echo base_url(); ?>Tutor_dashboard">Dashboard</a></li>
              <li><a href="#">Quiz/ Exams</a></li>
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
            <?php include 'template/tutor_menu.php';?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 stdashcour stdash">
      		<h4>Quiz/ Exams</h4><hr /><br />
            
            <div class="tabautoscr">
            	<table class="table table-bordered table-striped quesanw">
            	<tr class="trbold">
                    <td align="center">Batches</td>
                    <td align="center">Exam Status</td>
                    <td align="center">Status</td>      
                    <td align="center">View</td>
                </tr>
                <tr>
                    <td><?php echo $quiz_dt->cb_batchname; ?></td>
                    <td>
                    	<div class="tutebgrey" style="background:none;">
                        	<span>Need to Write </span>: 0<br />
							<span>Written </span>: 0<br />
                            <span>Correction Pending </span>: 0
                        </div>
                    </td>
                    <td align="center" class="completed">Active</td>
                    <td align="center"><a class="btn btn-sm btn-success" href="<?php echo base_url(); ?>Tutor_dashboard/tutor_exam_final_view/<?php echo $quiz_dt->batch_id; ?>"><i class="fa fa-eye"></i> View</a> </td>
                </tr>
                
            </table>
            </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
