    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Quiz</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Quiz</li>
                </ol>
              </nav>           
        </div>     
      
        <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card border-top card-body">
                <table id="example" class="hover table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Quiz ID</th>
                            <th>Quiz Title</th>
                            <th>Quiz Start Date</th>
                            <th>Quiz End Date</th>
                            <th>Total Questions in Quiz</th>
                            <th>Total Questions in QB</th>
                            <th>Total Marks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($allquize)){
                            $i=1;
                            foreach($allquize as $quiz)
                            {?>
                                <tr>
                                 <td><?php echo $i++?></td>
                                 <td><?php echo $quiz['quiz_id']?></td>
                                 <td><?php echo $quiz['title']?></td>
                                 <td><?php echo $quiz['start_date']?></td>
                                 <td><?php echo $quiz['end_date']?></td>
                                 <td><?php echo $quiz['total_question']?></td>
                                 <td>0</td>
                                 <td><?php echo $quiz['total_mark']?></td>
                                 <td><?php echo $quiz['status_name']?></td>
                                 <td class="d-flex border-bottom-0">
                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 2){ 
                                      if($quiz['status']== 2 ) { ?>

                                 <a href="quiz_view/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2">Approve/ Reject</a> 
                                 <?php }  }?>
                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 2){ 
                                      if($quiz['status'] == 3 || $quiz['status'] == 4 || $quiz['status'] == 5 || $quiz['status'] == 6 ) {
                                  ?>
                                 <a href="quiz_view/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                 <?php }  }?>

                                 <?php if (encryptids("D", $_SESSION['admin_type']) == 3){ ?>
                                 <a href="quiz_view/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                 <?php } ?>
                                     <?php if (encryptids("D", $_SESSION['admin_type']) == 3){ ?>
                                      <?php if($quiz['status']==3 || $quiz['status']==6 ){?>
                                        <a href="publishQuiz/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2">Publish</a>
                                        
                                    <?php } ?>
                                    <?php if($quiz['status']==5){?>
                                         
                                        <a href="unPublishQuiz/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2">UnPublish</a>
                                    <?php } ?>
                                   
                                    <?php if($quiz['status']==1 || $quiz['status']==4 ){?>
                                        <a href="editquiz/<?php echo $quiz['id']?>" class="btn btn-info btn-sm mr-2 text-white"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="sendApprove/<?php echo $quiz['id']?>"class="btn btn-primary btn-sm mr-2">Create</a>
                                          <button onClick="" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                    <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } }?>
                          </tbody>
                </table>
            </div>    
          </div>
        </div>
       </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
  <!-- Modal -->
  <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Create?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>       
                          <!-- Modal -->
