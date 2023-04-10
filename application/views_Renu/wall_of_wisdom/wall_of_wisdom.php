    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wall Of Wisdom</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>

        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <!-- Content Row -->

            <!-- Content Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-top card-body">
                        <div>
                            <button type="button" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Add New Post</button>

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
                    <table id="example" class="hover table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <!-- <th>Desciption</th> -->
                                <th>Image</th>
                                <th>Status</th>
                                <th>Reject Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($wall_of_wisdom)) {
                                $i = 1;
                                foreach ($wall_of_wisdom as $list_wow) { ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $list_wow['title'] ?></td>
                                        <!-- <td><?php echo $list_wow['description'] ?></td> -->
                                        <td><?php if ($list_wow['image']) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/admin/wall_of_wisdom/<?php echo $list_wow['image'] ?>" width="150px">
                                            <?php } else {
                                                echo "No Uploaded";
                                            } ?>
                                        </td>
                                        <td><?php echo $list_wow['status_name']; ?></td>
                                        <td><?php echo $list_wow['reject_reason']; ?></td>
                                        <td class="d-flex border-bottom-0">
                                            <a href="<?php echo base_url().'wall_of_wisdom/detail/'.$list_wow['id']; ?>" >
                                                <button class="btn btn-primary btn-sm mr-2"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <?php 
                                            if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                            <?php if($list_wow['status'] == 1){ ?>
                                                <button onclick="sendapproval('<?php echo $list_wow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white">Send For Approval</button>
                                           <?php } ?>
                                           
                                            <?php if (!($list_wow['status'] == 5 || $list_wow['status'] == 2)) { ?>
                                                <button onclick="edit('<?php echo $list_wow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                <button onclick="deleteWOW('<?php echo $list_wow['id']; ?>')" class="btn btn-danger btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <?php } } ?>


                                           <?php 
                                           
                                            if (encryptids("D", $_SESSION['admin_type']) == 3) {
                                                if ($list_wow['status'] == 3 || $list_wow['status'] == 6) {  ?>
                                                    <button class="btn btn-primary publish" onclick="sendPublish('<?php echo $list_wow['id']; ?>')" data-id='<?php echo $list_wow['id']; ?>'>Publish</button>
                                                <?php } else if ($list_wow['status'] == 5) { ?>
                                                    <button class="btn btn-primary unpublish_record" onclick="sendUnPublish('<?php echo $list_wow['id']; ?>')" data-id='<?php echo $list_wow['id']; ?>'>UnPublish</button>
                                                <?php  }
                                            }else if(encryptids("D", $_SESSION['admin_type']) == 2){ ?>
                                                    <?php if($list_wow['status'] == 3){ ?>
                                                                  
                                                  <?php  }else if($list_wow['status'] == 2) { ?>
                                                <button onclick="approve('<?php echo $list_wow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white">Approve</button>
                                                <button onclick="reject('<?php echo $list_wow['id']; ?>')" class="btn btn-danger btn-sm mr-2 text-white">Reject</button>
                                          <?php }  } ?>
                                        </td>


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
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">New Post</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/insertWallOfWisdom" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            <span id="err_title" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description<sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                            <span id="err_description" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Upload Image:</label>
                            <input type="file" class="form-control" id="document1" name="document">
                            <span id="imgError1" class="text-danger"></span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="return submitButton()">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- --------- edit modal ----------- -->
    <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Update Post</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/editWallOfWisdom" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="title1" name="title" required>
                            <span id="err_title" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description<sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="description1" name="description" required></textarea>
                            <span id="err_description" class="text-danger"></span>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Upload Image:</label>
                                <input type="file" class="form-control" id="document1" name="document">
                                <input type="hidden" id="image1" name="old_doc">
                                <input type="hidden" id="id1" name="id">
                                <span id="imgError1" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <a href="" id="old_img" target="_blank">Preview</a>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <!-- ----------- Start of reject modal------- -->
    <div class="modal fade" id="rejectModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Reject</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/rejectWallOfWisdom" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Reason of Rejection<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="reseon" name="reason" required>
                            <input type="hidden" id="id2" name="id">
                            <span id="err_title" class="text-danger"></span>
                        </div>
                       

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------- end of reject modal------- -->

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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete" data-bs-dismiss="modal">Delete</button>
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



    <!-- Page level plugins -->
    <script>
        //check size of doc and type  if newly uploaded
        function submitButton() {

            var title = $("#title").val();
            var description = $("#description").val();
            var is_valid = true;
            //var numbers = /[0-9]/g;
            //var upperCaseLetters = /[A-Z]/g;
            //var lowerCaseLetters = /[a-z]/g;

            if (title == "") {
                $("#err_title").text("This value is required");
                $("#u_email").focus();
                is_valid = false;
            } else if (!(title.length > 4)) {
                $("#err_title").text("Please Enter minimum 5 Characters");
                $("#u_title").focus();
                is_valid = false;
            }else if (title.length > 250) {
                $("#err_title").text("Maximum 250 characters allowed");
                $("#u_title").focus();
                is_valid = false;
            } else {
                $("#err_title").text("");
            }
            if (description == "") {
                $("#err_description").text("This value is required");
                $("#description").focus();
                is_valid = false;
            } else if ((description.length < 6)) {
                $("#err_description").text("Please Enter minimum 5 Characters");
                $("#description").focus();
                is_valid = false;
            } else if ((description.length > 1000)) {
                $("#err_description").text("Maximum 1000 characters allowed");
                $("#description").focus();
                is_valid = false;
            } else {
                $("#err_description").text("");
            }
            if (is_valid) {
                return true;
            } else {
                return false;
            }
        };





        if ($("#document1").val() != '') {
                    var fileSize = $('#document1')[0].files[0].size;

                    if (fileSize > 102400) {
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 100 KB </div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else {
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                    // check type  start 
                    var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                    var fileName = $("#document1").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    if ($.inArray(fileNameExt, validExtensions) == -1) {
                        //alert("Invalid file type");
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else {
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                }else{
                    $("#document1").focus();
                }
    </script>
    <script>
        // function sendapproval(){

        // }
        function edit(que_id){
            $('#editModal1').modal('show');
            $.ajax({
                            url: '<?php echo base_url(); ?>Wall_of_wisdom/get_wow/'+que_id,
                            type:"JSON",
                            method:"get",
                            success: function(result) {
                                var res = JSON.parse(result); 
                                console.log(res.id);
                                $('#id1').val(res.id);
                                $('#description1').val(res.description);
                                $('#image1').val(res.image);
                                $('#title1').val(res.title);
                               
                              var img=res.image;
                              $('#old_img').attr('href','<?php echo base_url()."uploads/admin/wall_of_wisdom/"; ?>'+img);
                            },
                            error: function(result) {
                                alert("Error,Please try again.");
                            }
                        });          
        }

        function reject(que_id){
            $('#rejectModal1').modal('show');
            $('#id2').val(que_id);
        }



        function sendapproval(que_id) {
            var c = confirm("Are you sure to Approve this survey details? ");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/approvewall_of_wisdom',
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

        function approve(que_id){
            var c = confirm("Are you sure to Approve activity? ");
            if (c == true) {
                // const $loader = $('.igr-ajax-loader');
                //$loader.show();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Wall_of_wisdom/approve_activity',
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
                $('#publish').modal('show');
                $('.publish').on('click', function() {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowPublish',
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

        function sendUnPublish(que_id) {

            // var c = confirm("Are you sure to Unpublish By The Mentor details? ");
            // if (c == true) {
                $('#unpublish').modal('show');
                $('.unpublish').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowUnpublish',
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

        function deleteWOW(que_id) {
            $('.delete').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>wall_of_wisdom/wowDelete',
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();            
        });
    </script>


    </body>