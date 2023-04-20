    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration</h1>
            <nav  aria-label="breadcrumb">
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
                            <th>Prize</th>
                            
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
                                 <td>
                                    <select id="prize" name="prize" class="form-control input-font" value="prize">
                                        <option value="1">First Prize</option>
                                        <option value="1">Second Prize</option>
                                        <option value="1">Third Prize</option>
                                        <option value="1">Fourth Prize</option>
                                        <option value="1">Consolation Prize</option>
                                    </select>
                                 </td>
                                  
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
