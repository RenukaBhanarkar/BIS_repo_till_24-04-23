<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">By The Mentors</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">About Exchange forum</li> -->
            </ol>
        </nav>
    </div>
    <!-- Content Row -->

    <div class="col-12">

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
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Image</th>
                                <th>Document</th>                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($bythementors)) {
                                $i = 1;
                                foreach ($bythementors as $list_btm) { ?>

                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_btm['title']; ?></td>                                        
                                        <td><?php echo $list_btm['created_on']; ?></td>
                                        <td><?php echo $list_btm['document']; ?></td>
                                        <td><?php if ($list_btm['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/by_the_mentors/img/<?php echo $list_btm['image'] ?>" data-toggle="modal" data-target="#viewImage" width="40px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td><?php echo $list_btm['status_name']; ?> </td>

                                        <td class="d-flex border-bottom-0">
                                            <!-- <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal"
                                        data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                        <a href="<?php echo base_url(); ?>admin/view_btm/<?php echo $list_btm['id'] ?>"><button class="btn btn-info btn-sm mr-2">view</button></a>
                                            <?php if(!($list_btm['status_name'] == 'Published')){ ?>
                                                <button onclick="deleteByTheMentor(' <?php echo $list_btm['id']; ?> ');" data-id='<?php echo $list_btm['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <button class="btn btn-primary" onclick="sendPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>Publish</button>
                                            <?php }else if($list_btm['status_name'] == 'Published'){ ?>
                                                <button class="btn btn-primary" onclick="sendUnPublish('<?php echo $list_btm['id']; ?>')" data-id ='<?php echo $list_btm['id']; ?>'>UnPublish</button>
                                         <?php } ?>
                                        
                                            <!-- Modal -->
                                            
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
    function deleteByTheMentor(que_id) {
        // var c = confirm("Are you sure to delete this survey details? ");
        $('#delete').modal('show');
        $('.abcd').on('click', function() {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/deleteByTheMentor',
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