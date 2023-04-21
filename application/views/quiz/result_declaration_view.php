<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quiz Creation</h1>
                        
                    </div>
<!-- Content Row -->
<div class="row">
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Name of Quiz</label>
                                    <div>
                                        <p>Indpendance Quiz</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Quiz Id</label>
                                    <div>
                                        <p>1234</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Quiz Date</label>
                                    <div>
                                        <p>12/03/2023</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Marks</label>
                                    <div>
                                        <p>100</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Submission</label>
                                    <div>
                                        <p>100</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Winners</label>
                                    <div>
                                        <p>50</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Declared on</label>
                                    <div>
                                        <p>IT Services Department</p>
                                    </div>    
                                </div>
                            </div>
<div class="row">
            <div class="col-12 mt-3">
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
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/admin_creation_list'">Back</a>
                          </div>  
                           <!-- Modal -->
                           <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to cancel?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>       
                                      <!-- Modal -->
                        </div> 
                      </div>
                    </div>
                    </div>


            </div>
            <!-- End of Main Content -->

         