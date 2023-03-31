<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact Us</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    <div class="col-12">
    <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
        <div class="card border-top card-body">
            <div>
                <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#newform">Add Contact Us Details</button>
                <form id="add_admin" action="<?php echo base_url(); ?>admin/add_contact_us" method="post" enctype="multipart/form-data">
                    <div class="modal fade " id="newform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Contact Us Details</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Contact Number<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="contact_no" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Address<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="address" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">TELE FAX<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control input-font" name="tele_tax" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Email<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control input-font" name="email" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="d-block text-font">Location URL</label>
                                            <input type="text" class="form-control input-font" name="location_url" id="">
                                            <span class="error_text">
                                                <?php //echo form_error('title'); 
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <?php } ?>
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Contact no.</th>
                                <th>Address</th>
                                <th>TELE FAX</th>
                                <th>Email</th>
                                <th>Location URL</th>
                                <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($contact_us)) {
                                $i = 1;
                                foreach ($contact_us as $list_contact) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $list_contact['contact_no']; ?></td>
                                        <td><?php echo $list_contact['address']; ?></td>
                                        <td><?php echo $list_contact['tele_fax']; ?></td>
                                        <td><?php echo $list_contact['email']; ?></td>
                                        <td style="word-break: break-all;"><?php echo $list_contact['location']; ?></td>
                                        <?php if (encryptids("D", $_SESSION['admin_type']) == 3) {   ?>
                                        <td class="d-flex border-bottom-0">
                                            <button onClick="" class="btn btn-info btn-sm mr-2 text-white" data-toggle="modal" data-target="#editform"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button onClick="" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                            <div class="modal fade " id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Contact Us
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Contact Number<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="" id="">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Address<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="" id="">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">TELE FAX<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control input-font" name="" id="">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Email<sup class="text-danger">*</sup></label>
                                                                    <input type="email" class="form-control input-font" name="" id="">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label class="d-block text-font">Location URL</label>
                                                                    <input type="text" class="form-control input-font" name="" id="">
                                                                    <span class="error_text">
                                                                        <?php //echo form_error('title'); 
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->