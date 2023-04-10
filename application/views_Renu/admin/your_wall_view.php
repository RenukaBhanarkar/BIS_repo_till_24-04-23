<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Your Wall</h1>
                        
                    </div>
<!-- Content Row -->
<div class="row">
                    <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                                <div class="row">
                               <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Yourwall ID</label>
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
                                        <p><img src="<?php echo base_url().'uploads/your_wall/'.$data['image']; ?>"></p>
                                    </div> 
                            </div>
                            <div >
                                    <label class="d-block text-font">Status<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php echo $data['status_name']; ?></p>
                                    </div> 
                            </div>
                            
<?php if(!(encryptids("D", $_SESSION['admin_type']) == 1 || encryptids("D", $_SESSION['admin_type']) == 2)){ ?>
                            <div >
                                    <label class="d-block text-font">Action<sup class="text-danger">*</sup></label>
                                    <div>
                                        <p><?php if($data['status']=='1' || $data['status']=='3' || $data['status']=='6'){  ?>
                                            <button class="btn btn-primary" onclick="sendPublish('<?php echo $data['id']; ?>')" data-id ='<?php echo $data['id']; ?>'>Publish</button>
                                        <?php }else if($data['status']=='5'){ ?>
                                            <button class="btn btn-primary" onclick="sendUnPublish('<?php echo $data['id']; ?>')" data-id ='<?php echo $data['id']; ?>'>UnPublish</button>
                                        <?php } ?> 
                                            
                                        </p>
                                    </div> 
                            </div>
<?php } ?>
                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/your_wall_list'">Back</a>
                          </div>  
                        </div> 
                      </div>
                    </div>
                    </div>
    <div class="modal fade" id="publish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publish Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Publish activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary publish" data-bs-dismiss="modal">Publish</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="unpublish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unpublish Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Unpublish activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary unpublish" data-bs-dismiss="modal">Unpublish</button>
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
                                // $('#row' + que_id).css({
                                //     'display': 'none'
                                // });
                               // alert('success' 'refresh');
                                location.reload();
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });

                    }
                }
        function sendPublish(que_id) {
            $('#publish').modal('show');
            $('.publish').on('click', function() {
            // var c = confirm("Are you sure to Publish this survey details? ");
            // if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallPublish',
                    data: {
                        que_id: que_id,
                    },
                    success: function(result) {
                        // $('#row' + que_id).css({
                        //     'display': 'none'
                        // });
                        // alert('success' 'refresh');
                        location.reload();
                    },
                    error: function(result) {
                        alert("Error,Please try again.");
                    }
                });

            });
        }

        function sendUnPublish(que_id) {
            // var c = confirm("Are you sure to Unpublish this survey details? ");
            // if (c == true) {            
                $('#unpublish').modal('show');
                $('.unpublish').on('click', function() {   
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>admin/yourwallUnpublish',
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

            })
        }
        
</script>
<!-- /.container-fluid -->
