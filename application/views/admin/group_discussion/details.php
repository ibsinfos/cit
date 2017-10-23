
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View group discussion</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View group discussion</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php
      //flash messages
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
//form data
$attributes = array('class' => 'form-horizontal', 'id' => '');

//form validation
echo validation_errors();

echo form_open_multipart('admin/group_discussion/update/'.$this->uri->segment(4).'', $attributes);
?>
                            
<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/group_discussion" class="btn btn-success btn-rounded" >Back</a></p>							
                                <div class="form-group">
                                    <b>User Name :</b>
                                  <?php
										if($group_discussion[0]['qs_usertype']=='student')
										{
											$query=$this->db->query("SELECT std_username FROM students_tbl WHERE user_id='".$group_discussion[0]['qs_userid']."'");
										  $results=$query->row();							  
										  echo $results->std_username;
										}else{
											$query=$this->db->query("SELECT tutor_name FROM tutors WHERE user_id='".$group_discussion[0]['qs_userid']."'");
										  $results=$query->row();							  
										  echo $results->tutor_name;
										}
									?>	
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12"><b>User Type :</b> <?php 
										 echo $group_discussion[0]['qs_usertype'];
										 ?>	</label>
                                    <div class="col-md-12">
									
                                       
																			    
										
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Question Name :</b>  </label>
                                    <div class="col-md-12">						
								<?php echo $group_discussion[0]['qs_title']; ?>
									
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12"><b>Question description :</b>  </label>
                                    <div class="col-md-12">						
								<?php echo $group_discussion[0]['qs_des']; ?>
									
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Courese  : </b><?php 
										  $query=$this->db->query("SELECT course_name FROM courses WHERE course_id='".$group_discussion[0]['qs_course_id']."'");
										  $results=$query->row();							  
										  echo $results->course_name;
										 ?>		</label>
                                    
                                </div>

								
								
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Batch Name : </b></label>
                                    <div class="col-md-12">
                                      <p>  <?php
									   $query=$this->db->query("SELECT cb_batchname FROM course_batches WHERE batch_id='".$group_discussion[0]['qs_batch_id']."'");
										  $results=$query->row();						  
										  echo $results->cb_batchname;

									  ?></p>
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Posted Date : </b></label>
                                    <div class="col-md-12">
                                      <p>  <?php echo $group_discussion[0]['qs_date']; ?></p>
										
										</div>
                                </div>
								
								
								
								
											
                                        
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     