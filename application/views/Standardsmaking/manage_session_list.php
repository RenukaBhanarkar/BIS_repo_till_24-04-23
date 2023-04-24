    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Session/Post</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Session/Post</li>
                </ol>
            </nav> 
        </div>

        <!-- Content Row -->
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Type of Post</th>
                                <th>Created on</th>
                                <th>Likes</th>
                                <th>Views/Joined</th>
                                <th>Status</th>
                                <th>Reason of Rejection</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($liveSessionList as $key => $value) {?>

                                <tr>
                              <td><?= $key + 1;?></td>
                              <td><?= $value['title']?></td>
                              <td>
                                <?php 
                                if ($value['type_of_post']==1) {  $data='Text Upload'; }
                                if ($value['type_of_post']==2) { $data='Video Upload'; }
                                if ($value['type_of_post']==3) { $data='Live session link'; }
                                ?>

                                <?= $data?></td> 
                              <td><?= $value['created_on']?></td>

                              <td>567</td>
                              <td>45</td>
                              <td><?= $value['status_name']?></td>
                              <td><?= $value['reason']?></td>
                              <td><?= $value['updated_on']?></td>

                              <td class="" style="width:559px;">
                                 <?php $id= encryptids("E", $value['id'] )?>
                                 <a href="live_session_view/<?= $id;?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                 
                                 <?php if ($value['status']!=5 && $value['status']!=2 && $value['status']!=3) 
                                 {?>
                                     <a href="live_session_edit/<?= $id;?>" class="btn btn-info btn-sm mr-2" title="View">Edit</a>  
                                      
                                 <?php } ?>
                                  
                                 <?php if ($value['status']==1) 
                                 {?>
                                     <button onclick="updateStatusLiveSession('<?= $value['id']?>',2);" data-id='<?php echo $value['id']; ?>' class="btn btn-info btn-sm mr-2 delete_img"> Approval</button> 
                                      
                                 <?php } ?>
                                 <?php if ($value['status']==3  || $value['status']==6 ) 
                                 {?>
                                     <button onclick="updateStatusLiveSession('<?= $value['id']?>',5);" data-id='<?php echo $value['id']; ?>' class="btn btn-success btn-sm mr-2 delete_img">Publish</button> 
                                      
                                 <?php }?>

                                 <?php if ($value['status']==5) 
                                 {?>
                                     <button onclick="updateStatusLiveSession('<?= $value['id']?>',6);" data-id='<?php echo $value['id']; ?>' class="btn btn-warning btn-sm mr-2 delete_img">Unpublish</button> 
                                      
                                 <?php } ?>

                                 <?php if ($value['status']!=2 && $value['status']!=5 ) 
                                 {?>
                                     <button onclick="deleteLiveSession(' <?= $value['id']?> ');" data-id='<?php echo $value['id']; ?>' class="btn btn-danger btn-sm mr-2 delete_img">Delete</button>
                                   <?php } ?>
                                   <button onclick="updateStatusLiveSession('<?= $value['id']?>',9);" data-id='<?php echo $value['id']; ?>' class="btn btn-secondary btn-sm mr-2 delete_img">Archives</button> 

                                  
                                 


                                  


                                  

                                    
                                  

                                  

                              </td>
                              
                               
                        </tr>
                                
                           <?php }?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <button type="button" class="btn btn-primary deletecall" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updatemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="sms"></span> Record</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to <span class="sms"> </span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updatestatus" data-bs-dismiss="modal"><span class="sms"> </span></button>
            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->

    </div>
<script type="text/javascript">
    function deleteLiveSession(id) 
    {
        $('#delete').modal('show');
        $('.deletecall').on('click', function() 
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Standardsmaking/deleteLiveSession',
                data: {
                    id: id,
                },
                success: function(result) 
                {
                    location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        });
    }

    function updateStatusLiveSession(id,status) 
    { 
        if (status==2)  { $(".sms").text('Send For Approval'); }
        if (status==5)  { $(".sms").text('Publish'); }
        if (status==6)  { $(".sms").text('UnPublish'); }
        if (status==9)  { $(".sms").text('Archives'); }
        $('#updatemodel').modal('show');
        $('.updatestatus').on('click', function() 
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Standardsmaking/updateStatusLiveSession',
                data: {
                    id: id,
                    status: status,
                },
                success: function(result) 
                {
                    location.reload();
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        });
    }


    </script>
    <!-- End of Main Content -->
 </body>