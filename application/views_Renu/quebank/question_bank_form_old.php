    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Bank Form</h1>
        </div>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <!-- Content Row -->
        <div class="row" id="queBankCreation">
            <div class="col-12 mt-3">
                <div class="card border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 prizes-section">
                                <h4 class="m-2">Question Bank Details</h4>
                            </div>
                        </div>
                        <form id="que_bank_form" action="<?php echo base_url(); ?>subadmin/createQueBank">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question Bank Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Question Bank Title">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Number of Question<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="no_of_ques" id="no_of_ques" placeholder="Enter Total Number of Question">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="total_marks" id="total_marks" placeholder="Enter Total Marks">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Language of Question<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" name="language" id="english_div" value="1" checked>
                                            <label class="form-check-label" for="english_div">English</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" value="2" type="radio" name="language" id="hindi_div">
                                            <label class="form-check-label" for="hindi_div">Hindi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="3" type="radio" name="language" id="both_div">
                                            <label class="form-check-label" for="both_div">Both</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 submit_btn p-3">
                                
                                <input type="submit" name="Submit" id="createQueBank" class="btn btn-info btn-sm">
                            </div>
                        </form>
                        <!-- que creation -->
                        <form id="questions_form" action="<?php echo base_url() . 'subadmin/createQuestions' ?>" method="post" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-4 prizes-section">
                                    <h4 class="m-2">Question Creation</h4>
                                </div>
                            </div>
                            <input type="hidden" id="que_bank_id" name="que_bank_id">
                            <div class="row mt-3">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question Type<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="1" name="que_type" id="type1" checked>
                                            <label class="form-check-label" for="type1">Text</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="2" name="que_type" id="type2">
                                            <label class="form-check-label" for="type2">Image</label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" value="3" name="que_type" id="type3">
                                            <label class="form-check-label" for="type3">Both</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="question-eng">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="que" id="que" placeholder="Enter Question">
                                </div>
                                <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question in Hindi<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="hindi" id="hindi" placeholder="Enter Marks">
                                </div> -->
                            </div>
                            <div class="row" id="question-hindi">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question in Hindi<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="que_h" id="que_h" placeholder="Question in Hindi">
                                </div>
                            </div>
                            <div class="row" id="image-text" style="display:none;">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="banner_img" accept="image/jpeg,image/png" name="banner_img" class="form-control-file" onchange="loadFileBanner(event)" required>
                                            <span class="error_text"><?php echo form_error('banner_img'); ?></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Preview
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Image</h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="outputbanner" style="width:450px;" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>
                            </div>
                            <div class="row" id="number_option_english">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Number of Options<sup class="text-danger">*</sup></label>
                                    <select class="form-control input-font" id="no_of_options" name="no_of_options" aria-label="Default select example">
                                        <option selected>--select--</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="options_blk">
                                <div class="col-md-4" id="opt_blk_eng">

                                    <div class="row mt-3" id="opt1_blk">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 1</label>

                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option1" id="option1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt2_blk">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 2</label>

                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option2" id="option2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt3_blk">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 3</label>

                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option3" id="option3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt4_blk">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 4</label>

                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option4" id="option4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt5_blk">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 5</label>

                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option5" id="option5">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4" id="opt_blk_hin">


                                    <div class="row mt-3" id="opt1_blk_h">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 1 in Hindi</label>
                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option1_h" id="option1_h">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt2_blk_h">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 2 in hindi</label>
                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option2_h" id="option2_h">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt3_blk_h">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 3 in hindi</label>
                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option3_h" id="option3_h">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt4_blk_h">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 4 in Hindi</label>
                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option4_h" id="option4_h">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt5_blk_h">
                                        <div class="mb-2 col-md-12 d-flex">
                                            <label class="d-block text-font mr-3">Option 5 in Hindi</label>
                                            <div class="form-check">
                                                <input class="form-control input-font ml-3" type="text" name="option5_h" id="option5_h">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-4" id="corr_opt_blk">
                                    <label class="d-block text-font mr-3">Correct Option</label>
                                    <div id="cor_opt">
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r1" value="1">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r2" value="2">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r3" value="3">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r4" value="4">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r5" value="5">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="mb-2 col-md-4 d-flex">
                                    <label class="d-block text-font mr-3" style="width:154px;">Correct Answer option No</label>
                                    <input class="form-control input-font" type="text" name="correct_answer" id="correct_answer">
                                </div>
                            </div> -->
                            <div class="col-md-12 submit_btn p-3">
                                <!-- <a class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Create</a> -->
                                <a class="btn btn-primary btn-sm text-white" id="createQuestion">Create</a>
                                <!-- <input type="submit" name="Submit" id="createQueBank" class="btn btn-info btn-sm"> -->
                                <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="card border-top card-body">
                                        <table id="example" class="hover table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Question Id</th>
                                                    <th>Question Type</th>
                                                    <th>Question Title</th>
                                                    <!-- <th>Image</th> -->
                                                    <th>Number of Options</th>
                                                    <th>Option details</th>
                                                    <th>Correct Option No</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="que_body">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12 submit_btn p-3">
                                        <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a>
                                        <div id="err_que_bank"></div>
                                        <!-- <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                                        <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white"> -->
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to Submit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="saveQueBank">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to cancel?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="location.href='question_bank_list'">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>
                            </div>
                        </form><!-- end que creation -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
        <script>
            $('#questions_form').hide();
            $('#question-hindi').hide();
            $('#opt_blk_hin').hide();
            $('#opt_blk_eng').show();

            $(document).ready(function() {

                $('input[type=radio][name=language]').change(function() {

                    if (this.value == 1) {
                        $('#opt_blk_eng').show();
                        $('#corr_opt_blk').show();
                        $('#opt_blk_hin').hide();
                        $('#question-hindi').hide();
                        $('#question-eng').show();

                    } else if (this.value == 2) {
                        $('#opt_blk_eng').hide();
                        $('#corr_opt_blk').show();
                        $('#opt_blk_hin').show();
                        $('#question-hindi').show();
                        $('#question-eng').hide();
                    } else {
                        $('#opt_blk_eng').show();
                        $('#corr_opt_blk').show();
                        $('#opt_blk_hin').show();
                        $('#question-hindi').show();
                        $('#question-eng').show();
                    }
                });

               // $("#saveQueBank").click(function() {

                   // window.location.replace("<?php echo base_url(); ?>subadmin/question_bank_list");
               // });
               $('#queBankCreation').on('click', '#saveQueBank', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var que_bank_id= $('#que_bank_id').val();
                    var no_of_ques = $("#no_of_ques").val();

                    jQuery.ajax({
                            type: "GET",
                            url: '<?php echo base_url();?>subadmin/toCheckNoOfQueInBank/?id=' + que_bank_id+'&no='+no_of_ques,
                            dataType: 'json',
                            success: function(res) {
                               // console.log(res);
                                if (res.status == 0) {
                                    if ($("#err_que_bank").next(".validation").length == 0) // only add if not added
                                    {
                                        $("#err_que_bank").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please add questions equal to total no of questions in bank</div>");
                                    }
                                    if (!focusSet) {
                                        $("#err_que_bank").focus();
                                    }
                                } else {
                                        $("#err_que_bank").next(".validation").remove(); // remove it
                                       
                                        window.location.replace("<?php echo base_url(); ?>subadmin/question_bank_list");
                                }

                            },
                            error: function(xhr, status, error) {
                                //toastr.signuperr('Failed to add '+xData.name+' in wishlist.');
                                console.log(error);
                            }
                        });
               });
                $("#type1").click(function() {
                    $("#question-text").show();
                    $("#image-text").hide();
                });
                $("#type2").click(function() {
                    $("#question-text").hide();
                    $("#image-text").show();
                });
                $("#type3").click(function() {
                    $("#question-text").show();
                    $("#image-text").show();
                });


                $('#que_bank_form').on('click', '#createQueBank', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val();
                    var no_of_ques = $("#no_of_ques").val();

                    if (title == "") {
                        if ($("#title").next(".validation").length == 0) // only add if not added
                        {
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter title</div>");
                        }
                        if (!focusSet) {
                            $("#title").focus();
                        }
                        allfields = false;
                    } else {
                        $("#title").next(".validation").remove(); // remove it
                    }
                    if (no_of_ques == "") {
                        if ($("#no_of_ques").next(".validation").length == 0) // only add if not added
                        {
                            $("#no_of_ques").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter no of ques</div>");
                        }
                        if (!focusSet) {
                            $("#no_of_ques").focus();
                        }
                        allfields = false;
                    } else {
                        $("#no_of_ques").next(".validation").remove(); // remove it
                    }
                    if (total_marks == "") {
                        if ($("#total_marks").next(".validation").length == 0) // only add if not added
                        {
                            $("#total_marks").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter total marks</div>");
                        }
                        if (!focusSet) {
                            $("#total_marks").focus();
                        }
                        allfields = false;
                    } else {
                        $("#total_marks").next(".validation").remove(); // remove it
                    }
                    if (allfields) {
                        var url = $('#que_bank_form').attr('action');
                        var userForm = document.getElementById("que_bank_form");
                        var fd = new FormData(userForm);
                        jQuery.ajax({
                            type: "POST",
                            url: url,
                            dataType: 'json',
                            data: fd,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                if (res.status == 0) {
                                    alert(res.message);

                                } else {
                                    alert(res.message);
                                    var form = document.getElementById("que_bank_form");
                                    var elements = form.elements;
                                    for (var i = 0, len = elements.length; i < len; ++i) {
                                        elements[i].readOnly = true;
                                    }
                                    $('input[name="language"]').attr('disabled', 'disabled');
                                    $('#que_bank_id').val(res.id);
                                    $('#questions_form').show();
                                }
                            },
                            error: function(xhr, status, error) {
                                //toastr.error('Failed to add '+xData.name+' in wishlist.');
                                console.log(error);
                            }
                        });
                    } else {
                        return false;
                    }
                });
                //ajax request to fetch districts 
                $(document).on("change", "#no_of_options", function() {
                    var lang = $('input[name="language"]:checked').val();

                    $('#opt1_blk').hide();
                    $('#opt2_blk').hide();
                    $('#opt3_blk').hide();
                    $('#opt4_blk').hide();
                    $('#opt5_blk').hide();

                    $('#opt1_blk_h').hide();
                    $('#opt2_blk_h').hide();
                    $('#opt3_blk_h').hide();
                    $('#opt4_blk_h').hide();
                    $('#opt5_blk_h').hide();

                    $('#r1').hide();
                    $('#r2').hide();
                    $('#r3').hide();
                    $('#r4').hide();
                    $('#r5').hide();
                    var no_of_options = $("#no_of_options :selected").val();
                    if (no_of_options == 2) {
                        $('#r1').show();
                        $('#r2').show();
                    } else if (no_of_options == 3) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                    } else if (no_of_options == 4) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                        $('#r4').show();
                    } else if (no_of_options == 5) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                        $('#r4').show();
                        $('#r5').show();
                    }

                    if (lang == 1) {
                        if (no_of_options == 2) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();

                        } else if (no_of_options == 3) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();


                        } else if (no_of_options == 4) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();

                        } else if (no_of_options == 5) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt5_blk').show();

                        }

                    } else if (lang == 2) {
                        if (no_of_options == 2) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();


                        } else if (no_of_options == 3) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();


                        } else if (no_of_options == 4) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();


                        } else if (no_of_options == 5) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                            $('#opt5_blk_h').show();

                        }

                    } else {
                        if (no_of_options == 2) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();



                        } else if (no_of_options == 3) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                        } else if (no_of_options == 4) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                        } else if (no_of_options == 5) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt5_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                            $('#opt5_blk_h').show();
                        }


                    }



                });

                $('#questions_form').on('click', '#createQuestion', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var language = $("#language").val();
                   // alert(que_type);
                    var no_of_options = $("#no_of_options").val();
                    if (language == 1 || language == 3) {
                        var que = $("#que").val();
                        if (que == "") {
                            if ($("#que").next(".validation").length == 0) // only add if not added
                            {
                                $("#que").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter question</div>");
                            }
                            if (!focusSet) {
                                $("#que").focus();
                            }
                            allfields = false;
                        } else {
                            $("#que").next(".validation").remove(); // remove it
                        }

                        if (no_of_options == 2 || no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            var option1 = $("#option1").val();
                            var option2 = $("#option2").val();
                            if (option1 == "") {
                                if ($("#option1").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 1</div>");
                                }
                                if (!focusSet) {
                                    $("#option1").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option1").next(".validation").remove(); // remove it
                            }
                            if (option2 == "") {
                                if ($("#option2").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option2").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 2</div>");
                                }
                                if (!focusSet) {
                                    $("#option2").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option2").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            var option3 = $("#option3").val();

                            if (option3 == "") {
                                if ($("#option3").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 3</div>");
                                }
                                if (!focusSet) {
                                    $("#option3").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option3").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 4 || no_of_options == 5) {
                            var option4 = $("#option4").val();

                            if (option4 == "") {
                                if ($("#option4").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option4").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 4</div>");
                                }
                                if (!focusSet) {
                                    $("#option4").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option4").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 5) {
                            var option5 = $("#option5").val();
                            if (option5 == "") {
                                if ($("#option5").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option5").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 5</div>");
                                }
                                if (!focusSet) {
                                    $("#option5").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option5").next(".validation").remove(); // remove it
                            }
                        }
                    }
                    if (language == 2  || language == 3) {
                        var que_h = $("#que_h").val();
                        if (que_h == "") {
                            if ($("#que_h").next(".validation").length == 0) // only add if not added
                            {
                                $("#que_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter que_hstion</div>");
                            }
                            if (!focusSet) {
                                $("#que_h").focus();
                            }
                            allfields = false;
                        } else {
                            $("#que_h").next(".validation").remove(); // remove it
                        }

                        if (no_of_options == 2 || no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            var option1_h = $("#option1_h").val();
                            var option2_h = $("#option2_h").val();
                            if (option1_h == "") {
                                if ($("#option1_h").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option1_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 1</div>");
                                }
                                if (!focusSet) {
                                    $("#option1_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option1_h").next(".validation").remove(); // remove it
                            }
                            if (option2_h == "") {
                                if ($("#option2_h").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option2_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 2</div>");
                                }
                                if (!focusSet) {
                                    $("#option2_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option2_h").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            var option3_h = $("#option3_h").val();

                            if (option3_h == "") {
                                if ($("#option3_h").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option3_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 3</div>");
                                }
                                if (!focusSet) {
                                    $("#option3_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option3_h").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 4 || no_of_options == 5) {
                            var option4_h = $("#option4_h").val();

                            if (option4_h == "") {
                                if ($("#option4_h").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option4_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 4</div>");
                                }
                                if (!focusSet) {
                                    $("#option4_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option4_h").next(".validation").remove(); // remove it
                            }
                        }
                        if (no_of_options == 5) {
                            var option5_h = $("#option5_h").val();
                            if (option5_h == "") {
                                if ($("#option5_h").next(".validation").length == 0) // only add if not added
                                {
                                    $("#option5_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter option 5</div>");
                                }
                                if (!focusSet) {
                                    $("#option5_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#option5_h").next(".validation").remove(); // remove it
                            }
                        }

                    }

                    var correct_answer = $("#correct_answer").val();
                    if (correct_answer == "") {
                        if ($("#correct_answer").next(".validation").length == 0) // only add if not added
                        {
                            $("#correct_answer").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select correct option </div>");
                        }
                        if (!focusSet) {
                            $("#correct_answer").focus();
                        }
                        allfields = false;
                    } else {
                        $("#correct_answer").next(".validation").remove(); // remove it
                    }
                    if (allfields) {
                        var url = $('#questions_form').attr('action');
                        var userForm = document.getElementById("questions_form");
                        var fd = new FormData(userForm);
                        jQuery.ajax({
                            type: "POST",
                            url: url,
                            dataType: 'json',
                            data: fd,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                if (res.status == 0) {
                                    alert(res.message);
                                } else {
                                    alert(res.message);
                                    $('#que').val('');
                                    $('#option1').val('');
                                    $('#option2').val('');
                                    $('#option3').val('');
                                    $('#option4').val('');
                                    $('#option5').val('');
                                    $('#option1_h').val('');
                                    $('#option2_h').val('');
                                    $('#option3_h').val('');
                                    $('#option4_h').val('');
                                    $('#option5_h').val('');
                                    $('#correct_answer').val('');

                                    displayQuestions();

                                }
                            },
                            error: function(xhr, status, error) {
                                //toastr.error('Failed to add '+xData.name+' in wishlist.');
                                console.log(error);
                            }
                        });
                    } else {
                        return false;
                    }
                });

            });

            function displayQuestions() {

                var que_bank_id = $("#que_bank_id").val();
                $.post("<?php echo base_url(); ?>subadmin/getQuestionListByQueBankId/", {
                    que_bank_id: que_bank_id
                }, function(result) {
                    if (result.status == 0) {
                        $('.errorbox').show().text("Error,Please try again.");
                    } else {

                        res = JSON.parse(result);
                        //console.log(res.data)
                        data = res.data;

                        var row = '';
                        j = 0
                        for (i in data) {
                            j++;
                            if (data[i].que_type == 1) {
                                var type = "Text";
                            } else if (data[i].que_type == 2) {
                                var type = "Image";
                            } else {
                                var type = "Both";
                            }
                            ///////////////////////////////////////////////                               
                            if (data[i].opt1_e == '') {
                                var op1 = 'NA';
                            } else {
                                var op1 = data[i].opt1_e;
                            }
                            if (data[i].opt2_e == '') {
                                var op2 = 'NA';
                            } else {
                                var op2 = data[i].opt2_e;
                            }
                            if (data[i].opt3_e == '') {
                                var op3 = 'NA';
                            } else {
                                var op3 = data[i].opt3_e;
                            }
                            if (data[i].opt4_e == '') {
                                var op4 = 'NA';
                            } else {
                                var op4 = data[i].opt4_e;
                            }
                            if (data[i].opt5_e == '') {
                                var op5 = 'NA';
                            } else {
                                var op5 = data[i].opt5_e;
                            }
                            ////////////////////////////////////////////////
                            row += '<tr id="row' + data[i].que_id + '">' +
                                '<td>' + j + '</td>' +
                                '<td>' + data[i].que_id + '</td>' +
                                '<td>' + type + '</td>' +
                                '<td>' + data[i].que + '</td>' +
                                '<td>' + data[i].no_of_options + '</td>' +
                                // '<td>'+ '1. ' + data[i].opt1_e + '<br>2. '+ data[i].opt2_e + '<br>3. '+ data[i].opt3_e +   '<br>4. '+ data[i].opt4_e + '<br>5. '+ data[i].opt5_e   +'</td>'+

                                '<td>' + '1. ' + op1 + '<br>2. ' + op2 + '<br>3. ' + op3 + '<br>4. ' + op4 + '<br>5. ' + op5 + '</td>' +

                                '<td>' + data[i].corr_opt_e + '</td>' +
                                '<td > <span class="btn btn-sm btn-danger deletedata"  onclick="deleteQuestion(' + data[i].que_id + ');"data-id =' + data[i].que_id + ' >Delete</span> </td>' +
                                '</tr>';
                        }

                        $("#que_body").html(row);
                    }
                });

            }

            function deleteQuestion(que_id) {
                var c = confirm("Are you sure to delete this survey details? ");
                if (c == true) {
                    // const $loader = $('.igr-ajax-loader');
                    //$loader.show();
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>subadmin/deleteQuestion',
                        data: {
                            que_id: que_id,
                        },
                        success: function(result) {
                            $('#row' + que_id).css({
                                'display': 'none'
                            });
                        },
                        error: function(result) {
                            alert("Error,Please try again.");
                        }
                    });

                }
            }
            $("#no_of_ques").keydown(function(e) {

                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

            $("#total_marks").keydown(function(e) {

                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        </script>
        <!-- Footer -->

        <!-- End of Footer -->