
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View course orders</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View course orders</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Content page updated .';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo validation_errors();

echo form_open_multipart('admin/course_orders/update/'.$this->uri->segment(4).'', $attributes);
  
  
  $sql=$this->db->query("SELECT * FROM `students_tbl` WHERE user_id=".$course_orders[0]['std_user_id']."");
  $rowu=$sql->row();
  $q="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_coun,cb_type 
			WHERE
			course_batches.batch_id=".$course_orders[0]['co_course_id']." AND
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.batch_id=cb_coun.cb_coun_batchid 
            AND
            course_batches.batch_id=cb_type.cbtype_batch_id  
            AND
			cb_coun.cb_coun_countryid=countries.country_id
			GROUP BY course_batches.batch_id
			";
			
  $sql1=$this->db->query($q);
  $rowc=$sql1->row();

 ?>
 
 <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/course_orders" class="btn btn-success btn-rounded" > Back</a></p>
                                <div class="form-group">
                                <label class="col-md-12">    <b>User Name :</b> 
								<?php if(!empty($rowu->std_username))   echo $rowu->std_username; ?></label>
                                    
                                        
										
										
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b> Email :</b> 
									<?php if(!empty($rowu->std_email))  echo $rowu->std_email; ?></label>
                                    <div class="col-md-12">
                                        
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12"><b> Mobile : </b> 
									<?php if(!empty($rowu->std_mobile))  echo $rowu->std_mobile; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12"><b> Course Name : </b>  <?php if(!empty($rowc->course_name)) echo $rowc->course_name; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b> Tutor Name : </b>  <?php if(!empty($rowc->tutor_name))  echo $rowc->tutor_name; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Payment Date : </b>  <?php if(!empty($course_orders[0]['co_date_time']))  echo $course_orders[0]['co_date_time']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
										
                                        
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     