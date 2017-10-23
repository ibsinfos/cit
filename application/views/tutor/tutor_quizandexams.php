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
            <?php include 'template/tutor_menu.php'; ?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 stdashcour stdash">
      		<h4>Quiz/ Exams</h4><hr /><br />
            <div class="row">
            	<div class="col-xs-12 col-sm-10 col-md-12 well" style="margin-left:10px;">
                	<div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Search For Quiz/Exam Topic"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="<?php echo base_url(); ?>tutor_dashboard/create_quiz" class="btn btn-darkred btn-lg hunper"><i class="fa fa-plus"></i> Upload Quiz/Exam</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabautoscr">
            	<table class="table table-bordered table-striped quesanw">
            	<tr class="trbold">
                    <td align="center">Quiz Name</td>
                    <td align="center">Course</td>
                    <td align="center">Created Date</td>                    
                    <td align="center">Batch Assign</td>
                    <td align="center">View</td>
                </tr>
				<?php foreach($quiz_list as $row): ?>
                <tr>
                    <td><a href="<?php echo base_url(); ?>Tutor_dashboard/quiz_deatils/<?php echo $row->qz_id; ?>" class="qlink"><?php echo $row->qz_name; ?></a></td>
                    <td><?php echo $row->course_name; ?></td>
                    <td align="center"><?php echo $row->qz_date; ?></td>
                    <td align="center"></td>
                    <td align="center"><a class="btn btn-sm btn-success" href="<?php echo base_url(); ?>Tutor_dashboard/quiz_deatils/<?php echo $row->qz_id; ?>"><i class="fa fa-eye"></i> View</a> </td>
                </tr>
                <?php endforeach; ?>
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
