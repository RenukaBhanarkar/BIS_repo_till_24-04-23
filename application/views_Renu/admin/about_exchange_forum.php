<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About Exchange forum</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">About Exchange forum</li> -->
            </ol>
        </nav>
    </div>
    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <div class="card border-top card-body">
            <div>
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add
                    New About Exchange forum</button>
                <form id="add_admin" action="<?php echo base_url(); ?>admin/add_about_exchange_forum" method="post" enctype="multipart/form-data">
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">About Exchange forum</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                            <input type="file" class="form-control-file input-font" name="image" id="image">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="mb-2 col-md-8">
                                            <label class="d-block text-font">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Description</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($about_exchange_forum)) {
                                $i = 1;
                                foreach ($about_exchange_forum as $list_aef) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php if ($list_aef['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/<?php echo $list_aef['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>

                                        <td><?php echo $list_aef['description']; ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                            <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button onclick="deleteExngForum(' <?php echo $list_aef['id']; ?> ');" data-id='<?php echo $list_aef['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-labelledby="viewImageLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewImageLabel">Image Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $list_aef['image'] ?>" alt="" width="100%">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update About Exchange forum
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                                                                    <input type="file" class="form-control input-font" name="image" id="image">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2 col-md-8">
                                                                    <label class="d-block text-font">Description</label>
                                                                    <textarea name="" class="form-control" id="" rows="5"></textarea>
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <?php } ?>


                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary abcd" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<script>
    // $(document).ready(function(){
    //     $('.delete_img').on('click',function(){
    //         $('#delete').modal('show');
    //     })
    // })
    function deleteExngForum(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        $('#delete').modal('show');
        $('.abcd').on('click', function() {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deletExngForum',
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
        });
    }
</script>