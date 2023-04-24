<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quiz Result Declaration View</h1>
                        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'Admin/dashboard';?>" >Sub Admin Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/exchange_forum';?>" >Exchange Forum</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/organizing_quiz';?>" >Competitions</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/quiz_dashboard';?>" >Quiz Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'quiz/result_declaration_list';?>" >Quiz Result Declaration</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Quiz Result Declaration View</li> -->
                
                </ol>
            </nav>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: end;">
                    <a class="btn btn-primary btn-sm mr-2" >Export as PDF</a>
                    <a class="btn btn-info btn-sm mr-2" >Print</a>
                    </div>
                    </div>
<!-- Content Row -->
<div class="row">
                        <div class="col-12 mt-3">
                        <div class="card border-top">
                           <div class="card-body"> 
                            <div class="row">
                               <div class="mb-2 col-md-12 d-flex">
                                    <label class="d-block text-font">Question 1 :</label>
                                    <div class="ml-2">
                                        <p>What is the color of Lion ?</p>
                                    </div>    
                                </div>
                                </div>
                                <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Options :</label>
                                    <div>
                                        <ol>
                                            <li>Orange</li>
                                            <li>Red</li>
                                            <li>Yellow</li>
                                            <li>Blue</li>
                                            <li>Pink</li>
                                        </ol>    
                                        <!-- <p>Orange</p>
                                        <p>Red</p>
                                        <p>Yellow</p>
                                        <p>blue</p>
                                        <p>Pink</p> -->
                                    </div>    
                                </div>
                             </div>
                            <div class="row">
                                <div class="mb-2 col-md-8 d-flex">
                                    <label class="d-block text-font">Correct Option :</label>
                                    <div class="ml-2">
                                        <p>5</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4 d-flex">
                                    <label class="d-block text-font">Option Select :</label>
                                    <div class="ml-2">
                                        <p>100</p>
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label class="d-block text-font">Question 2:</label>
                                    <div>
                                        <p>Which Symbol is this ?</p>
                                    </div>
                                    <div>
                                        <img src="http://localhost/BIS/BIS_repo/assets/admin/img/bis_logo.png" alt="" class="" width="100%" style="height:227px">
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Option :</label>
                                    <div class="row">
                                            <div class="col-md-6">
                                              <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                            </div>
                                            <div class="col-md-6">
                                              <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                            </div>
                                            </div>
                                        <div class="row mt-2">    
                                            <div class="col-md-6">
                                              <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                            </div> 
                                            <div class="col-md-6">
                                              <img src="http://localhost/BIS/BIS_repo/assets/admin/img/quiz_img.jpeg" alt="" class="" width="100%" style="height:181px">
                                            </div> 
                                    </div>   
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="mb-2 col-md-8 d-flex">
                                    <label class="d-block text-font">Correct Option :</label>
                                    <div class="ml-2">
                                        <p>5</p>
                                    </div>    
                                </div>
                                <div class="mb-2 col-md-4 d-flex">
                                    <label class="d-block text-font">Option Select :</label>
                                    <div class="ml-2">
                                        <p>100</p>
                                    </div>    
                                </div>
                            </div>
                            

                          </div>
                          <div class="col-md-12 submit_btn p-3">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>Quiz/closed_quiz_submission'">Back</a>
                          </div>  
                                                   </div> 
                      </div>
                    </div>
                    </div>


            </div>
            <!-- End of Main Content -->

         