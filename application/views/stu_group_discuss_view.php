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
              <li><a href="#">Question &amp; Answers</a></li>
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
			<div class="col-md-12 col-sm-12">
            <h4>Question &amp; Answers</h4>
            </div>
            <!--<div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <a class="hvr-wobble-vertical btn btn-primary btn-md pull-right" href="stu_ask.php"> + Ask A Question</a>
        </div>
            </div>-->
		</div><hr/>
        <div class="row">
            	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 well stdashcour">
                	<div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Search Topic"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="<?php echo base_url(); ?>Student_dashboard/gd_ask_question" class="btn btn-darkred btn-lg hunper"><i class="fa fa-bullhorn"></i> Ask Question</a>
                        </div>
                    </div>
                </div>
            </div>
      		<div class="tabautoscr">
            	<table class="table table-bordered table-striped quesanw">
            	<tr class="trbold">
                    <td>Question</td>
                    <td align="center">Answered</td>
                    <td>Created Date</td>                    
                    <td align="center">Last Answered Date</td>
                    <td>Status</td>
                    <td align="center">View</td>
                </tr>
				<?php foreach($questions_all as $row): ?>
                <tr>
                    <td><a href="<?php echo base_url(); ?>Student_dashboard/gd_answer_question/<?php echo $row->question_id; ?>" class="qlink"><?php echo $row->qs_title; ?></a></td>
                    <td align="center">
					<?php
					  $sql=$this->db->query("SELECT * FROM `answers` WHERE `as_question_id`='".$row->question_id."' AND `as_status`=1");
					  echo $sql->num_rows();
					 ?>
					</td>
                    <td align="center"><?php echo date('d-m-Y',strtotime($row->qs_date));?></td>
                    <td align="center"><?php
                      $sql1=$this->db->query("SELECT * FROM `answers` WHERE `as_question_id`='".$row->question_id."' AND `as_status`=1 ORDER by as_id DESC limit 1");
					  $dddate=$sql1->row();
					  if(!empty($dddate))
					echo date('d-m-Y',strtotime($dddate->as_date));?></td>
                    <td class="completed">Open</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="<?php echo base_url(); ?>Student_dashboard/gd_answer_question/<?php echo $row->question_id; ?>"><i class="fa fa-eye"></i>View</a> 
						<?php if($this->session->userdata('user_id_sess')==$row->qs_userid){ ?>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>student_dashboard/group_discussion_del/<?php echo $this->session->userdata('gd_course_id'); ?>/<?php echo $this->session->userdata('gd_batch_id'); ?>/<?php echo $row->question_id; ?>"><i class="fa fa-close"></i> Delete</a>
						<?php } ?>
                    </td>
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
<?php include 'template/footer.php'?>