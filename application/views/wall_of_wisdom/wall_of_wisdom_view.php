<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Wall of Wisdom View</h1>
                        
                    </div>
<!-- Content Row -->
<div class="row">
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Title</label>
                                    <div>
                                        <p><?php echo $wow['title']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Description</label>
                                    <div>
                                         <p><?php echo $wow['description']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Image</label>
                                    <div>
                                        <p><img src="<?php echo base_url().'uploads/admin/wall_of_wisdom/'.$wow['image']; ?>"></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Status</label>
                                    <div>
                                        <p>Published</p>
                                    </div>    
                                </div>
                             </div>
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" href="<?php echo base_url().'' ?>">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>
<!-- /.container-fluid -->

