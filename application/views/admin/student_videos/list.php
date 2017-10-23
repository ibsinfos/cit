 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Student videos</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Student videos</li>
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
 <h3 class="box-title m-b-0">Student videos </h3> <br />
 <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/student_videos/add" class="btn btn-success btn-rounded" > Add New</a></p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
                                            <th>Video Title</th>
											<th>Video Image</th>  
<th>Vew  details</th>   											
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($student_videos as $row)
              {
					echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.$row['sv_title'].'</td>';
					echo '<td><img  src="'.base_url().'images/video/'.$row['sv_image'].'"  width="200" height="200"  ></td>';	

echo '<td><a href="'.site_url("admin").'/student_videos/details/'.$row['sv_id'].'" data-toggle="tooltip" data-original-title="Vew"> View </a></td>';						
					echo '<td class="text-nowrap">
					   <a href="'.site_url("admin").'/student_videos/update/'.$row['sv_id'].'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
					   <a onclick="return getConfirmation();" href="'.site_url("admin").'/student_videos/delete/'.$row['sv_id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
					</td>';
					echo '</tr>';
              }
              ?> 
                 
				   
                    </tbody>
                </table>
				
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	