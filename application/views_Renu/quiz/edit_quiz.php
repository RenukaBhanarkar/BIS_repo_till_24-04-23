
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
            <h1 class="h3 mb-0 text-gray-800">Edit Quiz Creation</h1> 
            
        </div> 
        <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
       
       
        <!-- Content Row -->
        <form name="quiz_reg" action="<?php echo base_url().'Quiz/editquiz/'.$quizdata['id']?>" method="post"enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top">
               <div class="card-body"> 
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Title of Quiz<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="title" id="title" value="<?php echo set_value('title',$quizdata['title'])?>" placeholder="Enter Quiz Title">
                        <span class="error_text"><?php echo form_error('title');?></span>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font" text-font>Description of Quiz<sup class="text-danger">*</sup></label>
                        <textarea class="form-control input-font" placeholder="Description of Quiz" name="description" id="description" ><?php echo set_value('description',$quizdata['description'])?></textarea>
                        <span class="error_text"><?php echo form_error('description');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font" text-font>Tearms and Conditions of Quiz<sup class="text-danger">*</sup></label>
                        <textarea class="form-control input-font" placeholder="Tearms and Conditions of Quiz" name="terms_conditions" id="terms_conditions"><?php echo set_value('terms_conditions',$quizdata['terms_conditions']);?></textarea>
                        <span class="error_text"><?php echo form_error('terms_conditions');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Quiz Duration (In Minutes):<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="duration" id="duration" value="<?php echo set_value('duration',$quizdata['duration']);?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                        <span class="error_text"><?php echo form_error('duration');?></span>

                    </div>  
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Total Number of Questions<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="total_question" id="total_question" placeholder="Total Number of Questions" value="<?php echo set_value('total_question',$quizdata['total_question']);?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                        <span class="error_text"><?php echo form_error('total_question');?></span>
                    </div>  
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="total_mark" id="total_mark" placeholder="Total Marks"value="<?php echo set_value('total_mark',$quizdata['total_mark']);?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                        <span class="error_text"><?php echo form_error('total_mark');?></span>
                    </div>  
                </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font">Quiz Availabile On<sup class="text-danger">*</sup></label>
                         
                          <span id="employee_type_error" class="validationError"></span>
                        <span id="displayMsgRdbEmployeeType"></span>
                     </div>  
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Start Date<sup class="text-danger">*</sup></label>
                        <input type="date" class="form-control input-font" name="start_date" id="start_date" placeholder="Select Date"value="<?php echo set_value('start_date',$quizdata['start_date']);?>">
                         <span class="error_text"><?php echo form_error('start_date');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Start Time<sup class="text-danger">*</sup></label>
                        <input type="time" class="form-control input-font" name="start_time" id="start_time" placeholder="Select Date" value="<?php echo set_value('start_time',$quizdata['start_time']);?>">
                         <span class="error_text"><?php echo form_error('start_time');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">End Date<sup class="text-danger">*</sup></label>
                        <input type="date" class="form-control input-font" name="end_date" id="end_date" placeholder="Select Date"value="<?php echo set_value('end_date',$quizdata['end_date']);?>">
                         <span class="error_text"><?php echo form_error('end_date');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font"> End Time<sup class="text-danger">*</sup></label>
                        <input type="time" class="form-control input-font" name="end_time" id="end_time" placeholder="Select Date"value="<?php echo set_value('end_time',$quizdata['end_time']);?>">
                         <span class="error_text"><?php echo form_error('end_time');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Level of Quiz<sup class="text-danger">*</sup></label>
                        <select id="quiz_level_id" name="quiz_level_id" class="form-control input-font"> 
                        <?php 
                        foreach ($quizlavel as $lavel)
                        {?>
                            <option  <?php if($quizdata['quiz_level_id']== $lavel['id'] ) echo "selected";?>  value="<?php echo $lavel['id']?>"> <?php echo $lavel['title'];?> </option>
                            <?php
                        } ?> 
                    </select>
                         <span class="error_text"><?php echo form_error('quiz_level_id');?></span>
                         
                    </div> 
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Launguage of Quiz<sup class="text-danger">*</sup></label>
                        <select id="language_id" name="language_id" class="form-control input-font" value="<?php echo set_value('language_id'); ?>">
                        <?php 
                        foreach ($getQuizLanguage as $QuizLanguage)
                        {?>
                            <option  <?php if($quizdata['language_id']== $QuizLanguage['id'] ) echo "selected";?>  value="<?php echo $QuizLanguage['id']?>"> <?php echo $QuizLanguage['title'];?> </option>
                            <?php
                        } ?> 
                    </select>

                         <span class="error_text"><?php echo form_error('language_id');?></span>

                       </div> 
                </div>
               
                <div class="row">
                     <div class="mb-2 col-md-6">
                        <label class="d-block">Upload Quiz Banner<sup class="text-danger">*</sup></label>
                        <div class="d-flex">
                         <div>
                            <input type="file" id="banner_img" accept="image/jpeg,image/png" name="banner_img" class="form-control-file" onchange="loadFileBanner(event)">
                            <input type="hidden" name="lastbanner" value="<?php echo $quizdata['banner_img'];?>"> 
                         </div>
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Preview
                          </button> &nbsp;
                          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalView">
                            View
                          </button>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Last Uoloaded Banner Image Preview</h5>

                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <img src="../../<?php echo $quizdata['banner_img'];?>" style="width:450px;"/>
                             </div>
                                <div class="modal-footer"> 
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Banner Image Preview</h5>

                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <img id="outputbanner"style="width:450px;"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button"  onclick="resetbanner()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>       
                                      <!-- Modal -->
                      </div>
                      
                         
                </div>
                </div>
                <div class="row mt-2">
                <div class="col-md-4 prizes-section">
                        <h4 class="m-2">First Prize</h4>
                       </div> 
                </div>
                <div class="row mt-2">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="fprize" id="fprizes" placeholder="Enter Prizes"value="<?php echo set_value('fprize',$firstprize['no_of_prize']);?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                         <span class="error_text"><?php echo form_error('fprizes');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="fdetails" id="fdetails" placeholder="Enter Details"value="<?php echo set_value('fdetails',$firstprize['prize_details']);?>">
                         <span class="error_text"><?php echo form_error('fdetails');?></span>
                    </div> 
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Icon (Image upload)<sup class="text-danger">*</sup></label>
                        <div class="d-flex">
                         <div>
                            <input type="file" id="fprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileFirst(event)" name="fprize_img" class="form-control-file">
                            <input type="hidden" name="lastfprize_img" value="<?php echo $firstprize['prize_img'];?>"> 
                         </div>
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirst">
                            Preview
                          </button> &nbsp;
                          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFirstView">
                            View
                          </button>
                        </div>

                        <div class="modal fade" id="exampleModalFirstView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Last Uploaded First Prize Icon Image</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="../../<?php echo $firstprize['prize_img'];?>" style="width: 450px;"/>
                                </div>
                                <div class="modal-footer"> 
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalFirst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">First Prize Icon</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img id="outputFirst"style="width: 450px;"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" onclick="resetFirst();" data-bs-dismiss="modal">ReSet</button>
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>       
                                      <!-- Modal -->
                      </div>
                      
                </div>
                <div class="row mt-2">
                <div class="col-md-4 prizes-section">
                        <h4 class="m-2">2<sup>nd</sup>Prize</h4>
                </div> 
                </div> 
                <div class="row mt-2">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="sprize" id="sprizes" placeholder="Total Number of Questions"value="<?php echo set_value('sprizes', $secondprize['no_of_prize'])?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                         <span class="error_text"><?php echo form_error('sprizes');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="sdetails" id="sdetails" placeholder="Enter Details"value="<?php echo set_value('sdetails',$secondprize['prize_details'])?>"> 

                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Icon (Image upload)<sup class="text-danger">*</sup></label>
                        <div class="d-flex">
                         <div>
                            <input type="file" id="sprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileSecond(event)" name="sprize_img" class="form-control-file" >
                            <input type="hidden" name="lastsprize_img" value="<?php echo $secondprize['prize_img'];?>">
                         </div>
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecond">
                            Preview
                          </button>&nbsp;
                          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSecondView">
                            View
                          </button>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalSecondView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Second Prize Icon Image</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img src="../../<?php echo $secondprize['prize_img'];?>"style="width: 450px;"/>
                                </div>
                                <div class="modal-footer"> 
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div> 
                        <div class="modal fade" id="exampleModalSecond" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Second Prize Icon Image</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img id="outputSecond"style="width: 450px;"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" onclick="resetSecond();" data-bs-dismiss="modal">ReSet</button>
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>       
                                      <!-- Modal -->
                      </div>
                 </div>
                 <div class="row mt-2">
                <div class="col-md-4 prizes-section">
                        <h4 class="m-2">3<sup>nd</sup>Prize</h4>
                </div> 
                </div> 
                <div class="row mt-2">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="tprize" id="tprize" placeholder="Total Number of Questions" value="<?php echo set_value('tprize',$thirdprize['no_of_prize'])?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                         <span class="error_text"><?php echo form_error('tprize');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="tdetails" id="tdetails" placeholder="Enter Details"value="<?php echo set_value('tdetails',$thirdprize['prize_details'])?>">
                         <span class="error_text"><?php echo form_error('tdetails');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Icon (Image upload)<sup class="text-danger">*</sup></label>
                        <div class="d-flex">
                         <div>
                            <input type="file" id="tprize_img" accept="image/jpeg,image/png,image/jpg" onchange="loadFileThird(event)" name="tprize_img" class="form-control-file"> 
                            <input type="hidden" name="lasttprize_img" value="<?php echo $thirdprize['prize_img'];?>"> 

                         </div>
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalThird">
                            Preview
                          </button>&nbsp;
                         <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalThirdView">
                            View
                          </button>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalThirdView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Last Uploaded Third Prize Icon Image</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <img src="../../<?php echo $thirdprize['prize_img'];?>" style="width: 450px;"/>
                                </div>
                                <div class="modal-footer"> 
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div> 
                        <div class="modal fade" id="exampleModalThird" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"> Third Prize Icon Image</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <img id="outputThird"style="width: 450px;"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" onclick="resetThird();" data-bs-dismiss="modal">ReSet</button>
                                  <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>       
                                      <!-- Modal -->
                      </div>
                 </div> 
                 <div class="row mt-2">
                <div class="col-md-4 prizes-section">
                        <h4 class="m-2">Consolation Prizes</h4>
                </div> 
                </div> 
                <div class="row mt-2">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="cprize" id="cprize" placeholder="Enter Number of prizes"value="<?php echo set_value('cprize',$fourthprize['no_of_prize'])?>"oninput="this.value = this.value.replace(/[^0-9/]/, '')">
                         <span class="error_text"><?php echo form_error('cprize');?></span>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="cdetails" id="cdetails" placeholder="Enter Details"value="<?php echo set_value('cdetails',$fourthprize['prize_details'])?>">
                         <span class="error_text"><?php echo form_error('cdetails');?></span>
                    </div>
                </div>
                <div class="row mt-2">
                <div class="col-md-4 prizes-section">
                        <h4 class="m-2">Available for</h4>
                </div> 
                </div> 
                <div class="row mt-2">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Select Option<sup class="text-danger">*</sup></label>
                        <!-- <input type="text" class="form-control input-font" name="Members" id="Members" placeholder="Enter Standard Club Member"> -->
                        <select id="availability_id" name="availability_id" class="form-control input-font">
                        <?php 
                        foreach ($getAvailability as $Availability)
                        {?>
                            <option  <?php if($quizdata['availability_id']== $Availability['id'] ) echo "selected";?>  value="<?php echo $Availability['id']?>"> <?php echo $Availability['title'];?> </option>
                            <?php
                        } ?>
                    </select>
                         <span class="error_text"><?php echo form_error('availability_id');?></span>
                    </div> 
                </div>
                <div class="row mt-2">
                                <div class="col-md-4 prizes-section">
                                    <h4 class="m-2">Load Questions</h4>
                                </div> 
                </div>
                <div class="row mt-2">
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Select Question Bank<sup class="text-danger">*</sup></label>
                        <select class="form-control input-font" aria-label="Default select example" name="que_bank_id" id="que_bank_id" onchange="getQBDetails(this.value);">
                            <?php 
                        foreach ($getAllQb as $AllQb)
                        {?>
                            <option  <?php if($quizdata['que_bank_id']== $AllQb['que_bank_id'] ) echo "selected";?>  value="<?php echo $AllQb['que_bank_id']?>"> <?php echo $AllQb['title'];?> </option>
                            <?php
                        } ?>
                        </select> 
                    </div>
                </div>
                <div class="row">
                <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Question Bank Id<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="qbid" id="qbid" placeholder="Enter Question Bank ID" readonly>
                         <span class="error_text"><?php echo form_error('cdetails');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="qbtitle" id="qbtitle" placeholder="Enter Title"readonly> 
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Number of Question<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control input-font" name="qbquestion" id="qbquestion" placeholder="Enter Number of Question" readonly> 
                    </div>
                </div>
                <div class="row mt-2">
                <div class="mb-2 col-md-12">
                <table id="example" class="hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Question No.</th>
                            <th>Question</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Option 5</th>
                            <th>Correct</th>
                            
                        </tr>
                    </thead>
                    <tbody id="que_body">
                    </tbody>
                </table>
           </div>
                </div>  
                
                  


                <div class="col-md-12 submit_btn p-3">
                       <!-- <a class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</a> -->
                       <input type="submit" name="Submit" class="btn btn-info btn-sm">
                       <a class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</a> 
                       <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
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
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
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
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>       
                          <!-- Modal -->
            </div> 
          </div>
        </div>
    </form>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Logout Modal-->
<!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
   </script> -->

   <!-- Bootstrap core JavaScript-->
   <!-- <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?php echo base_url();?>assets/admin/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url();?>assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/demo/chart-pie-demo.js"></script> -->

 <script>
                        CKEDITOR.replace( 'description' );
                        CKEDITOR.replace( 'terms_conditions' );
                </script>
     
   <script>
    $(document).ready(function () 
    { 
        var id="<?php echo $quizdata['que_bank_id'];?>"
        getQuestionListByQueBankId(id);
        getQBDetails(id);


    });
 </script>



<script type="text/javascript">
    function getQuestionListByQueBankId(id)
    {
       $.post("<?php echo base_url(); ?>subadmin/getQuestionListByQueBankId/", {
                        que_bank_id: id
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
                                if(data[i].opt1_e==''){ var op1='NA'; } else{ var op1=data[i].opt1_e;}
                                if(data[i].opt2_e==''){ var op2='NA'; } else{ var op2=data[i].opt2_e;}
                                if(data[i].opt3_e==''){ var op3='NA'; } else{ var op3=data[i].opt3_e;}
                                if(data[i].opt4_e==''){ var op4='NA'; } else{ var op4=data[i].opt4_e;}
                                if(data[i].opt5_e==''){ var op5='NA'; } else{ var op5=data[i].opt5_e;} 
                                 
                                row += '<tr id="row' + data[i].que_id + '">' +
                                    '<td>' + j + '</td>' +
                                    '<td>' + data[i].que + '</td>' + 
                                    '<td>' + op1 + '</td>' +
                                    '<td>' + op2 + '</td>' +
                                    '<td>' + op3 + '</td>' +
                                    '<td>' + op4 + '</td>' +
                                    '<td>' + op5 + '</td>' +
                                    '<td>' + data[i].corr_opt_e + '</td></tr>'; 
                            }

                            $("#que_body").html(row);
                        }
                    });

    }
    function getQBDetails(id) {
   $.ajax(
    {

        url: "<?php echo base_url(); ?>Quiz/getQbdata/"+id, 
        type: "JSON",
        method: "get",
        success: function(result) 
        {
            var res = JSON.parse(result);   
            console.log(res)
            $("#qbid").val(res.result.que_bank_id);
            $("#qbtitle").val(res.result.title);
            $("#qbquestion").val(res.result.no_of_ques);
            getQuestionListByQueBankId(id)
        }
    });
    // body...
}
</script>


<script>
    //Banner Image Preview
    var loadFileBanner = function(event) 
    {
        $("#outputbanner").show();
        var outputbanner = document.getElementById('outputbanner');
        outputbanner.src = URL.createObjectURL(event.target.files[0]);
        outputbanner.onload = function()
        {
            URL.revokeObjectURL(outputbanner.src);
        }
    };
    function resetbanner()
    {
        $("#banner_img").val(''); 
        $("#outputbanner").hide(); 
    }
    //end

    //First Prize Image Preview
    var loadFileFirst = function(event) 
    {
        $("#outputFirst").show();
        var outputFirst = document.getElementById('outputFirst');
        outputFirst.src = URL.createObjectURL(event.target.files[0]);
        outputFirst.onload = function()
        {
            URL.revokeObjectURL(outputFirst.src);
        }
    };
    function resetFirst()
    {
        $("#fprize_img").val(''); 
        $("#outputFirst").hide(); 
    }
    //end

    //Second Prize Image Preview
    var loadFileSecond = function(event) 
    {
        $("#outputSecond").show();
        var outputSecond = document.getElementById('outputSecond');
        outputSecond.src = URL.createObjectURL(event.target.files[0]);
        outputSecond.onload = function()
        {
            URL.revokeObjectURL(outputSecond.src);
        }
    };
    function resetSecond()
    {
        $("#sprize_img").val(''); 
        $("#outputSecond").hide(); 
    }
    //end

    //Second Prize Image Preview
    var loadFileThird = function(event) 
    {
        $("#outputThird").show();
        var outputThird = document.getElementById('outputThird');
        outputThird.src = URL.createObjectURL(event.target.files[0]);
        outputThird.onload = function()
        {
            URL.revokeObjectURL(outputThird.src);
        }
    };
    function resetThird()
    {
        $("#tprize_img").val(''); 
        $("#outputThird").hide(); 
    }
    //end


</script>
 