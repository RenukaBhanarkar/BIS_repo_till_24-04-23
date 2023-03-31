<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Legal List</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            </ol>
        </nav>

    </div>


    <!-- Content Row -->

    
    <!-- /.container-fluid -->

    <div class="col-12">
        
        <?php
        if ($this->session->flashdata('MSG')) {
            echo $this->session->flashdata('MSG');
        }
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card border-top card-body">
                    <form action="<?php echo base_url(); ?>admin/update_legal" method="post">
                    <div class="form-group">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Legal </th>
                                                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <label class="d-block text-font" >Terms & Condition</label><br>
                                    <textarea class="form-control" id="editor1" rows="3" name="terms_condition"><?php echo $legal['tc']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block text-font">Privacy Policy</label><br>
                                    <textarea class="form-control" id="editor2" rows="3" name="privacy_policy"><?php echo $legal['policy_p']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Hyper Linking Policy</label><br>
                                    <textarea class="form-control" id="editor3" rows="3" name="hyper_linking_policy"><?php echo $legal['hlp']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Disclalmer</label><br>
                                    <textarea class="form-control" id="editor4" rows="3" name="disclamer"><?php echo $legal['disclamer']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Copyright Policy</label><br>
                                    <textarea class="form-control" id="editor5" rows="3" name="copyright_policy"><?php echo $legal['copyright_policy']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Website Content Contribution , Moderation $ Approval Policy (CMAP)</label><br>
                                    <textarea class="form-control" id="editor6" rows="3" name="cmap"><?php echo $legal['cmap']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Content Archival Policy (CAP)</label><br>
                                    <textarea class="form-control" id="editor7" rows="3" name="cap"><?php echo $legal['cap']; ?></textarea>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Content Review Policy (CRP)</label><br>
                                    <textarea class="form-control" id="editor8" rows="3" name="crp"><?php echo $legal['crp']; ?></textarea>
                                </td>                                
                            </tr>
                            
                            
                        </tbody>
                        <tr>
                                <td>
                                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                                </td>
                            </tr>
    </div>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- End of Main Content -->
