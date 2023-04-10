
<style>
        .error_text
        {
            color: red;
        }
    </style>
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Winner Wall Form</h1> 
            
        </div> 
       
       
        <!-- Content Row -->
        
       
        <div class="row">
            <form action="<?php echo base_url().'subadmin/insertWinner'; ?>" method="post" enctype="multipart/form-data">
            <div class="col-12 mt-3">
            <div class="card border-top">
               <div class="card-body"> 
                <div class="row">
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name of Competition<sup class="text-danger">*</sup></label>
                        <!-- <input type="text" class="form-control input-font" name="competition" id="competition" placeholder="Enter Name of Competition" required> -->
                        
                        <select class="form-control input-font" name="competition" id="competition" aria-label="Default select example" required>
                        <option selected>--select--</option> 
                        <?php foreach($competation as $list){ ?>
                            <option value="<?php echo $list['id']; ?>"><?php echo $list['title']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="error_competition"><?php echo form_error('competation');?></span> 
                        
                  </div>
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Date of Competition<sup class="text-danger">*</sup></label>
                        <input type="date" class="form-control input-font" name="date" id="date" placeholder="Name of Competition Date" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Select Prize<sup class="text-danger">*</sup></label>
                                    <select class="form-control input-font" id="prize" name="prize" aria-label="Default select example" required>
                                    <option selected>--select--</option>   
                                    <?php foreach($prises as $p_list){ ?>
                                        
                                        <option value="<?php echo $p_list['id']; ?>"><?php echo $p_list['title']; ?></option>
                                        <?php } ?>  
                                    </select>
                                    
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Email ID<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="email" id="email" placeholder="Enter Email ID" required>
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="contact_no" id="contact_no" placeholder="Enter Mobile Number" required>
                        <span class="error_text"><?php echo form_error('contact_no');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Photo<sup class="text-danger">*</sup></label>
                        <input type="file" class="form-control-file input-font" name="photo" id="photo">
                        <span class="error_text"><?php echo form_error('photo');?></span>
                        
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Location<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="location" id="location" placeholder="Enter Location"  required>
                        <span class="error_text"><?php echo form_error('location');?></span>
                        
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                       <button  class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</button>
                       <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> 
                       <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
               </div>
                
                     
                          <!-- Modal -->
                </div> 
            </div>
            </div>
            </form>
       </div>

       <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                      <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Submit?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary submitrecord" data-bs-dismiss="modal">Save</button>
                    </div>
                  </div>
                </div>
              </div> 
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->