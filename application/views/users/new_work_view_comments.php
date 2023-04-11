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
                                    <label class="d-block text-font" style="font-weight: 600;">Subject</label>
                                    <div>
                                        <p>Standard_subject</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Name of Proposer</label>
                                    <div>
                                        <p>proposer_name</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Organization Type</label>
                                    <div>
                                        <p>Type</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Date of Receipt</label>
                                    <div>
                                        <p>12/03/2023</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Current Stage</label>
                                    <div>
                                        <p>Stage</p>
                                    </div>    
                            </div>
                            <div class="mb-2 col-md-4">
                                    <label class="d-block text-font" style="font-weight: 600;">Concerned BIS Department</label>
                                    <div>
                                        <p>BIS Department</p>
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
       <div class="container">
  
                        <form>
                <h2 class="YourWallForm">Important Draft Standards</h2>
                <div class="bg-light-comment p-3">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group ">
                                    <textarea class="form-control  w-100" rows="8" placeholder="Share Your Comments......" name="description"></textarea>

                                    
                                </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input type="file" class="file-upload-field" name="image" value="">
                            </div>
                        </div>
                        <div class="button-group  mt-3" style="text-align:end;">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                        
                    </div>
                    
                </div>


            </form>

            <ul class="posts">
            </ul>
        </div>
        <div class="container">
            <div class="artical-comment">
                <div class="view_content">
                    <div class="common_content">
                        <div class="comment_user">
                              <img src="http://localhost/BIS/BIS_repo/assets/images/user_1.png" alt="Default Profile Picture" width="5%">            
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
   