 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Live projects</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Live projects</li>
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
 <h3 class="box-title m-b-0">live projects </h3> <br />
<!-- <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/live_projects/add" class="btn btn-success btn-rounded" > Add New</a></p>-->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
                                            <th>Title</th>
											<th>Image</th>
											<th>View </th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($live_projects as $row)
              {
					echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.$row['title'].'</td>';
					echo '<td><img  src="'.base_url().'images/'.$row['live_project_image'].'" width="200" height="200"   ></td>';	
					echo '<td> <a href="'.site_url("admin").'/live_projects/details/'.$row['live_projects_id'].'" data-toggle="tooltip" data-original-title="view">View  </a></td>';
					echo '<td class="text-nowrap">
					   <a href="'.site_url("admin").'/live_projects/update/'.$row['live_projects_id'].'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
					  
					</td>';
					echo '</tr>';
              }
              ?> 
                 <!--<a href="'.site_url("admin").'/live_projects/delete/'.$row['live_projects_id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>-->
				   
                    </tbody>
                </table>
				
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	