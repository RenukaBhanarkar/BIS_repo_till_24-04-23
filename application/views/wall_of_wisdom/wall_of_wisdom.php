    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wall Of Wisdom</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/';?>" >Home</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
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
                                                <button class="btn btn-primary btn-sm mr-2">View</button>
                                            </a>
                                            <?php 
                                            if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                                            <?php if($list_wow['status'] == 1){ ?>
                                                <button onclick="sendapproval('<?php echo $list_wow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white">Send For Approval</button>
                                           <?php } ?>
                                           
                                            <?php if (!($list_wow['status'] == 5 || $list_wow['status'] == 2)) { ?>
                                                <button onclick="edit('<?php echo $list_wow['id']; ?>')" class="btn btn-info btn-sm mr-2 text-white">Edit</button>
                                                <button onclick="deleteWOW('<?php echo $list_wow['id']; ?>')" class="btn btn-danger btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
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
    
    <!-- /.container-fluid -->
    <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url().'admin/exchange_forum' ?>'">Back</a>
                          </div>
    </div>
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
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/insertWallOfWisdom" name="addpost" id="addpostform" class="was-validated" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" minlength="5" maxlength="250" placeholder="Enter Title" required>
                            <span id="err_title" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description<sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" ></textarea>
                            <span id="err_description" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Upload Image:</label>
                            <input type="file" class="form-control" id="document1" value="" name="document" accept="image/*" required>
                            <span id="imgError1" class="text-danger">
                                Only jpg,jpeg,png accepted
                            </span>
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
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/editWallOfWisdom"  class="was-validated" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="title1" name="title" minlength="5" maxlength="250" placeholder="Enter Title" required>
                            <span id="err_title" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description<sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="description1" name="description" minlength="5" maxlength="1000" placeholder="Enter Description" required></textarea>
                            <span id="err_description" class="text-danger"></span>
                        </div>
                        
                            <!-- <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Upload Image:</label>
                                <input type="file" class="form-control" id="document1" name="document">
                                <input type="hidden" id="image1" name="old_doc">
                                <input type="hidden" id="id1" name="id">
                                <span id="imgError1" class="text-danger"></span>
                            </div> -->
                            
                                <label class="d-block">Upload Image<sup class="text-danger">*</sup></label>
                                <div class=""  id="add_file">
                                <div class="d-flex">
                                        <div>
                                            <input type="file" id="document2" name="document" class="form-control-file" required onchange="loadFileThumbnail(event)">
                                            <input type="hidden" id="image1" name="old_doc">
                                            <input type="hidden" id="id1" name="id">
                                            <span class="error_text"><?php echo form_error('banner_img');?></span>
                                        </div>
                                        <button type="button" id="preview123456" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Previewimg">
                                            Preview
                                        </button>

                                        <div class="modal fade" id="Previewimg" tabindex="-1" aria-labelledby="PreviewimgLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <img src="" id="outputThumbnail" width="100%"/>
                                        </div>
                                        <div class="modal-footer">
                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button> -->
                                        </div> 
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                <!-- Modal -->
                                      
                                            <!-- Modal -->
                            </div>
                        
                        <div class="active" id="delete_preview">
                                                                <button class="btn btn-danger btn-sm del_icon">Delete</button>
                                                                <button type="button" id="preview1" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    Preview
                                                                </button>
                                                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" style="max-width:700px;">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>

                                                                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                        </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                        <img src="" id="outputbanner" width="100%"/>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                        <!-- <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button> -->
                                                                                        </div> 
                                                                                    </div>
                                                                                    </div>
                                                                                </div>       
                                                                                            <!-- Modal -->
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
                    <form action="<?php echo base_url(); ?>wall_of_wisdom/rejectWallOfWisdom" class="was-validated" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Reason of Rejection<sup class="text-danger">*</sup></label>
                            <!-- <input type="text" class="form-control" id="reseon" name="reason" required> -->
                            <textarea class="form-control" id="reseon" name="reason" required></textarea>
                            <input type="hidden" id="id2" name="id">
                            <span id="err_title" class="text-danger"></span>
                        </div>
                       

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" >Reject</button>
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

    <div class="modal fade" id="sendforapproval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send For Approval Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Send For Approval activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sendforapproval" data-bs-dismiss="modal">Send For Approval</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Activity</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Approve activity?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary approve" data-bs-dismiss="modal">Approve</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
var loadFileThumbnail = function(event) 
    {
       //  $("#Previewimg").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        console.log(outputThumbnail.src);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetimg()
    {
         
        $("#outputThumbnail").hide(); 
    }
    </script> 
    <!-- Page level plugins -->
    <script>
        //check size of doc and type  if newly uploaded
        function submitButton() {
           
            var title = $("#title").val();
            // var description = $("#description").val();
            var description= CKEDITOR.instances['description'].getData(); 
            var is_valid = true;
            //var numbers = /[0-9]/g;
            //var upperCaseLetters = /[A-Z]/g;
            //var lowerCaseLetters = /[a-z]/g;

            if (title == "") {
                $("#err_title").text("This value is required");
                $("#u_email").focus();
                var  is_valid = false;
            } else if (!(title.length > 4)) {
                $("#err_title").text("Please Enter minimum 5 Characters");
                $("#u_title").focus();
                var is_valid = false;
            }else if (title.length > 250) {
                $("#err_title").text("Maximum 250 characters allowed");
                $("#u_title").focus();
                var is_valid = false;
            } else {
                $("#err_title").text("");
            }
            if (description == "") {
                $("#err_description").text("This value is required");
                $("#description").focus();
                var is_valid = false;
            } else if ((description.length < 6)) {
                $("#err_description").text("Please Enter minimum 5 Characters");
                $("#description").focus();
                var is_valid = false;
            } else if ((description.length > 1000)) {
                $("#err_description").text("Maximum 1000 characters allowed");
                $("#description").focus();
                var is_valid = false;
            } else {
                $("#err_description").text("");
            }
            


        if ($("#document1").val() != '') {
                    var fileSize = $('#document1')[0].files[0].size;

                    if (fileSize > 509600) {
                        var is_valid = false;
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            var is_valid = false;
                            alert("Please select file size greater than 500 KB");
                            $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                        }
                        var is_valid = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else if(fileSize < 20480){
                        is_valid = false;
                        if ($("#imgError1").next(".validation").length == 0) 
                        {
                        is_valid = false;
                           alert("Please select file size greater than 20 KB");
                           $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                        return false;
                        }
                        is_valid = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    }else{
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                    // check type  start 
                    var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                    var fileName = $("#document1").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    if ($.inArray(fileNameExt, validExtensions) == -1) {
                        //alert("Invalid file type");
                        var  is_valid = false;
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                            // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#document1").focus();
                        }
                    } else {
                        is_valid = true;
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                }else{
                    $("#imgError1").text('Please select file');
                    $("#document1").focus();
                }




                if (is_valid) {
                return true;
            } else {
                return false;
            }
            };
    </script>
    <script>
        // function sendapproval(){

        // }
        function edit(que_id){
            $('#editModal1').modal('show');
            $('#delete_preview').show();
                    $('#add_file').hide();
                    $('#icon_file').attr('required',false);
                    // $('#outputicon').attr('src',)
            $('.del_icon').on('click',function(){
                                $('#delete_preview').hide();
                                $('#add_file').show();
                                // $('#icon_file').add('attr','required');
                                $('#document2').attr('required',true);
            });
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
        $('#preview1').on('click',function(){
           var link = $('#image1').val();
           var img='<?php echo base_url().'uploads/admin/wall_of_wisdom/';?>'+link;
            $('#outputbanner').attr('src',img);
        });

        function reject(que_id){
            $('#rejectModal1').modal('show');
            $('#id2').val(que_id);
        }



        function sendapproval(que_id) {
            // var c = confirm("Are you sure to Approve this survey details? ");
            // if (c == true) {
                $('#sendforapproval').modal('show');
                $('.sendforapproval').on('click', function() {
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

            })
        }

        function approve(que_id){
            // var c = confirm("Are you sure to Approve activity? ");
            // if (c == true) {
                $('#approve').modal('show');
                $('.approve').on('click', function() {
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

            })
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
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'description' );
                        </script>


    </body>