    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz Dashboard</h1>
           
        </div>
       
       
        <!-- Content Row -->
        <div class="row">
        <?php if (encryptids("D", $_SESSION['admin_type']) == 3  ){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">New Quiz</h5>
                            

                        </div>
                    </div>
                </div>
                </a>
            </div>
         <?php } ?>
         <?php if (encryptids("D", $_SESSION['admin_type']) == 2 || encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/manage_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-warning mb-1">Manage Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/ongoing_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-danger mb-1">On Going Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>Quiz/closed_quiz_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-success mb-1">Closed Quiz</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>admin/questionBankList">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Question Bank</h5>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
            <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>subadmin/questionBankList">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-teal mb-1">Question Bank</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo base_url(); ?>quiz/result_declaration_list">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center d-flex">
                            <h5 class="font-weight-bold text-info mb-1">Result Declaration</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
         
          </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


