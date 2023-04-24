    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Quiz/closed_quiz_list';?>" >Closed Quiz</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration</li>
                
                </ol>
            </nav>
           
        </div>
       
       
        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body">
            <table id="example" class="table-bordered display nowrap" style="width:100%">
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
                      

                                <tr>
                                <td><input class="form-control-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                 <td>1</td>
                                 <td>Name</td>
                                 <td>abc@gmail.com</td>
                                 <td>7057085889</td> 
                                 <td>12/03/2023</td> 
                                 <td>12:00:00</td> 
                                 <td>100</td>
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

                           
                        
                        
                           
                    </tbody>
                </table>
            </div>    
          </div>
          <div class="col-md-12" style="text-align: end; padding: 31px;">
                    <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Declared</a>
                            
                        </div>
        </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
