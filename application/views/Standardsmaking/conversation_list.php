    <!-- Begin Page Content -->
    <div class="container-fluid">
 
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">In Conversation with Expert</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12">
                <div class="card border-top card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>Standardsmaking/conversation_form'">Add New Video</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
          if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
          }
          ?>
       <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <table id="example" class="hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>About Video</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($Conversation as $key => $value) {?>
                            <tr>
                            <td><?= $key+1;?></td>
                              <td><?= $value['title'];?></td>
                              <td><?= $value['description'];?></td>
                              <td><a href="<?= base_url()?><?= $value['video']?>"><i class="fa fa-video"></i></a></td>
                              <td><?= $value['status_name'];?></td>
                              <td class="d-flex">
                                <a href="conversation_view/<?= $value['id'];?>" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                <?php if ($value['status']!=5) {?>
                                      
                                  <a href="conversation_edit/<?= $value['id'];?>" class="btn btn-info btn-sm mr-2" title="View">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" href="conversation_delete/<?= $value['id'];?>">Delete</a>
                                  <a class="btn btn-success btn-sm mr-2" href="publish/<?= $value['id'];?>">Publish</a>
                                  <?php }?>
                                  
                                  <?php if ($value['status']==5) {?>
                                      <a class="btn btn-primary btn-sm mr-2" href="unpublish/<?= $value['id'];?>">Unpublish</a>
                                  <?php }?>
                                 
                                  <a class="btn btn-primary btn-sm mr-2" href="archives/<?= $value['id'];?>">Archives</a>

                              </td>
                          </tr>
                      <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
 </body>