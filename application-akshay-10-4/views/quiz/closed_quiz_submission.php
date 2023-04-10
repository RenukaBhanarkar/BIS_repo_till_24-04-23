    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz submission Details</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
              </nav>
           
        </div>
       
       
        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body">
                <table id="example" class="hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></th>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Contact No.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Score</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      

                         <?php if(!empty($UsersDetails)){
                            $i=1;
                            foreach($UsersDetails as $users)
                            {?>
                                <tr>
                                <td><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                 <td><?= $i++?></td>
                                 <td><?= $users['user_name']?></td>
                                 <td><?= $users['email']?></td>
                                 <td><?= $users['user_mobile']?></td> 
                                 <td><?= date("d-m-Y", strtotime($users['created_on']));?></td> 
                                 <td><?= $users['start_time']?></td> 
                                 <td><?= $users['score']?></td>
                                  
                                 </tr>

                             <?php } } ?>
                        
                        
                           
                    </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
