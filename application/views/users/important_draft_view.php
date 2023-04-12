<style>
    .proposal_view {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    border-top: 3px solid #2957a3!important;
}
</style>    
<link href="<?php echo base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Content Row -->
      
        <div class="row mt-5">
           <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Important Draft Standards View</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="proposal_view mb-5">
            <div class="col-12 mt-3">
                    <div class="row">
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Document Number</label>
                                    <div>
                                        <p>22133</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Department Id</label>
                                    <div>
                                        <p>74</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Department Name</label>
                                    <div>
                                        <p>PGD</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Committee Number</label>
                                    <div>
                                        <p>39</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Document Title</label>
                                    <div>
                                        <p>Optics and optical instruments  Ancillary devices for geodetic</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Document Type</label>
                                    <div>
                                        <p>Revision</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Department Stage</label>
                                    <div>
                                        <p>P-Draft</p>
                                    </div>    
                            </div>
                    </div>    
             </div>
             <div class="col-md-12 submit_btn p-3" style="text-align: end;">
                               <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?php echo base_url();?>users/important_draft_list'">Back</a>
                        </div>  
             </div>
        </div>
       </div>
    <!-- /.container-fluid -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
   </script>
