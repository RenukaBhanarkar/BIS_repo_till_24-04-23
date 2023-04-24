    <!-- Begin Page Content -->
    <style>
        #opt_blk_eng .form-control,#opt_blk_hin .form-control  {margin-top: 13px;}
    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Question Bank Form</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'subadmin/questionBankList';?>" >Question Bank List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Question Bank Form</li>
                
                </ol>
            </nav>
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
                        <form id="que_bank_form" method="POST" action="<?php echo base_url(); ?>subadmin/createQueBank">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question Bank Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Question Bank Title">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Number of Question<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="no_of_ques" id="no_of_ques" placeholder="Enter Total Number of Question">
                                </div>
                                <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="total_marks" id="total_marks" placeholder="Enter Total Marks">
                                </div> -->
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
                                <!-- <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> -->
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
                            <input type="hidden" id="que_language" name="que_language">

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
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Question in English<sup class="text-danger">*</sup></label>
                                    <textarea type="text" class="form-control input-font" name="que" id="que" placeholder="Enter Question"></textarea>
                                </div>
                                <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question in Hindi<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control input-font" name="hindi" id="hindi" placeholder="Enter Marks">
                                </div> -->
                            </div>
                            <div class="row" id="question-hindi" style="display:none;">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Question in Hindi<sup class="text-danger">*</sup></label>
                                    <textarea type="text" class="form-control input-font" name="que_h" id="que_h" placeholder="Question in Hindi"></textarea>
                                </div>
                            </div>
                            <div class="row" id="image-block" style="display:none;">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                                    <div class="d-flex">
                                        <div>
                                            <input type="file" id="que_image" accept="image/jpeg,image/png" name="que_image" class="form-control-file" onchange="loadFileBanner(event)" required>
                                            <span class="error_text"><?php echo form_error('que_image'); ?></span>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Preview
                                        </button>
                                    </div>
                                    <div id="imgError"></div>

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
                                        <option value="0" selected>--select--</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="options_blk" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-lg-2 " id="opt1_type_blk">
                                    
                                    <div class="row"  id="opt1_div">
                                        <div class="col-md-12">
                                            <label class="d-block text-font mr-3">Option 1</label>
                                                <select class="form-control input-font" id="opt_type_1" name="opt_type_1" aria-label="Default select example">
                                                        <option value="1">Text</option>
                                                        <option value="2">Image</option>
                                                </select>                                               
                                        </div>
                                    </div>  
                                    <div class="row" id="opt2_div">
                                        <div class="col-md-12">
                                            <label class="d-block text-font mr-3">Option 2</label>
                                                <select class="form-control input-font" id="opt_type_2" name="opt_type_2" aria-label="Default select example">
                                                        <option value="1">Text</option>
                                                        <option value="2">Image</option>
                                                </select>                                               
                                        </div>
                                    </div> 

                                    <div class="row" id="opt3_div">
                                        <div class="col-md-12">
                                            <label class="d-block text-font mr-3">Option 3</label>
                                                <select class="form-control input-font" id="opt_type_3" name="opt_type_3" aria-label="Default select example">
                                                        <option value="1">Text</option>
                                                        <option value="2">Image</option>
                                                </select>                                               
                                        </div>
                                    </div> 
                                    <div class="row" id="opt4_div">
                                        <div class="col-md-12">
                                            <label class="d-block text-font mr-3">Option 4</label>
                                                <select class="form-control input-font" id="opt_type_4" name="opt_type_4" aria-label="Default select example">
                                                        <option value="1">Text</option>
                                                        <option value="2">Image</option>
                                                </select>                                               
                                        </div>
                                    </div> 
                                    <div class="row" id="opt5_div">
                                        <div class="col-md-12">
                                            <label class="d-block text-font mr-3">Option 5</label>
                                                <select class="form-control input-font" id="opt_type_5" name="opt_type_5" aria-label="Default select example">
                                                        <option value="1">Text</option>
                                                        <option value="2">Image</option>
                                                </select>                                               
                                        </div>
                                    </div> 
                                </div>


                                <div class="col-md-3 col-sm-3 col-lg-3 " id="opt_blk_eng">
                                <label class="d-block text-font mr-3">English Option</label>

                                    <div class="row mt-3" id="opt1_blk">
                                        <div class="mb-2  d-flex">
                                           
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option1_text_blk">
                                                    <input class="form-control input-font" type="text" name="option1" id="option1" style="margin-top:0px;">
                                                </div>

                                                <div class="form-check" style="padding-left:0px;" id="option1_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option1_image" id="option1_image" style="margin-top:0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt2_blk">
                                        <div class="mb-2  d-flex">
                                           
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option2_text_blk">
                                                    <input class="form-control input-font" type="text" name="option2" id="option2" style="margin-top:0px;">
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option2_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option2_image" id="option2_image" style="margin-top:10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt3_blk">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option3_text_blk">
                                                    <input class="form-control input-font" type="text" name="option3" id="option3" style="margin-top:0px;">
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option3_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option3_image" id="option3_image" style="margin-top:13px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt4_blk">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option4_text_blk">
                                                    <input class="form-control input-font" type="text" name="option4" id="option4" style="margin-top:0px;">
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option4_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option4_image" id="option4_image" style="margin-top:15px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt5_blk">
                                        <div class="mb-2  d-flex">
                                           
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option5_text_blk">
                                                    <input class="form-control input-font" type="text" name="option5" id="option5" style="margin-top:0px;">
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option5_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option5_image" id="option5_image" style="margin-top:13px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-lg-3 " id="opt_blk_hin">
                                <label class="d-block text-font mr-3">Hindi Option</label>
                                    <div class="row mt-3" id="opt1_blk_h">
                                        <div class="mb-2  d-flex">
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option1_h_text_blk">
                                                    <input class="form-control input-font" type="text" name="option1_h" id="option1_h" style="margin-top:0px;" required>
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option1_h_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option1_h_image" id="option1_h_image" style="margin-top:0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt2_blk_h">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option2_h_text_blk">
                                                    <input class="form-control input-font" type="text" name="option2_h" id="option2_h" style="margin-top:0px;" required>
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option2_h_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option2_h_image" id="option2_h_image" style="margin-top:10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt3_blk_h">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option3_h_text_blk">
                                                    <input class="form-control input-font" type="text" name="option3_h" id="option3_h" style="margin-top:0px;" required>
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option3_h_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option3_h_image" id="option3_h_image" style="margin-top:13px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt4_blk_h">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option4_h_text_blk">
                                                    <input class="form-control input-font" type="text" name="option4_h" id="option4_h" style="margin-top:0px;">
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option4_h_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option4_h_image" id="option4_h_image" style="margin-top:15px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" id="opt5_blk_h">
                                        <div class="mb-2  d-flex">
                                            
                                            <div class="col-12">
                                                <div class="form-check" style="padding-left:0px;" id="option5_h_text_blk">
                                                    <input class="form-control input-font" type="text" name="option5_h" id="option5_h" style="margin-top:0px;" required>
                                                </div>
                                                <div class="form-check" style="padding-left:0px;" id="option5_h_image_blk">
                                                    <input class="form-control-file input-font" type="file" name="option5_h_image" id="option5_h_image" style="margin-top:13px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-2 col-sm-2 col-lg-2 " id="corr_opt_blk">
                                    <label class="d-block text-font mr-3">Correct Option</label>
                                    <div id="cor_opt">
                                        <div class="row mt-3">
                                            <div class="mb-2 col-4 ">

                                                <input class="form-control-radio input-font ml-3" type="radio" name="correct_answer" id="r1" value="1" style="margin-top: -7px;">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3 mt-3" type="radio" name="correct_answer" id="r2" value="2">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3 mt-4" type="radio" name="correct_answer" id="r3" value="3">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3 mt-4" type="radio" name="correct_answer" id="r4" value="4">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="mb-2 col-md-4 d-flex">

                                                <input class="form-control-radio input-font ml-3 mt-4" type="radio" name="correct_answer" id="r5" value="5">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="imgErrorNew1"></div>
                                    <div id="imgErrorNew2"></div>
                                    <div id="imgErrorNew3"></div>
                                    <div id="imgErrorNew4"></div>
                                    <div id="imgErrorNew5"></div>
                                    <div id="imgErrorNewHindi1"></div>
                                    <div id="imgErrorNewHindi2"></div>
                                    <div id="imgErrorNewHindi3"></div>
                                    <div id="imgErrorNewHindi4"></div>
                                    <div id="imgErrorNewHindi5"></div>
                                </div>
                            </div>
                            <div class="col-md-12 submit_btn p-3">
                                <!-- <a class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Create</a> -->
                                <a class="btn btn-primary btn-sm text-white" id="createQuestion">Create</a>
                                <!-- <input type="submit" name="Submit" id="createQueBank" class="btn btn-info btn-sm"> -->
                                <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="card border-top card-body">
                                        <table id="example" class="table-bordered display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Question Id</th>
                                                    <th>Question Type</th>
                                                    <th>English <br>Question <br>Title</th>
                                                    <th>Hindi <br> Question <br>Title </th>
                                                    <!-- <th>Image</th> -->
                                                    <th>Number of <br>Options</th>
                                                    <th>English Options </th>
                                                    <th>Hindi Options</th>
                                                    <th>Correct Option No</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="que_body">

                                            </tbody>
                                            <!-- <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>12345</td>
                                                    <td>Text</td>
                                                    <td>title</td>
                                                    <td>title</td>
                                                    <td>10</td>
                                                    <td>details</td>
                                                    <td><img src="<?php echo base_url(); ?>assets/admin/img/bis_logo.png" style="width: 30px;" data-toggle="modal" data-target="#img_popup"></td>
                                                    <td>2</td>
                                                    <td>action</td>
                                                </tr>
                                            </tbody>-->
                                        </table>

                                        <!--<div class="modal fade" id="img_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width: 700px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close" fdprocessedid="tv8px"><span aria-hidden="true">�</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="http://localhost/BIS/BIS_repo/assets/images/img_2.jpg" width="100%" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      -->
                                    </div>
                                    <div class="col-md-12 submit_btn p-3">
                                        <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a>
                                        <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a>
                                        <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                                        <div id="err_que_bank"></div>
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
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="saveQueBank">Submit</button>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Conformation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to cancel?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="location.href='question_bank_list'">Cancel</button>
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
            //Banner Image Preview
            var loadFileBanner = function(event) {
                $("#outputbanner").show();
                var outputbanner = document.getElementById('outputbanner');
                outputbanner.src = URL.createObjectURL(event.target.files[0]);
                outputbanner.onload = function() {
                    URL.revokeObjectURL(outputbanner.src);
                }
            };

            function resetbanner() {
                $("#banner_img").val('');
                $("#outputbanner").hide();
            }
            //end
            $('#questions_form').hide();
            $('#question-hindi').hide();
            $('#opt_blk_hin').hide();
            $('#opt_blk_eng').show();

            $('#option1_image_blk').hide();
            $('#option2_image_blk').hide();
            $('#option3_image_blk').hide();
            $('#option4_image_blk').hide();
            $('#option5_image_blk').hide();

            $('#option1_h_image_blk').hide();
            $('#option2_h_image_blk').hide();
            $('#option3_h_image_blk').hide();
            $('#option4_h_image_blk').hide();
            $('#option5_h_image_blk').hide();

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

                $(document).on("change", "#opt_type_1", function() {
                    var opt_type = $("#opt_type_1 :selected").val();
                    if (opt_type == 1) {
                        $("#option1_text_blk").show();
                        $("#option1_image_blk").hide();
                        $("#option1_h_text_blk").show();
                        $("#option1_h_image_blk").hide();
                    } else {
                        $("#option1_text_blk").hide();
                        $("#option1_image_blk").show();
                        $("#option1_h_text_blk").hide();
                        $("#option1_h_image_blk").show();
                    }
                });
                $(document).on("change", "#opt_type_2", function() {
                    var opt_type = $("#opt_type_2 :selected").val();
                    if (opt_type == 1) {
                        $("#option2_text_blk").show();
                        $("#option2_image_blk").hide();
                        $("#option2_h_text_blk").show();
                        $("#option2_h_image_blk").hide();
                    } else {
                        $("#option2_text_blk").hide();
                        $("#option2_image_blk").show();
                        $("#option2_h_text_blk").hide();
                        $("#option2_h_image_blk").show();
                    }
                });
                $(document).on("change", "#opt_type_3", function() {
                    var opt_type = $("#opt_type_3 :selected").val();
                    if (opt_type == 1) {
                        $("#option3_text_blk").show();
                        $("#option3_image_blk").hide();
                        $("#option3_h_text_blk").show();
                        $("#option3_h_image_blk").hide();
                    } else {
                        $("#option3_text_blk").hide();
                        $("#option3_image_blk").show();
                        $("#option3_h_text_blk").hide();
                        $("#option3_h_image_blk").show();
                    }
                });
                $(document).on("change", "#opt_type_4", function() {
                    var opt_type = $("#opt_type_4 :selected").val();
                    if (opt_type == 1) {
                        $("#option4_text_blk").show();
                        $("#option4_image_blk").hide();
                        $("#option4_h_text_blk").show();
                        $("#option4_h_image_blk").hide();
                    } else {
                        $("#option4_text_blk").hide();
                        $("#option4_image_blk").show();
                        $("#option4_h_text_blk").hide();
                        $("#option4_h_image_blk").show();
                    }
                });
                $(document).on("change", "#opt_type_5", function() {
                    var opt_type = $("#opt_type_5 :selected").val();
                    if (opt_type == 1) {
                        $("#option5_text_blk").show();
                        $("#option5_image_blk").hide();
                        $("#option5_h_text_blk").show();
                        $("#option5_h_image_blk").hide();
                    } else {
                        $("#option5_text_blk").hide();
                        $("#option5_image_blk").show();
                        $("#option5_h_text_blk").hide();
                        $("#option5_h_image_blk").show();
                    }
                });
              

                // $("#saveQueBank").click(function() {
                // window.location.replace("<?php echo base_url(); ?>subadmin/question_bank_list");
                // });
                $('#queBankCreation').on('click', '#saveQueBank', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var que_bank_id = $('#que_bank_id').val();
                    var no_of_ques = $("#no_of_ques").val();

                    jQuery.ajax({
                        type: "GET",
                        url: '<?php echo base_url(); ?>subadmin/toCheckNoOfQueInBank/?id=' + que_bank_id + '&no=' + no_of_ques,
                        dataType: 'json',
                        success: function(res) {
                            // console.log(res);
                            if (res.status == 0) {
                                if ($("#err_que_bank").next(".validation").length == 0) {
                                    $("#err_que_bank").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please add questions equal to total no of questions in bank</div>");
                                }
                                if (!focusSet) {
                                    $("#err_que_bank").focus();
                                }
                            } else {
                                $("#err_que_bank").next(".validation").remove();

                                window.location.replace("<?php echo base_url(); ?>subadmin/questionBankList");
                            }

                        },
                        error: function(xhr, status, error) {
                            //toastr.signuperr('Failed to add '+xData.name+' in wishlist.');
                            console.log(error);
                        }
                    });
                });
                $('input[type=radio][name=que_type]').change(function() {
                    var lan = $('input[name="language"]:checked').val();
                    var que_type = $('input[name="que_type"]:checked').val();
                    if (lan == 1) {
                        if (que_type == 1) {
                            $("#question-eng").show();
                            $("#question-hindi").hide();
                            $("#image-block").hide();
                        } else if (que_type == 2) {
                            $("#question-eng").hide();
                            $("#question-hindi").hide();
                            $("#image-block").show();
                        } else {
                            $("#question-eng").show();
                            $("#image-block").show();
                            $("#question-hindi").hide();
                        }
                    } else if (lan == 2) {
                        if (que_type == 1) {
                            $("#question-eng").hide();
                            $("#question-hindi").show();
                            $("#image-block").hide();
                        } else if (que_type == 2) {
                            $("#question-eng").hide();
                            $("#question-hindi").hide();
                            $("#image-block").show();
                        } else {
                            $("#question-eng").hide();
                            $("#image-block").show();
                            $("#question-hindi").show();
                        }
                    } else {
                        if (que_type == 1) {
                            $("#question-eng").show();
                            $("#question-hindi").show();
                            $("#image-block").hide();
                        } else if (que_type == 2) {
                            $("#question-eng").hide();
                            $("#question-hindi").hide();
                            $("#image-block").show();
                        } else {
                            $("#question-eng").show();
                            $("#image-block").show();
                            $("#question-hindi").show();
                        }
                    }
                });

                $('#que_bank_form').on('click', '#createQueBank', function(e) {
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val();
                    var no_of_ques = $("#no_of_ques").val();
                    // var total_marks = $("#total_marks").val();

                    if (title == "") {
                        if ($("#title").next(".validation").length == 0) {
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter title</div>");
                        }
                        if (!focusSet) {
                            $("#title").focus();
                        }
                        allfields = false;
                    } else {
                        $("#title").next(".validation").remove();
                    }
                    if (no_of_ques == "") {
                        if ($("#no_of_ques").next(".validation").length == 0) {
                            $("#no_of_ques").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter no of ques</div>");
                        }
                        if (!focusSet) {
                            $("#no_of_ques").focus();
                        }
                        allfields = false;
                    } else {
                        $("#no_of_ques").next(".validation").remove();
                    }
                    // if (total_marks == "") {
                    //     if ($("#total_marks").next(".validation").length == 0) {
                    //         $("#total_marks").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter total marks</div>");
                    //     }
                    //     if (!focusSet) {
                    //         $("#total_marks").focus();
                    //     }
                    //     allfields = false;
                    // } else {
                    //     $("#total_marks").next(".validation").remove();
                    // }
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
                                    var language = $('input[name="language"]:checked').val();

                                    $("#que_language").val(language);
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
                 
                $(document).on("change", "#no_of_options", function() {
                    $('#options_blk').show();
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
                    $('#opt1_div').hide();
                    $('#opt2_div').hide();
                    $('#opt3_div').hide();
                    $('#opt4_div').hide();
                    $('#opt5_div').hide();
                    var no_of_options = $("#no_of_options :selected").val();
                    if (no_of_options == 2) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#opt1_div').show();
                         $('#opt2_div').show();
                    } else if (no_of_options == 3) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                        $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                    } else if (no_of_options == 4) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                        $('#r4').show();
                        $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                    } else if (no_of_options == 5) {
                        $('#r1').show();
                        $('#r2').show();
                        $('#r3').show();
                        $('#r4').show();
                        $('#r5').show();
                        $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                         $('#opt5_div').show();

                    }

                    if (lang == 1) {
                     
                        if (no_of_options == 2) {

                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt1_div').show();
                            $('#opt2_div').show();

                        } else if (no_of_options == 3) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();

                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                        } else if (no_of_options == 4) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                        } else if (no_of_options == 5) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt5_blk').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                         $('#opt5_div').show();

                        }

                    } else if (lang == 2) {
                      
                        if (no_of_options == 2) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                        

                        } else if (no_of_options == 3) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                        
                        } else if (no_of_options == 4) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                        } else if (no_of_options == 5) {
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                            $('#opt5_blk_h').show();
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                         $('#opt5_div').show();

                        }

                    } else {
                    
                        if (no_of_options == 2) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt1_type_blk').show();
                            $('#opt2_type_blk').show();

                        } else if (no_of_options == 3) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt1_type_blk').show();
                            $('#opt2_type_blk').show();
                            $('#opt3_type_blk').show();
                        } else if (no_of_options == 4) {
                            $('#opt1_blk').show();
                            $('#opt2_blk').show();
                            $('#opt3_blk').show();
                            $('#opt4_blk').show();
                            $('#opt1_blk_h').show();
                            $('#opt2_blk_h').show();
                            $('#opt3_blk_h').show();
                            $('#opt4_blk_h').show();
                            $('#opt1_type_blk').show();
                            $('#opt2_type_blk').show();
                            $('#opt3_type_blk').show();
                            $('#opt4_type_blk').show();
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
                            $('#opt1_div').show();
                         $('#opt2_div').show();
                         $('#opt3_div').show();
                         $('#opt4_div').show();
                         $('#opt5_div').show();

                        }
                    }
                });
                $('#questions_form').on('click', '#createQuestion', function(e) {
                    e.preventDefault();

                    var focusSet = false;
                    var allfields = true;
                    var language = $("#que_language").val();

                    //////////////////////
                    var que_type = $('input[name="que_type"]:checked').val();

                    if (que_type == 2 || que_type == 3) {
                        if ($("#que_image").val() == '') {
                            if ($("#imgError").next(".validation").length == 0) {
                                $("#imgError").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select image</div>");
                            }
                            if (!focusSet) {
                                $("#imgError").focus();
                            }
                            allfields = false;
                        } else {
                            $("#imgError").next(".validation").remove();
                        }

                        //check size of doc and type  if newly uploaded
                        if ($("#que_image").val() != '') {
                            var fileSize = $('#que_image')[0].files[0].size;

                            if (fileSize > 102400) {
                                if ($("#imgError").next(".validation").length == 0) {
                                    $("#imgError").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 100 KB </div>");
                                }
                                allFields = false;
                                if (!focusSet) {
                                    $("#que_image").focus();
                                }
                            } else {
                                $("#imgError").next(".validation").remove();
                            }
                            // check type  start 
                            var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                            var fileName = $("#que_image").val();;
                            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                            if ($.inArray(fileNameExt, validExtensions) == -1) {
                                //alert("Invalid file type");
                                if ($("#imgError").next(".validation").length == 0) {
                                    $("#imgError").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                                }
                                allFields = false;
                                if (!focusSet) {
                                    $("#que_image").focus();
                                }
                            } else {
                                $("#imgError").next(".validation").remove();
                            }
                        }
                    }
                    ///////////////////////////
                    var no_of_options = $("#no_of_options").val();
                    if (no_of_options == 0) {
                        if ($("#no_of_options").next(".validation").length == 0) {
                            $("#no_of_options").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter no of options</div>");
                        }
                        if (!focusSet) {
                            $("#no_of_options").focus();
                        }
                        allfields = false;
                    } else {
                        $("#no_of_options").next(".validation").remove();
                    }


                    if (language == 1 || language == 3) {
                        if (que_type == 1 || que_type == 3) {
                            var que = $("#que").val();
                            if (que == "") {
                                if ($("#que").next(".validation").length == 0) {
                                    $("#que").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter question</div>");
                                }
                                if (!focusSet) {
                                    $("#que").focus();
                                }
                                allfields = false;
                            } else {
                                $("#que").next(".validation").remove();
                            }
                        }
                        if (no_of_options == 2 || no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            ///////////////////
                            var opt_type_1 = $("#opt_type_1 :selected").val();
                            if (opt_type_1 == 1) {
                                var option1 = $("#option1").val();
                                if (option1 == "") {
                                    if ($("#option1").next(".validation").length == 0) {
                                        $("#option1").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter option 1</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option1").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option1").next(".validation").remove();
                                }
                            } else {
                                var option1_image = $("#option1_image").val();
                                var msg = ImageValidation(option1_image, 1);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }

                            ////////////////////
                            ///////////////////
                            var opt_type_2 = $("#opt_type_2 :selected").val();
                            if (opt_type_2 == 1) {
                                var option2 = $("#option2").val();
                                if (option2 == "") {
                                    if ($("#option2").next(".validation").length == 0) {
                                        $("#option2").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter option 2</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option2").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option2").next(".validation").remove();
                                }
                            } else {
                                var option2_image = $("#option2_image").val();
                                var msg = ImageValidation(option2_image, 2);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }
                            ////////////////////
                        }
                        if (no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            var opt_type_3 = $("#opt_type_3 :selected").val();
                            if (opt_type_3 == 1) {
                                var option3 = $("#option3").val();

                                if (option3 == "") {
                                    if ($("#option3").next(".validation").length == 0) {
                                        $("#option3").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter option 3</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option3").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option3").next(".validation").remove();
                                }
                            } else {
                                var option3_image = $("#option3_image").val();
                                var msg = ImageValidation(option3_image, 3);
                                if (msg > 0) {
                                    allfields = false;
                                }

                            }

                        }
                        if (no_of_options == 4 || no_of_options == 5) {
                            var opt_type_4 = $("#opt_type_4 :selected").val();
                            if (opt_type_4 == 1) {
                                var option4 = $("#option4").val();

                                if (option4 == "") {
                                    if ($("#option4").next(".validation").length == 0) {
                                        $("#option4").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter option 4</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option4").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option4").next(".validation").remove();
                                }
                            } else {
                                var option4_image = $("#option4_image").val();
                                var msg = ImageValidation(option4_image, 4);
                                if (msg > 0) {
                                    allfields = false;
                                }

                            }

                        }
                        if (no_of_options == 5) {
                            var opt_type_5 = $("#opt_type_5 :selected").val();
                            if (opt_type_5 == 1) {
                                var option5 = $("#option5").val();
                                if (option5 == "") {
                                    if ($("#option5").next(".validation").length == 0) {
                                        $("#option5").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter option 5</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option5").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option5").next(".validation").remove();
                                }
                            } else {
                                var option5_image = $("#option5_image").val();
                                var msg = ImageValidation(option5_image, 5);
                                if (msg > 0) {
                                    allfields = false;
                                }

                            }
                        }
                    }
                    if (language == 2 || language == 3) {
                        if (que_type == 1 || que_type == 3) {
                            var que_h = $("#que_h").val();
                            if (que_h == "") {
                                if ($("#que_h").next(".validation").length == 0) {
                                    $("#que_h").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter question in hindi</div>");
                                }
                                if (!focusSet) {
                                    $("#que_h").focus();
                                }
                                allfields = false;
                            } else {
                                $("#que_h").next(".validation").remove();
                            }
                        }
                        if (no_of_options == 2 || no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {
                            ///////////////////
                            var opt_type_1 = $("#opt_type_1 :selected").val();
                            if (opt_type_1 == 1) {
                                var option1_h = $("#option1_h").val();
                                if (option1_h == "") {
                                    if ($("#option1_h").next(".validation").length == 0) {
                                        $("#option1_h").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter Hindi option 1</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option1_h").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option1_h").next(".validation").remove();
                                }
                            } else {
                                var option1_h_image = $("#option1_h_image").val();
                                var msg = ImageValidationHindi(option1_h_image, 1);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }
                            ////////////////////

                            var opt_type_2 = $("#opt_type_2 :selected").val();
                            if (opt_type_2 == 1) {
                                var option2_h = $("#option2_h").val();
                                if (option2_h == "") {
                                    if ($("#option2_h").next(".validation").length == 0) {
                                        $("#option2_h").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter Hindi option 2</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option2_h").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option2_h").next(".validation").remove();
                                }
                            } else {
                                var option2_h_image = $("#option2_h_image").val();
                                var msg = ImageValidationHindi(option2_h_image, 2);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }
                        }
                        if (no_of_options == 3 || no_of_options == 4 || no_of_options == 5) {

                            var opt_type_3 = $("#opt_type_3 :selected").val();
                            if (opt_type_3 == 1) {
                                var option3_h = $("#option3_h").val();
                                if (option3_h == "") {
                                    if ($("#option3_h").next(".validation").length == 0) {
                                        $("#option3_h").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter Hindi option 3</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option3_h").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option3_h").next(".validation").remove();
                                }
                            } else {
                                var option3_h_image = $("#option3_h_image").val();
                                var msg = ImageValidationHindi(option3_h_image, 3);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }

                        }
                        if (no_of_options == 4 || no_of_options == 5) {
                            var opt_type_4 = $("#opt_type_4 :selected").val();
                            if (opt_type_4 == 1) {
                                var option4_h = $("#option4_h").val();
                                if (option4_h == "") {
                                    if ($("#option4_h").next(".validation").length == 0) {
                                        $("#option4_h").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter Hindi option 4</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option4_h").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option4_h").next(".validation").remove();
                                }
                            } else {
                                var option4_h_image = $("#option4_h_image").val();
                                var msg = ImageValidationHindi(option4_h_image, 4);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }

                        }
                        if (no_of_options == 5) {
                            var opt_type_5 = $("#opt_type_5 :selected").val();
                            if (opt_type_5 == 1) {
                                var option5_h = $("#option5_h").val();
                                if (option5_h == "") {
                                    if ($("#option5_h").next(".validation").length == 0) {
                                        $("#option5_h").after("<div class='validation' style='color:red;margin-bottom:15px; margin-left:16px;'>Please enter Hindi option 5</div>");
                                    }
                                    if (!focusSet) {
                                        $("#option5_h").focus();
                                    }
                                    allfields = false;
                                } else {
                                    $("#option5_h").next(".validation").remove();
                                }
                            } else {
                                var option5_h_image = $("#option5_h_image").val();
                                var msg = ImageValidationHindi(option5_h_image, 5);
                                if (msg > 0) {
                                    allfields = false;
                                }
                            }
                        }
                    }
                    //var correct_answer =  $('input[name="correct_answer"]:checked').val();
                    // alert($('input[name="correct_answer"]:checked').length);

                    if ($('input[name="correct_answer"]:checked').length == 0) {
                        if ($("#cor_opt").next(".validation").length == 0) {
                            $("#cor_opt").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select correct option </div>");
                        }
                        if (!focusSet) {
                            $("#cor_opt").focus();
                        }
                        allfields = false;
                    } else {
                        $("#cor_opt").next(".validation").remove();
                    }
                    if (allfields) {
                        /*********************************************/

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
                            // enctype :'multipart/form-data',
                            success: function(res) {
                                if (res.status == 0) {
                                    alert(res.message);
                                } else {
                                    alert(res.message);
                                    $('#que').val('');
                                    $('#que_h').val('');
                                    $('#que_image').val('');
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
                                    $('#option1_image').val('');
                                    $('#option2_image').val('');
                                    $('#option3_image').val('');
                                    $('#option4_image').val('');
                                    $('#option5_image').val('');
                                    $('#option1_h_image').val('');
                                    $('#option2_h_image').val('');
                                    $('#option3_h_image').val('');
                                    $('#option4_h_image').val('');
                                    $('#option5_h_image').val('');


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

            function ImageValidation(img, id) {

                var i = 0;
                if (img == '') {
                    i++;

                    if ($("#imgErrorNew" + id).next(".validation").length == 0) {
                        $("#imgErrorNew" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select image for English option " + id + "</div>");
                    } else {
                        $("#imgErrorNew" + id).next(".validation").remove();
                    }
                } else {
                    $("#imgErrorNew" + id).next(".validation").remove();
                }

                //check size of doc and type  if newly uploaded
                if (img != '') {

                    var fileSize = $("#option" + id + "_image")[0].files[0].size;

                    if (fileSize > 102400) {
                        i++;

                        if ($("#imgErrorNew" + id).next(".validation").length == 0) {

                            $("#imgErrorNew" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 100 KB for English option " + id + " </div>");
                        }
                    } else {
                        $("#imgErrorNew" + id).next(".validation").remove();
                        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                        var fileName = $("#option" + id + "_image").val();;
                        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                        if ($.inArray(fileNameExt, validExtensions) == -1) {
                            alert("Invalid file type");
                            i++;

                            if ($("#imgErrorNew" + id).next(".validation").length == 0) {
                                $("#imgErrorNew" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image for English option " + id + " </div>");
                            }
                        } else {
                            $("#imgErrorNew" + id).next(".validation").remove();
                        }
                    }



                    // check type  start 



                }
                return i;
            }

            function ImageValidationHindi(img, id) {

                var i = 0;
                if (img == '') {
                    i++;

                    if ($("#imgErrorNewHindi" + id).next(".validation").length == 0) {
                        $("#imgErrorNewHindi" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select image for Hindi option " + id + "</div>");
                    } else {
                        $("#imgErrorNewHindi" + id).next(".validation").remove();
                    }
                } else {
                    $("#imgErrorNewHindi" + id).next(".validation").remove();
                }

                //check size of doc and type  if newly uploaded
                if (img != '') {

                    var fileSize = $("#option" + id + "_h_image")[0].files[0].size;

                    if (fileSize > 102400) {
                        i++;

                        if ($("#imgErrorNewHindi" + id).next(".validation").length == 0) {

                            $("#imgErrorNewHindi" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 100 KB for Hindi option " + id + " </div>");
                        }
                    } else {
                        $("#imgErrorNewHindi" + id).next(".validation").remove();
                        var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                        var fileName = $("#option" + id + "_h_image").val();;
                        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                        if ($.inArray(fileNameExt, validExtensions) == -1) {
                            alert("Invalid file type");
                            i++;

                            if ($("#imgErrorNewHindi" + id).next(".validation").length == 0) {
                                $("#imgErrorNewHindi" + id).after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image for Hindi option " + id + " </div>");
                            }
                        } else {
                            $("#imgErrorNewHindi" + id).next(".validation").remove();
                        }
                    }
                    // check type  start 
                }
                return i;
            }

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
                            var op1 = "NA";
                            var op2 = "NA";
                            var op3 = "NA";
                            var op4 = "NA";
                            var op5 = "NA";
                            var op1_h = "NA";
                            var op2_h = "NA";
                            var op3_h = "NA";
                            var op4_h = "NA";
                            var op5_h = "NA";
                            if (data[i].que_type == 1) {
                                var type = "Text";
                            } else if (data[i].que_type == 2) {
                                var type = "Image";
                            } else {
                                var type = "Both";
                            }
                            if (data[i].que_type == 2) {
                                if (data[i].que == 0 || data[i].que == '') {
                                    var engQue = "";
                                } else {
                                    var engQue = data[i].que;
                                }
                            } else {
                                if (data[i].que == 0 || data[i].que == '') {
                                    var engQue = "NA";
                                } else {
                                    var engQue = data[i].que;
                                }
                            }
                            if (data[i].que_type == 2) {
                                if (data[i].que_h == 0 || data[i].que_h == '') {
                                    var hindiQue = "";
                                } else {
                                    var hindiQue = data[i].que_h;
                                }
                            } else {
                                if (data[i].que_h == 0 || data[i].que_h == '') {
                                    var hindiQue = "NA";
                                } else {
                                    var hindiQue = data[i].que_h;
                                }
                            }
                            if (data[i].language == 1 || data[i].language == 3) {
                                if (data[i].image != '') {
                                    var img = data[i].image;
                                    var dynamicImg = '<td>' + engQue + '<br>' +
                                        '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id +
                                        '/' + img + '"></td>';
                                } else {
                                    var dynamicImg = '<td>' + engQue + '</td>';
                                }
                            } else {
                                var dynamicImg = '<td>--</td>';
                            }
                            if (data[i].language == 2 || data[i].language == 3) {
                                if (data[i].image != '') {
                                    var img = data[i].image;
                                    var dynamicImgHindi = '<td>' + hindiQue + '<br>' +
                                        '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id +
                                        '/' + img + '"></td>';
                                } else {
                                    var dynamicImgHindi = '<td>' + hindiQue + '</td>';
                                }
                            } else {
                                var dynamicImgHindi = '<td>--</td>';
                            }
                            /////////////////////////////////////////////// 
                            if (data[i].language == 1 || data[i].language == 3) {
                                if (data[i].no_of_options == 2 || data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {

                                    if (data[i].opt1_e == 0 || data[i].opt1_e == "") {

                                        var op1_img = data[i].option1_image;
                                        var op1 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op1_img + '">';
                                    } else {
                                        var op1 = data[i].opt1_e;
                                    }
                                    if (data[i].opt2_e == 0 || data[i].opt2_e == "") {
                                        var op2_img = data[i].option2_image;
                                        var op2 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op2_img + '">';
                                    } else {
                                        var op2 = data[i].opt2_e;
                                    }

                                }
                                if (data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt3_e == 0 || data[i].opt3_e == "") {
                                        var op3_img = data[i].option3_image;
                                        var op3 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op3_img + '">';
                                    } else {
                                        var op3 = data[i].opt3_e;
                                    }
                                }
                                if (data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt4_e == 0 || data[i].opt4_e == '') {
                                        var op4_img = data[i].option4_image;
                                        var op4 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op4_img + '">';
                                    } else {
                                        var op4 = data[i].opt4_e;
                                    }
                                }
                                if ( data[i].no_of_options == 5) {
                                    if (data[i].opt5_e == 0 || data[i].opt5_e == '') {
                                        var op5_img = data[i].option5_image;
                                        var op5 = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op5_img + '">';
                                    } else {
                                        var op5 = data[i].opt5_e;
                                    }

                                }


                            }
                            if (data[i].language == 2 || data[i].language == 3) {
                                if (data[i].no_of_options == 2 || data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt1_h == '' || data[i].opt1_h == 0) {
                                        var op1_h_img = data[i].option1_h_image;
                                        var op1_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op1_h_img + '">';
                                    } else {
                                        var op1_h = data[i].opt1_h;
                                    }
                                    if (data[i].opt2_h == '' || data[i].opt2_h == 0) {
                                        var op2_h_img = data[i].option2_h_image;
                                        var op2_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op2_h_img + '">';
                                    } else {
                                        var op2_h = data[i].opt2_h;
                                    }
                                }
                                if (data[i].no_of_options == 3 || data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt3_h == '' || data[i].opt3_h == 0) {
                                        var op3_h_img = data[i].option3_h_image;
                                        var op3_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op3_h_img + '">';
                                    } else {
                                        var op3_h = data[i].opt3_h;
                                    }
                                }
                                if (data[i].no_of_options == 4 || data[i].no_of_options == 5) {
                                    if (data[i].opt4_h == '' || data[i].opt4_h == 0) {
                                        var op4_h_img = data[i].option4_h_image;
                                        var op4_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op4_h_img + '">';
                                    } else {
                                        var op4_h = data[i].opt4_h;
                                    }
                                }
                                if (data[i].no_of_options == 5) {
                                    if (data[i].opt5_h == '' || data[i].opt5_h == 0) {
                                        var op5_h_img = data[i].option5_h_image;
                                        var op5_h = '<img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid' + data[i].que_bank_id + '/' + op5_h_img + '">';
                                    } else {
                                        var op5_h = data[i].opt5_h;
                                    }
                                }

                            }
                            row += '<tr id="row' + data[i].que_id + '">' +
                                '<td>' + j + '</td>' +
                                '<td>' + data[i].que_id + '</td>' +
                                '<td>' + type + '</td>' + dynamicImg + dynamicImgHindi +

                                '<td>' + data[i].no_of_options + '</td>' +

                                '<td>' + '1. ' + op1 + '<br>2. ' + op2 + '<br>3. ' + op3 + '<br>4. ' + op4 + '<br>5. ' + op5 + '</td>' +

                                '<td>' + '1. ' + op1_h + '<br>2. ' + op2_h + '<br>3. ' + op3_h + '<br>4. ' + op4_h + '<br>5. ' + op5_h + '</td>' +

                                '<td>' + data[i].corr_opt_e + '</td>' +
                                '<td > <span class="btn btn-sm btn-danger deletedata"  onclick="deleteQuestion(' + data[i].que_id + ');"data-id =' + data[i].que_id + ' >Delete</span> </td>' +
                                '</tr>';

                        }
                        $("#que_body").html(row);
                    }
                });
            }

            function deleteQuestion(que_id) {
                var c = confirm("Are you sure to delete these details? ");
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
            // $("#total_marks").keydown(function(e) {

            //     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            //         (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            //         (e.keyCode >= 35 && e.keyCode <= 40)) {
            //         return;
            //     }
            //     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            //         e.preventDefault();
            //     }
            // });
        </script>
        <!-- Footer -->

        <!-- End of Footer -->