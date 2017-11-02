 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Register students</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Register students</li>
                     </ol>
                  </div>
                  <!-- /.breadcrumb -->
               </div>
      
<?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'added')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Created Successfully';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
	  
	  
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <h3 class="box-title m-b-0">Register students </h3> <br />
 <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/register_students/add" class="btn btn-success btn-rounded" > Add New Student Manual</a></p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
										    <th>Name</th>
                                            <th>Username</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Manage Courses</th>
											<th>View </th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($register_students as $row)
              {
				//print_r($row);
                  echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.ucwords($row['std_name']).'</td>';
					echo '<td>'.$row['std_username'].'</td>';
					echo '<td>'.$row['std_email'].'</td>';
					echo '<td>'.$row['std_mobile'].'</td>';
					echo '<td> <a href="'.site_url("admin").'/managecourses/'.$row['user_id'].'" data-toggle="tooltip" data-original-title="Add">Add  </a></td>';
					echo '<td> <a href="'.site_url("admin").'/register_students/details/'.$row['std_id'].'" data-toggle="tooltip" data-original-title="view">View  </a></td>';
					echo '<td class="text-nowrap">  
					   <a onclick="return getConfirmation();" href="'.site_url("admin").'/register_students/delete/'.$row['std_id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
					</td>';
					echo '</tr>';
              }
              ?> 
                 <!--<a href="'.site_url("admin").'/register_students/update/'.$row['tutor_id'].'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>-->
				   
                    </tbody>
                </table>
				
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	