<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<ul class="nav navbar-nav">
  <li <?php if ($page == 'student_dashboard.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard"><span class="fa fa-user"></span> My Account</a></li>
  <li <?php if ($page == 'stu_dash_courses_view.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/courses"><span class="fa fa-book"></span> Courses</a></li>
  <li <?php if ($page == 'stu_dash_ebooks.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/ebooks"><span class="fa fa-file-pdf-o"></span> eBooks</a></li>
  <li <?php if ($page == 'stu_dash_videos.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/video_tutorials"><span class="fa fa-youtube-play"></span> Video Tutorial</a></li>   
  <li <?php if ($page == 'stu_dash_groupdis.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/group_discussion"><span class="fa fa-users"></span> Group Discussion</a></li>
  <li <?php if ($page == 'stu_dash_quiz.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/quiz"><span class="fa fa-check"></span> Quiz / Exams</a></li>            
  <li <?php if ($page == 'stu_contact_admin.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/contact_admin"><span class="fa fa-group"></span> Contact Admin</a></li>     
  <li <?php if ($page == 'stu_settings.php') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/settings"><span class="fa fa-cogs"></span> Settings</a></li>
  <li <?php if ($page == '') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>student_dashboard/logout"><span class="fa fa-power-off"></span> Logout</a></li>
</ul>