 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Mange Courses</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Mange Courses</li>
                     </ol>
                  </div>
                  <!-- /.breadcrumb -->
               </div>
      
<?php
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'added')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Created Successfully';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong></strong> Updated Successfully';
          echo '</div>';          
        }
      }
      ?>
	  
	  
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <h3 class="box-title m-b-0">Manage Courses </h3> <br />
 <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/managecourses/add?id=<?php echo $this->uri->segment(3); ?>" class="btn btn-success btn-rounded" >Assign Course</a></p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
                                            <th>Course Name</th>
											<th>Batch Name</th>	
											<th>Tutor Name</th>
                                            <th>Pay Via</th>
											<th>Edit Course status</th> 
                                    											
											<!--<th>Vew details</th>-->   											
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($managecourses as $row)
              {
				  $bat_id=$row['co_course_id'];
				 $sql=$this->db->query("SELECT * FROM course_batches,courses,tutors 
								WHERE
								course_batches.cb_course_id=courses.course_id
								AND
								course_batches.cb_tutor_id=tutors.tutor_id
								AND
								course_batches.batch_id='".$bat_id."'");
                    $row_m=$sql->row();     								
												  
					echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.$row_m->course_name.'</td>';
					echo '<td>'.$row_m->cb_batchname.'</td>';
					echo '<td>'.$row_m->tutor_name.'</td>';					
                   echo '<td>'.$row['co_payvia'].'</td>';
echo '<td><a href="'.site_url("admin").'/admin_managecourses/edit_coursestatus/'.$row['co_id'].'" data-toggle="tooltip" data-original-title="update"> '.$row['co_coursestatus'].'</a></td>';						
					
					if($row['co_payvia']=='online')
					{
						echo '<td class="text-nowrap">  </td>';					
					}
					else
					{
						
					echo '<td class="text-nowrap">
					   <a href="'.site_url("admin").'/managecourses/update?id='.$row['co_id'].'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>	  
					</td>';
						
					}
					echo '</tr>';
              }
              ?> 
                  <!--<a onclick="return getConfirmation();" href="'.site_url("admin").'/courses/delete/'.$row['course_id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>-->
				   
                    </tbody>
                </table>
				
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	