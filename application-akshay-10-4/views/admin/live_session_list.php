    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create new post/ live session</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create new post/ live session</li>
                </ol>
            </nav>
        </div>

        <!-- Content Row -->
        
        <div class="row">
            <div class="col-12">
                <div class="card border-top card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm mr-2" onclick="location.href='<?php echo base_url(); ?>admin/live_session_form'">Create New Post / Session</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>How science turns into standards of the BIS</td>
                              <td>Text Video Live Session Link</td>
                              <td>12/03/2023 07:40 AM</td>
                              <td>Created Published Unpublish</td>
                              <td class="d-flex">
                                 <a href="#" class="btn btn-primary btn-sm mr-2" title="View">View</a>
                                  <a class="btn btn-info btn-sm mr-2" title="View">Edit</a>
                                  <a class="btn btn-danger btn-sm mr-2" title="View">Delete</a>
                                  <a class="btn btn-success btn-sm mr-2" title="View">Create</a>
                            </td>

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