<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Photos List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/cmsManagenent_dashboard';?>" >CMS</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/gallery';?>" >Gallery</a></li>
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <div class="card border-top card-body">
            <div>
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add  New Photo</button>
                <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <form action="<?php echo base_url(); ?>admin/add_photos" class="was-validated" method="post" enctype="multipart/form-data" id="add_photo">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Upload Image<sup
                                                class="text-danger">*</sup></label>
                                        <input type="file" class="form-control input-font" name="image" id="" required="" accept="image/png">
                                        <span class="error_text">
                                        acceps jpg,jpeg and png only
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                    </div>
                                    <div class="mb-2 col-md-4">
                                        <label class="d-block text-font">Caption</label>
                                        <input type="text" class="form-control input-font" name="title" id="" required="">
                                        <span class="error_text"> 
                                            <?php //echo form_error('title'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary save">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="photos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($photos)){
                            $i=1;
                            foreach($photos as $list_photos)
                            {?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><img src="<?php echo base_url()."uploads/".$list_photos['image']; ?>"
                                        data-toggle="modal" data-target="#viewImage" width="40px"></td>
                                <td><?php echo $list_photos['title']; ?></td>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <td class="d-flex border-bottom-0">
                                    <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                    <button  data-id ='<?php echo $list_photos['id']; ?>'
                                     class="btn btn-danger btn-sm mr-2 delete"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="viewImage" tabindex="-1" role="dialog"
                                        aria-labelledby="viewImageLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewImageLabel">Image Preview</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url()."uploads/".$list_photos['image']; ?>"
                                                        alt="" width="100%">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade " id="editform" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Photo
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Upload Image<sup
                                                                    class="text-danger">*</sup></label>
                                                            <input type="file" class="form-control input-font" name=""
                                                                id="">
                                                            <span class="error_text">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>
                                                        </div>
                                                        <div class="mb-2 col-md-4">
                                                            <label class="d-block text-font">Caption</label>
                                                            <input type="text" class="form-control input-font" name=""
                                                                id="">
                                                            <span class="error_text">
                                                                <?php //echo form_error('title'); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                    <?php } ?>

                            </tr>
<?php }} ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 submit_btn p-3">
    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>admin/gallery'">Back</a>
</div> 
    <!-- /.container-fluid -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="javascript:;" id="abcd"><button type="button" class="btn btn-primary abcd"  data-bs-dismiss="modal">Delete</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
<script>
    
// function checkAlerts(){
//     //$('#delete').modal('show');
//     var aa = confirm("are you sure");
//     if(aa) {
//         return true;
//     }
//     return false;
// }
// function deletePhotos1(que_id) {  
//     var id=$(this).attr('data-id');  
//                         $('#delete').modal('show');
//                      //   $("#delete").reset();
//                        $('#abcd').on('click', function() {                       
//                         $.ajax({
//                             type: 'POST',
//                             url: '<?php echo base_url(); ?>admin/deletePhotos',
//                             data: {
//                                 id: que_id,
//                             },
//                             success: function(result) {
//                                 console.log(result);
                              
//                               //  location.reload();
//                             },
//                             error: function(result) {
//                                 alert("Error,Please try again.");
//                             }
//                         });

//                     })
//     }  

$(document).ready(function(){
    $('#add_photo').removeClass('was-validated');
    $('#example').on('click','.delete',function() { 
            $('#delete').modal('show');
            $('#add_photo').removeClass('was-validated');
            var id=$(this).attr('data-id');  
            
            $('#abcd').attr('href','<?php echo base_url(); ?>admin/deletePhotos/'+id);
        });
    $('.save').on('click',function(){
        $('#add_photo').addClass('was-validated');
    })

    $('#photos').DataTable();
});


            </script>
