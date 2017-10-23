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
              <li><a href="#">Quiz/Exam</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<div class="row">
			<div class="col-md-9 col-sm-9">
            <h4>Quiz/Exam</h4>
            </div>
            <div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <select>
            <option>Filter By Course</option>
                <option value="1">Web Designing</option>
                <option value="9">Android Development</option>
                <option value="2">SAP Basics</option>
                <option value="3">Computer Hard ware &amp; Networking</option>
                <option value="6">Sales Force</option>
            </select>
        </div>
            </div>
		</div><hr style="margin-top:0px;"/>
        <div class="tabautoscr">
      		<table class="table table-bordered table-striped responsive quesanw" width="100%">
            	<tr class="trbold">
                    <td>Quiz Name</td>
                    <td>Course Name</td>
                    <td>Download</td>
                    <td>Upload Answer Sheet</td>
                    <td>Result</td>
                    <td>Status</td>
                </tr>
				<?php foreach($quiz_all as $row):
                     
                       $ex_data=$this->db->query("SELECT * FROM `exams` WHERE ex_qz_id=".$row->qz_id."");
                        $rec=$ex_data->row();
                        if(!empty($rec))
						 $status=$rec->ex_status;
                          else
                          	$status='Need To Write';						  
				?>
                <tr>
                    <td><?php echo $row->qz_name; ?></td>
                    <td><?php echo $row->course_name; ?></td>
                    <td><a href="<?php echo base_url(); ?>quiz/<?php echo $row->qz_filename; ?>"><i class="fa fa-download"></i> Download</a></td>
                    <td class="text-success">
					<!--<input class="form-group" type="file" accept="image/gif, image/jpeg, image/png,application/pdf,application/doc,application/docx" name="filename">-->
					<a href="<?php echo base_url(); ?>Student_dashboard/quiz_upload_answer_sheet/<?php echo $row->qz_id; ?>" >Upload Answer Sheet</a>
					</td>
                    <td></td>
                    <td class="need"><?php echo $status; ?> </td>
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
