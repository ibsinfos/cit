 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Manufacturers Page</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Manufacturers Page</li>
                     </ol>
                  </div>
                  <!-- /.breadcrumb -->
               </div>
      
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <h3 class="box-title m-b-0">Manufacturers </h3>
 <p class="text-muted m-b-20"> <a href="#" > Add New</a></p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
                                            <th>Name</th>
                                            
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
              foreach($manufacturers as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td class="text-nowrap">
                   <a href="'.site_url("admin").'/manufacturers/update/'.$row['id'].'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                   <a href="'.site_url("admin").'/manufacturers/delete/'.$row['id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
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
	
	
	

	
	
	