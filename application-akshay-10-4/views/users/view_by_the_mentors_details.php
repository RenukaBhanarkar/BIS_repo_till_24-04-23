<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage By The Mentors</h1>
                        
                    </div>
<!-- Content Row -->
<div class="row">
                    <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                                <div class="row">
                               <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">ID</label>
                                    <div>
                                        <p><?php  echo $data['id']; ?></p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font"> Name</label>
                                    <div>
                                        <p><?php // echo $data['name']; ?></p>dummy_name
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Email Id</label>
                                    <div>
                                        <p><?php // echo $data['email_id']; ?></p>dummy_email
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Contact</label>
                                    <div>
                                        <p>Not Available</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Date and Time</label>
                                    <div>
                                        <p><?php echo $data['created_on']; ?></p>
                                    </div>    
                                </div>
                               
                              </div>
                          </div>
                          <div class="col-12 mt-3">
                            <div >
                                    <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $data['title']; ?></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $data['description']; ?></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><img src="<?php echo base_url().'uploads/by_the_mentors/img/'.$data['image']; ?>" width="500px" height="600px"></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Document<sup class="text-danger">*</sup></label>
                                    <div>
                                        <a href="<?php echo base_url().'uploads/by_the_mentors/doc/'.$data['document'];?>" target="_blank">
                                        Download
                                        </a>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Status<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $data['status_name']; ?></p>
                                    </div> 
                            </div>
                            

                            <div >
                                    <label class="d-block text-font">Action<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php if($data['status_name']=='Created' || $data['status_name']=='UnPublished'){  ?>
                                            <button class="btn btn-primary" onclick="sendPublish('<?php echo $data['id']; ?>')" data-id ='<?php echo $data['id']; ?>'>Publish</button>
                                        <?php }else if($data['status_name']=='Published'){ ?>
                                        <button class="btn btn-primary" onclick="sendUnPublish('<?php echo $data['id']; ?>')" data-id ='<?php echo $data['id']; ?>'>UnPublish</button>
                                        <?php  } ?> 
                                            
                                        </p>
                                    </div> 
                            </div>
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/byTheMentors'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>
<script>
    // function sendapproval(){

    // }
    function sendapproval(que_id) {
                    var c = confirm("Are you sure to Approve this survey details? ");
                    if (c == true) {
                        // const $loader = $('.igr-ajax-loader');
                        //$loader.show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url(); ?>admin/approveYourwall',
                            data: {
                                que_id: que_id,
                            },
                            success: function(result) {
                                
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });

                    }
                }
        function sendPublish(que_id) {
            var c = confirm("Are you sure to Publish By The Mentor details? ");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_publish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        function sendUnPublish(que_id) {
            var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            if (c == true) {               
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/btm_unpublish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {                       
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            }
        }
        
</script>