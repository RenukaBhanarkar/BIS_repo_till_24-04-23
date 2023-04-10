    <!-- Begin Page Content -->
    <div class="container-fluid">
    <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <?php 
                if (encryptids("D", $_SESSION['admin_type']) == 1){ ?> Super Admin Dashboard <?php }
                else  if(encryptids("D", $_SESSION['admin_type']) == 2){ ?> Admin Dashboard <?php } else { ?> Sub Admin Dashboard<?php } ?></h1>
           
        </div>
       
       
        <!-- Content Row -->
        <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>Quiz/quiz_dashboard">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center d-flex">
                                <h5 class="font-weight-bold text-primary mb-1">Quiz Competition</h5>
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>quiz/quiz_list">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center d-flex">
                                <h5 class="font-weight-bold text-primary mb-1">Poster Making Competition</h5>
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?php echo base_url(); ?>subadmin/question_bank_list">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center d-flex">
                                <h5 class="font-weight-bold text-primary mb-1">Standard Writting Competition</h5>
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                

               

                
          </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

