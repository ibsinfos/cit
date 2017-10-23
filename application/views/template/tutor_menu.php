<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<ul class="nav navbar-nav">
  <li <?php if ($page == 'tutor_dashboard.php') { ?>class="active"<?php } ?>><a href="#tutor_dashboard.php"><span class="fa fa-user"></span> My Dashboard</a></li>
  <li <?php if ($page == 'tutor_batches.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-book"></span> Batches</a></li>
  <li <?php if ($page == 'tutor_courses.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-book"></span> Courses</a></li>
  <li <?php if ($page == 'tutor_groupdis.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-users"></span> Group Discussion</a></li>
  <li <?php if ($page == 'tutor_quizandexams.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-check"></span> Quiz / Exams</a></li>            
  <li <?php if ($page == 'tutor_contact_admin.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-group"></span> Contact Admin</a></li>     
  <li <?php if ($page == 'tutor_settings.php') { ?>class="active"<?php } ?>><a href="#"><span class="fa fa-cogs"></span> Settings</a></li>
  <li <?php if ($page == '') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>Tutor_dashboard/logout"><span class="fa fa-power-off"></span> Logout</a></li>
</ul>