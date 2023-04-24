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
                                <select class="form-control input-font" name="quiz_id" id="quiz_id" aria-label="Default select example">
                                    <option selected value="" disabled>--select--</option>
                                    <?php foreach($competation as $list){ ?>
                                    <option value="<?php echo $list['id']; ?>"><?php echo $list['title']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error_competition"><?php echo form_error('competation');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Date of Competition<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control input-font" name="quiz_date" id="quiz_date" placeholder="Name of Competition Date" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="prizes-section">
                                <h4 class="m-2">Add Winners</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Select Prize<sup class="text-danger">*</sup></label>
                                <select class="form-control input-font" id="prize" name="prize" aria-label="Default select example" >
                                    <option selected value="" disabled>--select--</option>
                                    <?php foreach($prises as $p_list){ ?>
                                    
                                    <option value="<?php echo $p_list['id']; ?>"><?php echo $p_list['title']; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Name<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="name" id="name" placeholder="Enter Name" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Email ID<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="email" id="email" placeholder="Enter Email ID" >
                                <span class="error_text"><?php echo form_error('title');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Mobile Number<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="contact_no" id="contact_no" placeholder="Enter Mobile Number" >
                                <span class="error_text"><?php echo form_error('contact_no');?></span>
                                
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Photo</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="file" id="image" accept="image/jpeg,image/png,image/jpg" onchange="loadFileFirst(event)" name="image" class="form-control-file">
                                        <span class="error_text"><?php echo form_error('fprize_img'); ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirst">
                                    Preview
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Photo Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="outputFirst" width="100%" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                            <div class="mb-2 col-md-4">
                                <label class="d-block text-font">Location<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control input-font" name="location" id="location" placeholder="Enter Location"  >
                                <span class="error_text"><?php echo form_error('location');?></span>
                                
                            </div>
                        </div>
                        <div class="col-md-12 submit_btn p-3" style="text-align: center;">
                            <button  class="btn btn-success btn-sm text-white"  id="addbtn">Add</button>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <table id="example" class="table-bordered display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Prize</th>
                                            <th>Name</th>
                                            <th>Email id</th>
                                            <th>Photo</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>First Prize</td>
                                            <td>Winner Name</td>
                                            <td>abc@gmail.com</td>
                                            <td><img src="" alt="" class="" width="60px;"></td>
                                            <td>Pune Maharashtra</td>
                                            <td class="d-flex border-bottom-0">
                                                <button onclick="submit()" class="btn btn-danger btn-sm mr-2">Delete</button>
                                                
                                            </td>
                                        </tr>
                                    </table>
                                    
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


<script type="text/javascript">
    $(document).ready(function () {

});
var loadFileThumbnail = function(event) 
    {
        $("#outputThumbnail").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetvideo()
    {
        $("#video").val(''); 
        $("#outputvideo").hide(); 
    }
        </script>

        <script type="text/javascript">
    $('#addbtn').click(function(e) { 
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;  


                    var quiz_id = $("#quiz_id").val(); 
                    if (quiz_id == "" || quiz_id== null) {
                        if ($("#quiz_id").next(".validation").length == 0) // only add if not added
                        {
                            $("#quiz_id").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Quiz </div>");
                        }
                        if (!focusSet) { $("#quiz_id").focus(); }
                        allfields = false;
                    } else {
                        $("#quiz_id").next(".validation").remove(); // remove it
                    } 
                    var quiz_date = $("#quiz_date").val();  

                    if (quiz_date == "" || quiz_date== null) {
                        if ($("#quiz_date").next(".validation").length == 0) // only add if not added
                        {
                            $("#quiz_date").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz date </div>");
                        }
                        if (!focusSet) { $("#quiz_date").focus(); }
                        allfields = false;
                    } else {
                        $("#quiz_date").next(".validation").remove(); // remove it
                    }

                    var prize = $("#prize").val();
                    if (prize == "" || prize== null) {
                        if ($("#prize").next(".validation").length == 0) // only add if not added
                        {
                            $("#prize").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Prize</div>");
                        }
                        if (!focusSet) { $("#prize").focus(); }
                        allfields = false;
                    } else {
                        $("#prize").next(".validation").remove(); // remove it
                    }

                    var name = $("#name").val();
                    if (name == "" || name== null) {
                        if ($("#name").next(".validation").length == 0) // only add if not added
                        {
                            $("#name").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter name</div>");
                        }
                        if (!focusSet) { $("#name").focus(); }
                        allfields = false;
                    } else {
                        $("#name").next(".validation").remove(); // remove it
                    }

                    var email = $("#email").val();
                    if (email == "" || email== null) {
                        if ($("#email").next(".validation").length == 0) // only add if not added
                        {
                            $("#email").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter email</div>");
                        }
                        if (!focusSet) { $("#email").focus(); }
                        allfields = false;
                    } else {
                        $("#email").next(".validation").remove(); // remove it
                    }

                    var contact_no = $("#contact_no").val();
                    if (contact_no == "" || contact_no== null) {
                        if ($("#contact_no").next(".validation").length == 0) // only add if not added
                        {
                            $("#contact_no").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter contact no</div>");
                        }
                        if (!focusSet) { $("#contact_no").focus(); }
                        allfields = false;
                    } else {
                        $("#contact_no").next(".validation").remove(); // remove it
                    }

                    var image = $("#image").val();
                    if (image == "" || image== null) {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select image</div>");
                        }
                        if (!focusSet) { $("#image").focus(); }
                        allfields = false;
                    } else {
                        $("#image").next(".validation").remove(); // remove it
                    }
 

                    if ($("#image").val() != '') 
                {
                    var fileSize = $('#image')[0].files[0].size;
                    $("#image").next(".validation").remove();
                    if (fileSize > 41943040) 
                    {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select  file of size less than 5 MB </div>");
                        }
                        allfields = false;
                        if (!focusSet) {
                            $("#image").focus();
                        }
                    } 
                    else 
                    {
                        $("#image").next(".validation").remove(); // remove it
                    }
                    var validExtensions = ['Jpeg','jpg','png']; //array of valid extensions
                    var fileName = $("#image").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    $("#image").next(".validation").remove();
                    if ($.inArray(fileNameExt, validExtensions) == -1) 
                    {
                        if ($("#image").next(".validation").length == 0) // only add if not added
                        {
                            $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Only Jpeg, jpg,png  file allowed. </div>");
                        }
                        allfields = false;
                        if (!focusSet) 
                        {
                            $("#image").focus();
                        }
                    } 
                    else 
                    {
                        $("#image").next(".validation").remove(); // remove it
                    }
                }

                var location = $("#location").val();
                    if (location == "" || location== null) {
                        if ($("#location").next(".validation").length == 0) // only add if not added
                        {
                            $("#location").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter location</div>");
                        }
                        if (!focusSet) { $("#location").focus(); }
                        allfields = false;
                    } else {
                        $("#location").next(".validation").remove(); // remove it
                    }
 

            if (allfields) {  
                var fd = new FormData();
                var files = $('#image')[0].files;
                // Check file selected or not
                if (files.length > 0) {
                    fd.append('image', files[0]);
                    fd.append('quiz_id', quiz_id);
                    fd.append('quiz_date', quiz_date);
                    fd.append('prize', prize);
                    fd.append('name', name);
                    fd.append('email', email);
                    fd.append('contact_no', contact_no);
                    fd.append('location', location);
                    $.ajax({

                        url: '<?php echo base_url(); ?>winnerwall/winner_wall_form',
                        type: 'post',
                        data: fd,
                     
                        contentType: false,
                        processData: false,
                        success: function(response) { 
                            res = JSON.parse(response);
                            if (res.status == 0) {
                                alert(res.message)
                            }
                            $("#stamp_doc_title").val('');
                            $("#stamp_doc_file").val("");
                            displayStampDocs();
                        },
                    });
                } else {
                    alert("Please select a file.");
                }
            }



                    else {
                        return false;
                    }
                });
            </script>
<script type="text/javascript">
$('#submitdata').click(function(e) {
     CKEDITOR.instances.instances['description'].setData( '', function() { this.updateElement(); } )  

// var description = CKEDITOR.instances['description'].getData();
$("#description").val(''); 

     });

</script>